

<style>
    /* gradient box */
    .gradient-div {
        background: radial-gradient(circle, black 40%, rgb(100, 12, 12) 100%);
        border: 5px solid #f83a00;
        padding: 20px;
        /* Increase border width and set it to solid */
        padding-top: 20px;
        animation: gradient-animation 1s ease infinite, glow 1s ease infinite alternate;
        box-shadow: 0 0 10px #f83a00;
    }

    .gradient-div-starter {
        background: radial-gradient(circle, black 40%, rgb(100, 12, 12) 100%);
        animation: gradient-animation 1s ease infinite, glow 1s ease infinite alternate;
        box-shadow: 0 0 10px #f83a00;
        border: 5px solid #f83a00;
    }

    @keyframes gradient-animation {
        0% {
            background-position: 0 0;
        }

        100% {
            background-position: 100% 100%;
        }
    }

    @keyframes glow {
        0% {
            box-shadow: 0 0 5px #f83a00;
        }

        100% {
            box-shadow: 0 0 10px #f83a00;
        }
    }


    /* testimony card */
    .carousel {
        display: flex;
        overflow: hidden;
        max-width: 600px;
        /* Adjust to your desired width */
        margin: 0 auto;
        transition: transform 0.5s;
    }

    .card {
        flex: 0 0 100%;
        padding: 20px;
        border: 1px solid #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: inherit;
        transition: transform 0.5s;
        /* Ensure the background color is inherited */
    }

    .bg-white {
        background-color: #fff !important;
        /* Ensure background color takes precedence */
    }


    /* timeline line animation */

    .vertical-line {
        width: 10px;
        background-color: #f83a00;
        height: 1200px;
        transition: height 1s ease-in, opacity 1s ease-in;
    }

    .vertical-line1 {
        width: 5px;
        background-color: #f83a00;
        height: 300px;
        transition: height 1s ease-in, opacity 1s ease-in;
    }

    .animated-timeline {
        animation: timeline 1s ease-in-out forwards;
    }

    .glowing-line {
        animation: glows 1s infinite alternate;
    }

    @keyframes timeline {
        0% {
            height: 0;
            opacity: 0;
        }

        100% {
            height: 100%;
            /* Increase height to 100% for the animation */
            opacity: 1;
        }
    }

    @keyframes glows {
        0% {
            box-shadow: 0 0 10px #f83a00;
        }

        100% {
            box-shadow: 0 0 20px #f83a00, 0 0 30px #f83a00;
        }
    }


    /* Carousel */

    .swiper {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        width: 300px;
        height: 300px;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
    }

    /* Media partner */
    @keyframes slide {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-100%);
        }
    }

    @keyframes slide2 {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(0);
        }
    }

    .logos {
        overflow: hidden;
        padding: 60px 0;
        background: black;
        white-space: nowrap;
        position: relative;

    }

    .logos:before,
    .logos:after {
        position: absolute;
        top: 0;
        width: 250px;
        height: 100%;
        content: "";
        z-index: 2;
    }

    .logos:before {
        left: 0;
        background: linear-gradient(to left, rgba(255, 255, 255, 0), black);
    }

    .logos:after {
        right: 0;
        background: linear-gradient(to right, rgba(255, 255, 255, 0), black);
    }

    .logos-slide {
        display: inline-block;
        animation: 35s slide infinite linear;
    }

    .logos-slide img {
        height: 100px;
        margin: 0 40px;
    }

    .logos-slide2 {
        display: inline-block;
        animation: 35s slide infinite linear;
    }

    .logos-slide2 img {
        height: 100px;
        margin: 0 40px;
    }

    /* Scrolling */

    .outer-div {
        height: 500px;
        overflow-y: auto;
    }

    .inner-div {
        height: 200px;
        /* Adjust the height as needed */
        overflow-y: auto;
    }

    /* Style for scrollbar */
    .outer-div::-webkit-scrollbar {
        width: 12px;
        /* Adjust the width as needed */
    }

    .outer-div::-webkit-scrollbar-thumb {
        background-color: #f83a00;
        /* Color of the scrollbar thumb */
    }

    /* AOS */
    /* [data-aos] {
        visibility: hidden;
    }

    [data-aos].animated {
        visibility: visible;
    } */

    .scaling {
        scale: 1;
        transition: 500ms ease-in-out;
    }

    .scaling:hover {
        scale: 1.1;
        transition: 500ms ease-in-out;
    }

    .accordion {
        --bs-accordion-border-color: transparent !important;
        --bs-accordion-body-color: transparent !important;
    }

    @media only screen and (max-width: 768px) {
        /* #neo{
            font-size:40px !important;
        }

        #endeavor{
            font-size:90px !important;
        }

        #battle{
            font-size:30px !important;
        } */
    }

    /* @media only screen and (max-width: 552px){
        #neo{
            font-size:20px !important;
        }

        #endeavor{
            font-size:70px !important;
        }

        #battle{
            font-size:10px !important;
        } */
    }
    .aspect-ratio-4x3 {
        aspect-ratio: 4/3;
    }

