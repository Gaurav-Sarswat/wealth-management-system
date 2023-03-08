<nav class="py-2">
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
            <li class="d-flex align-items-center active">
                <a class="d-block" href="FIXME:">
                    <i class="fas fa-table"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="d-flex align-items-center">
                <a class="d-block" href="FIXME:">
                    <i class="fas fa-chart-line"></i>
                    <span>Investments</span>
                </a>
            </li>
            <li class="d-flex align-items-center">
                <a class="d-block" href="FIXME:">
                    <i class="fas fa-user-alt"></i>
                    <span>Relationship Managers</span>
                </a>
            </li>
            <li class="d-flex align-items-center">
                <a class="d-block" href="FIXME:">
                    <i class="fas fa-cog"></i>
                    <span>Account Settings</span>
                </a>
            </li>
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