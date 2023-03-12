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
                        {{ $pagename }}
                    </li>
                </ul>
                <h5 class="page-title">{{ $pagename }}</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="create-user py-5">
                <div class="container">
                    <div class="row auth">
                        <div class="col-lg-6 mx-auto px-0">
                            <div class="card p-4">
                                <div class="auth-form-wrapper">
                                    <div class="auth-form">
                                        <h4 class="mb-4 text-center">Create New User</h4>
                                        <form action="{{ route('admin.add-user') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <x-input type="text" placeholder="Full Name" name="name" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <x-input type="text" placeholder="Email Address" name="email" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <x-input type="tel" placeholder="Phone Number" name="number" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <x-input type="password" placeholder="Create New Password" name="password" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <x-input type="password" placeholder="Confirm New Password" name="password_confirmation" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <select name="role" class="form-control" id="role">
                                                    <option value="">Choose User Role</option>
                                                    <option value="client">Client</option>
                                                    <option value="rm">Relationship Manager</option>
                                                    <option value="ideator">Ideator</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="mt-4 btn btn-custom w-100">Create User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>