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
                <li class="dropdown user user-menu">
                    <a>
                        {{--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">--}}
                    </a>
                </li>

                <li>

                    @if(Sentinel::check())
                        <a href="/logout" method="post" id="logout" onclick="document.getElementById('logout').submit()"> Hello,  {{Sentinel::getUser()->first_name}}
                            {{Sentinel::getUser()->last_name}} Logout</a>

                    @endif
                </li>
            </ul>
        </div>
    </nav>
</header>