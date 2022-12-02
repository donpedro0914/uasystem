<header id="topnav">
	<nav class="navbar-custom">
		<div class="container-fluid">
			<ul class="list-unstyled topbar-right-menu float-right mb-0 front_nav">
				<li><a href="/" class="nav-link">Home</a></li>
				<li><a href="{{ route('job-hiring') }}" class="nav-link">Job Hirings</a></li>
				@guest
				<li><a href="/login" class="nav-link">Login | Signup</a></li>
				@endguest
				@auth
				<li class="dropdown notification-list">
					<a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
						<span class="ml-1">{{ Auth::user()->name }}<i class="mdi mdi-chevron-down"></i> </span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
						<!-- item-->
						<div class="dropdown-item noti-title">
							<h6 class="text-overflow m-0">Welcome!</h6>
						</div>
						<a href="/myprofile/{{ Auth::user()->id }}" class="dropdown-item notify-item">
							<i class="dripicons-user"></i> <span>My Profile</span>
						</a>
						<a href="/logout" class="dropdown-item notify-item">
							<i class="dripicons-power"></i> <span>Logout</span>
						</a>
					</div>
				</li>
				@endauth
			</ul>
			<ul class="list-inline menu-left mb-0">
	        <li class="float-left">
	            <a href="/" class="logo">
	                <span class="logo-lg">
	                    {{ HTML::image('img/ua-logo.png', 'UA', array('height' => '50')) }}
	                </span>
	            </a>
	        </li>
			</ul>
		</div>
	</nav>
</header>