<!DOCTYPE html>
<html>
@include('admin.css')
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.nav')
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->

    @include('admin.body')

   @include('admin.footer')
</body>
</html>
