<!DOCTYPE html>
<html>
@include('admin.css')
<body>
@include('admin.header')

<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.nav')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 class="h2 no-margin-bottom">Add Product</h1>
            </div>
        </div>

    <head>

        <title>Products</title>
        <style>
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
        </style>
    </head>


    <div class="form-container">

        <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" id="title" name="title" placeholder="Enter product title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter product description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" placeholder="Enter product price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <button class="btn-success" type="submit">Add Product</button>
            </div>
        </form>
    </div>





@include('admin.footer')
</body>
</html>
