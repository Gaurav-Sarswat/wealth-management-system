<x-app-layout>
  <div class="layout-main">
     @include('layouts.header')
     <div class="content-wrapper py-2">
        <div class="container">
           <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
              <li>
                 <a href="{{ route('relationship-manager.dashboard') }}">Home</a>
              </li>
              <li>
                 <a href="{{ route('relationship-manager.users') }}">Clients</a>
              </li>
              <li>
                 {{ $pagename }}
              </li>
           </ul>
        </div>
        <section class="user-detail pt-4">
          <div class="container">
            <div class="user-detail-profile d-flex align-items-center">
               <figure>
                     <img src="{{ asset($user->profile_picture) }}" onerror="this.src='{{'https://ui-avatars.com/api/?name='.$user->name.'&background=327DF6&color=fff'}}'" alt="{{ $user->name }}">
               </figure>
               <h3 class="page-title ml-3">{{ $user->name }}</h3>
            </div>
            <div class="switcher my-4">
               <div class="row mt-3">
                  <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                        <p>Email</p>
                        <a class="d-block" href="{{'mailto:'.$user->email.'?subject=Investment%20Recommendation'}}">
                           <i class="fas fa-envelope"></i>
                           <span class="ml-1">{{ $user->email }}</span>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-3">
                     <div class="idea-details-text mb-4">
                        <p>Contact</p>
                        <a class="d-block" href="{{'tel:'.$user->number}}">
                           <i class="fas fa-phone-alt"></i>
                           <span class="ml-1">{{ $user->number }}</span>
                        </a>
                     </div>
                  </div>
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