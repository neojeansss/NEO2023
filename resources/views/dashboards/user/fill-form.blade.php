<x-app title="Participant Registration | Fill Form">
    <x-slot name="navbarUser"></x-slot>

    <form id="registrationForm" class="needs-validation" method="POST" action="{{route('registrations.store')}}" x-data="emailValidation">
        @csrf
        <div class="container py-5">
            {{-- <div class="row mb-3">
                <div class="col-12 pt-3">
                    <div class="text-center fw-bold fs-3 glacial pt-3">
                        Participant Registration
                    </div>
                </div>
            </div> --}}

            <p class="m-0 fs-4 fw-bold mt-5">Fill in the form</p>
            <small class="fst-italic text-danger glacialReg">* one participant can only register for one competition</small>

            <div class="row py-3">
                @if (isset($email_double))
                <div class="col-12 card border-0" id="check_speaker" style="display: none">
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-circle-fill"></i> {{ $email_double }}
                    </div>
                </div>
                @endif
                <div class="col-lg-7 col-12 mb-4">

                    <section id="companionData">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <p class="fw-semibold fs-3 m-0">Companion Data</p>
                                        <small class="text-muted">If designated, we will reach out to this person if participant(s) cannot be reached.</small>
                                    </div>
                                    <div id="companion" class="mb-3">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="companion_name" value="" placeholder="Companion's Full Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="companion_phone" value="" placeholder="Companion's Phone Number">
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-flow: row; gap: 10px;">
                                        <input class="form-check-input" type="checkbox" id="nocompanion">
                                        <label class="form-check-label">
                                            I do not wish to designate a companion
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    @foreach($tickets as $ticket)
                    @for ($i = 1; $i <= $ticket->quantity; $i++)
                        <section class="debateForm" id="{{$ticket->competitionName}}-{{$i}}-form">
                            <div class="card mt-4 col-12">
                                <div class="card-body">
                                    <div class="card-body d-flex justify-content-between">
                                        <div>
                                            @if($ticket->competitionName == "Debate")
                                            <p class="fw-semibold fs-3 m-0">Team Data #{{$i}}</p>
                                            @else
                                            <p class="fw-semibold fs-3 m-0">Participant Data #{{$i}}</p>
                                            @endif
                                            <small class="text-muted">Fill in the participant data completely and correctly.</small>
                                        </div>

                                        <div>
                                            @if($ticket->competitionName == "Debate")
                                            <p class="rounded-pill px-4 py-2 text-white fw-bold" style="background: #FF965D">{{$ticket->competitionName}}</p>
                                            @elseif($ticket->competitionName == "Storytelling")
                                            <p class="rounded-pill px-4 py-2 text-white fw-bold" style="background: #1FBC4B">{{$ticket->competitionName}}</p>
                                            @elseif($ticket->competitionName == "Speech")
                                            <p class="rounded-pill px-4 py-2 text-white fw-bold" style="background: #FF5D5D">{{$ticket->competitionName}}</p>
                                            @elseif($ticket->competitionName == "Newscasting")
                                            <p class="rounded-pill px-4 py-2 text-white fw-bold" style="background: #5D94FF">{{$ticket->competitionName}}</p>
                                            @endif
                                        </div>

                                    </div>
                                    @if($ticket->competitionName == 'Debate')
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label class="form-label">Team Name</label>
                                            <input type="text" class="form-control" name="debate_team_name[{{ $i }}]" value="" placeholder="Debate Team Name">
                                        </div>
                                        <ul class="nav nav-tabs" style="border-block-end:1px solid #fe7124 !important;">
                                            <li class="nav-item col-6">
                                                <a class="nav-link text-center active" data-toggle="tab" href="#Debate-{{$i}}-speaker1">Speaker 1</a>
                                            </li>
                                            <li class="nav-item col-6">
                                                <a class="nav-link text-center" data-toggle="tab" href="#Debate-{{$i}}-speaker2">Speaker 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="Debate-{{$i}}-speaker1">
                                            <div class="mb-3">
                                                <x-user.participant-details-input prefix="Debate-{{$i}}-1" />
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="Debate-{{$i}}-speaker2">
                                            <div class="mb-3">
                                                <x-user.participant-details-input prefix="Debate-{{$i}}-2" />
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="mb-3">
                                        <x-user.participant-details-input prefix="{{$ticket->competitionName}}-{{$i}}" />
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </section>
                        @endfor
                        @endforeach
                </div>
                <section id="priceSummary" class="col-lg-5 col-12">
                    <div class="card sticky-top" style="top: 5rem;">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="mb-3">
                                    <p class="fw-semibold fs-3 m-0">Price Summary</p>
                                    <small class="text-muted">Kindly review the details filled in before submitting.</small>
                                </div>

                                {{-- @dd(json_encode($tickets[1])) --}}
                                <div class="data-hidden">
                                    <input type="hidden" value="{{ json_encode($tickets) }}" name="tickets">
                                    <input type="hidden" value="{{ $totalPrice }}" name="totalPrice">
                                </div>
                                <table class="table table-borderless m-0">
                                    <tbody>
                                        @foreach($tickets as $ticket)
                                        <tr>
                                            <td class="text-truncate col-7 p-0">
                                                <p class="my-1 fw-bold">{{$ticket->competitionName}} x{{$ticket->quantity}}</p>
                                            </td>
                                            <td class="text-end" x-text="idrFormat.format({{$ticket->quantity * $ticket->unitPrice}})">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <hr>

                                <table class="table table-borderless m-0 mb-3">
                                    <tbody>
                                        <tr>
                                            <td class="text-truncate col-7 p-0">
                                                <p class="my-1 fw-bold fs-5">Total Price</p>
                                            </td>
                                            <td class="text-end fw-bold fs-5" x-text="idrFormat.format({{$totalPrice}})">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="form-check">
                                    <input id="agreeTnC" class="form-check-input" type="checkbox" required>
                                    <label class="form-check-label">
                                        <p>
                                            I have read and agreed to the <a href="" target="_blank">Terms and Conditions</a>
                                        </p>
                                    </label>
                                </div>
                                <button id="confirmBtn" type="submit" class="btn btn-primary py-2 w-100">
                                    Confirm
                                </button>
                                @foreach($tickets as $ticket)
                                @if($ticket->competitionName === 'Debate')
                                <div class="alert alert-danger my-3" role="alert">
                                    <i class="bi bi-exclamation-circle-fill"></i> {{ __('Hello Registrants! For Debate, please make sure details for both Speaker 1 and Speaker 2 have been filled out before submitting. Thank you!') }}
                                </div>
                                @endif
                                @endforeach
                            </div>

                        </div>
                    </div>
                </section>
            </div>

        </div>
    </form>

    <script>
        const idrFormat = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    </script>

    <script>
        // Add an event listener to each dropdown item
        $('.dropdown-item').on('click', function() {
            // Get the text content of the selected item
            var selectedText = $(this).text();
            // Set the button text to the selected text
            $('#selectedProvince').text(selectedText);
        });

        $('#nocompanion').on('click', function() {
            if ($(this).is(':checked')) {
                $('#companion .form-control').prop('disabled', true)
                $("input[name='nocompanion']").val(1)
            } else {
                $('#companion .form-control').prop('disabled', false)
                $("input[name='nocompanion']").val(0)
            }
        })
    </script>


    <script>
        
        document.addEventListener('alpine:init', (e) => {
            Alpine.data('emailValidation', () => ({
                // { prefix: string }
                emailAddresses: {},
                // { prefix: boolean }
                emailAddressesTaken: {},

                emailAddressIsTaken: function(prefix) {
                    return this.emailAddressesTaken[prefix]
                },
                emailAddressIsDuplicate: function(prefix) {
                    return Object.values(this.emailAddresses).filter((e) => e == this.emailAddresses[prefix]).length > 1
                },
                refetchEmailStatus: function(prefix, value) {
                    if (value == undefined || value == "") {
                        return
                    }
                    const axios = window.axios
                    const url = new URL("{{route('registrations.emailIsTaken')}}")
                    url.searchParams.append("emailAddress", value)
                    axios.get(url)
                        .then(res => res.data["valid"])
                        .then(value => {
                            this.emailAddressesTaken[prefix] = value
                        })
                        .catch(err => console.log(err))
                },
                emailsUniqueWithinForm: function() {
                    return Object.keys(
                        Object.values(this.emailAddresses)
                        .reduce((obj, e) => {
                            obj[e] = true
                            return obj
                        }, {})).length == Object.keys(this.emailAddresses).length
                },
                emailsUniqueWithServer: function () {
                    return Object.values(this.emailAddressesTaken).every((e) => e == false)
                },
                allEmailsValid: function() {
                    return this.emailsUniqueWithinForm() && this.emailsUniqueWithServer()
                },
                setEmailAddress: function(prefix, val) {
                    this.emailAddresses[prefix] = val
                    this.refetchEmailStatus(prefix, val)
                },
                init: function() {
                    this.$watch('emailAddressesTaken', () => {
                        $('#confirmBtn').prop('disabled', !this.allEmailsValid())
                    })
                    this.$watch('emailAddresses', () => {
                        $('#confirmBtn').prop('disabled', !this.allEmailsValid())
                    })
                }
            }))
        })
    </script>

</x-app>

<style>
    .dropdown-menu {
        background-color: white;
    }

    .indicatorSize {
        transform: scale(0.7);
        max-width: 100%;
        height: auto;
    }

    .glacialBold {
        font-family: Glacial-Bold;
    }

    .glacialReg {
        font-family: Glacial-Regular;
    }

    a.nav-link.active {
        color: white !important;
        background: #fe7124 !important;
        border-block-end: 1px solid #fe7124 !important;
    }

    a.nav-link {
        color: black !important;
    }
</style>