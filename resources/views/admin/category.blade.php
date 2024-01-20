<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        .div-center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2-font
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
    </style>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
</head>
<body>
<div class="container-scroller">

    @include('admin.admin_parts.sidebar')
    @include('admin.admin_parts.navbar')
<div class="main-panel">
    <div class="content-wrapper">
        @if(session()->has('message'))
            <div  class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif
    <div class="div-center">
        <h2 class="h2-font">Add Category</h2>
        <form action="{{route('addCategory')}}" method="post">
            @csrf
            <input type="text" name="name"  placeholder="Write category Name">
            <input type="submit" class="btn btn-primary"  name="submit" value="add category">
        </form>
    </div>
        <table class="center">
            <tr>
                <td>Category Name</td>
                <td>Action</td>
            </tr>
          @foreach($data as $data)
            <tr>
                <td>{{$data->Category_Name}}</td>
                <td><a onclick="return confirm('are you sure delete')" class="btn btn-danger" href="{{route('deleteCategory',$data->id)}}">delete</a> </td>
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
<!DOCTYPE html>
