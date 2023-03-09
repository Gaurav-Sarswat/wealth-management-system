<nav class="navbar py-2">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex align-items-center user-profile-nav">
                <img src="{{'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=327DF6&color=fff'}}" alt="Username">
                <div class="d-flex align-items-center ml-2">
                    <a href="FIXME:">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down ml-2"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>