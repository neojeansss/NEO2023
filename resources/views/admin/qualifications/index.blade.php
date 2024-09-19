<x-app title="Qualifications | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Qualification List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($rounds as $round)
                    @if ($round['name'] != '-')
                        @if (count($competitions) == 1)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-muted {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#participantTab{{ $round['id'] }}"
                                    type="button" role="tab">
                                    {{ $round['name'] }}
                                </button>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-muted {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#participantTab{{ $round['id'] }}"
                                    type="button" role="tab">
                                    {{ $round['name'] }}
                                </button>
                            </li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>

        <div class="tab-content">
            @foreach ($rounds as $round)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="participantTab{{ $round['id'] }}" role="tabpanel" tabindex="0">

                    <div class="card card-custom">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="competitionTab" role="tablist">
                                @foreach ($competitions as $competition)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : 'mx-1' }}"
                                            data-bs-toggle="pill"
                                            data-bs-target="#competitionTab{{ $competition->id }}{{ $round['id'] }}"
                                            type="button" role="tab">
                                            {{ $competition->name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach ($competitions as $competition)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        id="competitionTab{{ $competition->id }}{{ $round['id'] }}" role="tabpanel"
                                        tabindex="0">
                                        @if (count($qualifications[$round['id']][$competition->id]) > 0)
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr class="text-secondary">
                                                        <th class="align-middle">NAME</th>
                                                        <th class="align-middle text-end">
                                                            <a href="{{ route('qualifications.editRank', [$round['id'], $competition]) }}"
                                                                class="btn btn-outline-primary btn-sm">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($qualifications[$round['id']][$competition->id] as $qualification)
                                                        @if ($competition->name == 'Debate')
                                                        @if (isset($qualification->registrationDetail->debateTeam))
                                                            <tr>
                                                                <td class="align-middle">
                                                                    {{ $qualification->registrationDetail->debateTeam->team_name }}
                                                                </td>
                                                                <td class="d-flex gap-3 justify-content-end">
                                                                    @if ($round['id'] == 3)
                                                                        <div class="align-middle text-end">
                                                                            <a href="{{ route('qualifications.backRank', [$qualification, $round['id'] - 2]) }}"
                                                                                class="btn btn-outline-primary btn-sm">
                                                                                Back to Preliminary
                                                                            </a>
                                                                        </div>
                                                                    @elseif($round['id'] == 4)
                                                                        <div class="align-middle text-end">
                                                                            <a href="{{ route('qualifications.backRank', [$qualification, $round['id'] - 1]) }}"
                                                                                class="btn btn-outline-primary btn-sm">
                                                                                Back to Semifinal
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                    @if ($round['id'] == 1)
                                                                        <div class="align-middle text-end">
                                                                            <a href="{{ route('qualifications.backRank', [$qualification, $round['id'] - 1]) }}"
                                                                                class="btn btn-secondary btn-sm">
                                                                                Withdraw
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <x-modal-confirmation action="destroy"
                                                                title="Remove Qualification" name="qualifications"
                                                                :model='$qualification'>
                                                                Are you sure want to remove
                                                                {{ $qualification->registrationDetail->debateTeam->team_name }}
                                                                from {{ $round['name'] }}?
                                                            </x-modal-confirmation>
                                                        @endif
                                                        @else
                                                            @if (isset($qualification->registrationDetail->participants[0]))
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        {{ $qualification->registrationDetail->participants[0]->name }}
                                                                    </td>
                                                                    <td class="d-flex gap-3 justify-content-end">
                                                                        @if ($round['id'] == 3)
                                                                            <div class="align-middle text-end">
                                                                                <a href="{{ route('qualifications.backRank', [$qualification, $round['id'] - 2]) }}"
                                                                                    class="btn btn-outline-primary btn-sm">
                                                                                    Back to Preliminary
                                                                                </a>
                                                                            </div>
                                                                        @elseif($round['id'] == 4)
                                                                            <div class="align-middle text-end">
                                                                                <a href="{{ route('qualifications.backRank', [$qualification, $round['id'] - 1]) }}"
                                                                                    class="btn btn-outline-primary btn-sm">
                                                                                    Back to Semifinal
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                        @if ($round['id'] == 1)
                                                                            <div class="align-middle text-end">
                                                                                <a href="{{ route('qualifications.backRank', [$qualification, $round['id'] - 1]) }}"
                                                                                    class="btn btn-secondary btn-sm">
                                                                                    Withdraw
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <x-modal-confirmation action="destroy"
                                                                    title="Remove Qualification" name="qualifications"
                                                                    :model='$qualification'>
                                                                    Are you sure want to remove
                                                                    {{ $qualification->registrationDetail->participants[0]->name }}
                                                                    from {{ $round['name'] }}?
                                                                </x-modal-confirmation>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="text-center">
                                                <img src="/storage/images/assets/empty.svg" alt="No Data Found"
                                                    width="20%">
                                                <h5 class="mb-3 fw-semibold">No Data Found</h5>
                                                @if ($round['id'] == 1)
                                                    @if (count($qualifications) == 0)
                                                        <a href="{{ route('qualifications.create', [$round['id'], $competition]) }}"
                                                            class="btn btn-primary py-2 px-4 mb-2 rounded-3">Add
                                                            Data</a>
                                                    @else
                                                        <a href="{{ route('qualifications.editRank', [$round['id'], $competition]) }}"
                                                            class="btn btn-primary py-2 px-4 mb-2 rounded-3">Add
                                                            Data</a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('qualifications.editRank', [$round['id'], $competition]) }}"
                                                        class="btn btn-primary py-2 px-4 mb-2 rounded-3">Add
                                                        Data</a>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app>
<style>
    .nav-link.active.text-muted {
        color: #fe7124 !important;
    }

    .nav-link.text-muted:active {
        border: #fe7124 !important;
    }
</style>
