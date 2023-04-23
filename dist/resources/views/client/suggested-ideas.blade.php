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
                        {{ $pagename ?? '' }}
                    </li>
                </ul>
                <h5 class="page-title">{{ $pagename ?? '' }}</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="investment-lists pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Choose Category</label>
                                <select id="filter_categories" class="form-control" name="categories[]" onchange="">
                                    <option value="">All Suggestions</option>
                                    @foreach($categories as $category)
                                    <option {{ $selected_category == $category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Choose Risk Rating</label>
                                <select class="form-control" name="risk_rating" id="risk_rating">
                                    <option value="">All</option>
                                    <option @if($risk == 1) selected @endif value="1">1 (Lowest)</option>
                                    <option @if($risk == 2) selected @endif value="2">2</option>
                                    <option @if($risk == 3) selected @endif value="3">3</option>
                                    <option @if($risk == 4) selected @endif value="4">4</option>
                                    <option @if($risk == 5) selected @endif value="5">5</option>
                                    <option @if($risk == 6) selected @endif value="6">6</option>
                                    <option @if($risk == 7) selected @endif value="7">7</option>
                                    <option @if($risk == 8) selected @endif value="8">8</option>
                                    <option @if($risk == 9) selected @endif value="9">9</option>
                                    <option @if($risk == 10) selected @endif value="10">10 (Highest)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @foreach ($ideas as $idea)
                            <div class="col-lg-4 mb-3">
                                <div class="custom-card">
                                    <figure>
                                        <img src="{{ asset($idea->image) }}"
                                            onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png'"
                                            class="w-100" alt="">
                                            <ul class="category-list list-unstyled mb-0 d-flex align-items-center">
                                                @foreach($idea->categories as $category)
                                                    <li>
                                                        <span class="category-tag">{{ $category->title }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                    </figure>
                                    <p class="mb-2 title">{{ $idea->title }}</p>
                                    <p class="mb-2 content">{{ $idea->abstract }}</p>
                                    <span class="d-block mb-2 date">{{ date('d/m/Y', strtotime($idea->published_date)) }}</span>
                                    <a href="{{ route('client.view-idea', ['id' => $idea->id]) }}"
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