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
                        Data
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="page-title mb-0">Data</h5>
                </div>
            </div>
            <!-- Start Dynamic Sections Starts here -->

            <section class="data-cards">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('admin.show_categories') }}" class="d-block card d-flex align-items-center justify-content-center py-5">
                                <span>Categories</span>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('admin.show_currencies') }}" class="d-block card d-flex align-items-center justify-content-center py-5">
                                <span>Currencies</span>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('admin.show_major_sector') }}" class="d-block card d-flex align-items-center justify-content-center py-5">
                                <span>Major Sector</span>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('admin.show_minor_sector') }}" class="d-block card d-flex align-items-center justify-content-center py-5">
                                <span>Minor Sector</span>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('admin.show-regions') }}" class="d-block card d-flex align-items-center justify-content-center py-5">
                                <span>Regions</span>
                            </a>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <a href="{{ route('admin.show-countries') }}" class="d-block card d-flex align-items-center justify-content-center py-5">
                                <span>Countries</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>