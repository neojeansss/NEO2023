<x-app title="Request Invitation Letter | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">Request Invitation Letter List</h4>
            {{-- <a type="button" data-bs-toggle="modal" data-bs-target="#showRequestLetter" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>Request Invitation Letter
            </a> --}}
        </div>
        <!-- Modal -->
        <div class="modal fade" id="showRequestLetter" tabindex="-1" aria-labelledby="showRequestLetterLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="pt-3">
                        <h1 class="fs-5 text-center" id="showRequestLetterLabel" style="font-family: Glacial-Bold">Request Invitation Letter</h1>
                        <hr>
                    </div>
                    <div class="modal-body px-4">
                        <form action="{{ route('request-invitations.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">Institution</label>
                                <input type="text" class="form-control" name="institution">
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-primary col-12" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn btn-primary col-12">Send</button>
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-custom">
            <div class="card-body">
                @if ($requestInvitations->count() > 0)
                    <table class="table table-general">
                        <thead>
                            <tr class="text-secondary">
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>INSTITUTION</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestInvitations as $invitation)
                                <tr>
                                    <td class="align-middle">{{ $invitation->name }}</td>
                                    <td class="align-middle">{{ $invitation->email }}</td>
                                    <td class="align-middle">{{ $invitation->institution }}</td>
                                    <td class="align-middle">
                                        @if ($invitation->deleted_at)
                                            <b class="text-primary">Declined</b>
                                        @elseif ($invitation->is_sent)
                                            <b class="text-primary">Sent</b>
                                        @else
                                            <div class="d-flex gap-1">
                                                <form action="{{ route('request-invitations.accept', $invitation) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary" type="submit">Sent</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#destroy{{ $invitation->id }}">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <x-modal-confirmation action="destroy" title="Decline Invitation Request"
                                    name="request-invitations" :model=$invitation>
                                    Are you sure want to decline this request?
                                </x-modal-confirmation>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <img src="/storage/images/assets/empty.svg" alt="No request invitation Yet" width="20%">
                        <h5 class="fw-semibold">No request invitation Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
