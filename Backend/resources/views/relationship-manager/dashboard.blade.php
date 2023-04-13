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
            <section class="investment-lists pt-4 pb-5">
                <div class="container">
                    <div class="row mt-3 justify-content-center">
                        <div class="col-lg-5 mb-2">
                            <div class="card">
                                <div class="card-body text-center" style="font-size: 3rem;">
                                    <div class="h4">Total Clients</div>
                                    <span class="d-block">{{ $clients }}</span>   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb-2">
                            <div class="card">
                                <div class="card-body text-center" style="font-size: 3rem;">
                                    <div class="h4">Total Ideas</div>
                                    <span class="d-block">{{ $ideas }}</span>   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-lg-8 mb-3">
                            <div class="custom-card">
                            <div class="chart-wrapper" style="height: 300px">
                                <canvas data-labels-rm="Accepted,Rejected,Pending" data-values-rm="{{ $accepted_ideas}},{{$rejected_ideas}},{{$pending_ideas }}" id="ideaStatusChartRM"></canvas>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
