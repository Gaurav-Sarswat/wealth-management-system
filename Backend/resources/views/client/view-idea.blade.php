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
            <a href="FIXME:">Idea</a>
          </li>
          <li>
            {{ $pagename }}
          </li>
        </ul>
      </div>
      <section class="idea-details">
        <div class="container">
          <div class="d-flex align-items-center justify-content-between">
            <h4 class="page-title">{{ $idea->title }}</h4>
            <div class="d-flex align-items-center">
              @if(in_array($idea->id, $wishlist->pluck('id')->toArray()))
              <form action="{{ route('client.add-to-portfolio', ['id' => $idea->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-plus-circle mr-2"></i>
                  Add to portfolio
                </button>
              </form>
              @endif
              @if(in_array($idea->id, $portfolio->pluck('id')->toArray()))
              <button type="button"
                class="btn btn-custom success px-4 py-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-wallet mr-2"></i>
                Added to portfolio
              </button>
              @endif
              @if((!in_array($idea->id, $portfolio->pluck('id')->toArray())) && (!in_array($idea->id,
              $wishlist->pluck('id')->toArray())))
              <form action="{{ route('client.add-to-portfolio', ['id' => $idea->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-plus-circle mr-2"></i>
                  Add to portfolio
                </button>
              </form>
              <form action="{{ route('client.add-to-wishlist', ['id' => $idea->id]) }}" method="POST">
                @csrf
                <button type="submit"
                  class="btn btn-danger-custom px-4 py-2 d-flex align-items-center justify-content-center ml-2">
                  <i class="fas fa-bookmark mr-2"></i>
                  Add to wishlist
                </button>
              </form>
              @endif
            </div>
          </div>
          <div class="pt-4">
            <div class="row">
              <div class="col-lg-5">
                <img src="{{ asset($idea->image) }}"
                  onerror="this.src='https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png'"
                  class="w-100"  alt="{{ $idea->title }}">
              </div>
            </div>
          </div>
          <div class="switcher my-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="idea-detail" data-toggle="tab" href="#home" role="tab"
                  aria-controls="home" aria-selected="true">Idea detail</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="description-tab" data-toggle="tab" href="#profile" role="tab"
                  aria-controls="profile" aria-selected="false">Description</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="additional-tab" data-toggle="tab" href="#additional" role="tab"
                  aria-controls="additional" aria-selected="false">Additional Files</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="idea-detail">
                <div class="row mt-3">
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Category</p>
                      @foreach($idea->categories as $category)
                      <span>{{ $category->title }}</span>,
                      @endforeach
                    </div>

                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Author</p>
                      <span>{{ $idea->user->name }}</span>
                    </div>

                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Risk rating</p>
                      <span>{{ $idea->risk_rating }}</span>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Instrument</p>
                      <span>{{ $idea->instruments }}</span>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Regions</p>
                      @foreach($idea->regions as $region)
                      <span>{{ $region->name }}</span>,
                      @endforeach
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Countries</p>
                      @foreach($idea->countries as $country)
                      <span>{{ $country->name }}</span>,
                      @endforeach
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Publication date</p>
                      <span>{{ date('d/m/Y', strtotime($idea->published_date)) }}</span>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Expiry Date</p>
                      <span>{{ date('d/m/Y', strtotime($idea->expiry_date)) }}</span>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Currency</p>
                      @foreach($idea->currencies as $currency)
                      <span class="text-uppercase" style="font-weight: bold;">{{ $currency->name }}</span>,
                      @endforeach
                    </div>

                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Major Sectors</p>
                      @foreach($idea->majorsectors as $sector)
                      <span>{{ $sector->name }}</span>,
                      @endforeach
                    </div>

                  </div>
                  <div class="col-lg-3">
                    <div class="idea-details-text mb-4">
                      <p>Minor Sector</p>
                      @foreach($idea->minorsectors as $sector)
                      <span>{{ $sector->name }}</span>,
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="description-tab">
                <div class="idea-details-text mt-4">
                  <p>Abstract</p>
                  <span class="d-block">{{ $idea->abstract }}</span>
                </div>
                <div class="idea-details-text mt-4">
                  <p>Description</p>
                  <span class="d-block">{{ $idea->content }}</span>
                </div>
              </div>
              <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                <div class="idea-details-text mt-4">
                  @if(!empty($idea->supporting_file))
                    <p>Supporting Files</p>
                    <a download="" target="_blank"
                      class="download-file d-inline-flex align-items-center justify-content-center"
                      href="{{ asset($idea->supporting_file) }}">
                      <i class="fas fa-download"></i>
                      <span class="ml-2">Download</span>
                    </a>
                  @else
                    <p>No files attached</p>
                  @endif
                </div>
              </div>
            </div>
      </section>


      <!-- Start Dynamic Sections Ends here -->
    </div>
  </div>
  </section>
  <!-- Start Dynamic Sections Starts here -->
  <!-- Start Dynamic Sections Ends here -->
  </div>
  </section>
  <!-- Start Dynamic Sections Ends here -->
  </div>
  </div>
</x-app-layout>