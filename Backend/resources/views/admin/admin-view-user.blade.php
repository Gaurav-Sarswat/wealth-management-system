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
                 <a href="{{ route('admin.users') }}">Users</a>
              </li>
              <li>
                 {{ $pagename }}
              </li>
           </ul>
        </div>
        <section class="user-detail pt-4">
          <div class="container">
            <div>
               <div class="d-flex align-items-center justify-content-between">
                  <h3 class="page-title">{{ $user->name }}</h3>
               </div>
            </div>
            <div class="switcher mt-4">
               <div class="row mt-3">
                  <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                        <p>Email</p>
                        <span class="text-capitalize" style="font-weight: bold;">{{ $user->email }}</span>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                        <p>Contact</p>
                        <span class="text-uppercase" style="font-weight: bold;">{{ $user->number }}</span>
                     </div>
                  </div>
                  @if($user->role == 'client')
                     <div class="col-lg-3">
                        <div class="idea-details-text mb-4">
                          <p>Preferences</p>
                          @foreach($user->categories as $category)
                            <span style="font-weight: bold;">{{ $category->title }}</span>,
                          @endforeach
                        </div>
                     </div>
                     <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                          <p>Portfolio</p>
                          @foreach($user->portfolio as $portfolio)
                            <span style="font-weight: bold;">{{ $portfolio->title }}</span>,
                          @endforeach
                        </div>
                     </div>
                  @endif

               </div>
            </div>
          </div>
        </section>
     </div>
  </div>
  </section>
  <!-- Start Dynamic Sections Ends here -->
  </div>
  </div>
</x-app-layout>