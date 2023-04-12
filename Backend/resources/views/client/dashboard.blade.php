<x-app-layout>
    <div class="layout-main">
        @include('layouts.header')
        <div class="content-wrapper py-2">
            <section class="custom-breadcrumb">
                <div class="container">
                    <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
                        <li>
                            <a href="FIXME:">Home</a>
                        </li>
                        <li>
                            {{ $pagename ?? '' }}
                        </li>
                    </ul>
                    <h5 class="page-title">{{'Welcome to your dashboard, '.Auth::user()->name}}</h5>
                </div>
            </section>
            <!-- Start Dynamic Sections Starts here -->
            <section class="dashboard py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="py-1">Your Latest Investments</h5>
                            <div class="card">
                                <table class="table mb-0">
                                    <thead>
                                        <th>Idea Title</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach($user->portfolio as $idea)
                                            <tr>
                                                <td>{{ $idea->title }}</td>
                                                <td>
                                                    <a class="d-inline-block btn btn-outline-primary px-3" href="{{ route('client.view-idea', ['id' => $idea->id]) }}">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="py-1">Your Relationship Manager</h5>
                            <div class="your-manager-wrapper card">
                                <figure>
                                    <img class="custom-rounded" src="{{'https://ui-avatars.com/api/?name='.$user->manager->name.'&background=327DF6&color=fff'}}" alt="">
                                </figure>
                                <span class="name">{{ $user->manager->name }}</span>
                                <a class="d-block" href="{{'mailto:'.$user->manager->email}}">
                                    <i class="fas fa-envelope"></i>
                                    <span class="ml-1">{{ $user->manager->email }}</span>
                                </a>
                                <a class="d-block" href="{{'mailto:'.$user->manager->number}}">
                                    <i class="fas fa-phone-alt"></i>
                                    <span class="ml-1">+44-{{ $user->manager->number }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
