<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  @stack('stylesheet')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition @yield('type')">

    @yield('box')

 <!-- jQuery -->
 <script src="{{ asset('plugins/jquery/jquery.min.js')}} "></script>
 <!-- Bootstrap 4-->
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 @stack('scripts')
</body>
</html>
