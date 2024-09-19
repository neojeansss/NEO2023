<x-app title="Add Message From SC | NEO 2022">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>
  
      <div class="container p-5" style="max-width: 60rem">
          <h4 class="mb-4 fw-semibold text-primary">Edit Message From SC</h4>
  
          <form method="POST" action="{{ route('message-from-SC.update', $message_from_sc) }}" enctype="multipart/form-data">
              @csrf
              <div class="card card-custom mb-3">
                  <div class="card-body">
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">Name</label>
                          <div class="col">
                              <input type="text" class="form-control" name="name" required value="{{ $message_from_sc->name }}">
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
                              <input type="text" class="form-control" name="role" required value="{{ $message_from_sc->role }}">
                          </div>
                      </div>
  
                      <div class="row">
                          <label class="col-3 col-form-label">Message</label>
                          <div class="col">
                              <textarea class="form-control" name="message" rows="3" required value="{{ $message_from_sc->message }}">{{ $message_from_sc->message }}</textarea>
                          </div>
                      </div>

                      <div class="row mt-3">
                        <label class="col-3 col-form-label">Status</label>
                        <div class="col d-flex justify-content-start ps-4">
                              @livewire('toggle-switch', [
                              'model' => $message_from_sc,
                              'field' => 'is_active',
                              ], key($message_from_sc->id))
                        </div>
                      </div>
                      
  
                  </div>
              </div>
  
              <div class="d-grid gap-2 d-flex justify-content-end">
                  <a href="{{ route('message-from-SC.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                      Cancel
                  </a>
                  @method('PUT')
                  <button type="submit" class="btn btn-primary py-2 px-5">Update</button>
              </div>
          </form>
      </div>
  </x-app>