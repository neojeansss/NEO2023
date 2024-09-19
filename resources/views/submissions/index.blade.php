<x-app title="Submissions | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Submission List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($rounds as $round)
                    @if (count($competitions) == 1)
                        @if ($round['name'] != '-')
                            <li class="nav-item" role="presentation">
                                <button class="nav-link text-muted {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="tab" data-bs-target="#participantTab{{ $round['id'] }}"
                                    type="button" role="tab">
                                    {{ $round['name'] }}
                                </button>
                            </li>
                        @endif
                    @else
                        @if ($round['name'] != '-')
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
                                                        <th class="align-middle">
                                                            {{ $competition->name == 'Debate' ? 'TEAM NAME' : 'NAME' }}
                                                        </th>
                                                        <th class="align-middle">SUBMISSION TIME</th>
                                                        <th class="align-middle">STATUS</th>
                                                        <th class="align-middle"></th>
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
                                                                    <td class="align-middle">

                                                                        {{ $qualification->submission ? ($qualification->submission->created_at == null ? '-' : date('j M, H:i', strtotime($qualification->submission->updated_at))) : '-' }}
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        @if ($qualification->submission)
                                                                            @if ($qualification->submission->is_submit == true)
                                                                                <span
                                                                                    class="text-success">Submitted</span>
                                                                            @else
                                                                                <span class="text-danger">Not Yet</span>
                                                                            @endif
                                                                        @else
                                                                            <span class="text-danger">-</span>
                                                                        @endif
                                                                    </td>
                                                                    <td
                                                                        class="align-middle text-end d-flex gap-3 align-items-center justify-content-end">
                                                                        @if ($qualification->submission)
                                                                            @if ($qualification->submission->is_submit == true)
                                                                                <form
                                                                                    action="{{ route('submissions.download', $qualification->submission) }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <input type="hidden" name="round"
                                                                                        value="{{ $round['id'] }}">
                                                                                    <input type="hidden"
                                                                                        name="competition_name"
                                                                                        value="{{ $qualification->registrationDetail->competition->name }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary"><i
                                                                                            class="bi bi-download"></i>
                                                                                        Download</button>
                                                                                </form>
                                                                            @endif
                                                                        @endif
                                                                        @if (isset($qualification->registrationDetail->debateTeam))
                                                                            <form
                                                                                action="{{ route('submissions.create') }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="debateTeam"
                                                                                    value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                                                <input type="hidden"
                                                                                    name="qualification_id"
                                                                                    value="{{ $qualification->id }}">
                                                                                <input type="hidden" name="round"
                                                                                    value="{{ $round['id'] }}">
                                                                                <input type="hidden"
                                                                                    name="competition_name"
                                                                                    value="{{ $qualification->registrationDetail->competition->name }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"><i
                                                                                        class="bi bi-upload"></i>
                                                                                    Upload</button>
                                                                            </form>
                                                                        @elseif(isset($qualification->registrationDetail->participants[0]))
                                                                            <form
                                                                                action="{{ route('submissions.create') }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="participant"
                                                                                    value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                                                <input type="hidden"
                                                                                    name="qualification_id"
                                                                                    value="{{ $qualification->id }}">
                                                                                <input type="hidden" name="round"
                                                                                    value="{{ $round['id'] }}">
                                                                                <input type="hidden"
                                                                                    name="competition_name"
                                                                                    value="{{ $qualification->registrationDetail->competition->name }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"><i
                                                                                        class="bi bi-upload"></i>
                                                                                    Upload</button>
                                                                            </form>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @else
                                                            @if (isset($qualification->registrationDetail->participants[0]))
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        {{ $qualification->registrationDetail->participants[0]->name }}
                                                                    </td>
                                                                    <td class="align-middle">

                                                                        {{ $qualification->submission ? ($qualification->submission->created_at == null ? '-' : date('j M, H:i', strtotime($qualification->submission->updated_at))) : '-' }}
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        @if ($qualification->submission)
                                                                            @if ($qualification->submission->is_submit == true)
                                                                                <span
                                                                                    class="text-success">Submitted</span>
                                                                            @else
                                                                                <span class="text-danger">Not
                                                                                    Yet</span>
                                                                            @endif
                                                                        @else
                                                                            <span class="text-danger">-</span>
                                                                        @endif
                                                                    </td>
                                                                    <td
                                                                        class="align-middle text-end d-flex gap-3 align-items-center justify-content-end">
                                                                        @if ($qualification->submission)
                                                                            @if ($qualification->submission->is_submit == true)
                                                                                <form
                                                                                    action="{{ route('submissions.download', $qualification->submission) }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data">
                                                                                    @csrf
                                                                                    <input type="hidden"
                                                                                        name="round"
                                                                                        value="{{ $round['id'] }}">
                                                                                    <input type="hidden"
                                                                                        name="competition_name"
                                                                                        value="{{ $qualification->registrationDetail->competition->name }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary"><i
                                                                                            class="bi bi-download"></i>
                                                                                        Download</button>
                                                                                </form>
                                                                            @endif
                                                                        @endif
                                                                        @if (isset($qualification->registrationDetail->debateTeam))
                                                                            <form
                                                                                action="{{ route('submissions.create') }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden"
                                                                                    name="debateTeam"
                                                                                    value="{{ $qualification->registrationDetail->debateTeam->team_name }}">
                                                                                <input type="hidden"
                                                                                    name="qualification_id"
                                                                                    value="{{ $qualification->id }}">
                                                                                <input type="hidden" name="round"
                                                                                    value="{{ $round['id'] }}">
                                                                                <input type="hidden"
                                                                                    name="competition_name"
                                                                                    value="{{ $qualification->registrationDetail->competition->name }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"><i
                                                                                        class="bi bi-upload"></i>
                                                                                    Upload</button>
                                                                            </form>
                                                                        @elseif(isset($qualification->registrationDetail->participants[0]))
                                                                            <form
                                                                                action="{{ route('submissions.create') }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden"
                                                                                    name="participant"
                                                                                    value="{{ $qualification->registrationDetail->participants[0]->name }}">
                                                                                <input type="hidden"
                                                                                    name="qualification_id"
                                                                                    value="{{ $qualification->id }}">
                                                                                <input type="hidden" name="round"
                                                                                    value="{{ $round['id'] }}">
                                                                                <input type="hidden"
                                                                                    name="competition_name"
                                                                                    value="{{ $qualification->registrationDetail->competition->name }}">
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"><i
                                                                                        class="bi bi-upload"></i>
                                                                                    Upload</button>
                                                                            </form>
                                                                        @endif
                                                                    </td>
                                                                </tr>
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
