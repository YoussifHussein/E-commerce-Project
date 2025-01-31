<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg {
            border: 2px solid black;
        }

        th {
            background-color: black;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;

        }

        td {
            border: 1px solid black;
            text-align: center;
            color: black;
        }
    </style>
</head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Document</title>
</head>

<body>
    <div class="hero_area">

        @include('home.header')
    </div>

    <div class="div_deg">
        <table class="table_deg">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delivered Status</th>
                <th>Image</th>
            </tr>
            @foreach ($order as $order)
                <tr>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <img height="200" width="200" src="/products/{{ $order->product->image }}">
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        @include('home.footer')
    </div>
</body>

</html>
