<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status', 'Delivered')->count();
        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        toastr()->closeButton()->addSuccess('Category Added Successfully');
        $category->save();
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()
            ->timeOut(1000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.category_edit', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        toastr()->closeButton()->addSuccess('Category Updated Successfully');
        $data->save();
        return redirect('/view_category');
    }

    public function add_product()
    {

        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $image = $request->image;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }
        $data->save();
        toastr()->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(2);
        return view('admin.product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/' . $data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        toastr()
            ->timeOut(1000)->closeButton()->addSuccess('Product Deleted Successfully');
        return redirect()->back();
    }
    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product', compact('data', 'category'));
    }
    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imageName);
            $data->image = $imageName;
        }
        $data->save();
        toastr()->closeButton()->addSuccess('Product Updated Successfully');
        return redirect('/view_product');
    }
    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'like', '%' . $search . '%')->paginate(2);
        return view('admin.product', compact('product'));
    }
    public function view_orders()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }
    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On The Way';
        $data->save();
        toastr()->closeButton()->addSuccess('Order Status On The Way ');
        return redirect('/view_orders');
    }
    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        toastr()->closeButton()->addSuccess('Order Status Delivered ');
        return redirect('/view_orders');
    }
    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = PDF::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
