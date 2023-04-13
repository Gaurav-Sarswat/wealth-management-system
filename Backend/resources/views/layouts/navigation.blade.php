<nav class="py-2 border-bottom">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="FIXME:">
                    <img src="{{ asset('/images/common/team-7.png') }}" height="70" alt="">
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="nav-menu">
    <div class="container">
        <ul class="main-menu list-unstyled mb-0 mt-2">
            <!-- .active class for the tab which is active -->
            @if (Auth::user()->role === 'admin')
                <li class="d-flex align-items-center active">
                    <a class="d-block" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-table"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="{{ route('admin.users') }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="{{ route('admin.ideas') }}">
                        <i class="fas fa-lightbulb"></i>
                        <span>Ideas</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('admin.data') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('admin.data') }}">
                        <i class="fas fa-database"></i>
                        <span>Data</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="{{ route('admin.show-profile') }}">
                        <i class="fas fa-cog"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role === 'ideator')
                <li class="d-flex align-items-center {{ request()->routeIs('ideator.dashboard') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('ideator.dashboard') }}">
                        <i class="fas fa-table"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('ideator.create-idea-form') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('ideator.create-idea-form') }}">
                        <i class="fas fa-lightbulb"></i>
                        <span>Create Idea</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('ideator.ideas') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('ideator.ideas') }}">
                        <i class="fas fa-list"></i>
                        <span>List Ideas</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('ideator.user-profile-view') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('ideator.user-profile-view') }}">
                        <i class="fas fa-cog"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role === 'rm')
                <li class="d-flex align-items-center active">
                    <a class="d-block" href="{{ route('relationship-manager.dashboard') }}">
                        <i class="fas fa-table"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="{{ route('relationship-manager.users') }}">
                        <i class="fas fa-users"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="{{ route('relationship-manager.ideas') }}">
                        <i class="fas fa-lightbulb"></i>
                        <span>Ideas</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="{{ route('relationship-manager.show-profile') }}">
                        <i class="fas fa-cog"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role === 'client')
                <li class="d-flex align-items-center {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('client.dashboard') }}">
                        <i class="fas fa-table"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('client.suggested-ideas') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('client.suggested-ideas') }}">
                        <i class="fas fa-lightbulb"></i>
                        <span>Suggested Ideas</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('client.portfolio') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('client.portfolio') }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('client.wishlist') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('client.wishlist') }}">
                        <i class="fas fa-bookmark"></i>
                        <span>Wishlist</span>
                    </a>
                </li>
                <li class="d-flex align-items-center {{ request()->routeIs('client.user-profile-view') ? 'active' : '' }}">
                    <a class="d-block" href="{{ route('client.user-profile-view') }}">
                        <i class="fas fa-cog"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
            @endif
            <!-- Logout -->
            <li class="d-flex align-items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</div>