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
            <div class="switcher my-4">
               <div class="row mt-3">
                  <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                        <p>Email</p>
                        <span>{{ $user->email }}</span>
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
                          <ul>
                              <li style="font-weight: bold;">{{ $category->title }}</li>
                              
                           </ul>
                          @endforeach
                        </div>
                     </div>
                     <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                          <p>Portfolio</p>
                          @foreach($user->portfolio as $portfolio)
                          <ul>
                              <li style="font-weight: bold;">{{ $portfolio->title }}</li>
                              
                           </ul>
                          @endforeach
                        </div>
                     </div>
                  @endif

                  @if($user->role == 'rm')
                     <div class="col-lg-3">
                        <div class="idea-details-text mb-4">
                          <p>Clients</p>
                          @foreach($rmclients->clients as $client)
                          <ul>
                              <li style="font-weight: bold;">{{ $client->name }}</li>
                              
                           </ul>
                          @endforeach
                        </div>
                     </div>
                  @endif

                  @if($user->role == 'ideator')
                     <div class="col-lg-3">
                        <div class="idea-details-text mb-4">
                          <p>Number of Idea posted</p>
                          <span class="text-uppercase" style="font-weight: bold;">{{ $ideacount }}</span>
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