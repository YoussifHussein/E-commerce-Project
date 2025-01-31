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
        .table_deg{
            text-align: center;
            margin: auto;
            border: 2px solid greenyellow;
            margin-top: 50px;
            width: 600px;

        }
        th{
            border: 1px solid skyblue;
            color: white;
            font-size: 20px;
            font-weight: bold;
            padding: 15px;

        }
        td{
            border: 1px solid skyblue;
            text-align: center;
            color:white;
        }

    </style>

</head>
<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.nav')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Add Category</h2>
            </div>
        </div>
    <form action="{{url('add_category')}}" method="post">
        @csrf
        <div class="div_deg" >
            <input type="text" name="category">
            <input class="btn btn-success" type="submit" value="Add Category">
        </div>
    </form>
    <div>

        <table class="table_deg" >

            <tr>
                <th> Category Name</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            @foreach($data as $data)
            <tr>
                <th> {{$data->category_name}}</th>
                <td>
                    <a class="btn btn-success" href="{{url('edit_category',$data->id)}}">Edit</a>
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                </td>


            </tr>
            @endforeach


        </table>
    </div>
@include('admin.footer')
</body>
</html>
