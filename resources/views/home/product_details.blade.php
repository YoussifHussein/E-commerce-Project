<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section  -->
        @include('home.header')
        <!-- end header section -->
    </div>
    {{-- details --}}
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Latest Products
                </h2>
            </div>
            <div class="row">

                <div class=" col-md-4">
                    <div class="img-box">
                        <div class="div_center">

                            <img width="400px" src="/products/{{ $data->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4> {{ $data->title }} </h4>
                            <h6>Price:
                                <span>${{ $data->price }} </span>
                            </h6>
                        </div>
                        <div class="detail-box">
                            <h6>Description:</h6>
                            <p>{{ $data->description }} </p>
                        </div>
                        <div class="detail-box">

                            <a class="btn btn-primary" href="{{ url('add_cart', $data->id) }}">Add to Cart</a>
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </section>

    {{-- details --}}


    @include('home.footer')
    <!-- info section -->


</body>

</html>
