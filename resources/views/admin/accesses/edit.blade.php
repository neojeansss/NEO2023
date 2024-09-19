<x-app title="Edit Access | NEO 2023 Dashboard Admin">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>

      <div class="container p-5">
            <div class="row">
                  <div class="col">
                        <form action="{{ route('accesses.update', $access) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $access->name }}">
                              </div>
                              @method('PUT')
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
            </div>
      </div>
      
</x-app>