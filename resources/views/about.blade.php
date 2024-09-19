<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

<x-app title="About NEO 2023">
    <x-slot name="navbar"></x-slot>
    <div class="pb-5" style="background-color:black;">
        <div class="invisible py-4">Padding</div>
        <section class="theme mb-5">
            <div data-aos="fade-up" class="py-5 container-md text-center">
                <p style="font-family: Buffalo-Inline;font-size: 70px;color:#E34F09">
                    NEO THEME
                </p>
                <p class="semi-bold text-white col-8 m-auto">
                    In this year’s NEO, we want to emphasize the journey of hard work, efforts, and struggles on the
                    path to achieving triumph in every endeavor. Therefore, we proudly announce our theme for this year!
                    <br>
                    <span class="fw-bold">“Endeavor: Battle for Triumph”🏹🔥</span>
                    <br>
                    Being involved in NEO is expected to broaden the participant’s point of view and give them an
                    experience that will have a bright and long-lasting effect on their future. As participants embark
                    on this remarkable journey, they embark on a quest to be better and brighter⚔️🏆
                    <br>
                    Also, if you have noticed, the 2023 NEO is symbolized by a fire phoenix. The phoenix symbolizes new
                    beginnings and determination. The fire symbolizes the burning passion throughout NEO 2023. 🌟 With
                    this, we hope that participants will stay determined to achieve triumph in every endeavor. 🦅💥
                </p>
            </div>
        </section>
        <section class="previous my-5">
            <div class="container py-5 text-center">
                <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">PREVIOUS NEO</p>
                <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
            </div>
            <div class="container vh-auto">
                <div class="row pb-md-5 p-sm-0 p-0">
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="container position-relative">
                            <div class="container container-logo d-flex justify-content-center">
                                <div data-aos="zoom-in" class="position-relative">
                                    <img src="/storage/landing_page/faq/logo_base.svg" class="img-fluid" alt="">
                                </div>
                                <div data-aos="zoom-in" class="position-absolute" style="z-index: 1; bottom:20%">
                                    <img src="/storage/landing_page/faq/year1.png" style="max-width: 250px;" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12">
                        <div class="container position-relative">
                            <div class="container container-logo d-flex justify-content-center">
                                <div data-aos="zoom-in" class="position-relative">
                                    <img src="/storage/landing_page/faq/logo_base.svg" class="img-fluid" alt="">
                                </div>
                                <div data-aos="zoom-in" class="position-absolute" style="z-index: 1; bottom:20%">
                                    <img src="/storage/landing_page/faq/year2.png" style="max-width: 250px;" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-md-5 p-sm-0 p-0">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="container position-relative">
                            <div class="container container-logo d-flex justify-content-center">
                                <div data-aos="zoom-in" class="position-relative">
                                    <img src="/storage/landing_page/faq/logo_base.svg" class="img-fluid" alt="">
                                </div>
                                <div data-aos="zoom-in" class="position-absolute" style="z-index: 1; bottom:20%">
                                    <img src="/storage/landing_page/faq/year3.png" style="max-width: 250px;" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="container position-relative">
                            <div class="container container-logo d-flex justify-content-center">
                                <div class="position-relative">
                                    <img src="/storage/landing_page/faq/logo_base.svg" class="img-fluid" alt="">
                                </div>
                                <div class="position-absolute" style="z-index: 1; bottom:20%">
                                    <img src="/storage/landing_page/faq/logo_neo1.png" style="max-width: 250px;" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md col pt-lg-0 pt-md-5 pt-sm-0 p-0">
                        <div class="container position-relative">
                            <div class="container container-logo d-flex justify-content-center">
                                <div data-aos="zoom-in" class="position-relative">
                                    <img src="/storage/landing_page/faq/logo_base.svg" class="img-fluid" alt="">
                                </div>
                                <div data-aos="zoom-in" class="position-absolute" style="z-index: 1; bottom:20%">
                                    <img src="/storage/landing_page/faq/year4.png" style="max-width: 250px;" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> 



        <section class="documentation my-5">
            <div class="bg-documentation container">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-8 m-auto">
                            <div class="position-relative">
                                <!-- Background Video -->
                                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden;">
                                    <video autoplay loop muted style="width: 100%; height: auto;">
                                        <source src="{{ asset('/path/to/your/background-video.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                                
                                <!-- Main Video (Foreground) -->
                                <div style="padding-top: 300px; padding-bottom: 80px; position: relative; z-index: 1;">
                                    <div class="holder position-relative">
                                        <video controls style="width: 100%;">
                                            <source src="{{ asset('/storage/landing_page/faq/TrailerNEO.mp4') }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        

        {{-- <section class="documentation>">
            <div class="container">
                <div class="image-overlap">
                    <h2 class="doc-judul2 text-center"> DOCUMENTATION</h2>
                    <div class="d-flex justify-content-center">
                        <img class="media" src="/storage/landing_page/faq/bg_documentation.svg" alt="">
                    </div>
                    <div class="background-docum">
                        <div class="d-flex justify-content-center">
                            <img class="media img-fluid" src="/storage/landing_page/faq/bg_documentation.svg"
                                alt="">
                        </div>
                    </div>
                    <div class="container media-content">
                        <div class="media-carousel text-center container">
                            <div class="d-flex justify-content-center">
                                <div id="image-carousel" class="splide">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <img src="/storage/landing_page/faq/Girl-Stock.jpeg" alt="">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="/storage/landing_page/faq/Girl-Stock.jpeg" alt="">
                                            </li>
                                            <li class="splide__slide">
                                                <img src="/storage/landing_page/faq/Girl-Stock.jpeg" alt="">
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  --}}

        @if(count($messageFromSCs) > 0)
        <section class="sc-carousel">
            <div class="container my-5 py-5">
                <div class="row">
                    <div class="text-center text-pink">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">STEERING COMMITTEE</p>
                        <img src="/storage/landing_page/faq/stylePreviousNeo.svg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items">
                    <div class="col">
                        <div class=" d-flex align-items">
                            <div class="swiper mySwiper p-5">
                                <div class="swiper-wrapper">
                                    @foreach($messageFromSCs as $messageFromSC)
                                    <div class="mx-2 swiper-slide d-flex flex-column px-5 py-4 align-items-center" style="">
                                        <img src="/storage/images/message_from_sc/{{ $messageFromSC->picture }}" alt="" class="img-fluid" width="200px">
                                        <div class="text-white text-center mt-4">
                                            <p class="fs-3 fw-semibold">{{ $messageFromSC->name }}</p>
                                            <div class="">
                                                {{ $messageFromSC->role }}
                                            </div>
                                        </div>
                                        <div class="text-white mt-4">
                                            <p>{{ $messageFromSC->message }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        <section class="ready-box mt-5 py-5">
            <div  class="ready-container container col-8 m-auto">
                <div class="mb-5">
                    <div class="text-center pb-5">
                        <p class="fs-1 font-acme text-light m-0" style="font-family: Buffalo-Inline">READY TO BE PART OF EXTRAORDINARY</p>
                    </div>
                    <div class="pt-2 d-flex gap-4 justify-content-md-center justify-content-center"
                        style="font-family: Buffalo-Inline">
                        <a href="{{ route('register') }}" class="col-xl-4 col-md-5 col-5 btn btn-lg scaling"
                            style=" background: linear-gradient(180deg, #FFD54A 0%, #FF7A00 99.99%, rgba(255, 213, 74, 0.00) 100%, #FF9214 100%); color:#B60200;border-radius: 0px !important">REGISTER</a>
                        <a href="https://drive.google.com/file/d/16jSzHKN7yuF2Dxwi_Rc9Fcm-gOdYD53R/view" target="_blank" class="col-xl-4 col-md-5 col-5 btn btn-lg scaling"
                            style=" background: transparent; color:white;border-radius: 0px !important;border:3px solid #FF7A00">E-BOOKLET</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer></x-footer>
</x-app>
<style>

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

    /* .neoTheme */
    .neoTheme {
        padding-top: 13%;
        height: 100vh;

    }

    .neoTheme p {
        font-size: 20px;

    }

    .judulNeoTheme {
        font-family: Buffalo-Grunge;
        font-size: 80px;
        text-shadow: 0px 4px 4px rgba(227, 79, 9, 1);
        color: #E34F09;
    }


    /*previous Neo */

    .judulPrevious {
        font-family: Buffalo-Grunge;
        font-size: 60px;
        text-shadow: 0px 4px 4px rgba(227, 79, 9, 1);
        color: white;
    }

    .bg-documentation {
        background-image: url("/storage/landing_page/faq/bg_documentation.svg");
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        background-attachment: local;

    }

    /*documentation*/
    .documentation {
        padding-top: 100px;
    }

    .documentation h2 {
        font-family: Buffalo-Grunge;
        font-size: 80px;
        text-shadow: 0px 4px 4px rgba(227, 79, 9, 1);
        color: white;
    }

    .documentation .docum-container {
        max-width: 700px;
        top: 170px;
        margin: 0 auto;
    }

    .holder {
        padding-bottom: 56.25%;
        overflow: hidden;
        height: 0;
    }

    .holder iframe {
        position: absolute;
        width: 100%;
        height: 100%;
        border: 4px solid #FF5A01;
        border-radius: 30px;
        aspect-ratio: 16/9;
    }

    .doc-judul {
        top: 130px;
    }

    .image-overlap {
        display: grid;
        grid-template-rows: 1.5fr 1fr 5fr;
        max-height: 890px;

    }

    .image-overlap>* {}

    .image-overlap>.media {

        /* grid-row: 1/-1;
          border: 5px white solid; */

    }

    .image-overlap>.background-docum {
        grid-column: 1/2;
        grid-row: 1/-1;
        z-index: 1;
    }

    .image-overlap>.doc-judul2 {
        grid-column: 1/2;
        grid-row: 2;
        z-index: 2;

    }

    .image-overlap>.media-content {
        grid-column: 1/2;
        grid-row: 3;
    }

    .splide__slide img {
        width: 100%;
        height: 100%;
        border: 4px solid #FF5A01;
        border-radius: 30px;
        object-fit: cover;
    }

    .splide {
        z-index: 2;
        max-width: 850px;
        height: auto;
    }



    /* sc carousel */
    .sc-judul {
        font-family: Buffalo-Grunge;
        font-size: 60px;
        text-shadow: 0px 4px 4px rgba(227, 79, 9, 1);
        color: white;
    }

    .swiper {
        width: 100%;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .swiper-slide {
        background-position: center;
        background-size: cover;
        background: url(/storage/landing_page/faq/card_bg.svg), radial-gradient(circle, black 40%, rgb(100, 12, 12) 100%);
        border: 5px solid #f83a00;
        animation: gradient-animation 1s ease infinite, glow 1s ease infinite alternate;
        box-shadow: 0 0 10px #f83a00;
        background-size: no-repeat;
        background-size: contain;
        max-width: 800px;


    }

    /* ready-box */
    .ready-container {
        padding: 80px;
        background: url(/storage/landing_page/faq/ready-spark.svg), radial-gradient(circle, black 40%, rgb(100, 12, 12) 100%);
        border: 5px solid #f83a00;
    }

    .ready-judul {
        font-family: Buffalo-Grunge;
        font-size: 55px;
        text-shadow: 0px 4px 4px rgba(227, 79, 9, 1);
        color: white;
    }

    .btn-join {
        padding: 5px 70px;
        font-family: Buffalo-Grunge;
        font-size: 30px;
        color: #FFD54A;
        background-color: #B60200;
    }


    @media(max-width: 576px) {

        .judulNeoTheme {
            padding-top: 20px;
            font-size: 60px;
        }

        .neoTheme {
            height: auto;
        }

        .neoTheme p {
            font-size: 16px;
            padding-bottom: 20px;
        }

        .documentation h2 {
            font-size: 10vw;
        }

        .container-logo {
            padding-top: 80px;
            transform: scale(0.8);
        }

        .ready-judul {
            font-size: 40px;
        }

        .btn-join {
            padding: 5px 50px;
            font-size: 24px;
        }

        .doc-container {
            top: 3rem;
        }

        .bg-documentation {
            background-size: 425px auto;
        }

        .holder {
            top: -1rem;
            margin: 0 10px;
        }

        .image-overlap {
            display: grid;
            grid-template-rows: 1fr 1fr 5fr;
            max-height: 890px;
        }

        .splide {
            max-width: 300px;
            height: auto;
        }
    }

    @media(max-width: 768px) {
        .documentation .docum-container {
            max-width: 550px;
            top: 170px;
            margin: 0 auto;
        }

        .doc-judul {
            top: 150px;
        }

        .documentation h2 {
            font-size: 8vw;
        }

        .splide {
            max-width: 500px;
            height: auto;
        }
    }
</style>


{{-- aos --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration:1000,
        });
    });
</script>
{{-- Swiper --}}
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
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

    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#image-carousel').mount();
    });
</script>
