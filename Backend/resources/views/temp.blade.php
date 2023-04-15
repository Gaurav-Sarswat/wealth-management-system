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
                        temp
                    </li>
                </ul>
                <h5 class="page-title">temp</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <img src="{{'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=327DF6&color=fff'}}">
                    </div>
                    <div class="settings ml-4">
                        <form action="FIXME:" method="POST">
                        <div class="form-group w-50">
                                <input type="text" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group w-50">
                            <input type="text" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group w-50">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="mt-4 btn btn-custom w-50">Save Changes</button>
                    </form>
                    </div>                         
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
