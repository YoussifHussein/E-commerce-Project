<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
    }
        label{
            display: inline-block;
            color: white;
            width: 200px;
            padding:10px;
        }
        textarea{
            width: 400px;
            height: 70px;
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
                <h2 class="h5 no-margin-bottom">Update Product</h2>
            </div>

    </div>

        <div class="div_deg">


            <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <label>Title</label>
                <input type="text" name="title" value="{{$data->title}}">

                <div>
                    <label>Description</label>
                    <textarea  name="description" >{{$data->description}}</textarea>
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" name="price" value="{{$data->price}}">
                </div>
                <div>
                    <label>Image</label>
                    <img width="150" src="/products/{{$data->image}}">

                </div>
                <div>
                    <label>New Image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <input class="btn btn-success" type="submit" value="Update Product">
                </div>


            </form>
        </div>


@include('admin.footer')
</body>
</html>
