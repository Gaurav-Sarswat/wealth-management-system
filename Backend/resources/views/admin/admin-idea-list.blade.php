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
                        Ideas
                    </li>
                </ul>
                <h5 class="page-title">Ideas</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->            
            <section class="investment-lists pb-5">
                <div class="container">
                    <div class="form-group">
                        <label for="">Choose Category</label>
                        <select id="filter_categories" class="form-control" name="categories[]" onchange="">
                            <option value="">All</option>
                            @foreach($categories as $category)
                                <option {{ $selected_category == $category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mt-3">
                        @foreach ($ideas as $idea)
                            <div class="col-lg-4 mb-3">
                                <div class="custom-card">
                                    <figure>
                                    <img src="{{ asset($idea->image) }}"
                                        onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png'"
                                            class="w-100" alt="">
                                            @if($idea->verification_status == 'pending' && $idea->status != 'Draft')
                                            <span class="status-tag published">{{ $idea->status }}</span>
                                            <span class="verification-status-tag {{ $idea->verification_status }}">{{ $idea->verification_status }}</span>
                                            @elseif($idea->verification_status == 'pending' && $idea->status == 'Draft')
                                            <span class="status-tag text-light">{{ $idea->status }}</span>
                                            @elseif($idea->verification_status == 'rejected')
                                            <span class="status-tag published">{{ $idea->status }}</span>
                                            <span class="verification-status-tag {{ $idea->verification_status }}">{{ $idea->verification_status }}</span>
                                            @elseif($idea->verification_status == 'accepted')
                                            <span class="status-tag published">{{ $idea->status }}</span>
                                            <span class="verification-status-tag {{ $idea->verification_status }}">{{ $idea->verification_status }}</span>
                                            @endif
                                    </figure>
                                    <p class="mb-2 title">{{ $idea->title }}</p>
                                    <p class="mb-2 content">{{ $idea->abstract }}</p>
                                    <span class="d-block mb-2 date">{{ date('d/m/Y', strtotime($idea->published_date)) }}</span>
                                    <a href="{{ route('admin.admin-view-idea', ['id' => $idea->id]) }}"
                                        class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read
                                        More <i class="fas fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $ideas->links("pagination::bootstrap-4") }}
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>