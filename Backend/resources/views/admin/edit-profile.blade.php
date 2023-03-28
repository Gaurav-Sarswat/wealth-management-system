<x-app-layout>
    <div class="layout-main">
    @include('layouts.header')
        <div class="content-wrapper py-2">
            <div class="container">
                <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
                    <li>
                        <a href="FIXME:">Home</a>
                    </li>
                    <li>
                        Edit Profile
                    </li>
                </ul>
                <h5 class="page-title">Edit Profile</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <img src="{{'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=327DF6&color=fff'}}">
                    </div>
                    <div class="settings ml-4">
                        <form action="{{ route('admin.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group w-50">
                                <input type="text" placeholder="Full Name" name="name" value="{{ Auth::user()->name }}" class="form-control">
                        </div>
                        <div class="form-group w-50">
                            <input type="text" placeholder="Email Address" name="email" value="{{ Auth::user()->email }}" class="form-control">
                        </div>
                        <!-- <div class="form-group w-50">
                            <input type="password" placeholder="Password" class="form-control">
                        </div> -->
                        <button type="submit" class="mt-4 btn btn-custom w-50">Save Changes</button>
                    </form>
                    </div>                         
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
