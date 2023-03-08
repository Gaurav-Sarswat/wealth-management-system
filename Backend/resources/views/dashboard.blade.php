<x-app-layout>
    <div class="layout-main">
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
        <div class="content-wrapper py-2">
            <div class="container">
                <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
                    <li>
                        <a href="FIXME:">Home</a>
                    </li>
                    <li>
                        Page Name
                    </li>
                </ul>
                <h5 class="page-title">Page Name</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
