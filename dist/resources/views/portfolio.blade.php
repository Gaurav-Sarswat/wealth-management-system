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
                        Portfolio
                    </li>
                </ul>
                <h5 class="page-title">Portfolio</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="custom-table-users">
                        <div class="container">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Idea</th>
                                    <th scope="col">Domain</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td scope="row">1</td>
                                    <td>idea-1</td>
                                    <td>Cripto</td>
                                    <td>09/03/2023</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye" aria-hidden="true"></i></button></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">2</td>
                                    <td>Idea-2</td>
                                    <td>Stocks</td>
                                    <td>13/02/2023</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye" aria-hidden="true"></i></button></td>
                                  </tr>
                                  <tr>
                                    <td scope="row">3</td>
                                    <td>Idea-3</td>
                                    <td>xyz</td>
                                    <td>23/12/2022</td>
                                    <td><button type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye" aria-hidden="true"></i></button></td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
