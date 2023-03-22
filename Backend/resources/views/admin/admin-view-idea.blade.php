<x-app-layout>
    <div class="layout-main">
        @include('layouts.header')
        <div class="content-wrapper py-2">
            <div class="container">
                <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.ideas') }}">Ideas</a>
                    </li>
                    <li>
                        {{ $pagename }}
                    </li>
                </ul>
                <h5 class="page-title">{{ $pagename }}</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="view-idea py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <figure class="idea-image">
                                <img src="https://images.unsplash.com/photo-1512314889357-e157c22f938d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2071&q=80" class="w-100" alt="{{ $idea->title }}">
                            </figure>
                        </div>
                        <div class="col-lg-7">
                            <div class="idea-details">
                                <div class="idea-details-text mb-4">
                                    <p class="title mb-0">Title</p>
                                    <span class="d-block">{{$idea->title}}</span>
                                </div>
                                <div class="idea-details-text mb-4">
                                    <p class="title mb-0">Idea Category</p>
                                    <span class="d-block">{{$idea->category}}</span>
                                </div>
                                <div class="idea-details-text mb-4">
                                    <p class="title mb-0">Country</p>
                                    <span class="d-block text-uppercase">{{$idea->country}}</span>
                                </div>
                                <div class="idea-details-text mb-4">
                                    <p class="title mb-0">Region</p>
                                    <span class="d-block">{{$idea->region}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="h4">Description</div>
                            <p>{{$idea->abstract}}</p>
                            <p>{{$idea->content}}</p>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi tenetur doloremque minima quis a commodi nostrum suscipit, culpa mollitia ipsum exercitationem, repellat eius ex quibusdam perspiciatis reiciendis inventore. Dolorem blanditiis earum debitis dicta voluptatem explicabo, quisquam autem! Repellat, dolores nihil.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi tenetur doloremque minima quis a commodi nostrum suscipit, culpa mollitia ipsum exercitationem, repellat eius ex quibusdam perspiciatis reiciendis inventore. Dolorem blanditiis earum debitis dicta voluptatem explicabo, quisquam autem! Repellat, dolores nihil.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi tenetur doloremque minima quis a commodi nostrum suscipit, culpa mollitia ipsum exercitationem, repellat eius ex quibusdam perspiciatis reiciendis inventore. Dolorem blanditiis earum debitis dicta voluptatem explicabo, quisquam autem! Repellat, dolores nihil.</p> -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>