<html>
<head>
    <title> @yield('title') </title>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Material Design fonts -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Bootstrap Material Design -->
    <link rel="stylesheet" type="text/css" href="/css/mdb.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css" href="/css/ripples.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-social.less">
    <!--Estilos propios-->
    <link rel="stylesheet" type="text/css" href="/css/estilos.less">
<style>
    body {

        background: url("http://www.godisageek.com/wp-content/uploads/Mordheim-review.jpg") no-repeat fixed;
        background-size: cover;

    }
</style>
</head>
<body>

 
@yield('content')
<script src="/js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script src="/js/estilos.js"></script>
</body>
@include('footer')
</html>




















