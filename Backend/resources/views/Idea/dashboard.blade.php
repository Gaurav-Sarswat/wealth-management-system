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
                        <div class="col-lg-6">
                            <div class="chart-wrapper">
                                <canvas id="dashboard-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
