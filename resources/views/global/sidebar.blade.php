<div class="left-side-menu left-side-menu-dark">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="active">
            <ul class="metismenu in" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li><a href="/dashboard"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a></li>
                <!-- <li><a href="{{ route('alumni') }}"><i class="mdi mdi-view-dashboard"></i> <span>Alumni</span></a></li> -->
                <li><a href="{{ route('jobs') }}"><i class="mdi mdi-store"></i> <span>Jobs</span></a></li>
                <li><a href="{{ route('companies') }}"><i class="mdi mdi-store"></i> <span>Companies</span></a></li>
                <li><a href="{{ route('applicants') }}"><i class="mdi mdi-account-group"></i> <span>Applicants</span></a></li>
                <li><a href="{{ route('users') }}"><i class="mdi mdi-account-group"></i> <span>Users</span></a></li>
                @if(Auth::user()->user_role != 'guidance' && Auth::user()->user_role != 'marketing')
                <li><a href="{{ route('admin.users') }}"><i class="mdi mdi-account-group"></i> <span>Admin Users</span></a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>