<x-app-layout>
    <div class="layout-main">
        @include('layouts.header')
        <div class="content-wrapper py-2">
            <!-- Start Dynamic Sections Starts here -->
            <section class="choose-preferences pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-5 mt-4">
                            <img src="assets/images/common/team-7.png" width="80" alt="">
                            <form action="{{ route('client.set-preferences') }}" method="POST">
                                @csrf
                                <div class="">
                                    <h4>Welcome {{ Auth::user()->name }},</h4>
                                    <span>Please select your preferences</span>
                                    <ul class="tags-wrapper d-flex flex-wrap list-unstyled mb-0">
                                        @foreach($categories as $category)
                                            <li class="tag">
                                                <div class="">
                                                    <input type="checkbox" name="preferences[]" id="{{ $category->title }}" value="{{ $category->id }}">
                                                    <label for="{{ $category->title }}">
                                                        <i class="fas fa-check mr-2"></i>
                                                        <span>{{ $category->title }}</span>
                                                    </label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-custom px-5 mt-4 d-inline-flex align-items-center">Continue <i class="ml-3 fas fa-chevron-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="top-left-layer">
                <img src="assets/images/common/top-layer.png" alt="">
            </div>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>