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
                                        <form action="{{route('ideator.update-idea', ['id' => $idea->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Title" name="title" value="{{ $idea->title }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Abstract" name="abstract" value="{{ $idea->abstract }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea rows="5" placeholder="Content" name="content"
                                                            class="form-control">{{ $idea->content }}</textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <p class="mb-0" id="rangeValue">Risk Rating: {{ $idea->risk_rating }}</p>
                                                        <input type="range" min="0" max="10" value="{{ $idea->risk_rating }}"
                                                            oninput="rangeValue.innerText = `Risk Rating: ${this.value}`"
                                                            placeholder="Risk Rating" name="risk_rating"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="date" placeholder="Expiry date" name="expiry_date" value="{{ $idea->expiry_date }}"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Upload a cover image</label>
                                                        <input type="file" placeholder="Upload a cover image" data-default-file="{{ asset($idea->image) }}" data-height="127" name="image" class="dropify">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <select id="categories" name="categories[]" multiple class="select2 form-control" data-placeholder="Select Categories">
                                                            <option value="" disabled hidden>Select Category</option>
                                                            @foreach($categories as $category)
                                                                <option @if(in_array($category->id, $idea->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">{{ $category->title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Instruments" name="instruments" class="form-control" value="{{ $idea->instruments }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="currency" multiple name="currency[]" class="form-control select2" data-placeholder="Select Currencies">
                                                            @foreach($currencies as $currency)
                                                                <option @if(in_array($currency->id, $idea->currencies->pluck('id')->toArray())) selected @endif value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="major_sector" multiple name="major_sector[]" class="form-control select2 parent sector" data-placeholder="Major Sector">
                                                            @foreach($major_sectors as $ms)
                                                                <option @if(in_array($ms->id, $idea->majorsectors->pluck('id')->toArray())) selected @endif value="{{ $ms->id }}">{{ $ms->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="minor_sector" multiple name="minor_sector[]" class="form-control select2 has-parent sector" data-placeholder="Minor Sector">
                                                            @foreach($minor_sectors as $ms)
                                                                <option @if(in_array($ms->id, $idea->minorsectors->pluck('id')->toArray())) selected @endif data-parent="{{ $ms->majorsector->id }}" value="{{ $ms->id }}">{{ $ms->name }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="Region" multiple name="region[]" class="form-control select2 parent country" data-placeholder="Select Regions">
                                                            @foreach($regions as $region)
                                                                <option @if(in_array($region->id, $idea->regions->pluck('id')->toArray())) selected @endif value="{{ $region->id }}">{{ $region->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select id="country" multiple name="country[]" class="form-control select2 has-parent country" data-placeholder="Select Country">
                                                            @foreach($countries as $country)
                                                                <option @if(in_array($country->id, $idea->countries->pluck('id')->toArray())) selected @endif data-parent="{{ $country->region->id }}" value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="supporting_file">Upload any supporting file</label>
                                                        <input type="file" placeholder="Upload any supporting file" data-default-file="{{ asset($idea->supporting_file) }}" data-height="115" name="supporting_file" class="dropify">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <select name="status" id="status" class="form-control">
                                                            <option @if($idea->status === 'Draft') selected @endif value="Draft">Draft</option>
                                                            <option @if($idea->status === 'Published') selected @endif value="Published">Publish</option>
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