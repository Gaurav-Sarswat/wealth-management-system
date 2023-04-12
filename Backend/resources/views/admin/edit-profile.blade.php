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
                        Account Settings
                    </li>
                </ul>
                <h5 class="page-title">Account Settings</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <div class="settings ml-4">
                <form action="{{ route('admin.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        
                        <label for="profile_picture">
                            <img src="{{ asset('storage/'.Auth::user()->profile_picture) }}" id="profile_picture_placeholder" alt="{{ Auth::user()->name }}">
                        </label>
                        <input type="file" hidden id="profile_picture" name="profile_picture">
                    </div>
                    <div class="form-group w-50">Full Name
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                    <div class="form-group w-50">Email Address
                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
                    </div>
                    <button type="submit" class="mt-4 btn btn-custom w-50">Save Changes</button>
                </form>
            </div>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
