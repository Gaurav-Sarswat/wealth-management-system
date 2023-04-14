<x-app-layout>
    <div class="layout-main">
        @include('layouts.header')
        <div class="content-wrapper py-2">
            <div class="container mb-4">
                <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
                    <li>
                        <a href="FIXME:">Home</a>
                    </li>
                    <li>
                        {{ $pagename }}
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="page-title mb-0">{{ $pagename }}</h5>
                    <a href="{{ route('admin.add_major_sector') }}" class="py-2 px-3 btn btn-custom">Add Major Sector</a>
                </div>
            </div>
            <!-- Start Dynamic Sections Starts here -->

            <section class="custom-table-users">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Major Sector</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sectors as $sector)
                                <tr>
                                    <td scope="row">{{ $sector->id }}</td>
                                    <td>{{ $sector->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>