<x-app title="Add Judge | NEO 2022">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>
  
      <div class="container p-5" style="max-width: 60rem">
          <h4 class="mb-4 fw-semibold text-primary">Add New Judge</h4>
  
          <form method="POST" action="{{ route('judges.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card card-custom mb-3">
                  <div class="card-body">
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">Name</label>
                          <div class="col">
                              <input type="text" class="form-control" name="name" required>
                          </div>
                      </div>
  
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">Picture</label>
                          <div class="col">
                              <input class="form-control" type="file" name="picture" required>
                          </div>
                      </div>
  
                      <div class="row mb-3">
                          <label class="col-3 col-form-label">Role</label>
                          <div class="col">
                              <input type="text" class="form-control" name="role" required>
                          </div>
                      </div>
  
                      <div class="row">
                          <label class="col-3 col-form-label">Message</label>
                          <div class="col">
                              <textarea class="form-control" name="message" rows="3" required></textarea>
                          </div>
                      </div>
  
                  </div>
              </div>
  
              <div class="d-grid gap-2 d-flex justify-content-end">
                  <a href="{{ route('judges.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                      Cancel
                  </a>
                  <button type="submit" class="btn btn-primary py-2 px-5">Add</button>
              </div>
          </form>
      </div>
  </x-app>