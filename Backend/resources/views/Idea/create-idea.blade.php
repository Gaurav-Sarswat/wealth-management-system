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
            <section class="create-idea pb-5">
                <div class="container">
                    <div class="row auth">
                        <div class="col-12 position-relative">
                            <div class="card p-4">
                                <div class="auth-form-wrapper">
                                    <div class="auth-form">
                                        <!-- <h4 class="mb-4 text-center">Create an Idea</h4> -->
                                        <form action="{{route('ideator.create-idea')}}" method="POST"
                                            autocomplete="new">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Title" name="title"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Abstract" name="abstract"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea rows="5" placeholder="Content" name="content"
                                                            class="form-control"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="mb-0" id="rangeValue">Risk Rating: 0</p>
                                                        <input type="range" min="0" max="10" value="0"
                                                            oninput="rangeValue.innerText = `Risk Rating: ${this.value}`"
                                                            placeholder="Risk Rating" name="risk_rating"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="date" placeholder="Expiry date" name="expiry_date"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Upload a cover image</label>
                                                        <input type="file" placeholder="Upload a cover image" data-height="127" name="image" class="dropify">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select id="categories" name="categories[]" multiple class="select2 form-control" data-placeholder="Select Categories">
                                                            <option value="" disabled hidden>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Instruments" name="instruments" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="currency" multiple name="currency" class="form-control select2" data-placeholder="Select Currencies">
                                                            <option value="gbp">GBP</option>
                                                            <option value="usd">USD</option>
                                                            <option value="inr">INR</option>
                                                            <option value="pkr">PKR</option>
                                                            <option value="ngn">NGN</option>
                                                            <option value="euro">EURO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="major_sector" multiple name="major_sector" class="form-control select2" data-placeholder="Major Sector">
                                                            <option value="gbp">GBP</option>
                                                            <option value="usd">USD</option>
                                                            <option value="inr">INR</option>
                                                            <option value="pkr">PKR</option>
                                                            <option value="ngn">NGN</option>
                                                            <option value="euro">EURO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="minor_sector" multiple name="minor_sector" class="form-control select2" data-placeholder="Minor Sector">
                                                            <option value="gbp">GBP</option>
                                                            <option value="usd">USD</option>
                                                            <option value="inr">INR</option>
                                                            <option value="pkr">PKR</option>
                                                            <option value="ngn">NGN</option>
                                                            <option value="euro">EURO</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="Region" multiple name="region" class="form-control select2" data-placeholder="Select Regions">
                                                            <option value="north-america">North America</option>
                                                            <option value="south-america">South America</option>
                                                            <option value="europe">Europe</option>
                                                            <option value="asia">Asia</option>
                                                            <option value="africa">Africa</option>
                                                            <option value="antarctica">Antarctica</option>
                                                            <option value="ocenia">Oceania</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="country" multiple name="country" class="form-control select2" data-placeholder="Select Country">
                                                            <option value="uk">United Kingdom</option>
                                                            <option value="india">India</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Upload any supporting files</label>
                                                        <input type="file" placeholder="Upload a cover image" data-height="115" name="image" class="dropify">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="Draft">Draft</option>
                                                            <option value="Published">Publish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-custom w-100">Save</button>
                                                </div>
                                            </div>

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