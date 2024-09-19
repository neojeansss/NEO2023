<x-app title="Message From SC | NEO 2022">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>
  
      <div class="container p-5">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="m-0 fw-semibold text-primary">Message From SC List</h4>
              <a type="button" href="{{ route('message-from-SC.create') }}" class="btn btn-primary">
                  <i class="fa-solid fa-plus me-2"></i>Add Message From SC
              </a>
          </div>
  
          <div class="card card-custom">
              <div class="card-body">
                  @if ($message_from_SC->count() > 0)
                      <table class="table">
                          <thead>
                              <tr class="text-secondary">
                                  <th class="col-5">NAME</th>
                                  <th class="col-5">MESSAGE</th>
                                  <th class="text-center">STATUS</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($message_from_SC as $message_SC)
                                  <x-modal-confirmation action="destroy" title="Delete Testimony" name="message-from-SC"
                                      :model=$message_SC>
                                      Are you sure want to delete this message from SC?
                                  </x-modal-confirmation>
  
                                  <tr>
                                      <td class="align-middle">
                                          <div class="row gx-3 my-3">
                                              <div class="col-3">
                                                  <img src="/storage/images/message_from_sc/{{ $message_SC->picture }}"
                                                      width="100%" class="rounded-3">
                                              </div>
                                              <div class="col m-auto">
                                                  <h6 class="fw-semibold mb-1">{{ $message_SC->name }}</h6>
                                                  <small>{{ $message_SC->role }}</small>
                                              </div>
                                          </div>
                                      </td>
                                      <td class="align-middle">{{ $message_SC->message }}</td>
                                      <td class="align-middle">
                                        @livewire('toggle-switch', [
                                            'model' => $message_SC,
                                            'field' => 'is_active',
                                        ], key($message_SC->id))
                                      </td>
                                      <td class="align-middle text-end">
                                          <div class="dropdown">
                                              <button class="btn btn-outline-light btn-sm" type="button"
                                                  data-bs-toggle="dropdown">
                                                  <i class="bi bi-three-dots-vertical text-muted"></i>
                                              </button>
                                              <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                  <li>
                                                      <a class="dropdown-item p-2 rounded-3"
                                                          href="{{ route('message-from-SC.edit', $message_SC) }}">
                                                          <i class="bi bi-pencil me-2"></i>Edit
                                                      </a>
                                                  </li>
                                                  <li>
                                                    <button type="button" class="dropdown-item p-2 rounded-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#destroy{{ $message_SC->id }}">
                                                        <i class="bi bi-trash3 me-2"></i>Delete
                                                    </button>
                                                  </li>
                                              </ul>
                                          </div>
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  @else
                      <div class="text-center">
                          <img src="/storage/images/assets/empty.svg" alt="No message from SC Yet" width="20%">
                          <h5 class="fw-semibold">No message from SC Yet</h5>
                      </div>
                  @endif
              </div>
          </div>
      </div>
</x-app>