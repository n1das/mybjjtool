<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/AdminLTE.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/skins/_all-skins.min.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body class="hold-transition skin-red-light sidebar-mini">
    <div class="wrapper">
    @include('includes.navbar')
    @include('includes.sidebar')
      <div class="content-wrapper">
        @yield('content')





        <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/app.min.js') }}"></script>
</div> <!-- Content wrapper -->
    </div> <!-- Site wrapper -->

    @yield('scripts')
</body>
</html>
