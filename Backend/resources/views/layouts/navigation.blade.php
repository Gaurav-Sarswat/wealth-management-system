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
                    <a class="d-block" href="FIXME:">
                        <i class="fas fa-table"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="d-flex align-items-center">
                    <a class="d-block" href="FIXME:">
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
                <li class="d-flex align-items-center">
                    <a class="d-block" href="FIXME:">
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
                <li class="d-flex align-items-center">
                    <a class="d-block" href="FIXME:">
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