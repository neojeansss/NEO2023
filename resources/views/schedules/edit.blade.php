<x-app title="Edit  Schedule | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5" style="max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Schedule</h4>

        <form method="POST" action="{{ route('schedules.update',$schedule) }}">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Schedule Details</h5>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Schedule Name/Title <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <input type="text" class="form-control" name="name" value="{{ $schedule->name }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Competition <span class="text-danger">*</span></label>
                        <div class="col">
                            <select name="competition_id" class="form-select" required>
                                @foreach ($competitions as $competition)
                                    @if ($schedule->competition_id == $competition->id)
                                        <option value="{{ $competition->id }}"selected>{{ $competition->name }}</option>
                                    @else
                                        <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Schedule Description</label>
                        <div class="col">
                            <textarea type="text" class="form-control" name="description" value="{{ $schedule->description }}" disabled>{{ $schedule->description }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Date <span class="text-danger">*</span></label>

                        <div class="col">
                            <input type="date" class="form-control" name="date" value="{{ $schedule->date }}"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <label class="col col-form-label">From <span class="text-danger">*</span></label>
                                    <div class="col">
                                        <input type="time" class="form-control" name="from"
                                            value="{{ $schedule->from }}" required>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <label class="col col-form-label">To <span class="text-danger">*</span></label>
                                    <div class="col">
                                        <input type="time" class="form-control" name="to"
                                            value="{{ $schedule->to }}" required>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Location <span class="text-danger">*</span></label>
                        <div class="col">
                            <input type="text" class="form-control" name="location"
                                value="{{ $schedule->location }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('schedules.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Add</button>
            </div>
        </form>
    </div>
</x-app>
