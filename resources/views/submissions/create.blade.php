<x-app title="Submission | NEO 2023">
      <div class="container">
            <div class="row">
                  <div class="col">
                        <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="qualification_id" value="{{ $qualification_id }}">
                              <input type="hidden" name="competition_name" value="{{ $competition_name }}">
                              <input type="hidden" name="round" value="{{ $round }}">
                              @if(isset($participant))
                              <input type="hidden" name="participant" value="{{ $participant }}">
                              @elseif(isset($debateTeam))
                              <input type="hidden" name="debateTeam" value="{{ $debateTeam }}">
                              @endif
                              <label for="submission">Submission</label>
                              <input type="file" class="form-control" name="file" required>
                              

                              <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
            </div>
      </div>
</x-app>