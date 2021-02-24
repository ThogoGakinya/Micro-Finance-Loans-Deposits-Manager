
<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">
    <div class="c-sidebar-brand d-md-down-none" style="background-color:#367fa9;">
            <h5>MUCUA WELFARE</h5>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('minute_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.accounts.myAccount") }}" class="c-sidebar-nav-link {{ request()->is("admin/myAccount") || request()->is("admin/myAccount") ? "active" : "" }}">
                    <i class="fa-fw fas fa-user-circle c-sidebar-nav-icon">
                    </i>
                    My Account
                </a>
            </li>
        @endcan
        @can('account_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.accounts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/accounts") || request()->is("admin/accounts/*") ? "active" : "" }}">
                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon"></i>
                Accounts
            </a>
        </li>
        @endcan
        @can('payment_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                <i class="fa-faw fas fa-credit-card  c-sidebar-nav-icon">

                </i>
                Payment
            </a>
        </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>Users Management
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                               Permissions
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                               Roles
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                Users
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('minute_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.minutes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/minutes") || request()->is("admin/minutes/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-file-signature c-sidebar-nav-icon">
                    </i>
                    Minutes
                </a>
            </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
