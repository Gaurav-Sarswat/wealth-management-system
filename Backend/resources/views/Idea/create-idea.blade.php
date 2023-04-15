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
                                        <form action="{{route('ideator.create-idea')}}" enctype="multipart/form-data" method="POST"
                                            autocomplete="new">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" id="title" placeholder="Title*" name="title"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" id="abstract" placeholder="Abstract*" name="abstract"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea rows="5" id="content" placeholder="Content*" name="content"
                                                            class="form-control"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="mb-0" id="rangeValue">Risk Rating: 1</p>
                                                        <input type="range" min="1" max="10" value="1"
                                                            oninput="rangeValue.innerText = `Risk Rating: ${this.value}`"
                                                            placeholder="Risk Rating" name="risk_rating"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="expiry_date">Expiry Date*</label>
                                                        <input type="date" id="expiry_date" placeholder="Expiry date*" name="expiry_date"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Upload a cover image</label>
                                                        <input type="file" placeholder="Upload a cover image" data-allowed-file-extensions="png jpg jpeg" data-height="127" name="image" class="dropify">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select id="categories" name="categories[]" multiple class="select2 form-control" data-placeholder="Select Categories*">
                                                            <option value="" disabled hidden>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Instruments*" id="instruments" name="instruments" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="currency" multiple name="currency[]" class="form-control select2" data-placeholder="Select Currencies*">
                                                            @foreach($currencies as $currency)
                                                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="major_sector" multiple name="major_sector[]" class="form-control select2 parent sector" data-placeholder="Major Sector*">
                                                            @foreach($major_sectors as $ms)
                                                                <option value="{{ $ms->id }}">{{ $ms->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="minor_sector" multiple name="minor_sector[]" class="form-control select2 has-parent sector" data-placeholder="Minor Sector*">
                                                            @foreach($minor_sectors as $ms)
                                                                <option data-parent="{{ $ms->majorsector->id }}" value="{{ $ms->id }}">{{ $ms->name }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="region" multiple name="region[]" class="form-control select2 parent country" data-placeholder="Select Regions*">
                                                            @foreach($regions as $region)
                                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="country" multiple name="country[]" class="form-control select2 has-parent country" data-placeholder="Select Country*">
                                                            @foreach($countries as $country)
                                                                <option data-parent="{{ $country->region->id }}" value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="supporting_file">Upload any supporting file</label>
                                                        <input type="file" placeholder="Upload any supporting file" data-height="148" data-allowed-file-extensions="pdf png jpeg jpg docx doc" name="supporting_file" class="dropify">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="status">Idea Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="Draft">Draft</option>
                                                            <option value="Published">Publish</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" id="idea-btn" class="btn btn-custom w-100">Save</button>
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