<x-app title="Schedules | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">Schedule List</h4>
            <a type="button" href="{{ route('schedules.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>Add Schedule
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-secondary">
                            <th class="col-4">NAME</th>
                            <th>COMPETITION</th>
                            <th>DATE | TIME</th>
                            <th>LOCATION</th>
                            <th class="text-center">STATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                            <x-modal-confirmation action="destroy" title="Delete Schedule" name="schedules"
                                :model=$schedule>
                                Are you sure want to delete <span class="fw-semibold">{{ $schedule->name }}</span>?
                            </x-modal-confirmation>

                            <tr class="m-5 p-5">
                                <td class="align-middle">
                                    {{ $schedule->name }}
                                </td>
                                <td class="align-middle">
                                    {{ $schedule->competition->name }}
                                </td>
                                <td class="align-middle">
                                    {{ date('F j, Y', strtotime($schedule->date)) }} |
                                    {{ date('H:i', strtotime($schedule->from)) }} -
                                    {{ date('H:i', strtotime($schedule->to)) }}
                                </td>
                                <td class="align-middle">
                                    {{ $schedule->location }}
                                </td>
                                <td class="align-middle">
                                    @livewire(
                                        'toggle-switch',
                                        [
                                            'model' => $schedule,
                                            'field' => 'is_active',
                                        ],
                                        key($schedule->id)
                                    )
                                </td>
                                <td class="align-end">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-light btn-sm" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                            <li>
                                                <a class="dropdown-item p-2 rounded-3"
                                                    href="{{ route('schedules.edit', $schedule) }}">
                                                    <i class="bi bi-pencil me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item p-2 rounded-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#destroy{{ $schedule->id }}">
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
            </div>
        </div>
    </div>
</x-app>
