<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>FoodBook - Registration</title>

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

  <div class="container" id="reg-full-form">
    <div class="card card-register" id="nomargin_">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Username*</label>
                <input name="username" class="form-control" type="text" placeholder="Enter username">
              </div>
              <div class="col-md-6">
                <label>User Full Name*</label>
                <input name="fullname" class="form-control" type="text" placeholder="Enter full name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password*</label>
                <input name="pass1" class="form-control" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label>Confirm password*</label>
                <input name="pass2" class="form-control" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Email*</label>
                <input name="email"class="form-control" type="email" placeholder="Enter email address">
              </div>
              <div class="col-md-6">
                <label>Phone</label>
                <input name="phone" class="form-control" type="tel" placeholder="Enter phone number">
              </div>
            </div>
          </div>
          <div class="form-group">
              <div class="form-row">
                  <div class="col-md-6">
                      <label>Profile Picture</label>
                      <div class="form-group">
                        <input type="file" name="profilePic" class="form-control" required>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <label>Area</label>
                      <select class="custom-select" name="area">
                        <option>Select Area</option>
                        <option value="Mirpur">Mirpur</option>
                        <option value="Mohammadpur">Mohammadpur</option>
                        <option value="Gulshan">Gulshan</option>
                      </select>
                  </div>
              </div>
          </div>
          <input type="submit" class="btn btn-outline-success btn-block" value="Register"></input>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{route('showLogin')}}">Login Page</a>
        </div>
      </div>
    </div>

    @include('Include.error')

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
