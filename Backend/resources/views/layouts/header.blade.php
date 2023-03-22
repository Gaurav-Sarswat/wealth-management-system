<nav class="navbar py-2 border-bottom">
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
    @if ($errors->any())
        <div class="alert alert-danger mt-2 mb-0 w-100">
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success mt-2 mb-0 w-100">
            {{ session('success') }}
        </div>
    @endif
</nav>