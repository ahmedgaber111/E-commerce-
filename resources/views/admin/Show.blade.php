<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">


        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid white;
        }
       .font-size
       {
           text-align: center;
           font-size: 40px;
           padding-top: 20px;
       }
       .img-size
       {
           height: 100px;
           width: 100px;
       }
       .the-color
       {
           background: skyblue;
       }
       .th-deg
       {
           padding: 30px;
       }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
<div class="container-scroller">
    @include('admin.admin_parts.head')
    @include('admin.admin_parts.sidebar')
    @include('admin.admin_parts.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')}}
                </div>
            @endif
            <h2 class="font-size">All Products</h2>
         <table class="center">
            <tr class="the-color">
                <td  class="th-deg">Product title</td>
                <td  class="th-deg">Product Description</td>
                <td  class="th-deg">Product Quantity</td>
                <td  class="th-deg">Product Category</td>
                <td  class="th-deg">Product discount</td>
                <td  class="th-deg">Discount Price</td>
                <td  class="th-deg">product Image</td>
                <td  class="th-deg">Delete</td>
                <td  class="th-deg">Edit</td>
            </tr>
             @foreach($data as $data)
             <tr>
                 <td>{{$data->title}}</td>
                 <td>{{$data->description}}</td>
                 <td>{{$data->quantity}}</td>
                 <td>{{$data->category}}</td>
                 <td>{{$data->discount_price}}</td>
                 <td>{{$data->price}}</td>
                 <td><img class="img-size" src="products/{{$data->image}}"></td>
                 <td><a  onclick="return confirm('are you sure delete  this product')" class="btn  btn-danger" href="{{route('deleteProduct',$data->id)}}" >Delete</a></td>
                 <td><a class="btn  btn-success" href="{{route('EditProduct',$data->id)}}" >Edit</a></td>
             </tr>
             @endforeach
         </table>
        </div>
    </div>
</div>
<script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
<script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="admin/assets/js/off-canvas.js"></script>
<script src="admin/assets/js/hoverable-collapse.js"></script>
<script src="admin/assets/js/misc.js"></script>
<script src="admin/assets/js/settings.js"></script>
<script src="admin/assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="admin/assets/js/dashboard.js"></script>

</body>
</html>
