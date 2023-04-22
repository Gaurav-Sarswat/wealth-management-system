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
                        {{ $pagename }}
                    </li>
                </ul>
                <h5 class="page-title">{{ $pagename }}</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="create-user py-5">
                <div class="container">
                    <div class="row auth">
                        <div class="col-lg-6 mx-auto px-0">
                            <div class="card p-4">
                                <div class="auth-form-wrapper">
                                    <div class="auth-form">
                                        <h4 class="mb-4 text-center">Create New Minor Sector</h4>
                                        <form action="{{ route('admin.add_minor_sector') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <x-input type="text" placeholder="Minor Sector" name="name" class="form-control" />
                                            </div>

                                            <select id="majorsector" name="majorsector" class="form-control" data-placeholder="Select Major Sector">
        
                                                            @foreach($sectors as $sector)
                                                                <option value="{{ $sector->id }}">{{ $sector->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                            
                                            <button type="submit" class="mt-4 btn btn-custom w-100">Create Minor Sector</button>
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