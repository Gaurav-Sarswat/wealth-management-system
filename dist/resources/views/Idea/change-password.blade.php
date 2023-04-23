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
                        Change Password
                    </li>
                </ul>
                <h5 class="page-title">Change Password</h5>
            </div>
        </div>
        <!-- Start Dynamic Sections Starts here -->
        <section class="account-settings pb-5">
            <div class="container">
                <form action="{{ route('ideator.change-password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group w-50">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="current_password" id="current_password" class="form-control">
                    </div>
                    <div class="form-group w-50">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group w-50">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="mt-2 btn btn-custom w-50">Change Password</button>
                </form>
            </div>
        </section>
        <!-- Start Dynamic Sections Ends here -->
    </div>
</x-app-layout>
