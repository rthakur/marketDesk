<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Desk</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="">
    <div id="wrapper">
      @include('includes.side_nav')
      <div id="page-wrapper" class="gray-bg">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
      </div>
  </div>
  <!-- Mainly scripts -->
  <script src="/assets/js/jquery-2.1.1.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <!-- Custom and plugin javascript -->
  <script src="/assets/js/inspinia.js"></script>
  <!-- <script src="/assets/js/plugins/pace/pace.min.js"></script> -->
</body>
</html>
