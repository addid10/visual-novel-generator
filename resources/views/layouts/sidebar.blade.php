<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ Auth::user()->image_profile }}" alt="profile">
                    {{-- Busy, Offline, Online --}}
                    <span class="login-status offline"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">{{ ucfirst(Auth::user()->role->name) }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ Request::is('game*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('game.index') }}">
                <span class="menu-title">List of Visual Novels</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>

        </li>
        @if(Auth::user()->role->name === "creator")
        <li class="nav-item {{ Request::is('visual-novels*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('visual-novels.index') }}">
                <span class="menu-title">Visual Novel</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ Request::is('assets*') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Assets</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('characters.index') }}">Characters</a>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('backgrounds.index') }}">Backgrounds</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('musics.index') }}">Musics</a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
        <li class="nav-item {{ Request::is('stories') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('stories.index') }}">
                <span class="menu-title">Visual Novel Stories</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
