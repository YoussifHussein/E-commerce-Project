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
            color: white;

        }

        td {
            border: 1px solid skyblue;
            text-align: center;
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
                    <h2 class="h5 no-margin-bottom"> All Orders</h2>
                </div>
            </div>
            <!-- Sidebar Navigation end-->
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Change Status</th>
                        <th>Print PDF</th>

                    </tr>
                    <tr>
                        @foreach ($data as $data)
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->rec_address }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->product->title }}</td>
                            <td>{{ $data->product->price }}</td>
                            <td><img src="/products/{{ $data->product->image }}" width="100" height="100">
                            </td>
                            <td>{{ $data->payment_status }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('on_the_way', $data->id) }}">On the way</a>
                                <a class="btn btn-success" href="{{ url('delivered', $data->id) }}">Delivered</a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ url('print_pdf', $data->id) }}">Print PDF</a>
                            </td>
                    </tr>
                    @endforeach
                </table>
            </div>

            @include('admin.footer')
</body>

</html>
