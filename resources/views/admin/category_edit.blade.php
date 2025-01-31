<!DOCTYPE html>
<html>
@include('admin.css')
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.nav')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Update Category</h2>
            </div>
    <form action="{{url('update_category',$data->id)}}" method="post">
        @csrf

    <div>

         <form>
        <input type="text" name="category" value="{{$data->category_name}}">
        <input class="btn btn-primary" type="submit" value="Update Category">

    </form>
    </div>

@include('admin.footer')
</body>
</html>
