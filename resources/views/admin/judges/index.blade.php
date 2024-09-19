<x-app title="Judges | NEO 2022">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>
  
      <div class="container p-5">
          <div class="d-flex justify-content-between align-items-center mb-4">
              <h4 class="m-0 fw-semibold text-primary">Judge List</h4>
              <a type="button" href="{{ route('judges.create') }}" class="btn btn-primary">
                  <i class="fa-solid fa-plus me-2"></i>Add Judge
              </a>
          </div>
  
          <div class="card card-custom">
              <div class="card-body">
                  @if ($judges->count() > 0)
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
                              @foreach ($judges as $judge)
                                  <x-modal-confirmation action="destroy" title="Delete Judge" name="testimonies"
                                      :model=$judge>
                                      Are you sure want to delete this judge?
                                  </x-modal-confirmation>
  
                                  <tr>
                                      <td class="align-middle">
                                          <div class="row gx-3 my-3">
                                              <div class="col-3">
                                                  <img src="/storage/images/testimonies/{{ $judge->picture }}"
                                                      width="100%" class="rounded-3">
                                              </div>
                                              <div class="col m-auto">
                                                  <h6 class="fw-semibold mb-1">{{ $judge->name }}</h6>
                                                  <small>{{ $judge->role }}</small>
                                              </div>
                                          </div>
                                      </td>
                                      <td class="align-middle">{{ $judge->message }}</td>
                                      <td class="align-middle">
                                        @livewire('toggle-switch', [
                                            'model' => $judge,
                                            'field' => 'is_active',
                                        ], key($judge->id))
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
                                                          href="{{ route('judges.edit', $judge) }}">
                                                          <i class="bi bi-pencil me-2"></i>Edit
                                                      </a>
                                                  </li>
                                                  <li>
                                                    <button type="button" class="dropdown-item p-2 rounded-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#destroy{{ $judge->id }}">
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
                          <img src="/storage/images/assets/empty.svg" alt="No judge Yet" width="20%">
                          <h5 class="fw-semibold">No judge Yet</h5>
                      </div>
                  @endif
              </div>
          </div>
      </div>
</x-app>