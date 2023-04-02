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
            <div>
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="page-title">{{ $idea->title }}</h4>
                    <!-- <div class="d-flex align-items-center">
                        <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center"><i class="fas fa-plus-circle mr-2"></i>Add to portfolio</a>
                        <a href="FIXME:" class="btn btn-danger-custom px-4 py-2 d-flex align-items-center justify-content-center ml-2"><i class="fas fa-bookmark mr-2"></i>Add to wishlist</a>
                    </div> -->
                </div>
            </div>
            <div class="farm pt-4">
                <div class="row">
                    <div class="col-lg-5">
                        <img src="https://images.unsplash.com/photo-1512314889357-e157c22f938d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2071&q=80"
                        class="w-100" style="border-radius: 8px;" alt="{{ $idea->title }}">
                    </div>
                </div>
            </div>    
            <div class="switcher mt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Idea detail</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Description</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                        <div class="row mt-3 ml-2">
                            <div class="col-lg-3">
                            <div class="idea-details-text mb-4">
                              <p>Category</p>
                              @foreach($idea->categories as $category)
                                <span style="font-weight: bold;">{{ $category->title }}</span>,
                              @endforeach
                            </div>
                              
                          </div>
                           <div class="col-lg-3">
                            <div class="idea-details-text mb-4">
                              <p>Author</p>
                              <span style="font-weight: bold;">Dan James</span>
                            </div>
                              
                          </div>
                          <div class="col-lg-3">
                              <div class="idea-details-text mb-4">
                                <p>Country</p>
                                <span class="text-capitalize" style="font-weight: bold;">{{ $idea->country }}</span>
                              </div>
                                
                            </div>
                            <div class="col-lg-3">
                              <div class="idea-details-text mb-4">
                                <p>Currency</p>
                                <span class="text-uppercase" style="font-weight: bold;">{{ $idea->currency }}</span>
                              </div>
                                
                            </div>
                      </div>
                      <div class="row mt-3 ml-2">
                          <div class="col-lg-3">
                          <div class="idea-details-text mb-4">
                            <p>Region</p>
                            <span class="text-capitalize" style="font-weight: bold;">{{ $idea->region }}</span>
                          </div>
                            
                        </div>
                         <div class="col-lg-3">
                          <div class="idea-details-text mb-4">
                            <p>Risk rating</p>
                            <span style="font-weight: bold;">{{ $idea->risk_rating }}</span>
                          </div>
                            
                        </div>
                        <div class="col-lg-3">
                            <div class="idea-details-text mb-4">
                              <p>Publication date</p>
                              <span style="font-weight: bold;">{{ date('d/m/Y', strtotime($idea->published_date)) }}</span>
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="idea-details-text mb-4">
                              <p>Expiry Date</p>
                              <span style="font-weight: bold;">{{ date('d/m/Y', strtotime($idea->expiry_date)) }}</span>
                            </div>
                              
                          </div>
                    </div>
                    <div class="row mt-3 ml-2">
                      <div class="col-lg-3">
                      <div class="idea-details-text mb-4">
                        <p>Instrument</p>
                        <span class="text-capitalize" style="font-weight: bold;">{{ $idea->instruments }}</span>
                      </div>
                        
                    </div>
                     <div class="col-lg-3">
                      <div class="idea-details-text mb-4">
                        <p>Major Sector</p>
                        <span class="text-capitalize" style="font-weight: bold;">{{ $idea->major_sector }}</span>
                      </div>
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="idea-details-text mb-4">
                          <p>Minor Sector</p>
                          <span class="text-capitalize" style="font-weight: bold;">{{ $idea->minor_sector }}</span>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="idea-details-text mt-4 ml-4">
                        <p style="font-weight: bold;">Abstract</p>
                        <p>{{ $idea->abstract }}</p>
                    </div>
                    <div class="idea-details-text mt-4 ml-4">
                        <p style="font-weight: bold;">Idea Description</p>
                        <p>{{ $idea->abstract }}</p>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <!-- Start Dynamic Sections Ends here -->
        </div>
        </section>
        <!-- Start Dynamic Sections Ends here -->
    </div>
    </div>
</x-app-layout>