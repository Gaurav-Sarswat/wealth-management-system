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
                        <h4 class="mb-4 text-center">Create an account</h4>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <x-input id="name" placeholder="Full Name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                            <div class="form-group">
                                <x-input id="email" placeholder="Email Address" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>
                            <div class="form-group">
                                <x-input id="number" onkeypress="return isNumberKey(event)" maxlength=10 placeholder="Phone Number" class="form-control" type="tel" name="number" :value="old('number')" required />
                            </div>
                            <div class="form-group">
                                <x-input id="password" placeholder="Create New Password" class="form-control" type="password" name="password" required autocomplete="new-password"/>
                            </div>
                            <div class="form-group">
                                <x-input id="password_confirmation" placeholder="Confirm New Password" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                            <!-- <button type="submit" class="mt-4 btn btn-custom w-100">Create Account</button> -->
                            <x-button type="submit" id="register-btn" class="mt-2 btn btn-custom w-100">
                                {{ __('Create Account') }}
                            </x-button>
                        </form>
                        <p class="mt-2">Already have an account ? <a href="{{ route('login') }}">Click here to login</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-0 d-none d-lg-block">
                <div class="auth-bg-wrapper w-100 h-100"></div>
            </div>
        </div>
    </main>
</x-guest-layout>
