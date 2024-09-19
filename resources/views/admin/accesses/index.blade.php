<x-app title="Access | NEO 2023 Dashboard Admin">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>

      <div class="container p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="m-0 fw-semibold text-primary">Access List</h4>
                {{-- <a type="button" href="{{ route('accesses.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus me-2"></i>Add Access
                </a> --}}
            </div>
            
            <div class="card card-custom">
                  <div class="card-body">
                      @if ($accesses->count() > 0)
                          <table class="table table-general">
                              <thead class="table-light">
                                  <tr class="text-secondary">
                                      <th>TYPE NAME</th>
                                      {{-- <th></th> --}}
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($accesses as $access)
                                      <x-modal-confirmation action="destroy" title="Delete Access" name="accesses"
                                          :model=$access>
                                          Are you sure want to remove this access ({{ $access->name }})?
                                      </x-modal-confirmation>
      
                                      <tr>
                                          <td class="align-middle">{{ $access->name }}</td>
                                          <td class="align-middle text-end">
                                              {{-- <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                  data-bs-target="#destroy{{ $access->id }}">
                                                  <i class="bi bi-trash3"></i>
                                              </button> --}}
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      @else
                          <div class="text-center">
                              <img src="/storage/images/assets/empty.svg" alt="No Access Yet" width="20%">
                              <h5 class="fw-semibold">No Access Yet</h5>
                          </div>
                      @endif
                  </div>
            </div>
      </div>
      
</x-app>