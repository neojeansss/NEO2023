<x-app title="Dashboard">
    <x-slot name="navbarParticipant"></x-slot>
    <div class="p-3"></div>
    <div class="container" style="min-height: 100vh;">
        <div class="row">
            <div class="col-12 p-0">
                <p class="fs-4 mt-5 text-center" style="font-family: Buffalo-Inline;">Welcome Aboard, Soldier!</p>
                <div class="row align-items-stretch">
                    <div class="card-name p-4 col-lg-7 col-12 d-none d-lg-flex align-items-center rounded-start-3"
                        style="background: linear-gradient(180deg, #100702 0%, #570301 52.26%, #900 100%);color:white;">
                        <div class="biodata d-flex justify-content-start align-items-center">
                            <img src="/storage/images/competitions/{{ $qualification->registrationDetail->competition->logo }}"
                                alt="competition logo" style="width:90px" id="comp">
                            <div class="biodata-details ps-2 ps-sm-4">
                                <span class="fs-3 fw-bold">{{ Auth::guard('participant')->user()->name }}</span>
                                <br>
                                <span>{{ Auth::guard('participant')->user()->institution }} |
                                    {{ $qualification->registrationDetail->competition->name }}</span>
                                <br>
                                {{-- if debate then show team name --}}
                                @if (isset($qualification->registrationDetail->debateTeam))
                                    <span>{{ $qualification->registrationDetail->debateTeam->team_name }}</span>
                                @endif
                                <p>{{ Auth::guard('participant')->user()->email }}</p>

                            </div>
                        </div>
                    </div>
                    @foreach ($environment as $env)
                        @if ($qualification->rank == 1)
                            @if (str_contains($env->name, 'Preliminary'))
                                <div class="card-name p-4 col-lg-5 col-12 mt-0 mt-lg-0 mt-4 d-none d-lg-flex align-items-center rounded-end-3"
                                    style="background: #FFEDE0;">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="/storage/assets/submission.svg" alt="submit" style="width:90px"
                                            id="sub">
                                        <div class="biodata-details ps-2 ps-sm-4">
                                            @if ($qualification->registrationDetail->competition->name == 'Debate')
                                                <h5 class="fw-bold">Hello Debaters, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @else
                                                <span class="fs-4 fw-bold">{{ $env->name }}</span>
                                                <br>
                                                <span>Due date: {{ date('F j, Y', strtotime($env->end_time)) }}
                                                    @if (isset($qualification->submission))
                                                        @if ($qualification->submission->is_submit == true)
                                                            <span
                                                                class="badge text-bg-secondary bg-success">Submitted</span>
                                                        @endif
                                                    @endif
                                                </span>
                                            @endif
                                            <br>
                                            @if (isset($qualification->registrationDetail->debateTeam))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}" method="POST"
                                                            enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="debateTeam"
                                                                value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif --}}
                                            @elseif(isset($qualification->registrationDetail->participants[0]))
                                                @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}" method="POST"
                                                            enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()"
                                                                class="btn btn-primary"><i class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>

                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @else
                                                    <form action="{{ route('submissions.store') }}" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="d-flex align-items-center mt-3 gap-2">
                                                        @csrf
                                                        <input type="file" name="file" value=""
                                                            class="form-control" style="width:80%" required>
                                                        <input type="hidden" name="qualification_id"
                                                            value="{{ $qualification->id }}">
                                                        <input type="hidden" name="round"
                                                            value="{{ $qualification->rank }}">
                                                        <input type="hidden" name="participant"
                                                            value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                        <input type="hidden" name="competition_name"
                                                            value="{{ $qualification->registrationDetail->competition->name }}">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-upload"></i>
                                                        </button>
                                                    </form>
                                                    <div>

                                                    </div>

                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Requirement" class="btn btn-primary mt-3"><i
                                                            class="bi bi-info-circle-fill"></i>
                                                        Requirements</button>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($qualification->rank == 3)
                            @if (str_contains($env->name, 'Semi Final'))
                                <div class="card-name p-4 col-lg-5 col-12 mt-0 mt-lg-0 mt-4 d-none d-lg-flex align-items-center rounded-end-3"
                                    style="background: #FFEDE0;">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="/storage/assets/submission.svg" alt="submit" style="width:90px"
                                            id="sub">
                                        <div class="biodata-details ps-2 ps-sm-4">
                                            @if ($qualification->registrationDetail->competition->name == 'Debate')
                                                <h5 class="fw-bold">Hello Debaters, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @elseif($qualification->registrationDetail->competition->name != 'Speech')
                                                <h5 class="fw-bold">Hello Soldiers, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @else
                                                <span class="fs-4 fw-bold">{{ $env->name }}</span>
                                                <br>
                                                <span>Due date: {{ date('F j, Y', strtotime($env->end_time)) }}
                                                    @if (isset($qualification->submission))
                                                        @if ($qualification->submission->is_submit == true)
                                                            <span
                                                                class="badge text-bg-secondary bg-success">Submitted</span>
                                                        @endif
                                                    @endif
                                                </span>
                                            @endif
                                            <br>
                                            @if (isset($qualification->registrationDetail->debateTeam))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="debateTeam"
                                                                value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif --}}
                                            @elseif(isset($qualification->registrationDetail->participants[0]))
                                                @if (isset($qualification->submission) && $qualification->registrationDetail->competition->name == 'Speech')
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()"
                                                                class="btn btn-primary"><i class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>

                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @else
                                                    @if ($qualification->registrationDetail->competition->name == 'Speech')
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()"
                                                                class="btn btn-primary"><i class="bi bi-upload"></i>
                                                            </button>
                                                        </form>

                                                        <div>

                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($qualification->rank == 4)
                            @if (str_contains($env->name, 'Grand Final'))
                                <div class="card-name p-4 col-lg-5 col-12 mt-0 mt-lg-0 mt-4 d-none d-lg-flex align-items-center rounded-end-3"
                                    style="background: #FFEDE0;">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="/storage/assets/submission.svg" alt="submit" style="width:90px"
                                            id="sub">
                                        <div class="biodata-details ps-2 ps-sm-4">
                                            @if ($qualification->registrationDetail->competition->name == 'Debate')
                                                <h5 class="fw-bold">Hello Debaters, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @else
                                                <h5 class="fw-bold">Hello Soldiers, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                                {{-- <span class="fs-4 fw-bold">{{ $env->name }}</span>
                                            <br>
                                            <span>Due date: {{ date('F j, Y', strtotime($env->end_time)) }}
                                                @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == true)
                                                        <span
                                                            class="badge text-bg-secondary bg-success">Submitted</span>
                                                    @endif
                                                @endif
                                            </span> --}}
                                            @endif
                                            <br>
                                            @if (isset($qualification->registrationDetail->debateTeam))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="debateTeam"
                                                                value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif --}}
                                            @elseif(isset($qualification->registrationDetail->participants[0]))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @else
                                                    <form action="{{ route('submissions.store') }}" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="d-flex align-items-center mt-3 gap-2">
                                                        @csrf
                                                        <input type="file" name="file" value=""
                                                            class="form-control" style="width:80%" required>
                                                        <input type="hidden" name="qualification_id"
                                                            value="{{ $qualification->id }}">
                                                        <input type="hidden" name="round"
                                                            value="{{ $qualification->rank }}">
                                                        <input type="hidden" name="participant"
                                                            value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                        <input type="hidden" name="competition_name"
                                                            value="{{ $qualification->registrationDetail->competition->name }}">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-upload"></i>
                                                        </button>
                                                    </form>
                                                    <div>
                                                        
                                                    </div>

                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Requirement" class="btn btn-primary mt-3"><i
                                                            class="bi bi-info-circle-fill"></i>
                                                        Requirements</button>
                                                @endif --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <div class="row align-items-stretch">
                    <div class="card-name p-4 col-lg-7 col-12 d-lg-none d-flex align-items-center rounded-3"
                        style="background: linear-gradient(180deg, #100702 0%, #570301 52.26%, #900 100%);color:white;">
                        <div class="biodata d-flex justify-content-start align-items-center">
                            <img src="/storage/images/competitions/{{ $qualification->registrationDetail->competition->logo }}"
                                alt="competition logo" style="width:90px" id="comp">
                            <div class="biodata-details ps-2 ps-sm-4">
                                <span class="fs-3 fw-bold">{{ Auth::guard('participant')->user()->name }}</span>
                                <br>
                                <span>{{ Auth::guard('participant')->user()->institution }} |
                                    {{ $qualification->registrationDetail->competition->name }}</span>
                                <br>
                                {{-- if debate then show team name --}}
                                @if (isset($qualification->registrationDetail->debateTeam))
                                    <span>{{ $qualification->registrationDetail->debateTeam->team_name }}</span>
                                @endif
                                <p>{{ Auth::guard('participant')->user()->email }}</p>
                            </div>
                        </div>
                    </div>
                    @foreach ($environment as $env)
                        @if ($qualification->rank == 1)
                            @if (str_contains($env->name, 'Preliminary'))
                                <div class="card-name p-4 col-lg-5 col-12 mt-0 mt-lg-0 mt-4 d-lg-none d-flex align-items-center rounded-3"
                                    style="background: #FFEDE0;">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="/storage/assets/submission.svg" alt="submit" style="width:90px"
                                            id="sub">
                                        <div class="biodata-details ps-2 ps-sm-4">
                                            @if ($qualification->registrationDetail->competition->name == 'Debate')
                                                <h5 class="fw-bold">Hello Debaters, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @else
                                                <span class="fs-4 fw-bold">{{ $env->name }}</span>
                                                <br>
                                                <span>Due date: {{ date('F j, Y', strtotime($env->end_time)) }}
                                                    @if (isset($qualification->submission))
                                                        @if ($qualification->submission->is_submit == true)
                                                            <span
                                                                class="badge text-bg-secondary bg-success">Submitted</span>
                                                        @endif
                                                    @endif
                                                </span>
                                            @endif
                                            </span>
                                            <br>
                                            @if (isset($qualification->registrationDetail->debateTeam))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="debateTeam"
                                                                value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif --}}
                                            @elseif(isset($qualification->registrationDetail->participants[0]))
                                                @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()"
                                                                class="btn btn-primary"><i class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>

                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @else
                                                    <form action="{{ route('submissions.store') }}" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="d-flex align-items-center mt-3 gap-2">
                                                        @csrf
                                                        <input type="file" name="file" value=""
                                                            class="form-control" style="width:80%" required>
                                                        <input type="hidden" name="qualification_id"
                                                            value="{{ $qualification->id }}">
                                                        <input type="hidden" name="round"
                                                            value="{{ $qualification->rank }}">
                                                        <input type="hidden" name="participant"
                                                            value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                        <input type="hidden" name="competition_name"
                                                            value="{{ $qualification->registrationDetail->competition->name }}">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-upload"></i>
                                                        </button>
                                                    </form>
                                                    <div>

                                                    </div>

                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Requirement" class="btn btn-primary mt-3"><i
                                                            class="bi bi-info-circle-fill"></i>
                                                        Requirements</button>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($qualification->rank == 3)
                            @if (str_contains($env->name, 'Semi Final'))
                                <div class="card-name p-4 col-lg-5 col-12 mt-0 mt-lg-0 mt-4 d-lg-none d-flex align-items-center rounded-3"
                                    style="background: #FFEDE0;">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="/storage/assets/submission.svg" alt="submit" style="width:90px"
                                            id="sub">
                                        <div class="biodata-details ps-2 ps-sm-4">
                                            @if ($qualification->registrationDetail->competition->name == 'Debate')
                                                <h5 class="fw-bold">Hello Debaters, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @elseif($qualification->registrationDetail->competition->name != 'Speech')
                                                <h5 class="fw-bold">Hello Soldiers, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @else
                                                <span class="fs-4 fw-bold">{{ $env->name }}</span>
                                                <br>
                                                <span>Due date: {{ date('F j, Y', strtotime($env->end_time)) }}
                                                    @if (isset($qualification->submission))
                                                        @if ($qualification->submission->is_submit == true)
                                                            <span
                                                                class="badge text-bg-secondary bg-success">Submitted</span>
                                                        @endif
                                                    @endif
                                                </span>
                                            @endif
                                            </span>
                                            <br>
                                            @if (isset($qualification->registrationDetail->debateTeam))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="debateTeam"
                                                                value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif --}}
                                            @elseif(isset($qualification->registrationDetail->participants[0]))
                                                @if (isset($qualification->submission) && $qualification->registrationDetail->competition->name == 'Speech')
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()"
                                                                class="btn btn-primary"><i class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>

                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @else
                                                    @if ($qualification->registrationDetail->competition->name == 'Speech')
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()"
                                                                class="btn btn-primary"><i class="bi bi-upload"></i>
                                                            </button>
                                                        </form>

                                                        <div>

                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if ($qualification->rank == 4)
                            @if (str_contains($env->name, 'Grand Final'))
                                <div class="card-name p-4 col-lg-5 col-12 mt-0 mt-lg-0 mt-4 d-lg-none d-flex align-items-center rounded-3"
                                    style="background: #FFEDE0;">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <img src="/storage/assets/submission.svg" alt="submit" style="width:90px"
                                            id="sub">
                                        <div class="biodata-details ps-2 ps-sm-4">
                                            @if ($qualification->registrationDetail->competition->name == 'Debate')
                                                <h5 class="fw-bold">Hello Debaters, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                            @else
                                                <h5 class="fw-bold">Hello Soldiers, please prepare yourselves for the
                                                    upcoming battle. Good luck!</h5>
                                                {{-- <span class="fs-4 fw-bold">{{ $env->name }}</span>
                                            <br>
                                            <span>Due date: {{ date('F j, Y', strtotime($env->end_time)) }}
                                                @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == true)
                                                        <span
                                                            class="badge text-bg-secondary bg-success">Submitted</span>
                                                    @endif
                                                @endif
                                            </span> --}}
                                            @endif
                                            </span>
                                            <br>
                                            @if (isset($qualification->registrationDetail->debateTeam))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="debateTeam"
                                                                value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @endif --}}
                                            @elseif(isset($qualification->registrationDetail->participants[0]))
                                                {{-- @if (isset($qualification->submission))
                                                    @if ($qualification->submission->is_submit == false)
                                                        <form action="{{ route('submissions.store') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            class="d-flex align-items-center mt-3 gap-2">
                                                            @csrf
                                                            <input type="file" name="file" value=""
                                                                class="form-control" style="width:80%" required>
                                                            <input type="hidden" name="qualification_id"
                                                                value="{{ $qualification->id }}">
                                                            <input type="hidden" name="round"
                                                                value="{{ $qualification->rank }}">
                                                            <input type="hidden" name="participant"
                                                                value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                            <input type="hidden" name="competition_name"
                                                                value="{{ $qualification->registrationDetail->competition->name }}">
                                                            <button onclick="confirmSubmission()" class="btn btn-primary"><i
                                                                    class="bi bi-upload"></i>
                                                            </button>
                                                        </form>
                                                        <div>
                                                            
                                                        </div>

                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#Requirement"
                                                            class="btn btn-primary mt-3"><i
                                                                class="bi bi-info-circle-fill"></i>
                                                            Requirements</button>
                                                    @endif
                                                @else
                                                    <form action="{{ route('submissions.store') }}" method="POST"
                                                        enctype="multipart/form-data"
                                                        class="d-flex align-items-center mt-3 gap-2">
                                                        @csrf
                                                        <input type="file" name="file" value=""
                                                            class="form-control" style="width:80%" required>
                                                        <input type="hidden" name="qualification_id"
                                                            value="{{ $qualification->id }}">
                                                        <input type="hidden" name="round"
                                                            value="{{ $qualification->rank }}">
                                                        <input type="hidden" name="participant"
                                                            value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                        <input type="hidden" name="competition_name"
                                                            value="{{ $qualification->registrationDetail->competition->name }}">
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="bi bi-upload"></i>
                                                        </button>
                                                    </form>
                                                    <div>
                                                        
                                                    </div>

                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Requirement" class="btn btn-primary mt-3"><i
                                                            class="bi bi-info-circle-fill"></i>
                                                        Requirements</button>
                                                @endif --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>

                <div class="row p-0">
                    <div class="col-lg-7 col-12 pe-4">
                        <div class="row p-0 mt-4 justify-content-lg-start justify-content-center">
                            <h5 class="text-center text-lg-start fw-semibold mt-2 p-0" style="height:auto">Schedule
                            </h5>
                            <hr class="schedule-line">
                            <!-- Your schedule content -->
                        </div>

                        <div class="row justify-content-center justify-content-lg-start">
                            <div class="card-schedules p-0">
                                <div class="card-body-schedule">
                                    <div class="schedules py-1">
                                        <div class="card-schedule pb-3">
                                            @foreach ($schedules as $schedule)
                                                <div class="card-body border rounded-2 p-4 text-align-start mb-4">
                                                    <h5 class="card-title fw-semibold pb-2">{{ $schedule->name }}
                                                    </h5>
                                                    <p class="card-text">
                                                        <i class="fa-solid fa-calendar"></i>&emsp13;
                                                        {{ date('F j, Y', strtotime($schedule->date)) }} <br>
                                                        <i class="fa-solid fa-clock"></i>&emsp13;
                                                        {{ date('H:i', strtotime($schedule->from)) }} -
                                                        {{ date('H:i', strtotime($schedule->to)) }} WIB <br>
                                                        <i class="fa-solid fa-location-dot"></i>&emsp13;
                                                        {{ $schedule->location }}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12">
                        <div class="row ps-3 mt-4 justify-content-lg-start justify-content-center">
                            <h5 class="text-center text-lg-start fw-semibold mt-2 p-0" style="height:auto">Upcoming
                                Event</h5>
                            <hr class="schedule-line">
                            <!-- Your schedule content -->
                        </div>
                        {{-- <img src="{{ asset('storage/images/payment_proofs/12345678901234567890_Dummy2_1703841463.png') }}"
                            alt="" class="rounded-3 img-fluid mt-1"> --}}
                        <h4><i><b>Stay Tuned!</b></i></h4>
                    </div>
                </div>

                <div class="last-title w-100 mt-4 d-flex flex-column justify-content-center align-items-center">
                    @if ($qualification->registrationDetail->competition->name == 'Speech')
                        <h5 class="card-title text-center fw-semibold mt-4" style="height:auto">Contact
                            Person</h5>
                        <hr class="schedule-line">

                        <div class="contact-details d-sm-flex">
                            <div class="detail pe-4">
                                <p><i class="fa-regular fa-user"></i>&emsp13; Neo</p>
                            </div>
                            <div class="detail pe-4">
                                <p><i class="fa-brands fa-whatsapp"></i>&emsp13; 082111991939</p>
                            </div>
                        </div>
                    @elseif($qualification->registrationDetail->competition->name == 'Storytelling')
                        <h5 class="card-title text-center fw-semibold mt-4" style="height:auto">Contact
                            Person</h5>
                        <hr class="schedule-line">

                        <div class="contact-details d-sm-flex">
                            <div class="detail pe-4">
                                <p><i class="fa-regular fa-user"></i>&emsp13; Sacyl Agnescotty</p>
                            </div>
                            <div class="detail pe-4">
                                <p><i class="fa-brands fa-whatsapp"></i>&emsp13; 081237589898</p>
                            </div>
                        </div>
                    @elseif($qualification->registrationDetail->competition->name == 'Newscasting')
                        <h5 class="card-title text-center fw-semibold mt-4" style="height:auto">Contact
                            Person</h5>
                        <hr class="schedule-line">

                        <div class="contact-details d-sm-flex">
                            <div class="detail pe-4">
                                <p><i class="fa-regular fa-user"></i>&emsp13; Suyani Alie</p>
                            </div>
                            <div class="detail pe-4">
                                <p><i class="fa-brands fa-whatsapp"></i>&emsp13; 08116393347</p>
                            </div>
                        </div>
                    @elseif($qualification->registrationDetail->competition->name == 'Debate')
                        <h5 class="card-title text-center fw-semibold mt-4" style="height:auto">Contact
                            Person</h5>
                        <hr class="schedule-line">

                        <div class="contact-details d-sm-flex">
                            <div class="detail pe-4">
                                <p><i class="fa-regular fa-user"></i>&emsp13; Bryan</p>
                            </div>
                            <div class="detail pe-4">
                                <p><i class="fa-brands fa-whatsapp"></i>&emsp13; 081337934456</p>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="Requirement" tabindex="-1" aria-labelledby="RequirementLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="RequirementLabel">Requirements Submission</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($qualification->registrationDetail->competition->name == 'Speech')
                        @if ($qualification->rank == 1)
                            Font: Times New Roman,<br>
                            Font size: 12,<br>
                            Spacing: 1.5 (line spacing),<br>
                            Format File: .doc, .docsx, or .pdf,<br>
                            Maximum file size: 10 MB,<br>
                            Paper size: A4,<br>
                            File name format: “OPEN_Full Name_Preliminary”. (e.g., OPEN_Kathleen
                            Angelina_Preliminary),<br>
                        @elseif($qualification->rank == 3)
                            Font: Times New Roman,<br>
                            Font size: 12,<br>
                            Spacing: 1.5,<br>
                            Format File: .doc, .docsx, or .pdf,<br>
                            Maximum file size: 10 MB,<br>
                            Paper size: A4,<br>
                            File name format: “OPEN_Full Name_Semi Final”. (e.g., OPEN_Kathleen Angelina_Semi
                            Final),<br>
                        @elseif($qualification->rank == 4)
                            Don't need a submission
                        @else
                            ---
                        @endif
                    @elseif($qualification->registrationDetail->competition->name == 'Storytelling')
                        @if ($qualification->rank == 1)
                            Font: Times New Roman,<br>
                            Font size: 12,<br>
                            Spacing: 1.5 (line spacing),<br>
                            Margin: Right: 3 cm; Top: 3 cm; Left: 3 cm;Bottom: 3 cm,<br>
                            Format File: Portable Document Format (pdf.),<br>
                            Maximum file size: 10 MB,<br>
                            Paper size: A4,<br>
                            File name format: Name of the Participant_University/Senior High School Name_Storytelling
                            (e.g. Janice Ebelia_Binus University_Storytelling),<br>
                        @elseif($qualification->rank == 3)
                            Don't need a submission
                        @elseif($qualification->rank == 4)
                            Don't need a submission
                        @else
                            ---
                        @endif
                    @elseif($qualification->registrationDetail->competition->name == 'Newscasting')
                        @if ($qualification->rank == 1)
                            Font: Times New Roman,<br>
                            Font size: 12,<br>
                            Spacing: 1.5 (line spacing),<br>
                            Margin: Right: 3 cm; Top: 3 cm; Left: 3 cm;Bottom: 3 cm,<br>
                            Format File: Portable Document Format (pdf.),<br>
                            Paper size: A4,<br>
                            File name format: Name of the Participant_University/Senior High School Name_ Newscasting
                            (e.g. Ryan Aurellius_BINUS University_Newscasting),<br>
                        @elseif($qualification->rank == 3)
                            Don't need a submission
                        @elseif($qualification->rank == 4)
                            Don't need a submission
                        @else
                            ---
                        @endif
                    @elseif($qualification->registrationDetail->competition->name == 'Debate')
                        Don't need a submission
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .schedule-line {
            border-top: 3px solid #FF5A01;
            width: 160px;
        }

        /* @media screen and (max-width: 445px) {

            #comp,
            #sub {
                display: none;
            }
        } */
    </style>


    <script>
        function confirmSubmission() {
            // Display a confirmation dialog
            var isConfirmed = window.confirm("Are you sure you want to submit this file? Please recheck the submission requirements! (Only 1 attempt allowed)");

            // If the user clicks "OK", submit the form
            if (isConfirmed) {
                document.getElementById("submissionForm").submit();
            }
        }
    </script>
</x-app>
