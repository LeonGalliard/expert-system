<header id="header" class="fixed-top">
    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1><a href="/">Cek Motor Vario</a></h1>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link {{ setActive('beranda') }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('page.data') }}" href="{{ route('page.data') }}">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ setActive('page.diagnosa') }}" href="{{ route('page.diagnosa') }}">
                            Diagnosa
                        </a>
                    </li>

                    @if (auth()->check())
                        <li class="nav-item">
                            <div class="dropdown">
                                <a href="javascript:void(0)" id="dropdownProfile" class="nav-link d-flex align-items-center"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="img/profile.png" alt="" width="30" class="rounded-circle me-2 profile-pulse">
                                    <span>{{ Auth::user()->username }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownProfile">
                                    <li><a class="dropdown-item" href="gejala">Profil</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</header>
