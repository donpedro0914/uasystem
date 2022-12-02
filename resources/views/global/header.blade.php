<header id="topnav" class="topbar-light">
    <nav class="navbar-custom">
        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="ml-1">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">Welcome {{ Auth::user()->name }}!</h6>
                    </div>
                    <a href="/logout" class="dropdown-item notify-item">
                        <i class="dripicons-power"></i> <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>

        <ul class="list-unstyled menu-left mb-0">
            <li class="float-left">
                <a href="#" class="logo">
                    <span class="logo-lg">
                        {{ HTML::image('img/ua-logo.png', 'UA', array('style' => 'width:25%')) }}
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- end navbar-custom -->
</header>