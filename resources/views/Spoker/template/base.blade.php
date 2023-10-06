<!-- check for login -->
@if(!Session()->get('users'))
  <script type="text/javascript">
    window.location = "{{url('/')}}";
  </script>
@endif
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
    <title>@yield('title')</title>
    @yield('styles')
  </head>
  <!-- END: Head-->
  <body>
    <!-- BEGIN: Header-->
    @include('Spoker.include.header')
    <!-- END: Header-->
    
    <!-- BEGIN: Side Bar-->
    @include('Spoker.include.sidebar')
    <!-- END: Side Bar-->

    <!-- BEGIN: Page Main-->
    @yield('content')
    <!-- END: Page Main-->

    
    <!-- BEGIN: Footer-->
    @include('Spoker.include.footer')
    <!-- END: Footer-->
	
    <!-- plugins:js -->
    <script src="{{url('assets/admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{url('assets/admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{url('assets/admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{url('assets/admin/vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{url('assets/admin/js/off-canvas.js')}}"></script>
    <script src="{{url('assets/admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{url('assets/admin/js/template.js')}}"></script>
    <script src="{{url('assets/admin/js/settings.js')}}"></script>
    <script src="{{url('assets/admin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{url('assets/admin/js/dashboard.js')}}"></script>
    <script src="{{url('assets/admin/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page -->

    <!-- start custum table -->
    <script src="{{ URL::asset('assets/admin/js/datatables-simple-demo.js')}}"></script>
    <script src="{{ URL::asset('assets/admin/js/simple-datatables@latest.js')}}"></script>
    <!-- end custum table -->
	  @yield('scripts')
  </body>
</html>