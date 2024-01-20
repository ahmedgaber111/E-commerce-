<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="home/images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <style type="text/css">
     .center
     {
         margin: auto;
         width: 50%;
         text-align: center;
         padding: 30px;
     }
     table,th,td
     {
         border: 1px solid grey ;
     }
     .th-deg
     {
         font-size: 30px;
         padding: 5px;
         background: skyblue;
     }
     .img-deg
     {
        height: 200px;
         width: 200px;
     }
     .total-deg
     {
         font-size: 20px;
         padding: 40px;
     }
    </style>
</head>
<body>
<div class="hero_area">
    <!-- header section strats -->
      @include('Parts.UserHeader')
    <!-- end header section -->
    @if(session()->has('message'))
        <div  class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif

    <div class="center">
<table>
    <tr>
        <th class="th-deg">product title</th>
        <th class="th-deg">product quantity</th>
        <th class="th-deg">Price</th>
        <th class="th-deg">image</th>
        <th class="th-deg">Action</th>
    </tr>
    <?php $totalPrice=0;?>
    @foreach($cart as $cart)
    <tr>
        <td>{{$cart->product_title}}</td>
        <td>{{$cart->quantity}}</td>
        <td>{{$cart->price}}</td>
        <td><img class="img-deg" src="products/{{$cart->image}}"></td>
        <td><a class="btn btn-danger" href="{{route('removeCart',$cart->id)}}" onclick="return confirm('are you sure remove')" >remove</a></td>

    </tr>
        <?php $totalPrice=$totalPrice+ $cart->price;?>
    @endforeach
</table>
    <div class="total-deg">
        <h1>TotalPrice:{{$totalPrice}}</h1>
    </div>
    <div style="font-size: 25px;padding-bottom: 15px">
        <h1>Proceed To Order</h1>
        <a href="{{route('CashOrder')}}" class="btn  btn-danger">Cash On Delivery</a>
        <a href="{{route('stripe',$totalPrice)}}" class="btn  btn-danger">Pay  using Card</a>

    </div>

</div>
<!-- footer start -->
@include('Parts.footer')
</div>

<!-- footer end -->
<div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
        Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
    </p>
</div>
<!-- jQery -->
<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>
</body>
</html>
