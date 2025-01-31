<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg {
            border: 2px solid greenyellow;
        }

        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;

        }

        td {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
        }

        input[type='search'] {
            height: 40px;
            width: 300px;
            text-align: center;
            margin-left: 100px;

        }
    </style>

</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.nav')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h2 class="h5 no-margin-bottom">View Product</h2>
                </div>
            </div>


            <!-- Sidebar Navigation end-->
            <form action="{{ url('product_search') }} " method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($product as $products)
                        <tr>
                            <td>{{ $products->title }}</td>
                            <td>{{ $products->description }}</td>
                            {{--                {!! str::limit()!!} --}}
                            <td>{{ $products->price }}</td>
                            <td>
                                <img height="200" width="200" src="products/{{ $products->image }}">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ url('update_product', $products->id) }}">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete_product', $products->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </table>

            </div>
            <div class="div_deg">
                {{ $product->links() }}
            </div>


            @include('admin.footer')
</body>

</html>
