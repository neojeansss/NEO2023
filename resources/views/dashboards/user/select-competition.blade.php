
<x-app title="Participant Registration | Select Competition">
      <x-slot name="navbarUser"></x-slot>
  
      <div x-data="registration" x-cloak>
          <form method="POST" action="{{ route('registrations.create') }}">
              @csrf
              
              <div class="container py-5">
  
                  {{-- <div class="row mb-3">
                      <div class="col-12 pt-3">
                          <div class="text-center fw-bold fs-3 glacial pt-3">
                              Participant Registration
                          </div>
                      </div>
                  </div> --}}
                  {{-- text-center text-lg-start --}}
                  @if($isEarlyBirdOngoing == true)
                  <div class="alert mt-5 text-white text-center pt-3" role="alert" style="background: #ffdfce;">
                      <p class="m-0" style="font-family: Glacial-Bold;color:#FF5A01;"><i class="bi bi-bell-fill"></i> DISCOUNT WEEK <i class="bi bi-bell-fill"></i></p>
                      <p class="m-0 fw-regular" style="color:#FF5A01;">{{ date('F j', strtotime($environment_early->start_time)) }}, 2023 -
                          {{ date('F j', strtotime($environment_early->end_time)) }}, 2023</p>
                  </div>
                  @else
                      <div class="invisible py-3">Padding</div>
                  @endif
                  {{-- <div class="text-center pt-5 pb-4">
                      <div class="bg-danger p-5 text-center text-white">
                          Banner early bird
                      </div>
                  </div> --}}
  
                  <p class="m-0 fs-4 fw-bold">Please select the competition</p>
                  {{-- <p style="font-family: Bufalo-Inline">NEO 2023</p> --}}
                  <small class="fst-italic text-danger glacialReg">* can register more than 1 competition</small>
  
                  <div class="row py-3">
                      @foreach ($competitions as $competition)
                          <div class="col-md-6 mb-4 col-lg-3 col-sm-12 mx-auto">
                              <div class="card">
                                  <div class="d-flex flex-column justify-content-center text-center p-4">
                                      <img src="/storage/images/competitions/{{ $competition->logo }}" alt="sdsds" class="img-fluid w-75 m-auto">
                                      <div class="card-body">
                                          <h5 class="card-title glacialBold mb-3">
                                              {{ $competition->name }}
                                          </h5>
                                          <h6 class="card-subtitle">
                                              <p
                                              x-show="getCompetition('{{ $competition->name }}').availableTickets === 0">
                                              Tickets sold out
                                              </p>
                                              @if($isEarlyBirdOngoing)
                                              <div>
                                                  <p class="m-2" style="text-decoration: line-through;color:rgb(145, 145, 145)" x-show="getCompetition('{{ $competition->name }}').availableTickets > 0"
                                                      x-text="idrFormat.format(getCompetition('{{ $competition->name }}').price + 100000)">
                                                  </p>
                                              </div>
                                              @endif
                                              <div>
                                                  <p class="fw-bold fs-5" x-show="getCompetition('{{ $competition->name }}').availableTickets > 0"
                                                      x-text="idrFormat.format(getCompetition('{{ $competition->name }}').price)">
                                                  </p>
                                              </div>
                                              
                                              {{-- @if ($competition->total_quota - $competition->normal_registrations_count < 1)
                                                  <span> Tickets sold out </span>
                                                  @elseif ($isEarlyBirdOngoing && $competition->early_quota - $competition->early_registrations_count > 0)
                                                  Rp {{ number_format($competition->early_price, 0, '.', '.') }}
                                                  @else
                                                  Rp {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                  @endif --}}
                                              </h6>
                                          <p class="card-text py-4">
                                              {{ $competition->content }}
                                          </p>
                                          @if (
                                              ($isEarlyBirdOngoing && $competition->total_quota - $competition->early_registrations_count > 0) ||
                                                  $competition->total_quota - $competition->normal_registrations_count - $competition->early_registrations_count > 0)
                                              <button type="button" class="btn btn-orange text-white px-5"
                                              x-show="{{ $competition->name }}Tickets < 1"
                                              @click="{{ $competition->name }}Tickets = 1">
                                              Select
                                              </button>
                                              {{-- <p>{{ $competition->early_registrations_count }} {{ $competition->normal_registrations_count }} {{ $competition->total_quota - $competition->normal_registrations_count - $competition->early_registrations_count }}</p> --}}
                                              <div class="row" x-show="{{ $competition->name }}Tickets > 0">
                                                  <button type="button" class="col-2 py-0 m-0 btn btn-orange text-white"
                                                      @click="setTickets('{{ $competition->name }}', {{ $competition->name }}Tickets - 1)">
                                                      -
                                                  </button>
                                                  <div class="col px-2">
                                                      <input class="form-control d-flex justify-content-center text-center" step="1"
                                                      name="{{ $competition->name }}" type="number"
                                                      :value="{{ $competition->name }}Tickets"
                                                      @change="(e) => setTickets('{{ $competition->name }}', parseInt(e.target.value))" />
                                                  </div>
                                                  
                                                  <button type="button" class="col-2 py-0 m-0 btn btn-orange text-white"
                                                      x-show="{{ $competition->name }}Tickets < getCompetition('{{ $competition->name }}').availableTickets"
                                                      @click="setTickets('{{ $competition->name }}', {{ $competition->name }}Tickets + 1)">
                                                      +
                                              </button>
                                              </div>
                                          @else
                                          <button type="button" class="btn btn-secondary text-white px-5">
                                          Sold Out
                                          </button>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>
                  @if($bannerAccomodation == true)
                  <div class="text-center" style="padding-block-end: 100px">
                      <div class="position-relative d-flex px-5 py-0 m-0 rounded-2" style="background: linear-gradient(273deg, #FA6B03 -35.72%, #2E2622 105.4%);">
                          {{-- content --}}
                          <div class="d-lg-flex d-sm-none d-none align-items-center mb-4 position-relative z-2">
                              <img src="/storage/logo/NEO-FULL/Colored.png" class="img-fluid" alt="" style="height: 200px;object-fit: contain">
                          </div>
                          <div class="d-flex justify-content-center flex-column gap-3 ms-lg-5 ms-sm-0 ms-0 me-lg-4 me-sm-0 me-0 my-4 py-2 position-relative z-2">
                              <div class="text-white d-flex gap-2 align-items-center" style="height: 16px">
                                  <img src="/storage/assets/alert.svg" alt="" class="img-fluid h-100">
                                  <p class="m-0" style="font-family: Glacial-Bold">Accomodation Alert</p>
                                  <img src="/storage/assets/alert.svg" alt="" class="img-fluid h-100">
                              </div>
                              <div class="text-white text-start" style="font-family: Buffalo-Inline">
                                  <p class="m-0 fs-2" style="line-height: 26px">Join the NEO 2023 revolution and conquer your stay with us!</p>
                              </div>
                              <div class="text-white text-start">
                                  Experience the <span style="font-family:Glacial-Bold;text-decoration-line: underline;">onsite</span> event and guarantee your success by <span style="font-family:Glacial-Bold;">booking premium accommodation.</span>
                              </div>
                              <div class="text-white text-start">
                                  <a class="btn fw-semibold text-white button-accomodation" target="_blank" href="https://wa.link/2pxznq" style="font-size: 14px;padding: 6px 32px 6px 32px;">+62 811-7608-204 <span style="font-weight: 300 !important;">(Xavier)</span></a>
                              </div>
                              
                          </div>
                          <div class="d-lg-flex d-sm-none d-none align-items-end position-relative z-2">
                              <img src="/storage/assets/hotel.svg" alt="" class="img-fluid" style="height: 90%">
                          </div>
                          {{-- background --}}
                          <div class="position-absolute z-1">
                              <img src="/storage/assets/circle.svg" alt="" class="img-fluid" style="opacity: 60%">
                          </div>
                      </div>
                      
                  </div>
                  @endif
              </div>
              
              <section id="ticketCount">
                  <div class="fixed-bottom p-3 bg-white shadow-sm">
                      <div class="container">
                          <div class="row">
                              <div class="col my-auto d-none d-md-block">
                                  <h5 class="m-0 text-muted total-ticket-label glacialBold">
                                      <span x-text="getTotalTickets() > 0 ? getTotalTickets() : 'No'"></span> ticket(s)
                                      selected
                                  </h5>
                              </div>
                              <div class="col-lg-2 col-md-3">
                                  <button type="submit"
                                  :class="(getTotalTickets() > 0 ? 'btn-orange' : 'btn-register') +
                                      ' btn btn-secondary py-2 fw-medium w-100'">
                                      Continue <span class="total-ticket-btn d-md-none"></span>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
  
              </section>
              {{-- @else --}}
              {{-- <div class="text-center">
                  <img src="/storage/images/assets/lock.webp" alt="Registration Closed" class="img-size">
                  <h3 class="fw-semibold text-primary">Registration Closed</h3>
                  <p class="text-purple-muted">Thank you for your enthusiasm in the NEO 2022.</p>
              </div> --}}
              {{-- @endif --}}
              </section>
          </form>
      </div>
  
      <script>
          const idrFormat = new Intl.NumberFormat('id-ID', {
              style: 'currency',
              currency: 'IDR',
              minimumFractionDigits: 0,
          });
      </script>
  
      <script>
          const competitions = {
              @foreach ($competitions as $competition)
                  {{ $loop->index == 0 ? '' : ', ' }}
                  '{{ $competition->name }}': {
                      name: '{{ $competition->name }}',
                      @if ($isEarlyBirdOngoing && $competition->total_quota - $competition->early_registrations_count > 0)
                          availableTickets: {{ $competition->total_quota - $competition->early_registrations_count }},
                          price: {{ $competition->early_price }}
                      @else
                      availableTickets: {{ $competition->total_quota - $competition->normal_registrations_count - $competition->early_registrations_count }},
                      price: {{ $competition->normal_price }}
                      @endif
                  }
              @endforeach
          }
      </script>
  
      <script>
          document.addEventListener('alpine:init', () => {
              const keyof = (name) => `${name}Tickets`
              const competitionNames = Object.keys(competitions)
              const stateKeys = competitionNames.map(keyof)
              const stateTemplate = stateKeys.reduce((obj, e) => {
                  obj[e] = 0
                  return obj
              }, {})
              Alpine.data('registration', () => ({
                  ...stateTemplate,
                  getTotalTickets() {
                      return stateKeys
                      .map((e) => this[e])
                      .reduce((val, e) => val + e, 0);
                  },
                  setTickets(competitionName, value) {
                      if (this[keyof(competitionName)] === undefined) {
                          return
                      }
                      this[keyof(competitionName)] = Math.max(
                          0,
                          Math.min(
                              this.getCompetition(competitionName).availableTickets,
                              value
                          )
                      )
                  },
                  getCompetition(name) {
                      return competitions[name]
                  },
                  getCompetitionNames() {
                      return competitionNames
                  }
              }))
          })
          
          function registerForm(data) {
              // access data here
              console.log(JSON.stringify(data))
          }
          </script>
  
  </x-app>
  
  <style>
      .glacialBold {
          font-family: Glacial-Bold;
      }
  
      .glacialReg {
          font-family: Glacial-Regular;
      }
  
      .competSelection {
          /* background-image: url('storage/assets/registerOval.png'); */
      }
  
      .indicatorSize {
          transform: scale(0.7);
          max-width: 100%;
          height: auto;
      }
  
      .scroll {
          overflow-y: scroll;
      }
  
      .btn-orange {
          background-color: #FA6B03 !important;
          border-color: #FA6B03 !important;
      }
  
      [x-cloak] {
          display: none !important;
      }
  
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
  
      input[type=number] {
          -moz-appearance: textfield;
      }
  
      .button-accomodation{
          background:#FA6B03;
      }
      .button-accomodation:hover{
          background:#ff5100;
      }
  </style>