<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FoodBook - Login</title>

    <link rel="stylesheet" href="{{asset('css/master.css')}}">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>

<body class="bg-dark">

    <!-- Menubar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="id_1">
        <a id="logo_main" class="navbar-brand" href="#">FoodBook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" id="navbar_link">
                <a class="nav-item nav-link li_space font-weight-light" @yield('findfood') href="{{route('findfood')}}">Find Food</a>
                <a class="nav-item nav-link li_space font-weight-light" @yield('findRestaurant') href="{{route('findRestaurant_public')}}">Find Restaurant</a>
            </div>

            <div class="btn-group" id="login_reg_btn">
                <a class="btn btn-outline-info" href="{{route('showRegistration')}}">Register</a>
                <a class="btn btn-outline-info" href="{{route('showLogin')}}">Login</a>
              </div>
            </div>

        </div>
    </nav>

    <div class="container align-items-center" id="form_body">
        <div class="card card-login" id="nomargin_">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post" action="{{route('verifyUser')}}">
                    @csrf
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" type="text" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" placeholder="Password">
                    </div>
                    <input class="btn btn-primary btn-block" type="submit" value="Login">
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="{{route('showRegistration')}}">Register an Account</a>
                </div>
                <br>

                @include('Include.error')

            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
