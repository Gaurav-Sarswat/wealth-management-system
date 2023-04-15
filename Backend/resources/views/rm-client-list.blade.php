<x-app-layout>
    <div class="layout-main">
        <nav class="navbar py-2">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item d-flex align-items-center user-profile-nav">
                        <img src="{{'https://ui-avatars.com/api/?name='.Auth::user()->name.'&background=327DF6&color=fff'}}" alt="Username">
                        <div class="d-flex align-items-center ml-2">
                            <a href="FIXME:">
                                <span>{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down ml-2"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper py-2">
            <div class="container">
                <ul class="d-flex align-items-center custom-breadcrumb list-unstyled mb-2 py-1">
                    <li>
                        <a href="FIXME:">Home</a>
                    </li>
                    <li>
                        Client Details
                    </li>
                </ul>
                <h5 class="page-title">Client Details</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="custom-table-users">
                <div class="container">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row">1</td>
                            <td>Client 1</td>
                            <td>john.doe1@gmail.com</td>
                            <td>07878789891</td>
                            <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                            <td scope="row">2</td>
                            <td>Client 2</td>
                            <td>john.doe2@gmail.com</td>
                            <td>07878789892</td>
                            <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                            <td scope="row">3</td>
                            <td>Client 3</td>
                            <td>john.doe3@gmail.com</td>
                            <td>07878789893</td>
                            <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                            <td scope="row">4</td>
                            <td>Client 4</td>
                            <td>john.doe4@gmail.com</td>
                            <td>07878789894</td>
                            <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                            <td scope="row">5</td>
                            <td>Client 5</td>
                            <td>john.doe5@gmail.com</td>
                            <td>07878789895</td>
                            <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
                          </tr>
                          <tr>
                            <td scope="row">6</td>
                            <td>Client 6</td>
                            <td>john.doe6@gmail.com</td>
                            <td>07878789896</td>
                            <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit" aria-hidden="true"></i></button></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
