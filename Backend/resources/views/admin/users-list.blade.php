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

            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="true">Client</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="rm-tab" data-toggle="tab" href="#rm" role="tab" aria-controls="rm" aria-selected="false">RM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ideator-tab" data-toggle="tab" href="#ideator" role="tab" aria-controls="ideator" aria-selected="false">Ideator</a>
            </li>
            </ul>
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="client" role="tabpanel" aria-labelledby="client-tab">
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
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <!-- <div class="tab-pane fade" id="rm" role="tabpanel" aria-labelledby="rm-tab"> -->
            <div class="tab-pane fade" id="rm" role="tabpanel" aria-labelledby="rm-tab">
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
                            @foreach ($relationship_manager as $rm)
                                <tr>
                                    <td scope="row">{{ $rm->id }}</td>
                                    <td>{{ $rm->name }}</td>
                                    <td>{{ $rm->email }}</td>
                                    <td>{{ $rm->number }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            <div class="tab-pane fade" id="ideator" role="tabpanel" aria-labelledby="ideator-tab">
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
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            </div>

            <section class="custom-table-users">
                <div class="container">
                    <!-- <table class="table">
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
                                        <button type="button" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> -->
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>