<x-app title="NEO 2023">
    <div style="width: 100vw;height:100vh;display:flex; align-items:center">
        <div class="container-fluid p-0">
            <div class="d-lg-flex d-sm-block d-block">
                <div class="col-lg-7 d-lg-flex d-block align-items-center justify-content-center p-lg-0 p-5" style="height:100vh;overflow-x: hidden">
                    <div class="col-lg-7 m-auto">
                        
                        <div>
                            <p class="fs-1 text-center" style="font-family: Glacial-Bold;color:#fe7124">{{ __('LOGIN') }}</p>
                        </div>
                        <div class="card border-0">  
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="input-group mb-3 m-auto">

                                        <div class="col-12">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" aria-label="Email" aria-describedby="email" name="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 px-2">
                                            <small class="text-muted">Fill your email that you have registered before!</small>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="col-12">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" aria-describedby="password" name="password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-4">
                                        <div class="col-md-12 d-flex justify-content-center mb-3">
                                            <button type="submit" class="btn btn-primary px-4 col-12">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <a href="{{ route('participant.login') }}" class="btn btn-outline-primary px-4 col-12" role="button">
                                                {{ __('Login as participant') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class=" mb-2" style="border: 1px solid #eaeaea;"></div>
                                    <div class="row mb-2">
                                        <div class="col-md-12 d-flex justify-content-center">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-decoration-none text-muted" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-lg-flex d-none align-items-center justify-content-center" style="height:100vh;background: black;border-radius: 120px 0 0 120px">
                    <div class="col-lg-7 m-auto">
                        <a class="d-flex justify-content-center mb-5" href="{{ route('home') }}">
                            <img src="/storage/logo/NEO-FULL/Colored.png" alt="NEO" width="150" class="img-fluid">
                        </a>
                        <div>
                            <p class="fs-1 text-center" style="font-family: Glacial-Bold;color:#fe7124;border-radius:">{{ __('Salute, Soldiers!') }}</p>
                        </div>
                        <div>
                            <p class="text-white text-center">Create an account or sign up before registering for the competition!</p>
                        </div>
                        <div class="card bg-transparent">  
                            <div class="card-body bg-transparent">
                                <div class="row mb-0">
                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <a href="{{ route('register') }}" class="btn btn-outline-primary px-4 col-12">
                                            {{ __('Sign Up') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
<style>
    input.form-control{
        background: #eaeaea;
    }
</style>