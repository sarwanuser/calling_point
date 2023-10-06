<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('assets/admin/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{url('assets/admin/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{url('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.html')}}">
    <link rel="stylesheet" href="{{url('assets/admin/js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('assets/admin/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('assets/admin/images/favicon.png')}}"/>
    <link rel="stylesheet" href="{{ URL::asset('assets/admin/css/simple-datatables@latest.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Spoker - Login Page</title>
    <style>
        .auth.px-0 {
            /* background: url(../assets/img/1.png); */
            background: url(../assets/admin/images/home/back-2.png);
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
        .auth-form-light{
            background-color: #191c24 !important;
            opacity: 0.95;
        }
        .form-control{
            color: green !important;
        }
    </style>
  </head>
  <!-- END: Head-->
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo" style="text-align: center;">
                      <img src="{{url('assets/admin/images/logo/logo-white.png')}}" alt="Company Logo" style="width:200px;">
                  </div>
                  <h4 style="color:white;">Hello! let's get started</h4>
                  <h6 class="fw-light" style="color:white;">Sign in to continue for Spoker.</h6>
                  <form class="pt-3" action="{{url('/login')}}" method="POST">
                    @csrf
                      <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="email" placeholder="Email ID" required>
                      </div>

                      <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                      </div>

                      <div class="my-2 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-input">
                              Keep me signed in
                            </label>
                        </div>
                        <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                      </div>

                      <div class="text-center">
                          <button type="submit" class="btn btn-primary btn-block enter-btn" style="width:100%;">Login </button>
                      </div>
                      <br>
                      <span id="Massage" style="color: red;" min-height="10px" max-height="10px"> &nbsp; @if(Session::has('Failed')){{Session::get('Failed')}}@endif</span>
                  </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  </body>
  <script src="{{url('assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url('assets/admin/js/custum/hideMsg.js')}}"></script>
</html>