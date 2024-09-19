<x-app title="Create Environment | NEO 2023 Dashboard Admin">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>

      <div class="container p-5">
            <div class="row">
                  <div class="col">
                        <form action="{{ route('environments.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                    <label for="code" class="form-label">Code</label>
                                    <input type="text" class="form-control" name="code">
                              </div>
                              <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name">
                              </div>
                              <div class="mb-3">
                                    <label for="start_time" class="form-label">Start Time</label>
                                    <input type="datetime-local" class="form-control" name="start_time">
                              </div>
                              <div class="mb-3">
                                    <label for="end_time" class="form-label">End Time</label>
                                    <input type="datetime-local" class="form-control" name="end_time">
                              </div>
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
            </div>
      </div>
      
</x-app>