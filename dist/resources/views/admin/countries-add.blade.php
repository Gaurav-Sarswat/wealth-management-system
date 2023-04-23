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
            <section class="create-user py-5">
                <div class="container">
                    <div class="row auth">
                        <div class="col-lg-6 mx-auto px-0">
                            <div class="card p-4">
                                <div class="auth-form-wrapper">
                                    <div class="auth-form">
                                        <h4 class="mb-4 text-center">{{ $pagename }}</h4>
                                        <form action="{{ route('admin.add-country') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <x-input type="text" placeholder="Country" name="name" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="region" id="region">
                                                    @foreach($regions as $region)
                                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="mt-4 btn btn-custom w-100">Add Country</button>
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