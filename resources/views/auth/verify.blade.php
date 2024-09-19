<x-app title="NEO 2023">
    <div style="width: 100vw;height:100vh;display:flex; align-items:center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0">
                        <div class="text-center fs-4" style="font-family: Glacial-Bold">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">
                            <div class=" d-flex justify-content-center my-4">
                                <img src="/storage/images/assets/email_verified.svg" alt="" class="img-fluid" style="width: 200px">
                            </div>

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif

                            <p class="text-center m-0">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                            <p class="text-center">{{ __('You may find the link in the spam section') }}</p>
                            <p class="text-center">{{ __('If you did not receive the email') }}</p>
                            <form class="d-flex justify-content-center" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary align-baseline">{{ __('Resend Again') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
