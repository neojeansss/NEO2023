<x-app title="Edit Access Control | NEO 2023 Dashboard Admin">

      <x-slot name="navbarAdmin"></x-slot>
      <x-slot name="sidebarAdmin"></x-slot>

      <div class="container p-5">
            <div class="row">
                  <div class="col">
                        <form action="{{ route('access-controls.update', $accessControl) }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                    <label for="user_id" class="form-label">User</label>
                                    <select class="form-select" name="user_id">
                                          <option selected disabled value="{{ $accessControl->user_id }}">{{ $accessControl->user->name }}</option>
                                          @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              <div class="mb-3">
                                    <label for="access_id" class="form-label">Access</label>
                                    <select class="form-select" name="access_id">
                                          <option selected disabled value="{{ $accessControl->access_id }}">{{ $accessControl->access->name }}</option>
                                          @foreach($accesses as $access)
                                                <option value="{{ $access->id }}">{{ $access->name }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              @method('PUT')
                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
            </div>
      </div>
      
</x-app>