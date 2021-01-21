<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            MUCU
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                </i>
                Accounts
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link">
                <i class="fa-faw fas fa-credit-card  c-sidebar-nav-icon">

                </i>
                Payment
            </a>
        </li>
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                </i>
                Users Managment
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a href="#" class="c-sidebar-nav-link">
                        <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                        </i>
                        Permissions
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="#" class="c-sidebar-nav-link">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                        </i>
                        Roles
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="#" class="c-sidebar-nav-link">
                        <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                        </i>
                        Users
                    </a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="#">
                <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                </i>
                Change Password
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
               onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                Logout
            </a>
        </li>
    </ul>

</div>
