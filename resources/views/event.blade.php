<x-app title="Events">
    <x-slot name="navbar"></x-slot>

    <header style="background: ">
        <div class="invisible py-3">padding header</div>
        <div class="container p-5">
            <div class="p-3"
                style="border-style:solid; border-width: 5px; border-color: rgba(244, 87, 42, 1); border-radius: 20px; height: 60vh; background-image: url('{{ Storage::url('pheonix.png') }}')">
            </div>

            <h1 class="ourEvents text-center fw-bold pt-5 mt-5 text-light">OUR EVENTS</h1>
            <div class="d-flex justify-content-center">
                <img src="/storage/symbol.png" alt="symbol">
            </div>

            <div class="building1 p-0 m-0 text-center">
                <h1 class="eventTitle text-light fw-bold">WEBINAR</h1>
                <div class="eventDetailsDiv">
                    <div class="eventDetails text-light text-start">
                        <p class="fs-5 text-wrap fw-semibold">Mapping Your Path to Freshman Year Success: A Blueprint
                            for Setting the Stage</p>
                        <p class="fs-5">Event Details</p>
                        <p class="fs-5">Place: BINUS @Alam Sutera</p>
                        <p class="fs-5">Day/Date: Saturday, November 18, 2023</p>
                        <p class="fs-5">Time: 13:20 - 15:30 WIB</p>
                        <div class="d-flex justify-content-center">
                            <a href="" class="registerBtn w-75 mt-2">Register</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="/storage/logo/NEO-FULL/White.png" alt="neo" class="eventPoster">
                    </div>
                </div>
            </div>

            <div class="building1 p-0 m-0 text-center">
                <h1 class="eventTitle text-light fw-bold">WORKSHOP</h1>
                <div class="eventDetailsDiv">
                    <div class="eventDetails text-light text-start">
                        <p class="fs-5 text-wrap fw-semibold">AI in daily life, How to implement good AI in everyday
                            life to make our lives easier</p>
                        <p class="fs-5">Event Details</p>
                        <p class="fs-5">Place: BINUS @Alam Sutera</p>
                        <p class="fs-5">Day/Date: Saturday, November 25, 2023</p>
                        <p class="fs-5">Time: 13:20 - 16:00 WIB</p>
                        <div class="d-flex justify-content-center">
                            <a href="" class="registerBtn w-75 mt-2">Register</a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="/storage/logo/NEO-FULL/White.png" alt="neo" class="eventPoster">
                    </div>
                </div>
            </div>

            {{-- <div class="p-0 m-0 text-center" style="background-image: url('{{ Storage::url("building1.png") }}'); background-size: 100%; height: 130vh; background-repeat: no-repeat;">
                  <h1 class="text-light fw-bold" style="padding-top: 35vh; font-size: 4rem;">WORKSHOP</h1>
                  <div class="d-flex justify-content-evenly w-100 ps-3 pe-5" style="margin-top: 8vh;">
                      <div class="text-light text-start" style="width: 25vw">
                          <p class="fs-5 text-wrap fw-semibold">AI in daily life, How to implement good AI in everyday life to make our lives easier</p>
                          <p class="fs-5">Event Details</p>
                          <p class="fs-5">Place: BINUS @Alam Sutera</p>
                          <p class="fs-5">Day/Date: Saturday, November 25, 2023</p>
                          <p class="fs-5">Time: 13:20 - 16:00 WIB</p>
                          <div class="d-flex justify-content-center">
                              <a href="" class="registerBtn w-75 mt-2">Register</a>
                          </div>
                      </div>
  
                      <img src="/storage/logo/NEO-FULL/White.png" alt="neo" style="width: 20vw; height: 40vh">
                  </div> --}}
        </div>

        </div>
    </header>
</x-app>

<style>
    // Custom Button
    .registerBtn {
        color: white;
        font-weight: bold;
        padding-top: 0;
        padding-bottom: 0;
        text-decoration: none;
        background-color: rgba(244, 87, 42, 1);
        text-align: center;
        font-size: 1.5rem;
    }

    .registerBtn:hover {
        background-color: white;
        color: rgba(244, 87, 42, 1);
    }

    //Breakpoints

    @include media-breakpoint-only(xs) {
        .ourEvents {
            font-size: 2.5rem;
        }

        .building1 {
            background-image: none;
            background-color: black;
        }

        .eventTitle {
            margin-top: 8vh;
            font-size: 2rem;
        }

        .eventDetailsDiv {
            margin-top: 3vh;
        }

        .eventPoster {
            width: 45vw;
            height: 60vh;
            margin-top: 10vh;
        }

        .registerBtn:active {
            background-color: white;
            color: rgba(244, 87, 42, 1);
        }
    }

    @include media-breakpoint-only(sm) {
        .eventTitle {
            margin-top: 8vh;
        }

        .eventPoster {
            width: 40vw;
            height: 50vh;
        }
    }

    @include media-breakpoint-only(md) {
        .ourEvents {
            font-size: 3rem;
        }

        .eventTitle {
            padding-top: 8vh;
            font-size: 3rem;
        }

        .eventDetailsDiv {
            padding-left: 10vw;
            padding-right: 10vw;
        }

        .eventPoster {
            margin-top: 15vh;
            width: 40vw;
            height: 50vh;
        }
    }

    @include media-breakpoint-only(lg) {
        .ourEvents {
            font-size: 3rem;
        }

        .building1 {
            background-image: url("/storage/app/public/building1.png");
            background-size: 100%;
            height: 130vh;
            background-repeat: no-repeat;
        }

        .eventTitle {
            padding-top: 25vh;
            font-size: 3rem;
        }

        .eventDetailsDiv {
            display: flex;
            justify-content: space-evenly;
            width: 75vw;
            margin-top: 8vh;
            padding-left: 10vw;
            padding-right: 10vw;
        }

        .eventPoster {
            width: 20vw;
            height: 30vh;
        }
    }

    @include media-breakpoint-only(xl) {
        .ourEvents {
            font-size: 4rem;
        }

        .building1 {
            background-image: url("/storage/app/public/building1.png");
            background-size: 100%;
            height: 130vh;
            background-repeat: no-repeat;
            // background-color: white;
        }

        .eventTitle {
            padding-top: 35vh;
            font-size: 4rem;
        }

        .eventDetailsDiv {
            display: flex;
            justify-content: space-evenly;
            width: 75vw;
            margin-top: 8vh;
            padding-left: 10vw;
            padding-right: 15vw;
            padding-top: 5vh;
        }

        .eventPoster {
            width: 20vw;
            height: 40vh;
        }
    }
</style>
