<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style type="text/css">
        .order_deg {
            padding-right: 200px;
            margin-top: 50px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        .div_gap {
            padding: 20px;
        }

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

        .cart_value {
            align-items: center;
            padding: 18px;
            margin-bottom: 70px;

        }
    </style>
</head>

<body>
    <div class="hero_area">

        @include('home.header')
        <!-- end header section -->

    </div>



    <div class="div_deg">



        <table class="table_deg">
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Delete</th>

            </tr>

            <?php
            $value = 0;
            ?>
            @foreach ($cart as $cart)
                <tr>
                    <td>{{ $cart->product->title }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>
                        <img width="100" src="/products/{{ $cart->product->image }}">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('delete_cart', $cart->id) }}">Delete</a>
                    </td>
                </tr>
                <?php
                $value = $value + $cart->product->price;
                ?>
            @endforeach

        </table>
    </div>
    <div class="cart_value" style="text-align: center;">
        <h3>
            Total Value is of cart: ${{ $value }}
        </h3>
    </div>

    <div class="order_deg" style=" display: flex; justify-content: center; align-items: center;">
        <form action="{{ url('confirm_order') }}" method="post">
            @csrf
            <div class="div_gap">
                <label>Receiver Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="div_gap">
                <label>Receiver Address</label>
                <textarea name="address"> {{ Auth::user()->address }}</textarea>
            </div>
            <div class="div_gap">
                <label>Receiver Phone</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="div_gap">

                <input class="btn btn-primary" type="submit" value="Cash On Delivery">
                <a class="btn btn-success" href="{{ url('stripe', $value) }}">Pay Using Card</a>
            </div>

        </form>

    </div>




    <div>
        @include('home.footer')
    </div>




</body>

</html>
