<x-app title="NEO 2023 Dashboard Admin">
    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <p class="mb-4 fs-4 fw-semibold">Dashboard Admin</p>

        <!-- Dashboard Summary Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 border-primary">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <p class="fs-5 m-0 fw-semibold">Total Participants</p>
                        <p class="m-0">{{ $totalParticipant }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 border-primary">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <p class="fs-5 m-0 fw-semibold">Unverified Registrations</p>
                        <p class="m-0">{{ $unverifiedCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 border-primary">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <p class="fs-5 m-0 fw-semibold">Request Invitation (Unsent)</p>
                        <p class="m-0">{{ $requestCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- competition --}}
        <p class="mb-4 fs-4 fw-semibold">Competitions</p>
        <div class="row">
            @foreach ($competitions as $competition)
                <div class="col-md-3 mb-3">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white d-flex justify-content-between">
                            <h5 class="card-title m-0 p-0">{{ $competition->name }}</h5>
                            @if($competition->name == 'Debate')
                            {{ $participantsDebate->count() / 2}}
                            @elseif($competition->name == 'Newscasting')
                            {{ $participantsNewscasting->count() }}
                            @elseif($competition->name == 'Storytelling')
                            {{ $participantsStorytelling->count() }}
                            @elseif($competition->name == 'Speech')
                            {{ $participantsSpeech->count() }}
                            @endif
                        </div>
                        {{-- <div class="card-body">
                            <div class=" d-flex justify-content-between">
                                <p class="card-text mb-2">Normal Registrations:</p> <span>{{ $competition->normal_registrations_count }}</span>
                            </div>
                            <div class=" d-flex justify-content-between">
                                <p class="card-text mb-2">Early Registrations:</p> <span>{{ $competition->early_registrations_count }}</span>
                            </div>
                            
                        </div> --}}
                        {{-- <div class="card-footer">
                                <a href="#" class="btn btn-info btn-sm">View Details</a>
                                </div> --}}
                    </div>
                </div>
            @endforeach
        </div>



        <!-- Request Invitation Card -->
        {{-- <div class="card bg-primary text-white mb-4 mt-2">
            <div class="card-body">
                <p class="fs-4 fw-semibold">Request Invitations</p>
                <h5 class="card-title m-0 p-0">Unsent Requests: {{ $requestCount }}</h5>
            </div>
        </div> --}}

        <!-- Environment Section (Table) -->
        <p class="fs-4 fw-semibold">Environments</p>
        <div class="card mb-4 border-primary">
            <div class="card-body p-4">
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($environments as $environment)
                                <tr>
                                    <td>{{ $environment->name }}</td>
                                    <td>{{ !$environment->start_time ? '-' : $environment->start_time }}</td>
                                    <td>{{ !$environment->end_time ? '-' : $environment->end_time }}</td>
                                    <td>@if (strtotime($environment->start_time) <= time() && strtotime($environment->end_time) >= time())
                                        <i class="bi bi-square-fill fa-xs text-success"></i>
                                    @elseif (strtotime($environment->start_time) > time())
                                        <i class="bi bi-square-fill fa-xs text-warning"></i>
                                    @else
                                        <i class="bi bi-square-fill fa-xs text-dark"></i>
                                    @endif</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app>
<style>
    .bg-primary{
        background: #fe7124 !important;
    }

    .border-primary{
        border: 1px solid #fe7124 !important;
    }
</style>