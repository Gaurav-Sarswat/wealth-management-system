<x-guest-layout>
    <main class="auth">
        <div class="row auth mx-auto">
            <div class="col-lg-6 px-0 position-relative">
                <header class="auth-nav">
                    <nav class="navbar navbar-light px-3">
                        <a class="navbar-brand" href="#">
                            <img src="/images/common/team-7.png" alt="Logo">
                        </a>
                    </nav>
                </header>
                <div class="auth-form-wrapper h-100 d-flex align-items-center justify-content-center">
                    <div class="auth-form">
                    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0 list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="idea-detail" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Client</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="description-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Relationship Manager</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ideagiver</a>
                            </li>
                        </ul> -->

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="idea-detail">
                                <h4 class="mb-4 text-center">Welcome Back! Sign in to continue</h4>
                                <form method="POST" action="{{ route('client.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <x-input id="email" placeholder="Email Address" class="form-control" type="email" name="email" :value="old('email')" />
                                    </div>
                                    <div class="form-group">
                                        <x-input id="password" placeholder="Password" class="form-control" type="password" name="password" autocomplete="new-password"/>
                                    </div>
                                    <x-button type="submit" id="login-btn" class="mt-2 btn btn-custom w-100">
                                        {{ __('Login') }}
                                    </x-button>
                                </form>
                                <p class="mt-2">Don't have an account ? <a href="{{ route('register') }}">Create an account</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-0 d-none d-lg-block">
                <div class="auth-bg-wrapper w-100 h-100"></div>
            </div>
        </div>
    </main>
</x-guest-layout>
