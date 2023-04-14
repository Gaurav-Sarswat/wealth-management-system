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
                    <a href="{{ route('admin.add-user-form') }}" class="py-2 px-3 btn btn-custom">Add User</a>
                </div>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="custom-table-users">
                <div class="container">
                    <div class="custom-card mb-4 p-4">
                        <div class="h5">All Clients</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td scope="row">{{ $client->id }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->number }}</td>
                                    <td>
                                        <a href="{{ route('admin.admin-view-user', ['id' => $client->id]) }}">
                                            <button type="button" class="btn btn-sm btn-outline-primary px-3">
                                                <i class="fas fa-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $clients->links("pagination::bootstrap-4", ['paginator' => 'clients']) }}
                    </div>
                    <div class="custom-card mb-4 p-4">
                        <div class="h5">All Relationship Managers</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($relationship_managers as $rm)
                                <tr>
                                    <td scope="row">{{ $rm->id }}</td>
                                    <td>{{ $rm->name }}</td>
                                    <td>{{ $rm->email }}</td>
                                    <td>{{ $rm->number }}</td>
                                    <td>
                                        <a href="{{ route('admin.admin-view-user', ['id' => $rm->id]) }}">
                                            <button type="button" class="btn btn-sm btn-outline-primary px-3">
                                                <i class="fas fa-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $relationship_managers->links("pagination::bootstrap-4", ['paginator' => 'relationship_managers']) }}
                    </div>
                    <div class="custom-card mb-4 p-4">
                        <div class="h5">All Ideators</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S/N</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ideators as $ideator)
                                <tr>
                                    <td scope="row">{{ $ideator->id }}</td>
                                    <td>{{ $ideator->name }}</td>
                                    <td>{{ $ideator->email }}</td>
                                    <td>{{ $ideator->number }}</td>
                                    <td>
                                        <a href="{{ route('admin.admin-view-user', ['id' => $ideator->id]) }}">
                                            <button type="button" class="btn btn-sm btn-outline-primary px-3">
                                                <i class="fas fa-info" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $ideators->links("pagination::bootstrap-4", ['paginator' => 'ideators']) }}
                    </div>

                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>