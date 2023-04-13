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
        </div>
        <!-- Start Dynamic Sections Starts here -->
        <section class="account-settings pb-5">
            <div class="container">
                <form action="{{ route('client.update-profile') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="profile_picture">
                            <figure>
                                <img src="{{ asset(Auth::user()->profile_picture) }}" onerror="this.src='{{'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=327DF6&color=fff'}}'" id="profile_picture_placeholder" alt="{{ Auth::user()->name }}">
                                <i class="fas fa-pen"></i>
                            </figure>
                        </label>
                        <input type="file" hidden id="profile_picture" name="profile_picture">
                    </div>
                    <div class="form-group w-50">Full Name
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                    </div>
                    <div class="form-group w-50">Email Address
                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control">
                    </div>
                    <div class="">
                        <div class="h6 mt-2 mb-0">Update Your Preferences</div>
                        <ul class="tags-wrapper d-flex flex-wrap list-unstyled mb-0 mt-2">
                            @foreach($categories as $category)
                                <li class="tag">
                                    <div class="">
                                        <input type="checkbox" @if(in_array($category->id, $user_categories->pluck('id')->toArray())) checked @endif name="preferences[]" id="{{ $category->title }}" value="{{ $category->id }}">
                                        <label for="{{ $category->title }}">
                                            <i class="fas fa-check mr-2"></i>
                                            <span>{{ $category->title }}</span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <button type="submit" class="mt-4 btn btn-custom w-50">Save Changes</button>
                </form>
            </div>
        </section>
        <!-- Start Dynamic Sections Ends here -->
    </div>
</x-app-layout>
