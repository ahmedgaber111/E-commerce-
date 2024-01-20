
<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="home/index.html"><img width="250" src="home/images/logo.png" alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="home/index.html">Home <span class="sr-only">(current)</span></a>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/showProduct')}}">Products</a>
                    </li>
 
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ShowCart')}}">Cart</a>
                    </li>


                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    @if(\Illuminate\Support\Facades\Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{\Illuminate\Support\Facades\Auth::user()->name}}
                                </button>
                                <div class="dropdown-menu" >
                                    <a class="dropdown-item" href="">profile</a>
                                    <a class="dropdown-item"  href="{{route('logout')}}">logout</a>
                                </div>
                            </div>
                        </li>
                        @else

                    <li class="nav-item">
                        <a class="btn  btn-primary"  id="login-css" href="{{route('login')}}">login</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-success" id="login-css" href="{{route('register')}}">Register</a>
                    </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>




