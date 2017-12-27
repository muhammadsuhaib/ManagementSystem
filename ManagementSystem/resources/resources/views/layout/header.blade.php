<header class="main-header">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

    <!-- Logo -->
    <a href="/login" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>K</b>SG</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Kawai Shoji Group </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">

                            @if(Sentinel::check())

                                Hello,  {{Sentinel::getUser()->first_name}}
                                        {{Sentinel::getUser()->last_name}}

                        </span>

                        @else

                                Guest User
                            @endif
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                            <p>
                                @if(Sentinel::check())

                                   {{Sentinel::getUser()->first_name}}
                                   @endif

                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>

                            <div class="pull-right">
                                @if(Sentinel::check())
                                <form action="/logout" method="post" id="logout">
                                    {{csrf_field()}}
                                <a href="#" onclick="document.getElementById('logout').submit()" class="btn btn-default btn-flat">Sign out</a>
                                </form>
                                @else
                                    UnAuthenticated User
                                @endif
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>