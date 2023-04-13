<nav class="navbar py-2 border-bottom">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex align-items-center user-profile-nav">
                <img src="{{ asset(Auth::user()->profile_picture) }}" onerror="this.src='{{'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=327DF6&color=fff'}}'" alt="Username">
                <div class="d-flex align-items-center ml-2 hover-menu-wrapper">
                    <a href="FIXME:">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down ml-2"></i>
                    </a>
                    <div class="hover-menu">
                        <ul class="list-unstyled">
                            @if(Auth::user()->role == 'client')
                                <li>
                                    <a href="{{ route('client.user-profile-view') }}" class="d-flex align-items-center justify-content-end">
                                        <span class="">Account Settings</span>
                                        <i class="fas fa-cog"></i>
                                    </a>
                                </li>
                            @endif
                            @if(Auth::user()->role == 'ideator')
                                <li>
                                    <a href="{{ route('ideator.user-profile-view') }}" class="d-flex align-items-center justify-content-end">
                                        <span class="">Account Settings</span>
                                        <i class="fas fa-cog"></i>
                                    </a>
                                </li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="btn p-0">
                                        <span class="">Logout</span>
                                        <i class="fas fa-sign-out-alt"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
@if ($errors->any())
<div class="container">
    <div class="alert alert-danger alert-dismissible mt-2 mb-0 w-100">
        <ul class="mb-0 list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if (session('success'))
<div class="container">
    <div class="alert alert-success alert-dismissible mt-2 mb-0 w-100">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@if (session('error'))
<div class="container">
    <div class="alert alert-danger alert-dismissible mt-2 mb-0 w-100">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif