<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/master.css')}}">
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>

        <!-- Menubar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="id_1">
            <a id="logo_main" class="navbar-brand" href="#">FoodBook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav" id="navbar_link">
                    <a class="nav-item nav-link li_space font-weight-light" @yield('Home') href="{{route('timeline')}}">Home</a>
                    <a class="nav-item nav-link li_space font-weight-light" @yield('Profile') href="{{route('profileIndexPage')}}">Profile</a>
                    <a class="nav-item nav-link li_space font-weight-light" @yield('ManegaPage') href="{{route('showPagelist')}}">Manage Page</a>
                </div>

                <div class="btn-group" id="login_reg_btn">
                  <button id="logoutBtn-2" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="pro_pic_top" src="/upload/profile_picture/{{session('user')->profilePicture}}" alt="Not Found"> {{session('user')->fullname}}
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('profileIndexPage')}}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                  </div>
                </div>

            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">

                    <img id="pro_pic" src="/upload/profile_picture/{{session('user')->profilePicture}}" alt="Not Found">
                    <div class="" id="user_name_head">
                        <h4 class="font-weight-light"> <span class="badge badge-secondary font-weight-light">User - {{session('user')->fullname}}</span> </h4>
                    </div>
                    <div class="list-group">
                        <a href="{{route('profileIndexPage')}}" class="list-group-item @yield('myPost')">
                            <i class="fa fa-fw fa-home"></i>
                            My Post
                        </a>
                        <a href="/followers" class="list-group-item @yield('follower')">
                            <i class="fa fa-fw fa-star-half-o"></i>
                            Followers
                        </a>
                        <a href="/followed_user" class="list-group-item @yield('followlistUser')">
                            <i class="fa fa-fw fa-bell"></i>
                            Followed User
                        </a>
                        <a href="/followed_page" class="list-group-item @yield('followlistPage')">
                            <i class="fa fa-fw fa-bell"></i>
                            Followed Page
                        </a>
                    </div>
                </div>
                <!-- /.col-lg-3 -->

                <div class="col-lg-10">
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->


    <div class="footer">
        <p id="footerPadding">© 2018 Copyright: arabikabir.com</p>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}} "></script>

    </body>
</html>
