
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Petty Cash Management System | Kawai Shoji Group</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Register Petty Cash Management System</title>

    @include('layout.css')
</head>
<body class="hold-transition register-page">



<div class="register-box">
    <div class="register-logo">
        <a href=""><b>Kawai Shoji Group</b></a>
    </div>

    @if($errors->any())
        <div class="alert alert-warning">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if(session('success'))
            <div class="alert alert-success">

                <h3>{{session('success')}}</h3>

            </div>
        @endif





    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="register" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Fisrt name" name="first_name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <select name="branch_id" required class="form-control">
                    <option selected disabled>Select Branch</option>
        @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
            @endforeach
                </select>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="password" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="registerbtn">Register</button>

                </div>

                <!-- /.col -->
            </div>
        </form>
        <div>
        <a href="{{url('/login')}}"><b>Login Here</b></a>
        </div>

    </div>
</div>
@include('layout.js')

</body>
</html>
