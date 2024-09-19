<footer id="footer" class="position-relative overflow-hidden">
    <div class="position-relative layer1">
        <div class="posititon-absolute layer2">
            <div class="position-absolute" style="z-index: 0;">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
                <img src="{{ url('/storage/assets/sparks1.svg') }}" alt="" width="600">
            </div>
            <div class="d-flex justify-content-center align-items-center position-relative "
                style="padding-top: 2rem; padding-bottom: 4rem; ">
                <div class="container">
                    <div class="row">
                        <div class="d-flex d-md-none gap-4 align-items-end justify-content-center my-3">
                            <div>
                                <img src="/storage/logo/BNEC/White.png" alt="" class="img-fluid" width="120">
                            </div>
                            <div>
                                <a class="navbar-brand" href="{{ route('home') }}">
                                    <img src="/storage/logo/NEO-FULL/Colored.png" alt="NEO" width="120"
                                        class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5 col-12 text-center text-lg-start my-3 d-flex flex-column justify-content-between gap-3" style="color: white;">
                            <div>
                                <h4 class="glacialBold mb-3">Our Social Media</h4>
                                <p><i class="bi bi-envelope-fill me-2 fa-lg"></i>neo.bnec@gmail.com</p>
                                <p><i class="bi bi-instagram me-2 fa-lg"></i>@bnec.neo</p>
                                <p><i class="bi bi-youtube me-2 fa-lg"></i>NEO 2023</p>
                                <p><i class="bi bi-line me-2 fa-lg"></i>@816tzkes</p>
                                <img src="/storage/app/public/assets/bnec-logo-white 1.png" alt="">
                            </div>
                            <div class="d-md-block d-none">
                                <img src="/storage/logo/BNEC/White.png" alt="" class="img-fluid" width="250">
                            </div>
                        </div>
                        <div class="col-md-7 col-12 text-center text-lg-start my-3 d-flex flex-column justify-content-between gap-3">
                            <div>
                                <h4 class="glacialBold mb-3" style="color:white">Request Invitation Letter</h4>
                                <button class="btn btn-primary text-white" style="font-family: Buffalo-Inline;border-radius: 0 !important" data-bs-toggle="modal" data-bs-target="#showRequestLetter">Click
                                    Here</button>
                            </div>
                            <div class="d-md-block d-none">
                                <a class="navbar-brand" href="{{ route('home') }}">
                                    <img src="/storage/logo/NEO-FULL/Colored.png" alt="NEO" width="200"
                                        class="img-fluid">
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="position-absolute bottom-0 end-0 d-none d-lg-block">
                        <img src="/storage/assets/rome.png" alt="" width="400">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="text-center text-light py-2" style="background-color: rgba(139, 0, 0, 1); z-index:5;">
        <small>
            <b>
                <i class="bi bi-c-circle me-1"></i> 2023 BINUS English Club | This website is designed and built with
                love by Information and Technology Division</b>
        </small>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="showRequestLetter" tabindex="-1" aria-labelledby="showRequestLetterLabel"
        aria-hidden="true">
        <div class="modal-dialog-centered modal-dialog">
            <div class="modal-content">
                <div class="pt-3">
                    <h1 class="fs-5 text-center" id="showRequestLetterLabel" style="font-family: Glacial-Bold">Request Invitation Letter</h1>
                    <hr>
                </div>
                <div class="modal-body px-4">
                    <form action="{{ route('request-invitations.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-4">
                            <label for="name" class="form-label">Institution</label>
                            <input type="text" class="form-control" name="institution">
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-outline-primary col-12" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary col-12">Send</button>
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    .glacialBold {
        font-family: Glacial-Bold;
    }

    .buffaloText {
        font-family: Buffalo-Grunge;
    }

    .registerbtn {
        background-color: #D64C25;
        border-radius: 0;
    }

    .layer1 {
        background-color: transparent;
        /* Set the background color to transparent */
        background: linear-gradient(360deg, rgba(139, 0, 0, 1) 3%, rgba(0, 0, 0, 1) 19%, rgba(0, 0, 0, 1) 88%, rgba(139, 0, 0, 1) 96%);
    }
</style>
