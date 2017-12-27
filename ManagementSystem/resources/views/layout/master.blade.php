<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petty Cash Management System | Kawai Shoji Group</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


@include('layout.css')
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('layout.header')

@include('layout.sidebar')


    <div class="content-wrapper">

    @yield('body')

    </div>

@include('layout.footer')


</div>

@include('layout.js')
</body>
</html>
