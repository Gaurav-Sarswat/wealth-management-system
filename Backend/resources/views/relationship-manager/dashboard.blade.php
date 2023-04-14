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
            <section class="dashboard pt-4 pb-5">
                <div class="container">
                    <div class="row mt-3 align-items-start">
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="dashboard-cards">
                                        <p class="mb-0">Your Clients</p>
                                        <span>{{ $clients }}</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="dashboard-cards">
                                        <p class="mb-0">Total Ideas</p>
                                        <span>{{ $ideas }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="dashboard-cards">
                                <p class="mb-0">All Ideas</p>
                                <div class="chart-wrapper">
                                    <canvas data-labels-rm="Accepted,Rejected,Pending" data-values-rm="{{ $accepted_ideas}},{{$rejected_ideas}},{{$pending_ideas }}" id="ideaStatusChartRM"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
