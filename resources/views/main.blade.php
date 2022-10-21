<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        @stack('stylesheet')
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    </head>
    <body class="hold-transition sidebar-mini @yield('bodystyle')">
        <div class="wrapper">
          <!-- Preloader -->
          @yield('preloader')
          
            <!-- Navbar -->
            @include('side_nav.navbar')
            <!-- /.navbar -->
          
            <!-- Main Sidebar Container -->
            @include('side_nav.main_sidebar')
             <!-- /.Main Sidebar Container -->
          
            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->
          
            <!-- Main Footer -->
            <footer class="main-footer">
              <strong>Copyright &copy; 2022 <a href="https://adminlte.io">t.d.t</a>.</strong>
              <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
              </div>
            </footer>
          </div>

          <!-- ./wrapper -->
           <!-- REQUIRED SCRIPTS -->
           <!-- jQuery -->
            <script src="{{ asset('plugins/jquery/jquery.min.js')}} "></script>
            <!-- Bootstrap 4-->
            <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            @stack('scripts')
    </body>
</html>
