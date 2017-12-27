<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{"<?php csrf_token() ?>"}}">


    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login Petty Cash Management System</title>

    @include('layout.css')
</head>


<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="/login"><b><i>Kawai Shoji Group</i></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Petty Cash Management System</p>


        <form action="/login" method="post">
            {{csrf_field()}}

            @if(session('error'))
                <div class="alert alert-warning">
                    {{session('error')}}
                </div>
            @endif

            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Login</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        {{--<a href="/register" class="text-center">Register a new membership</a>--}}

    </div>
    <!-- /.login-box-body -->
</div>

@include('layout.js')
</body>
</html>


