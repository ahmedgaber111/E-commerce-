<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <style type="text/css">
        .div-center
        {
            text-align: center;
            padding-top: 40px;
        }
        .font-size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
        }
        .text-color
        {
            color: black;
            padding-bottom: 20px;
        }
        label
        {
            display:inline-block;
            width: 200px;
        }
        .div-design
        {
            padding-bottom: 15px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
            <div class="content-wrapper">
                <div class="div-center">
                    <h1 class="font-size">Update Product</h1>
                    <form action="{{route('updateProduct',$product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div-design">
                            <label>Product Title</label>
                            <input class="text-color" type="text" name="title" placeholder="write title" value="{{$product->title}}">
                        </div>
                        <div class="div-design">
                            <label>Product description</label>
                            <input class="text-color" type="text" name="description" placeholder="write description" value="{{$product->description}}">

                        </div>
                        <div class="div-design">
                            <label>Product price</label>
                            <input class="text-color" type="number" name="price" placeholder="write price" value="{{$product->price}}">
                        </div>
                        <div class="div-design">
                            <label>discount price</label>
                            <input class="text-color" type="number" name="discount_price" placeholder="write discount_price"  value="{{$product->discount_price}}">
                        </div>
                        <div class="div-design">
                            <label>Product quantity</label>
                            <input class="text-color" type="number"  name="quantity" placeholder="write quantity"  value="{{$product->quantity}}">
                        </div>
                        <div class="div-design">
                            <label>Product category</label>
                            <select class="text-color" name="category">
                                <option value="{{$product->category}}" selected="">{{$product->category}} </option>
                                @foreach($category  as $category)
                                    <option>{{$category->Category_Name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="div-design">
                            <label>Product image</label>
                       <img style="margin:auto"; height="100"; width="100"; src="products/{{$product->image}}">
                            <input class="text-color" type="file"  name="image" placeholder="upload image">

                        </div>

                        <div class="div-design">
                            <input class="btn btn-primary" type="submit" value="Update product" >

                        </div>
                    </form>
                </div>
            </div>
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
