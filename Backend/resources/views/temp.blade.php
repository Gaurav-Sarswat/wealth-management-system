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
                        Page Name
                    </li>
                </ul>
                <h5 class="page-title">Page Name</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="create-idea py-5">
                        <div class="container">
                            <div class="row auth">
                                <div class="col-12 position-relative">
                                    <div class="card p-4">
                                        <div class="auth-form-wrapper">
                                            <div class="auth-form">
                                                <h4 class="mb-4 text-center">Create an Idea</h4>
                                                <form action="FIXME:" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Title" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Abstract" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea rows="5" placeholder="Content" class="form-control"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="range" placeholder="Risk Rating" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" placeholder="Expiry date" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="category" id="category" class="form-control">
                                                                    <option value="" disabled selected hidden>Select Category</option>
                                                                    <option value="real-estate">Real Estate</option>
                                                                    <option value="equity">Equity</option>
                                                                    <option value="crypto">Crypto</option>
                                                                    <option value="bonds">Bonds</option>
                                                                    <option value="nft">NFTs</option>
                                                                    <option value="forex">Forex</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Instruments" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select name="category" id="Currency" class="form-control">
                                                                    <option value="" disabled selected hidden>Select Currency</option>
                                                                    <option value="real-estate">GBP</option>
                                                                    <option value="equity">Doller</option>
                                                                    <option value="crypto">INR</option>
                                                                    <option value="bonds">PKR</option>
                                                                    <option value="nft">NGN</option>
                                                                    <option value="forex">EURO</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Major Sector" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" placeholder="Minor Sector" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="country" id="Region" class="form-control">
                                                                    <option value="" disabled selected hidden>Select Region</option>
                                                                    <option value="north-america">North America</option>
                                                                    <option value="south-america">South America</option>
                                                                    <option value="europe">Europe</option>
                                                                    <option value="asia">Asia</option>
                                                                    <option value="africa">Africa</option>
                                                                    <option value="antarctica">Antarctica</option>
                                                                    <option value="ocenia">Oceania</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="country" id="country" class="form-control">
                                                                    <option value="" disabled selected hidden>Select Country</option>
                                                                    <option value="uk">United Kingdom</option>
                                                                    <option value="india">India</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="file" placeholder="Upload a cover image" class="dropify">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <button type="submit" class="btn btn-custom w-100">Publish</button>
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