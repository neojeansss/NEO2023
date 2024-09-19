<nav class="sidebar shadow-sm">
    <div class="sidebar-content">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-link fw-medium {{ Request::is('dashboard') ? 'active nav' : 'text-muted' }}">
                    <i class="bi {{ Request::is('dashboard') ? 'bi-grid-1x2-fill' : 'bi-grid-1x2' }} fa-lg me-1">
                    </i>
                    Dashboard
                </a>
            </li>

            @if (auth()->user()->email == 'neo.it' || auth()->user()->email == 'neo.sc')
                <li class="nav-item">
                    <a href="{{ route('registrations.manage') }}"
                        class="nav-link fw-medium {{ Request::is('registrations/manage') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('registrations/manage') ? 'bi-clipboard-data-fill' : 'bi-clipboard-data' }} fa-lg me-1">
                        </i>
                        Registrations
                    </a>
                </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('participants.index') }}"
                    class="nav-link fw-medium {{ Request::is('participants') ? 'active nav' : 'text-muted' }}">
                    <i class="bi {{ Request::is('participants') ? 'bi-people-fill' : 'bi-people' }} fa-lg me-1">
                    </i>
                    Participants
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('companions.index') }}"
                    class="nav-link fw-medium {{ Request::is('companions') ? 'active nav' : 'text-muted' }}">
                    <i
                        class="bi {{ Request::is('companions') ? 'bi-person-badge-fill' : 'bi-person-badge' }} fa-lg me-1">
                    </i>
                    Companions
                </a>
            </li>

            @if (auth()->user()->email == 'neo.it' || auth()->user()->email == 'neo.sc')
                <li class="nav-item">
                    <a href="{{ route('request-invitations.index') }}"
                        class="nav-link fw-medium {{ Request::is('request-invitations') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('request-invitations') ? 'bi-envelope-paper-fill' : 'bi-envelope-paper' }} fa-lg me-1">
                        </i>
                        Request Invitations
                    </a>
                </li>
            @endif

            <hr class="my-2">

            <li class="nav-item">
                <a
                    class="nav-link fw-medium {{ Request::is('qualifications') || Request::is('submissions') || Request::is('competitions') ? 'active nav' : 'text-muted' }}">
                    <i
                        class="bi {{ Request::is('qualifications') || Request::is('submissions') || Request::is('competitions') ? 'bi-dice-3-fill' : 'bi-dice-3' }} fa-lg me-1">
                    </i>
                    Operational
                </a>
                <ul class="nav flex-column" style="margin-left: 1.6rem">
                    <li class="nav-item">
                        <a href="{{ route('competitions.index') }}"
                            class="nav-link fw-medium {{ Request::is('competitions') ? 'active nav' : 'text-muted' }}">
                            Competition
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('schedules.index') }}"
                            class="nav-link {{ Request::is('schedules') ? 'active nav' : 'text-muted' }}">
                            Schedules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('qualifications.index') }}"
                            class="nav-link {{ Request::is('qualifications') ? 'active nav' : 'text-muted' }}">
                            Qualification
                        </a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('submissions.index') }}"
                            class="nav-link {{ Request::is('submissions') ? 'active nav' : 'text-muted' }}">
                            Submissions
                        </a>
                    </li>
                </ul>
            </li>

            @if (auth()->user()->email == 'neo.it' || auth()->user()->email == 'neo.sc')
                <hr class="my-2">

                <li class="nav-item">
                    <a href="{{ route('message-from-SC.index') }}"
                        class="nav-link fw-medium {{ Request::is('message-from-SC') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('message-from-SC') ? 'bi-chat-left-heart-fill' : 'bi-chat-left-heart' }} fa-lg me-1"></i>
                        Message From SC
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('testimonies.index') }}"
                        class="nav-link fw-medium {{ Request::is('testimonies') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('testimonies') ? 'bi-chat-left-quote-fill' : 'bi-chat-left-quote' }} fa-lg me-1"></i>
                        Testimony
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('judges.index') }}"
                        class="nav-link fw-medium {{ Request::is('judges') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('judges') ? 'bi-chat-left-text' : 'bi-chat-left-text' }} fa-lg me-1"></i>
                        Judge
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a href="{{ route('merchandises.index') }}"
                        class="nav-link fw-medium {{ Request::is('merchandises') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('merchandises') ? 'bi-gift-fill' : 'bi-gift' }} fa-lg me-1"></i>
                        Merchandise
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{ route('events.index') }}"
                        class="nav-link fw-medium {{ Request::is('events') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('events') ? 'bi-puzzle-fill' : 'bi-puzzle' }} fa-lg me-1"></i>
                        Event
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('faqs.manage') }}"
                        class="nav-link fw-medium {{ Request::is('faqs/manage') ? 'active nav' : 'text-muted' }}">
                        <i
                            class="bi {{ Request::is('faqs/manage') ? 'bi-patch-question-fill' : 'bi-patch-question' }} fa-lg me-1"></i>
                        FAQ
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('supports.index') }}"
                        class="nav-link fw-medium {{ Request::is('supports') ? 'active nav' : 'text-muted' }}">
                        <i class="{{ Request::is('supports') ? 'fa-solid' : 'fa-regular' }} fa-handshake me-1"></i>
                        Support
                    </a>
                </li>
            @endif



            <hr class="my-2">

            <li class="nav-item">
                <a class="nav-link fw-medium {{ Request::is('environments') || Request::is('access-controls') || Request::is('accesses') ? 'active nav' : 'text-muted' }}"
                    style="cursor: default">
                    <i
                        class="bi {{ Request::is('environments') || Request::is('access-controls') || Request::is('accesses') ? 'bi-gear-fill' : 'bi-gear' }} fa-lg me-1">
                    </i>
                    Web Config
                </a>
                <ul class="nav flex-column" style="margin-left: 1.6rem">
                    <li class="nav-item">
                        <a href="{{ route('environments.index') }}"
                            class="nav-link {{ Request::is('environments') ? 'active nav' : 'text-muted' }}">
                            Environment
                        </a>
                    </li>
                    @if (auth()->user()->email == 'neo.it')
                        <li class="nav-item">
                            <a href="{{ route('accesses.index') }}"
                                class="nav-link {{ Request::is('accesses') ? 'active nav' : 'text-muted' }}">
                                Access
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('access-controls.index') }}"
                                class="nav-link {{ Request::is('access-controls') ? 'active nav' : 'text-muted' }}">
                                Access Control
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

        </ul>
    </div>
</nav>


<style>
    .active.nav {
        color: #fe7124 !important;
    }
</style>