</style>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<x-app title="NEO 2023 ">
    <x-slot name="navbar"></x-slot>
    <div style="background-color:black;overflow-x:hidden">

        <div class="invisible py-5">Padding</div>
        {{-- Hero --}}
        <section style="background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(139, 0, 0, 0.5));">
            <div class="container">
                <div class="d-none d-xl-block d-md-none d-sm-none" style="position: relative;">
                    <div class="d-flex justify-content-center" style="position: absolute; z-index: 2; top: 250px;">
                        <div class="col-6" style="opacity: 0.2;">
                            <img class="img-fluid" src="{{ url('./storage/assets/fiyahh.gif') }}" alt="" style="height: 300px;">
                        </div>
                
                        <div class="col-6" style="opacity: 0.2;">
                            <img class="img-fluid" src="{{ url('./storage/assets/fiyahh.gif') }}" alt="" style="height: 300px;">
                        </div>
                    </div>
                </div>
                <div class="row position-relative" style="z-index: 6;">
                    <div class="col-6 d-flex justify-content-center">
                        <img class="img-fluid col-8 d-none d-xl-block d-md-none d-sm-none"
                            src="{{ url('./storage/assets/Phoenix.svg') }}" alt="">
                    </div>
                    <div
                        class="text-xl-start text-md-center text-center  col-12 d-flex align-items-center col-xl-6 col-md-12 col-sm-12 mt-4 mt-md-4 mt-xl-0">
                        <div>
                            {{-- <img class="pt-10" src="{{ url('./storage/assets/Group 626044.svg') }}" alt=""
                                style="height: 200px;"> --}}
                            <div style="font-family: Buffalo-Inline"
                                class="d-xl-flex d-md-none d-none flex-column gap-0">
                                <span class="m-0 p-0"
                                    style="color: #DC3000;font-size: 60px;line-height:50px; text-shadow: 0px 4px 6px #DC3000;">NEO
                                    2023</span>
                                <span class="m-0 p-0"
                                    style="color: #FF6701;font-size: 110px;line-height:100px;text-shadow: 0px 4px 6px #FF6701;">ENDEAVOR</span>
                                <span class="m-0 p-0"
                                    style="color: #FFD54A;font-size: 50px;line-height:40px;text-shadow: 0px 4px 6px #FFD54A;">BATTLE
                                    FOR TRIUMPH</span>
                            </div>
                            <div style="font-family: Buffalo-Inline"
                                class="d-xl-none d-md-flex d-flex flex-column gap-0">
                                <span class="m-0 p-0"
                                    style="color: #DC3000;font-size: 30px;line-height:30px; text-shadow: 0px 4px 6px #DC3000;">NEO
                                    2023</span>
                                <span class="m-0 p-0"
                                    style="color: #FF6701;font-size: 50px;line-height:55px;text-shadow: 0px 4px 6px #FF6701;">ENDEAVOR</span>
                                <span class="m-0 p-0"
                                    style="color: #FFD54A;font-size: 25px;line-height:25px;text-shadow: 0px 4px 6px #FFD54A;">BATTLE
                                    FOR TRIUMPH</span>
                            </div>
                            <div class="text-light d-flex align-item-center my-4">
                                The National English Olympics, commonly known as NEO, is a yearly national-level English
                                competition organized by BINUS English Club (BNEC) Alam Sutera. Its primary aim is to
                                harness the talents of
                                high school and college students by concentrating on various English-based competitions
                                in multiple categories.
                            </div>

                            <div class="pt-2 d-flex gap-4  justify-content-xl-start justify-content-md-center justify-content-center"
                                style="font-family: Buffalo-Inline">
                                <a href="{{ route('register') }}" class="col-xl-4 col-md-5 col-5 btn btn-lg scaling"
                                    style=" background: linear-gradient(180deg, #FFD54A 0%, #FF7A00 99.99%, rgba(255, 213, 74, 0.00) 100%, #FF9214 100%); color:#B60200;border-radius: 0px !important">REGISTER</a>
                                <a href="https://drive.google.com/file/d/16jSzHKN7yuF2Dxwi_Rc9Fcm-gOdYD53R/view" class="col-xl-4 col-md-5 col-5 btn btn-lg scaling" target="_blank"
                                    style=" background: transparent; color:white;border-radius: 0px !important;border:3px solid #FF7A00">E-BOOKLET</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="invisible py-5">Padding</div>
        </section>

        {{-- Spectrum --}}
        <section  id="about" class="py-5" style="background: linear-gradient(to bottom, rgba(139, 0, 0, 0.5), black );">
            <div class=" container mt-5">
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">OUR SPECTRUM</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-xl-5 col-md-12 col-sm-12 mb-5 mb-md-5 mb-xl-0" data-aos="flip-down">
                        <div class="gradient-div d-flex align-item-center">
                            <div id="carouselExample" class="carousel slide " data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="4000">
                                        <img src="{{ url('./storage/logo/NEO-FULL/Colored.png') }}" class="d-block w-100 img-fluid" style="height:300px;width:300px"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/NEST.png') }}" class="d-block w-100 img-fluid" style="height:300px;width:300px" 
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/neo2.jpg') }}" class="d-block w-100 img-fluid" style="height:300px;width:300px" 
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/neo3.jpg') }}" class="d-block w-100 img-fluid" style="height:300px;width:300px" 
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/neo4.jpg') }}" class="d-block w-100 img-fluid" style="height:300px;width:300px" 
                                            alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/logo/BNEC/Colored.png') }}" class="d-block w-100 img-fluid" style="height:300px;width:300px;object-fit:contain"
                                            alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div data-aos="fade-up"  class="col-12 col-xl-7 col-md-12 col-sm-12 text-light ps-xl-5 ps-md-3 ps-3">
                        <div class="fs-4">
                            The 2023 National English Olympics is a celebration of language and effective communication, featuring diverse competitions. Participants transform into language warriors, engaging in inspiring speeches, thought-provoking debates, captivating storytelling, and dynamic newscasting. NEO is more than victory. It's a journey of personal growth and a deep appreciation for the beauty of English. Join us to celebrate the power of words, push boundaries, and engage in friendly yet intense competition. Excellence is the standard, and linguistic triumph is the collective aspiration.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Competition --}}
        <section class="py-5" id="competition">
            <div class="container mt-5">
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">COMPETITION</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-center container pt-3">
                        <img data-aos="zoom-in" data-aos-duration="1500" data-bs-toggle="" data-bs-target="" class="col-6 col-xl-3 col-md-6 col-sm-6"
                            src="{{ url('./storage/assets/Storytelling.png') }}" alt=""
                            style="height: 250px; width:auto;">
                        <img data-aos="zoom-in" data-aos-duration="1500" data-bs-toggle="" data-bs-target="" class=" col-6 col-xl-3 col-md-6 col-sm-6"
                            src="{{ url('./storage/assets/Newscasting.png') }}" alt=""
                            style="height: 250px; width:auto;">
                        <img data-aos="zoom-in" data-aos-duration="1500" data-bs-toggle="" data-bs-target="" class=" col-6 col-xl-3 col-md-6 col-sm-6"
                            src="{{ url('./storage/assets/Debate.png') }}" alt=""
                            style="height: 250px; width:auto;">
                        <img data-aos="zoom-in" data-aos-duration="1500" data-bs-toggle="" data-bs-target="" class=" col-6 col-xl-3 col-md-6 col-sm-6"
                            src="{{ url('./storage/assets/Speech.png') }}" alt=""
                            style="height: 250px; width:auto;">
                    </div>
                </div>
            </div>
        </section>

        {{-- Timeline --}}
        <section class="py-5" id="timeline">
            <div class="mt-5">
                <div class="text-center text-pink">
                    <p class="fs-1 font-acme text-light" style="font-family: Buffalo-Inline">TIMELINE</p>
                </div>
                {{-- desktop --}}
                <div
                    class="d-none d-xl-flex d-md-none d-sm-none position-relative container  justify-content-center align-items-center mt-5">
                    <div style="padding: 140px 140px 120px 140px;">
                        <div class="vertical-line animated-timeline glowing-line"></div>
                    </div>
                    <div>
                        <img src="{{ url('./storage/assets/Top.png') }}"
                            class="img-fluid start-50 translate-middle-x top-0"
                            style="border-radius: 100%; position: absolute; height: 180px;">
                    </div>
                    <div class="d-flex"
                        style="gap: 180px; flex-direction: column; position: absolute; right: 700px; transform: rotate(180deg); transform: scaleX(-1);">
                        <div style="transform: rotate(180deg); transform: scaleX(-1);color: white !important"
                            class="text-end timeline-image fs-4 fw-semibold">January 8, 2024<br>Technical Meeting & Coaching
                            Clinic</div>
                        <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="timeline-image img-fluid"
                            style="border-radius: 100%; height: 400px;">
                        <div style="transform: rotate(180deg); transform: scaleX(-1);color: white !important"
                            class="text-end timeline-image fs-4 fw-semibold">January 11, 2024<br>Day 2 (Semifinal, Grand Final and Closing Ceremony) </div>
                    </div>

                    <div class="d-flex" style="gap: 180px; flex-direction: column; position: absolute; left: 700px; ">
                        <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="timeline-image img-fluid"
                            style="border-radius: 100%; height: 400px;">
                        <div class="timeline-image fs-4 fw-semibold" style="color: white !important">January 10, 2024<br>Day
                            1 (Preliminary Round)</div>
                        <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="timeline-image img-fluid"
                            style="border-radius: 100%; height: 400px;">
                        
                    </div>

                    <div>
                        <img src="{{ url('./storage/assets/Bottom.png') }}"
                            class="img-fluid start-50 translate-middle-x bottom-0"
                            style="border-radius: 100%; position: absolute; height: 180px;">
                    </div>
                </div>
                {{-- mobile --}}
                <ul
                    class="m-0 p-0 d-flex gap-4 flex-column d-xl-none justify-content-center align-items-center position-relative">
                    <div class="position-absolute vertical-line-mini animated-timeline glowing-line"></div>
                    <img src="{{ url('./storage/assets/Top.png') }}" class="img-fluid z-3"
                        style="border-radius: 100%;height: 180px;">
                    <li class="card gradient-div d-block col-10 align-item-center text-center  text-light">
                        <p class="m-0 p-3">January 8, 2024 - Technical Meeting & Coaching Clinic</p>
                    </li>
                    <li class="card gradient-div d-block col-10 align-item-center text-center  text-light">
                        <p class="m-0 p-3">January 10, 2024 - Day 1 (Preliminary Round)</p>
                    </li>
                    <li class="card gradient-div d-block col-10 align-item-center text-center  text-light">
                        <p class="m-0 p-3">January 11, 2024 - Day 2 (Semifinal, Grand Final and Closing Ceremony)
                        </p>
                    </li>
                    <img src="{{ url('./storage/assets/Bottom.png') }}" class="img-fluid z-3"
                        style="border-radius: 100%;height: 180px;">
                </ul>
            </div>
        </section>

        {{-- modal starter pack --}}
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog-centered modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">How to Register</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol style="list-style: none">
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 1:</p>
                                    <p>Go to <a href="https://neo.mybnec.org" target="_blank">neo.bnec.org</a></p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 2:</p>
                                    <p>Click <span class="fw-semibold">"Register"</span></p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 3:</p>
                                    <p>Complete your registration details</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 4:</p>
                                    <p>Go to <a href="https://neo.mybnec.org/dashboard">Dashboard Page</a> and select
                                        the competition</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 5:</p>
                                    <p>Fill in the form</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 6:</p>
                                    <p>Complete your payment</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 7:</p>
                                    <p>Wait for the committee to accept the payment</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Step 7:</p>
                                    <p>Registration completed! Check your registration details in <a
                                            href="https://neo.mybnec.org/registrations" target="_blank">Website NEO
                                            2023</a></p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal fade" id="tncModa" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog-centered modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Terms and Conditions</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol style="list-style: none">
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">General Rules and Regulations</p>
                                    <p>
                                        1. All registered participants, except Debate participants, CAN NOT be replaced after registration.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Overcome Stage Fright</p>
                                    <p>These rules are binding and final but can be altered, added to, or removed by the committee as deemed necessary. Non-compliance will result in DISQUALIFICATION.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Stay Healthy</p>
                                    <p>Prioritize your physical and mental health during the competition. Get
                                        enough sleep, eat nutritious meals, and stay hydrated. A healthy body and mind
                                        will help you perform at your best.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Embrace Adaptability</p>
                                    <p>Be ready to adapt to unexpected situations. Sometimes, things may
                                        not go as planned during the competition. Stay flexible and maintain composure
                                        when
                                        faced with challenges or changes in the program.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Reflect and Improve</p>
                                    <p>After the competition, take time to reflect on your performance.
                                        Analyze both your strengths and areas for improvement. Use feedback from judges
                                        and
                                        peers to refine your skills for future competitions.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Stay Positive</p>
                                    <p>Maintain a positive mindset throughout the competition. Focus on your
                                        passion for your chosen event and your dedication to improvement. Positivity can
                                        help
                                        you handle stress and adversity more effectively.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Network and Connect</p>
                                    <p>Take the opportunity to network with fellow participants, judges,
                                        and organizers. Building connections can open doors for future opportunities and
                                        provide
                                        a support system for your personal and professional growth.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Enjoy the Experience</p>
                                    <p>Remember that participating in the 2023 National English Olympics
                                        is a unique and valuable experience. Embrace the journey, savor the moments, and
                                        have
                                        fun while showcasing your talents and abilities. Cherish the memories you create
                                        along
                                        the way.
                                    </p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div> --}}

        <div  class="modal fade"  id="tncModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog-centered modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Tips & Tricks</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol style="list-style: none">
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">General Rules and Regulations
                                    </p>
                                    <p>1. All registered participants, except Debate participants, CAN NOT be replaced after registration.</p>
                                    <p>2. These rules are binding and final but can be altered, added to, or removed by the committee as deemed necessary. Non-compliance will result in DISQUALIFICATION</p>
                                    <p>3. Participants agree to secure data storage and consent that their data MAY be shared with third parties solely for purposes related to the event.</p>
                                    <p>4. All competitions and contents, including speeches and scripts, MUST be in English and MUST NOT include discriminatory comments, explicit content, or vulgar language.</p>
                                    <p>5. Participants MUST join the Zoom meeting at least 30 minutes before the technical meeting, coaching clinic, and the preliminary round, and arrive at the event location at least 30 minutes before the semifinal and Final round.</p>
                                    <p>6. All participants MUST wear formal clothing. Participants MUST wear formal shirts (preferably with ties) during the preliminary and semifinal rounds, then wear institution alma mater for university students or school uniform for students in the final round. All participants are NOT ALLOWED to wear t-shirts.</p>
                                    <p>7. Participants MUST consent to being recorded throughout the event.</p>
                                    <p>8. All participants or their representatives MUST attend the Technical Meeting and Coaching Clinic.</p>
                                    <p>9. Attendance at the Technical Meeting and Coaching Clinic is mandatory for obtaining further information about the event.</p>
                                    <p>10. Participants are not allowed to leave the event premises without permission from the committee.</p>
                                    <p>11. When it is a participant's turn, they MUST promptly proceed to the designated area (Designated breakout room for technical meeting, coaching clinic, and preliminary round. Also each designated room for the semifinal and final round).
                                    </p>
                                    <p>12. Participants MUST refrain from speaking when it is not their turn to prevent disruptions.</p>
                                    <p>13. Committee members WILL announce each participant's name three times before their turn. Failure to respond will be considered as a walkout.</p>
                                    <p>14. Judges MAY deduct points for rule violations and have the discretion to disqualify participants for serious infringements or non-compliance.</p>
                                    <p>15. The NEO 2023 Committee is NOT RESPONSIBLE for personal issues or disturbances not caused by the committee.
                                    </p>
                                    <p>16. All decisions made by the judges, which are FINAL and not subject to appeal, MUST be respected and accepted by all participants.</p>
                                    <p>17. No refunds for registration fees will be given unless proof of payment is uploaded after slots are full. For technical issues, contact the designated person.</p>
                                    <p>18. Registration fees for participants who walk out will not be refunded.</p>
                                    <p>19. Participants are strictly forbidden to smoke, vape, show sharp weapons, illegal drugs, and alcohol in the Zoom meeting, and also forbidden to bring them to the venue.</p>
                                    <p>20. Displaying or showing inappropriate videos and images, including those violating the ITE Law of the Republic of Indonesia, is prohibited.</p>
                                    <p>21. Damaging any facilities provided by the committee is prohibited.
                                    </p>
                                    <p>22. Violations against rules 20, 21, and 22 will be handled according to applicable regulations.</p>
                                    <p>23. Participants MAY only document the competition during the semifinals and finals.
                                    </p>
                                    <p>24. Participants MUST comply with all rules and regulations set forth by the committee.</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Requirements</p>
                                    <p>1. Participants MUST be senior high school, or university students located in Indonesia.
                                    </p>
                                    <p>Participants MUST be at least senior high school students by the age of 15 and, at most, university students by the age of 22 by 2023.</p>
                                    <p>Participants who are previous winners of NEO are allowed to join the same competition field.</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Payment
                                    </p>
                                    <p>1. Payment can be done through Bank Payments or E-Wallet.</p>
                                    <p>2. Payment cannot be refunded.</p>
                                    <p>3. Payment must be done in full, which means installment payments are not accepted.</p>
                                    <p>4. Payment must be done within the given time at the website when doing the registration process.</p>
                                    <p>5. After payment is done, participants will receive the payment confirmation in the period of 1x24 hours.</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Technical Meeting
                                    </p>
                                    <p>1. Represented by the chairperson/one of the group members. </p>
                                    <p>2. Participants must attend the Technical Meeting from the beginning until the end.
                                    </p>
                                    <p>3. Participants are highly requested to join the Zoom meeting 30 minutes before the Technical Meeting starts. </p>
                                    <p>4. Participants must wear appropriate clothing while attending the Technical Meeting.
                                    </p>
                                    <p>5. Participants are prohibited from wearing clothing/attributes that indicate their origin of institution. </p>
                                    <p>6. Participants are prohibited from using the name format indicating their origin of the institution.  </p>
                                    <p>7. Participants must pay attention and not make any noise during the Technical Meeting.  </p>
                                    <p>8. Participants are expected to turn on their cameras during the event.  </p>
                                    <p>9. Participants must mute their microphones during the event.  </p>
                                    <p>10. Participants are allowed to ask through the chatbox or unmute their mic after using the "raise hand" feature in the Q&A session   </p>
                                    <p>11. The NEO 2023 committee is NOT RESPONSIBLE for any internet issues or other issues/disturbances suffered by the participants throughout the event.  </p>
                                    <p>12. Participants are not allowed to leave the Zoom meeting without the committee's permission.  </p>
                                    <p>13. Participants who do not attend must accept the results of the Technical Meeting.  </p>
                                    <p>14. There is no re-explanation of information during the Technical Meeting to participants/groups who were not present.  </p>
                                    <p>15. It is prohibited to display or show videos and/or images related to pornography, smoking, liquor, and others that violate the ITE Law of the Republic of Indonesia.  </p>
                                    <p>16. Participants must obey all the rules that the committee has made.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Coaching Clinic</p>

                                    <p>1. Represented by the chairperson/one of the group members.  </p>
                                    <p>2. Participants must attend the Coaching Clinic from the beginning to the end.  </p>
                                    <p>3. Participants are highly requested to join the Zoom meeting 30 minutes before the Coaching Clinic starts. </p>
                                    <p>4. Participants are highly requested to join the Zoom meeting 30 minutes before the Coaching Clinic starts.  </p>
                                    <p>5. Participants are prohibited from wearing clothing/attributes that indicate their origin of institution.  </p>
                                    <p>6. Participants are prohibited from using the name format indicating their origin of institution.  </p>
                                    <p>7. Participants must pay attention and not make any noise during the Coaching Clinic.  </p>
                                    <p>8. Participants are expected to turn on their cameras during the event.  </p>
                                    <p>9. Participants must mute their microphones during the event.  </p>
                                    <p>10. Participants are allowed to ask through the chatbox or unmute their mic after using the "raise hand" feature in the Q&A session. </p>
                                    <p>11. The NEO 2023 committee is NOT RESPONSIBLE for any internet issues or other issues/disturbances suffered by the participants throughout the event. </p>
                                    <p>12. Participants are not allowed to leave the Zoom meeting without the committee's permission </p>
                                    <p>13. There is no re-explanation of information during the Coaching Clinic to participants/groups who were not present. </p>
                                    <p>14. It is prohibited to display or show videos and/or images related to pornography, smoking, liquor, and others that violate the ITE Law of the Republic of Indonesia. </p>
                                    <p>15. Participants must obey all the rules that the committee has made.</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Webinar</p>
                                    <p>1. For BINUSIAN, please change the name format to NIM_Name.</p>
                                    <p>2. For non-BINUSIAN, please change the name format to Institution_Name.</p>
                                    <p>3. Participants are highly requested to join the Zoom meeting 10 minutes before the webinar starts.</p>
                                    <p>4. Participants have to wear appropriate clothing while attending the webinar.</p>
                                    <p>5. Participants are expected to turn on their cameras during the event.</p>
                                    <p>6. Participants have to mute their microphones during the event.</p>
                                    <p>7. Participants are allowed to ask through the chatbox or unmute their mic after using the "raise hand" feature in the Q&A session.</p>
                                    <p>8. Participants are required to attend the event from the beginning to the end and fill in the attendance and satisfactory form to claim the e-certificate and SAT Points for BINUSIAN.</p>
                                    <p>9. It is prohibited to display or show videos and/or images related to pornography, smoking, liquor, and others that violate the ITE Law of the Republic of Indonesia.</p>
                                    <p>10. If you experience problems, please contact one of the webinar committees.</p>
                                    <p>11. Participants MUST obey all the rules that the committee has made.</p>
                                </div>
                            </li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>


        <div  class="modal fade"  id="tipsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog-centered modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Tips & Tricks</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol style="list-style: none">
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Research and Prepare</p>
                                    <p>Before the competition, thoroughly research the topic or subject
                                        matter related to your event. Having a deep understanding of your material will
                                        help you
                                        respond confidently to any questions or challenges from the judges or audience.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Overcome Stage Fright</p>
                                    <p>Many participants experience stage fright. To overcome it,
                                        practice in front of friends and family to gain confidence. You can also try
                                        relaxation
                                        techniques like deep breathing or visualization to calm your nerves before going
                                        on
                                        stage.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Stay Healthy</p>
                                    <p>Prioritize your physical and mental health during the competition. Get
                                        enough sleep, eat nutritious meals, and stay hydrated. A healthy body and mind
                                        will help you perform at your best.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Embrace Adaptability</p>
                                    <p>Be ready to adapt to unexpected situations. Sometimes, things may
                                        not go as planned during the competition. Stay flexible and maintain composure
                                        when
                                        faced with challenges or changes in the program.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Reflect and Improve</p>
                                    <p>After the competition, take time to reflect on your performance.
                                        Analyze both your strengths and areas for improvement. Use feedback from judges
                                        and
                                        peers to refine your skills for future competitions.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Stay Positive</p>
                                    <p>Maintain a positive mindset throughout the competition. Focus on your
                                        passion for your chosen event and your dedication to improvement. Positivity can
                                        help
                                        you handle stress and adversity more effectively.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Network and Connect</p>
                                    <p>Take the opportunity to network with fellow participants, judges,
                                        and organizers. Building connections can open doors for future opportunities and
                                        provide
                                        a support system for your personal and professional growth.
                                    </p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Enjoy the Experience</p>
                                    <p>Remember that participating in the 2023 National English Olympics
                                        is a unique and valuable experience. Embrace the journey, savor the moments, and
                                        have
                                        fun while showcasing your talents and abilities. Cherish the memories you create
                                        along
                                        the way.
                                    </p>
                                </div>
                            </li>
                        </ol>

                    </div>
                </div>
            </div>
        </div>


        <div  class="modal fade" id="benefitModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog-centered modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-semibold" id="exampleModalLabel">Benefits</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Free ticket to AEO (Rank 1-3)</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Cash prize</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Trophies for winners</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">National Experience</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Nationwide connection</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">SAT Points</p>
                                </div>
                            </li>
                            <li class="d-flex gap-3">
                                <div>
                                    <img src="{{ url('./storage/assets/Timeline1new.png') }}" class="img-fluid"
                                        style="max-width:40px">
                                </div>
                                <div>
                                    <p class="m-0 fw-semibold">Certificates</p>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- StarterPack --}}
        <section class="py-5" id="starter_pack">
            <div class="container mt-5">
                <div class="row">
                    <div class="row">
                        <div class="container py-5 text-center">
                            <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">STARTER PACK</p>
                            <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="row justify-content-center m-auto">
                        <div class="text-white col-12 col-lg-5 me-lg-3 mb-4">
                            <div class="row">
                                <div
                                    class="col-3 gradient-div-starter d-flex justify-content-center align-items-center">
                                    <img src="{{ url('./storage/assets/register_img.svg') }}" class="img-fluid"
                                        alt="" style="object-fit: cover;">
                                </div>
                                <div class="col-9 py-4 px-3  gradient-div-starter">
                                    <p class="fs-4 fw-semibold">How to Register</p>
                                    Ready to register? Follow the steps provided by clicking the button below!
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#registerModal"
                                        style="font-family: Buffalo-Inline;border-radius: 0 !important"
                                        data-bs-toggle="modal">See More</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-white col-12 col-lg-5 mb-4">
                            <div class="row">
                                <div
                                    class="col-3 gradient-div-starter d-flex justify-content-center align-items-center">
                                    <img src="{{ url('./storage/assets/check_imgg.svg') }}" class="img-fluid"
                                        alt="" style="object-fit: cover;">
                                </div>
                                <div class="col-9 py-4 px-3 gradient-div-starter">
                                    <p class="fs-4 fw-semibold">Terms & Condition</p>
                                    Find out whether you are eligible and the things you might need to prepare in this
                                    section!
                                    <br>
                                    <br>
                                    <a type="button" class="btn btn-primary" style="font-family: Buffalo-Inline;border-radius: 0 !important"
                                         href="https://drive.google.com/file/d/1yE4X3gKQsqF9csmjfLh9i9YF8ChWoXOY/view" target="_blank">See More</a>
                                </div>
                            </div>
                        </div>

                        <div class="text-white col-12 col-lg-5 me-lg-3 mb-4">
                            <div class="row">
                                <div
                                    class="col-3 gradient-div-starter d-flex justify-content-center align-items-center">
                                    <img src="{{ url('./storage/assets/tips_img.svg') }}" alt=""
                                        class="img-fluid" alt="" style="object-fit: cover;">
                                </div>
                                <div class="col-9 py-4 px-3  gradient-div-starter">
                                    <p class="fs-4 fw-semibold">Tips & Tricks</p>
                                    Your first time in a competition? Worry nothing for we are here to give you off a
                                    headstart with some awesome tips!
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#tipsModal"
                                        style="font-family: Buffalo-Inline;border-radius: 0 !important"
                                        data-bs-toggle="modal">See More</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-white col-12 col-lg-5 mb-4">
                            <div class="row">
                                <div
                                    class="col-3 gradient-div-starter d-flex justify-content-center align-items-center">
                                    <img src="{{ url('./storage/assets/star_img.svg') }}" alt=""
                                        class="img-fluid" alt="" style="object-fit: cover;">
                                </div>
                                <div class="col-9 py-4 px-3 gradient-div-starter">
                                    <p class="fs-4 fw-semibold">Benefits</p>
                                    Not only national competing experience, you will also gain awesome benefits from
                                    joining NEO 2023!
                                    <br>
                                    <br>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#benefitModal"
                                        style="font-family: Buffalo-Inline;border-radius: 0 !important"
                                        data-bs-toggle="modal">See More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Testimoni --}}
        <section id="testimony" class="py-5">
            <div data-aos="fade-left" class="container mt-5"  >
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">TESTIMONIES</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="gradient-div behind d-flex justify-content-center align-items-center">
                            <div id="111" class="message-container col-12 position-relative"
                                style="padding:20px;  ">
                                <div class="row">
                                    <div class="col-lg-7 col-sm-12 col-12 order-lg-0 order-sm-2 order-2">
                                        <p class="text-light mb-4 fs-3" style="font-family: Glacial-Bold;">Kelly
                                            Wijaya Teguh, The Winner of the 2022 NEO Short Story Writing Competition</p>
                                        <div class="text-light">
                                            Joining NEO was a very fun and challenging experience. We were given exciting and interesting tasks to do for our preliminary and final rounds. This competition really shaped and sharpened my writing skills. Thanks NEO!
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-5 col-sm-12 col-12 order-lg-2 order-sm-0 order-0 mb-4 mb-sm-4 mb-lg-0 d-flex justify-content-start justify-content-sm-start justify-content-lg-center">
                                        <img src="{{ url('./storage/assets/Kelly (SSW).jpg') }}" alt=""
                                            class="img-fluid"
                                            style="border-radius:70px; object-fit:cover;height:300px;width:300px">
                                    </div>
                                </div>
                            </div>

                            <div id="222" class="message-container col-12 position-relative"
                                style="padding:20px; display:none;  ">
                                <div class="row">
                                    <div class="col-lg-7 col-sm-12 col-12 order-lg-0 order-sm-2 order-2">
                                        <p class="text-light mb-4 fs-3" style="font-family: Glacial-Bold;">Emily
                                            Callista, The Winner of the 2022 NEO Newscasting Competition</p>
                                        <div class="text-light">
                                            In comparison to other English competitions Iâ€™ve taken part in within the past few years, partaking in NEO 2022 was an incredibly enjoyable experience. The prompts offered were thought provoking and the judges were incredibly insightful in their input. PICs during the event were also really helpful with any questions I had and helped make the process much easier. Iâ€™d definitely recommend anyone to join in the fun this year.
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-5 col-sm-12 col-12 order-lg-2 order-sm-0 order-0 mb-4 mb-sm-4 mb-lg-0 d-flex justify-content-start justify-content-sm-start justify-content-lg-center">
                                        <img src="{{ url('./storage/assets/Emily (Newscast).jpg') }}" alt=""
                                            class="img-fluid"
                                            style="border-radius:70px; object-fit:cover;height:300px;width:300px">
                                    </div>
                                </div>
                            </div>

                            <div   id="333" class="message-container col-12 position-relative"
                                style="padding:20px; display:none;  ">
                                <div class="row">
                                    <div class="col-lg-7 col-sm-12 col-12 order-lg-0 order-sm-2 order-2">
                                        <p class="text-light mb-4 fs-3" style="font-family: Glacial-Bold;">Darren
                                            Hugo, The Winner of the 2022 NEO Speech Competition (Junior High School)</p>
                                        <div class="text-light">
                                            BNEC NEO 2022 was a milestone for me, it was one of my best if not my greatest feat. I made very important characters in my life from that competition, my speech coach, my lover, my close friend etc. I gained international networking thanks to agora that's being held by Mike. I gained popularity amongst my friends too, as Binus is a very prestigious institution, too bad i couldn't join internationals since i was a Junior High School. Overall it was an 8/10 since it's online, however I'm very much looking forward to joining again for NEO 2023 as a senior, and will be continuing the international one.
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-5 col-sm-12 col-12 order-lg-2 order-sm-0 order-0 mb-4 mb-sm-4 mb-lg-0 d-flex justify-content-start justify-content-sm-start justify-content-lg-center">
                                        <img src="{{ url('./storage/assets/Darren (JHS Speech).jpg') }}"
                                            alt="" class="img-fluid"
                                            style="border-radius:70px; object-fit:cover;height:300px;width:300px">
                                    </div>
                                </div>
                            </div>

                            <div id="444" class="message-container col-12 position-relative"
                                style="padding:20px; display:none;  ">
                                <div class="row">
                                    <div class="col-lg-7 col-sm-12 col-12 order-lg-0 order-sm-2 order-2">
                                        <p class="text-light mb-4 fs-3" style="font-family: Glacial-Bold;">Anak Agung
                                            Gde Satwika Ananta, Representative of the Winner Team of the 2022 NEO Debate
                                            Competition</p>
                                        <div class="text-light">
                                            To put it short, NEO 2022 was amazing: cool CA and judge pool, fun motions, and professional organization committees that ensured a smooth debating experience.
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-5 col-sm-12 col-12 order-lg-2 order-sm-0 order-0 mb-4 mb-sm-4 mb-lg-0 d-flex justify-content-start justify-content-sm-start justify-content-lg-center">
                                        <img src="{{ url('./storage/assets/Agung (Debate).jpg') }}" alt=""
                                            class="img-fluid"
                                            style="border-radius:70px; object-fit:cover;height:300px;width:300px">
                                    </div>
                                </div>
                            </div>

                            <div id="555" class="message-container col-12 position-relative"
                                style="padding:20px; display:none;  ">
                                <div class="row">
                                    <div class="col-lg-7 col-sm-12 col-12 order-lg-0 order-sm-2 order-2">
                                        <p class="text-light mb-4 fs-2" style="font-family: Glacial-Bold;">Trishamara
                                            Jasmine Kirana, The Winner of the 2022 NEO Speech Competition</p>
                                        <div class="text-light">
                                            The first word I will use to describe my experience in joining NEO 2022 is definitely â€œsurprisingâ€. It was full of unexpected obstacles with us participants being given new topics to tackle and deliver speeches about. Which made the competition feel like an exciting olympic sports match! Because of this innovation, NEO 2022 has given me the opportunity to push myself above and beyond showing us that we can do the unimaginable by being brave to come up on stage and speak no matter how nervous or unprepared we feel. The competition itself was very exhilarating! I had friends who joined the contest as well so practicing our speeches together throughout the series of days was a lot of fun. Hope NEO 2023 will run just as smoothly!
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-5 col-sm-12 col-12 order-lg-2 order-sm-0 order-0 mb-4 mb-sm-4 mb-lg-0 d-flex justify-content-start justify-content-sm-start justify-content-lg-center">
                                        <img src="{{ url('./storage/assets/Trisha (Open Speech).jpg') }}"
                                            alt="" class="img-fluid"
                                            style="border-radius:70px; object-fit:cover;height:300px;width:300px">
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Untuk web --}}
                        <div class="infront d-none d-lg-flex">
                            <ul class="nav nav-tabs border-0">
                                <li class="nav-item">
                                    <div class="space" style="border-radius: 60px; ">
                                        <a class="nav-link" onclick="showContent('111');" style="border: none;">
                                            <img src="{{ url('./storage/assets/Kelly (SSW).jpg') }}" alt="" class="img-fluid" 
                                            style="border-radius: 100%; height: 80px; width:80px; object-fit:cover;  border: none;">
                                        </a>
                                    </div>
                                    
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius: 60px;">
                                        
                                            <a class="nav-link" onclick="showContent('222');" style="border: none;">
                                                <img src="{{ url('./storage/assets/Emily (Newscast).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width:80px; object-fit:cover;  border: none;">
                                            </a>
                                      
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius: 60px;">
                                       
                                            <a class="nav-link" onclick="showContent('333');" style="border: none;">
                                                <img src="{{ url('./storage/assets/Darren (JHS Speech).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px; object-fit:cover; border: none;">
                                            </a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius: 60px;">
                                        
                                            <a class="nav-link" onclick="showContent('444');" style="border: none;">
                                                <img src="{{ url('./storage/assets/Agung (Debate).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px; object-fit:cover; border: none;">
                                            </a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius: 60px;">
                                      
                                            <a class="nav-link" onclick="showContent('555');" style="border: none;">
                                                <img src="{{ url('./storage/assets/Trisha (Open Speech).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px;object-fit:cover; border: none;">
                                            </a>
                                      
                                    </div>
                                </li>
                            </ul>
                        </div>


                        {{-- Untuk HP --}}
                        <div class="infront-hp d-flex d-lg-none">
                            <ul class="nav nav-tabs border-0">
                                <li class="nav-item">
                                    <div class="space" style="border-radius:60px; ">
                                        <div class="SC-button">
                                            <a class="nav-link" onclick="showContent('111');">
                                                <img src="{{ url('./storage/assets/Kelly (SSW).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px;">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius:60px;  ">
                                        <div class="SC-button">
                                            <a class="nav-link" onclick="showContent('222');">
                                                <img src="{{ url('./storage/assets/Emily (Newscast).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px;">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius:60px;  ">
                                        <div class="SC-button">
                                            <a class="nav-link" onclick="showContent('333');">
                                                <img src="{{ url('./storage/assets/Darren (JHS Speech).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px; object-fit:cover">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius:60px;">
                                        <div class="SC-button">
                                            <a class="nav-link" onclick="showContent('444');">
                                                <img src="{{ url('./storage/assets/Agung (Debate).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px;">
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> --}}
                                </li>
                                <li class="nav-item">
                                    <div class="space" style="border-radius:60px;">
                                        <div class="SC-button">
                                            <a class="nav-link" onclick="showContent('555');">
                                                <img src="{{ url('./storage/assets/Trisha (Open Speech).jpg') }}"
                                                    alt="" class="img-fluid"
                                                    style="border-radius: 100%; height: 80px; width: 80px;">
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Judges --}}
        <section class="py-5" id="judge">
            <div class="container mt-5">
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">JUDGES</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items">
                    <div class="d-flex align-items">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide d-flex flex-column align-items-center gradient-div"
                                    style="width: 400px; height:550;">
                                    <img class="img-fluid" src="{{ url('./storage/assets/Judges/Debate-Muhammad_Batara_Mulya.png') }}"
                                        style="height: 400px; width:auto;" />
                                    <p style="font-size: 24px; color: white; font-weight: bold; text-align: center;">Debate</p>
                                    <p style="font-size: 18px; color: white; font-weight: bold;  text-align: center;">Muhammad Batara Multa</p>
                                </div>
                                <div class="swiper-slide d-flex flex-column align-items-center gradient-div"
                                    style="width: 400px; height:550;">
                                    <img class="img-fluid" src="{{ url('./storage/assets/Judges/Speech-Sabrina_Fitria.png') }}"
                                        style="height: 400px; width:auto;" />
                                        <p style="font-size: 24px; color: white; font-weight: bold;  text-align: center;">Speech</p>
                                    <p style="font-size: 18px; color: white; font-weight: bold;  text-align: center;">Sabrina Fitria</p>
                                </div>
                                <div class="swiper-slide d-flex flex-column align-items-center gradient-div"
                                    style="width: 400px; height:550;">
                                    <img class="img-fluid" src="{{ url('./storage/assets/Judges/Speech-Sahil_Kumar.png') }}"
                                        style="height: 400px; width:auto;" />
                                        <p style="font-size: 24px; color: white; font-weight: bold;text-align: center;">Speech</p>
                                    <p style="font-size: 18px; color: white; font-weight: bold;  text-align: center;">Sahil Kumar</p>
                                </div>
                                <div class="swiper-slide d-flex flex-column align-items-center gradient-div"
                                    style="width: 400px; height:550;">
                                    <img class="img-fluid" src="{{ url('./storage/assets/Judges/news-Karina_Aprilia.png') }}"
                                        style="height: 400px; width:auto;" />
                                        <p style="font-size: 24px; color: white; font-weight: bold;text-align: center;">Newscasting</p>
                                    <p style="font-size: 18px; color: white; font-weight: bold;  text-align: center;">Karina Aprilia</p>
                                </div>
                                <div class="swiper-slide d-flex flex-column align-items-center gradient-div"
                                    style="width: 400px; height:550;">
                                    <img class="img-fluid" src="{{ url('./storage/assets/Judges/news-Widya_Rahmadini.png') }}"
                                        style="height: 400px; width:auto;" />
                                        <p style="font-size: 24px; color: white; font-weight: bold; text-align: center;">Newscasting</p>
                                    <p style="font-size: 18px; color: white; font-weight: bold;  text-align: center;">Widya Rahmadini</p>
                                </div>
                                    <div class="swiper-slide d-flex flex-column align-items-center gradient-div"
                                    style="width: 400px; height:550;">
                                    <img class="img-fluid" src="{{ url('./storage/assets/Boy.svg') }}"
                                        style="height: 500px; width:auto;" />
                                    <p style="font-size: 24px; color: white; font-weight: bold; margin-top: 10px; text-align: center;">TBA</p>
                                </div>
                                <!-- Add more swiper-slide elements similarly -->
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        {{-- Merchandise --}}
        <section  class="py-5" id="merchandise">
            <div class=" container mt-5">
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">OUR MERCHANDISE</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-xl-5 col-md-12 col-sm-12 mb-5 mb-md-5 mb-xl-0" data-aos="flip-down">
                        <div class="d-flex align-item-center">
                            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/mer1.png') }}" class="d-block w-100 img-fluid " alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/mer2.png') }}" class="d-block w-100 img-fluid " alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/mer3.png') }}" class="d-block w-100 img-fluid " alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/mer4.png') }}" class="d-block w-100 img-fluid " alt="...">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="4000">
                                        <img src="{{ url('./storage/assets/mer5.png') }}" class="d-block w-100 img-fluid " alt="...">
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <div data-aos="fade-up"  class="col-12 col-xl-7 col-md-12 col-sm-12 text-light ps-xl-5 ps-md-3 ps-3">
                        <div class="fs-4">
                            Enhance your NEO journey with our exclusive merchandise, carefully crafted to reflect the spirit of linguistic excellence. Dive into a world of style and comfort while supporting the NEO competition – your purchase not only adds flair to your wardrobe but also contributes to the success of the event. Don't miss out on this opportunity to showcase your NEO pride and elevate your competition experience                        </div>
                        <br>
                        {{-- <button type="button" class=" ml-2 btn btn-primary btn-lg" style="background-color:#f83a00;">GET MERCH</button> --}}
                    </div>
                </div>
            </div>
        </section>


        {{-- FAQ --}}
        <section class="py-5" id="faq">
            <div class="container mt-5">
                <div class="col-12">
                    <div class="row">
                        <div class="container py-5 text-center">
                            <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">frequently Asked Questions</p>
                            <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                    {{-- <div class="col-12 row justify-content-center"> --}}
                    <div data-aos="fade-up" class="col-12 row justify-content-center accordion accordion-flush" id="accordionExample"
                        style="border:none;">
                        <div class="accordion-item col-12 col-lg-6 mb-4" style="background-color: black;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold text-white"
                                    style="background-color: #D64C25;border-radius:0 !important" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    <span class="pe-4">What is the National English Olympics (NEO)?</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse glacialReg"
                                data-bs-parent="#accordionExample" style="background-color: black;">
                                <div class="accordion-body">
                                    <p class="text-white">
                                        National English Olympics (NEO) is an annual event conducted by the Bina
                                        Nusantara English Club (BNEC) to be a platform to gather the potential talents
                                        from students around Indonesia to compete in 4 fields (Newscasting, Debate,
                                        Storytelling, and Speech). </p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item col-12 col-lg-6 mb-4" style="background-color: black;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold text-white"
                                    style="background-color: #D64C25;border-radius:0 !important" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    <span class="pe-4">When will NEO 2023 be held?</span>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse glacialReg"
                                data-bs-parent="#accordionExample" style="background-color: black;">
                                <div class="accordion-body">
                                    <p class="text-white">
                                        NEO 2023 will be held on January 8 - December 11
                                    <ul class="text-white">
                                        <li>January 8: ONLINE Technical Meeting & Coaching Clinic.</li>
                                        <li>January 10: ONSITE Preliminary round.</li>
                                        <li>January 11: ONSITE Semifinal, Grand Final, and Closing Ceremony.</li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item col-12 col-lg-6 mb-4" style="background-color: black;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold text-white"
                                    style="background-color: #D64C25;border-radius:0 !important" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <span class="pe-4">Where will NEO 2023 be held?</span>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse glacialReg"
                                data-bs-parent="#accordionExample" style="background-color: black;">
                                <div class="accordion-body">
                                    <p class="text-white">
                                        The NEO 2023 will be held <span class="fw-semibold">Hybrid by ZOOM for (Technical Meeting and Coaching Clinic) and ONSITE at BINUS Alam Sutera Main
                                        Campus<span> for Preliminary, Semifinal and Grand Final on January 8th until January 11th.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item col-12 col-lg-6 mb-4" style="background-color: black;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold text-white"
                                    style="background-color:#D64C25;border-radius:0 !important" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <span class="pe-4">Can international students studying in Indonesia participate
                                        in the National English
                                        Olympics?</span>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse glacialReg"
                                data-bs-parent="#accordionExample" style="background-color: black;">
                                <div class="accordion-body">
                                    <p class="text-white">
                                        Yes, international students who are currently studying in Indonesia are welcome
                                        to participate in the National English Olympics (NEO).
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item col-12 col-lg-6 mb-4" style="background-color: black;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold text-white"
                                    style="background-color:#D64C25;border-radius:0 !important" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    <span class="pe-4">Are there any specific materials or resources participants
                                        should bring for each
                                        competition?</span>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse glacialReg"
                                data-bs-parent="#accordionExample" style="background-color: black;">
                                <div class="accordion-body">
                                    <p class="text-white">
                                        There are no specific tools to bring, participants can bring general items such
                                        as stationery.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item col-12 col-lg-6 mb-4" style="background-color: black;">
                            <h2 class="accordion-header">
                                <button class="accordion-button fw-semibold text-white" type="button"
                                    style="background-color: #D64C25;border-radius:0 !important"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    <span class="pe-4">Can participants request any special arrangements or
                                        considerations for religious
                                        observances or dietary restrictions during the event?</span>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse glacialReg"
                                data-bs-parent="#accordionExample" style="background-color: black;">
                                <div class="accordion-body">
                                    <p class="text-white">
                                        Yes, the NEO 2023 <span class="fw-semibold">will provide</span> religious hour and also dietary restrictions
                                        related food that will be asked by our committee.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                    {{-- <div class="d-flex justify-content-center">
                        <div class="col-4">
                            <img class="img-fluid" src="{{ url('./storage/assets/fortnite-dance.gif') }}" alt=""
                                style="height:400px;">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="{{ url('./storage/assets/fortnite-dance.gif') }}" alt=""
                                style="height:400px;">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid" src="{{ url('./storage/assets/fortnite-dance.gif') }}" alt=""
                                style="height:400px;">
                        </div>
                    </div> --}}

                </div>
            </div>
        </section>

        {{-- Sponsor --}}
        {{-- <section class="py-5" id="sponsor">
            <div class="container mt-5">
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">THANKYOU TO OUR SPONSORS</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col m-40 container pt-3 d-flex justify-content-center">
                        <div class="col-12 pt-5 m-1 gradient-div d-flex flex-wrap justify-content-center" style="height:;object-fit:cover">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                            <img src="{{ url('./storage/assets/tfisc.png') }}" alt="" class="img-fluid" style="width:200px; height:auto; object-fit:contain">
                        </div>
                    </div>
                </div>
            </div>
        </section>  --}}

        {{-- Media partner --}}
        <section id="media_partner" class="margintop py-5 mb-5">
            <div class="container mt-3 position-relative mb-5">
                <div class="row">
                    <div class="container py-5 text-center">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">MEDIA PARTNERS</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row align-items-start p-0 text-center logos ">
                    <div class="logos-slide pb-2">
                        <img src="{{ url('./storage/assets/med.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med1.jpg') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med2.jpg') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med3.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med4.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med5.PNG') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med6.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med7.jpg') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">                    </div>
                </div>

                <div class="row align-items-start p-0 text-center logos ">
                    <div class="logos-slide2">
                        <img src="{{ url('./storage/assets/med8.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med9.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med10.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med11.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med12.PNG') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med13.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med14.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med15.jpg') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med16.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">
                        <img src="{{ url('./storage/assets/med17.png') }}" alt="" class="img-fluid" style="width:150px; height:auto; object-fit:contain">                    </div>
                </div>

            </div>
        </section> 


    </div>
    <x-footer></x-footer>
</x-app>

{{-- swiper --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
{{-- aos --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration:1000,
        });
    });
</script>
{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

<script>

    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });

    function showContent(tabId) {
        // Hide all content containers
        document.getElementById('111').style.display = 'none';
        document.getElementById('222').style.display = 'none';
        document.getElementById('333').style.display = 'none';
        document.getElementById('444').style.display = 'none';
        document.getElementById('555').style.display = 'none';

        // Show the selected content container
        document.getElementById(tabId).style.display = 'block';
    }


    // var copy = document.querySelector(".logos-slide").cloneNode(true);
    // document.querySelector(".logos").appendChild(copy);
</script>


