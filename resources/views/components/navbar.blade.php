<nav id="guestNavbar" class="navbar navbar-expand-lg d-lg-block d-sm-none d-none shadow-sm fixed-top py-1">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/storage/logo/NEO-FULL/Colored.png" alt="NEO" width="55">
            {{-- <img src="/storage/logo/NEO-WORD/Colored.png" alt="NEO" width="90"> --}}
        </a>

        <button class="navbar-toggler border-purple-100" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarText">
            <span class="text-purple-100 fa-lg"><i class="bi bi-list"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                @if (Request::is('/') || Request::is('about') || Request::is('event') || Request::is('faqs'))
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('home') }}"
                            style="font-family: Buffalo-Inline">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/about" style="font-family: Buffalo-Inline">About</a>
                    </li>
                    @if (Request::is('/'))
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#competition"
                                style="font-family: Buffalo-Inline">Competition</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#timeline"
                                style="font-family: Buffalo-Inline">Timeline</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#starter_pack"
                                style="font-family: Buffalo-Inline">Starter Pack</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#testimony"
                                style="font-family: Buffalo-Inline">Testimony</a>
                        </li>
                    @endif
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/faqs" style="font-family: Buffalo-Inline">FAQs</a>
                    </li>
                    @if (Request::is('/'))
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#footer"
                                style="font-family: Buffalo-Inline">Contact</a>
                        </li>
                    @endif
                @endif
                @if (Auth::guard('participant')->check())
                    <li class="mx-2 d-block d-xl-none">
                        <a href="{{ route('participant.dashboard') }}" class="text-white nav-link"
                            style="font-family: Buffalo-Inline !important;">
                            Back to dashboard
                        </a>
                    </li>
                @elseif (auth()->user())
                    <li class="mx-2 d-block d-xl-none">
                        <a href="{{ auth()->user() ? route('dashboard') : route('participant.dashboard') }}"
                            class="text-white nav-link d-block d-xl-none"
                            style="font-family: Buffalo-Inline !important;">
                            Back to dashboard
                        </a>
                    </li>
                @else
                    <li class="d-md-block d-lg-none nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('register') }}"
                            style="font-family: Buffalo-Inline">Sign Up</a>
                    </li>
                    <li class="d-md-block d-lg-none nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('login') }}"
                            style="font-family: Buffalo-Inline">Login</a>
                    </li>
                @endif
            </ul>
            <div>
                {{-- @if (auth()->user() || Auth::guard('participant')->check()) --}}
                @if (auth()->user())
                    <a href="{{ auth()->user() ? route('dashboard') : route('participant.dashboard') }}"
                        class="btn py-2 px-3 me-2 rounded-3 d-none d-xl-inline"
                        style="font-family: Buffalo-Inline !important;background: #FF6701;color:white;border:1px solid #FF6701;box-shadow: 0px 0px 84px 20px rgba(255, 103, 1, 0.40);border-radius: 0px !important">
                        Back to dashboard
                    </a>
                @elseif(Auth::guard('participant')->check())
                    <a href="{{ route('participant.dashboard') }}"
                        class="btn py-2 px-3 me-2 rounded-3 d-none d-xl-inline"
                        style="font-family: Buffalo-Inline !important;background: #FF6701;color:white;border:1px solid #FF6701;box-shadow: 0px 0px 84px 20px rgba(255, 103, 1, 0.40);border-radius: 0px !important">
                        Back to dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn py-2 px-3 me-2 rounded-3 d-none d-xl-inline scaling"
                        style="font-family: Buffalo-Inline !important;background: #B60200;color:white;border:1px solid #B60200;border-radius: 0px !important">Sign
                        Up</a>
                    <a href="{{ route('login') }}" class="btn py-2 px-3 rounded-3 d-none d-xl-inline scaling"
                        style="font-family: Buffalo-Inline !important;background: #FF6701;color:white;border:1px solid #FF6701;border-radius: 0px !important">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg d-lg-none d-sm-block d-block bg-black shadow-sm fixed-top py-1">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="/storage/logo/NEO-FULL/Colored.png" alt="NEO" width="55">
            {{-- <img src="/storage/logo/NEO-WORD/Colored.png" alt="NEO" width="90"> --}}
        </a>

        <button class="navbar-toggler border-white" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarText">
            <span class="text-white fa-lg"><i class="bi bi-list"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                @if (Request::is('/') || Request::is('about') || Request::is('event') || Request::is('faqs'))
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('home') }}"
                            style="font-family: Buffalo-Inline">Home</a>
                    </li>

                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/about" style="font-family: Buffalo-Inline">About</a>
                    </li>
                    @if (Request::is('/'))
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#competition"
                                style="font-family: Buffalo-Inline">Competition</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#timeline"
                                style="font-family: Buffalo-Inline">Timeline</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#starter_pack"
                                style="font-family: Buffalo-Inline">Starter Pack</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#testimony"
                                style="font-family: Buffalo-Inline">Testimony</a>
                        </li>
                    @endif
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/faqs" style="font-family: Buffalo-Inline">FAQs</a>
                    </li>
                    @if (Request::is('/'))
                        <li class="nav-item mx-2">
                            <a class="nav-link text-white" href="#footer"
                                style="font-family: Buffalo-Inline">Contact</a>
                        </li>
                    @endif
                @endif
                @if (Auth::guard('participant')->check())
                    <li class="mx-2 d-block d-xl-none">
                        <a href="{{ route('participant.dashboard') }}" class="text-white nav-link"
                            style="font-family: Buffalo-Inline !important;">
                            Back to dashboard
                        </a>
                    </li>
                @elseif (auth()->user())
                    <li class="mx-2 d-block d-xl-none">
                        <a href="{{ auth()->user() ? route('dashboard') : route('participant.dashboard') }}"
                            class="text-white nav-link d-block d-xl-none"
                            style="font-family: Buffalo-Inline !important;">
                            Back to dashboard
                        </a>
                    </li>
                @else
                    <li class="d-md-block d-lg-none nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('register') }}"
                            style="font-family: Buffalo-Inline">Sign Up</a>
                    </li>
                    <li class="d-md-block d-lg-none nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('login') }}"
                            style="font-family: Buffalo-Inline">Login</a>
                    </li>
                @endif
            </ul>
            <div>
                {{-- @if (auth()->user() || Auth::guard('participant')->check()) --}}
                @if (auth()->user())
                    <a href="{{ auth()->user() ? route('dashboard') : route('participant.dashboard') }}"
                        class="btn py-2 px-3 me-2 rounded-3 d-none d-xl-inline"
                        style="font-family: Buffalo-Inline !important;background: #FF6701;color:white;border:1px solid #FF6701;box-shadow: 0px 0px 84px 20px rgba(255, 103, 1, 0.40);border-radius: 0px !important">
                        Back to dashboard
                    </a>
                @elseif(Auth::guard('participant')->check())
                    <a href="{{ route('participant.dashboard') }}"
                        class="btn py-2 px-3 me-2 rounded-3 d-none d-xl-inline"
                        style="font-family: Buffalo-Inline !important;background: #FF6701;color:white;border:1px solid #FF6701;box-shadow: 0px 0px 84px 20px rgba(255, 103, 1, 0.40);border-radius: 0px !important">
                        Back to dashboard
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn py-2 px-3 me-2 rounded-3 d-none d-xl-inline scaling"
                        style="font-family: Buffalo-Inline !important;background: #B60200;color:white;border:1px solid #B60200;border-radius: 0px !important">Sign
                        Up</a>
                    <a href="{{ route('login') }}" class="btn py-2 px-3 rounded-3 d-none d-xl-inline scaling"
                        style="font-family: Buffalo-Inline !important;background: #FF6701;color:white;border:1px solid #FF6701;border-radius: 0px !important">Login</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<script>
    window.addEventListener("scroll", function() {
        if (window.scrollY == 0 || window.scrollY >= 0 && window.scrollY <= 40) {
            $('#guestNavbar').removeClass("bg-dark-drop");
        } else {
            $('#guestNavbar').addClass("bg-dark-drop");
        }
    })
</script>
<style>
    .scaling {
        scale: 1;
        transition: 500ms ease-in-out;
    }

    .scaling:hover {
        scale: 1.1;
        transition: 500ms ease-in-out;
    }

    .bg-dark-drop {
        background: rgba(0, 0, 0, 0.30);
        backdrop-filter: blur(25px);
    }

    .bg-black {
        background: rgb(0, 0, 0) !important;
        box-shadow: 0px 3px 5px 0px rgba(250, 107, 3, 0.45) !important;
    }
</style>
