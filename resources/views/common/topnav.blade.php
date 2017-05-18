
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>PT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Church</b> Portal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        @if( Auth::check())
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true"> <i
                                class="fa fa-user"> {{Auth::user()->name}}</i> <b class="caret"></b></a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        @endif
    </nav>
</header>