<x-app title="Add Testimony | NEO 2022">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>
  
      <div class="container p-5" style="max-width: 60rem">
          <h4 class="mb-4 fw-semibold text-primary">Edit Testimony</h4>
  
          <form method="POST" action="{{ route('testimonies.update',$testimony) }}" enctype="multipart/form-data">
              @csrf
              <div class="card card-custom mb-3">
                  <div class="card-body">
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">Name</label>
                          <div class="col">
                              <input type="text" class="form-control" name="name" required value="{{ $testimony->name }}">
                          </div>
                      </div>
  
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">New Picture</label>
                          <div class="col">
                              <input class="form-control" type="file" name="picture">
                          </div>
                      </div>
  
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">Role</label>
                          <div class="col">
                              <input type="text" class="form-control" name="role" required value="{{ $testimony->role }}">
                          </div>
                      </div>
  
                      <div class="row">
                          <label class="col-3 col-form-label">Message</label>
                          <div class="col">
                              <textarea class="form-control" name="message" rows="3" required value="{{ $testimony->message }}">{{ $testimony->message }}</textarea>
                          </div>
                      </div>

                      <div class="row mt-3">
                        <label class="col-3 col-form-label">Status</label>
                        <div class="col d-flex justify-content-start ps-4">
                              @livewire('toggle-switch', [
                              'model' => $testimony,
                              'field' => 'is_active',
                              ], key($testimony->id))
                        </div>
                      </div>
                      
  
                  </div>
              </div>
  
              <div class="d-grid gap-2 d-flex justify-content-end">
                  <a href="{{ route('testimonies.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                      Cancel
                  </a>
                  @method('PUT')
                  <button type="submit" class="btn btn-primary py-2 px-5">Update</button>
              </div>
          </form>
      </div>
  </x-app>