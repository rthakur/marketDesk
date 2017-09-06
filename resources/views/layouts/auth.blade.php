<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MarketDesk | Login</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <style>
      .gray-bg{
          background-color: #53f !important;
        }
        body {
    font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    background-color: #2f4050;
    font-size: 18px;
    color: #ffffff;
    overflow-x: hidden;
}
.btn-white {
    color: #000;
    background: white;
    border: 1px solid #e7eaec;
}
.text-muted {
    color: #fff7f7;
}
   </style>
</head>

<body class="gray-bg">

  @yield('content')

    <!-- Mainly scripts -->
  <script src="/js/jquery-2.1.1.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="/js/plugins/iCheck/icheck.min.js"></script>
  <script>
      $(document).ready(function(){
          $('.i-checks').iCheck({
              checkboxClass: 'icheckbox_square-green',
              radioClass: 'iradio_square-green',
          });
      });
  </script>

</body>

</html>
