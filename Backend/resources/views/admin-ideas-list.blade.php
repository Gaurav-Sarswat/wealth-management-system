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
                        All Ideas
                    </li>
                </ul>
                <h5 class="page-title">All Ideas</h5>
            </div>
            <!-- Start Dynamic Sections Starts here -->
            <section class="investment-lists pt-4 pb-5">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-4 mb-3">
                            <div class="custom-card">
                                <figure>
                                    <img src="/images/common/mainfarm.png" class="w-100" alt="">
                                </figure>
                                <p class="mb-2 title">Agro Farming Project</p>
                                <p class="mb-2 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati facere veritatis similique ipsum illo dignissimos.</p>
                                <span class="d-block mb-2 date">15-03-2023</span>
                                <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="custom-card">
                                <figure>
                                    <img src="/images/common/mainfarm.png" class="w-100" alt="">
                                </figure>
                                <p class="mb-2 title">Agro Farming Project</p>
                                <p class="mb-2 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati facere veritatis similique ipsum illo dignissimos.</p>
                                <span class="d-block mb-2 date">15-03-2023</span>
                                <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                            </div>
                        </div><div class="col-4 mb-3">
                            <div class="custom-card">
                                <figure>
                                    <img src="/images/common/mainfarm.png" class="w-100" alt="">
                                </figure>
                                <p class="mb-2 title">Agro Farming Project</p>
                                <p class="mb-2 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati facere veritatis similique ipsum illo dignissimos.</p>
                                <span class="d-block mb-2 date">15-03-2023</span>
                                <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="custom-card">
                                <figure>
                                    <img src="/images/common/mainfarm.png" class="w-100" alt="">
                                </figure>
                                <p class="mb-2 title">Agro Farming Project</p>
                                <p class="mb-2 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati facere veritatis similique ipsum illo dignissimos.</p>
                                <span class="d-block mb-2 date">15-03-2023</span>
                                <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="custom-card">
                                <figure>
                                    <img src="/images/common/mainfarm.png" class="w-100" alt="">
                                </figure>
                                <p class="mb-2 title">Agro Farming Project</p>
                                <p class="mb-2 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati facere veritatis similique ipsum illo dignissimos.</p>
                                <span class="d-block mb-2 date">15-03-2023</span>
                                <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                            </div>
                        </div><div class="col-4 mb-3">
                            <div class="custom-card">
                                <figure>
                                    <img src="/images/common/mainfarm.png" class="w-100" alt="">
                                </figure>
                                <p class="mb-2 title">Agro Farming Project</p>
                                <p class="mb-2 content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati facere veritatis similique ipsum illo dignissimos.</p>
                                <span class="d-block mb-2 date">15-03-2023</span>
                                <a href="FIXME:" class="btn btn-custom px-4 py-2 d-flex align-items-center justify-content-center">Read More <i class="fas fa-arrow-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>                          
            <!-- Start Dynamic Sections Ends here -->
        </div>
    </div>
</x-app-layout>
