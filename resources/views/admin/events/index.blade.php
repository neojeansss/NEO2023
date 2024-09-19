<x-app title="Events | NEO 2022">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>
  
      <div class="container p-5">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="m-0 fw-semibold text-primary">Event List</h4>
              <a type="button" href="{{ route('events.create') }}" class="btn btn-primary">
                  <i class="fa-solid fa-plus me-2"></i>Add Event
              </a>
          </div>
  
          <div class="card card-custom">
              <div class="card-body">
                  @if ($events->count() > 0)
                      <table class="table">
                          <thead>
                              <tr class="text-secondary">
                                  <th>Event</th>
                                  <th class="col-3">Description</th>
                                  <th>Register Link</th>
                                  <th class="text-center">STATUS</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($events as $event)
                                  <x-modal-confirmation action="destroy" title="Delete Event" name="events"
                                      :model=$event>
                                      Are you sure want to delete this event?
                                  </x-modal-confirmation>
  
                                  <tr>
                                      <td class="align-middle">
                                          <div class="row gx-3 my-3">
                                              <div class="col-3">
                                                  <img src="/storage/images/events/{{ $event->picture }}"
                                                      width="100%" class="rounded-3">
                                              </div>
                                              <div class="col m-auto">
                                                  <h6 class="fw-semibold mb-1">{{ $event->name }}</h6>
                                                  <small>{{ $event->speaker }}</small>
                                              </div>
                                          </div>
                                      </td>
                                      <td class="align-middle">{{ $event->description_content }}</td>
                                      <th>Register Link</th>
                                      <td class="align-middle">
                                        @livewire('toggle-switch', [
                                            'model' => $event,
                                            'field' => 'is_active',
                                        ], key($event->id))
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
                                                          href="{{ route('events.edit', $event) }}">
                                                          <i class="bi bi-pencil me-2"></i>Edit
                                                      </a>
                                                  </li>
                                                  <li>
                                                    <button type="button" class="dropdown-item p-2 rounded-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#destroy{{ $event->id }}">
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
                          <img src="/storage/images/assets/empty.svg" alt="No Event Yet" width="20%">
                          <h5 class="fw-semibold">No Event Yet</h5>
                      </div>
                  @endif
              </div>
          </div>
      </div>
</x-app>