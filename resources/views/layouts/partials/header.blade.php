<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <img src="img/logowc.png" alt="Logo" class="d-inline-block align-text-top" style="width: 40px; height: auto; border-radius: 50%;">
            Sedot WC Lancar jaya
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    {{-- Link Services sudah diperbarui --}}
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                </li>
                @guest
                    {{-- TAMPILAN UNTUK PENGGUNA YANG BELUM LOGIN --}}
                    <li class="nav-item ms-lg-2">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-success">Register</a>
                    </li>
                @endguest

                @auth
                    {{-- TAMPILAN UNTUK PENGGUNA YANG SUDAH LOGIN --}}
                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                
                <li class="nav-item d-none d-lg-block">
                     <a href="{{ route('booking.create') }}" class="btn btn-success ms-lg-3">Pesan Sekarang</a>
                </li>
                 {{-- Tombol Pesan untuk Tampilan Mobile --}}
                <li class="nav-item d-lg-none mt-2">
                    <a href="{{ route('booking.create') }}" class="btn btn-success w-100">Pesan Sekarang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

