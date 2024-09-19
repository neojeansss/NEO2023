<x-app title="NEO 2023">
    <div style="width: 100vw;height:100vh;display:flex; align-items:center">
        <div class="container-fluid p-0">
            <div class="d-lg-flex d-sm-block d-block" style="min-height:100vh">
                <div class="col-lg-12 d-lg-flex d-block align-items-center justify-content-center p-lg-0 p-5"
                    style="height:100vh;overflow-x: hidden;">
                    <div class="col-lg-7 shadow d-flex flex-column justify-content-center" style="padding: 0px 120px;height:100vh">
                        <a class="d-flex justify-content-center mb-4" href="{{ route('home') }}">
                            <img src="/storage/logo/NEO-FULL/Colored.png" alt="NEO" width="150"
                                class="img-fluid">
                        </a>
                        <div>
                            <p class="fs-1 text-center" style="font-family: Glacial-Bold;color:#fe7124">
                                {{ __('Welcome Back, Soldiers!') }}</p>
                        </div>
                        <div class="card border-0">
                            <div class="card-body">
                                <form method="POST" action="{{ route('participant.login-auth') }}">
                                    @csrf

                                    <div class="input-group mb-3 m-auto">

                                        <div class="col-12">
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Participant's Username" aria-label="Email"
                                                aria-describedby="username" name="username">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="col-12">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Participant's Password" aria-label="Password"
                                                aria-describedby="password" name="password">
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
                                    </div>
                                    <div class=" mb-2" style="border: 1px solid #eaeaea;"></div>
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <p class="mt-2">Not a participant?
                                                <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">
                                                    {{ __(' Back to user login') }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
<style>
    input.form-control {
        background: #eaeaea;
    }
    .shadow{
        box-shadow: 0 0.5rem 1rem rgba(244, 81, 0, 0.3) !important;
    }
</style>
