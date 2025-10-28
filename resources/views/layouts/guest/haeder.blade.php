<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <div class="logo">
                            <a href="{{ route('dashboard') }}"><img
                                    src="{{ asset('assets-guest/images/logo/unnamed.png') }}" alt="Logo"></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <div class="navbar-nav ms-auto py-0">
                                <a href="{{ url('dashboard') }}"
                                    class="nav-item nav-link {{ request()->is('dashboard') ? 'active' : '' }}">About</a>
                                <a href="{{ route('warga.index') }}"
                                    class="nav-item nav-link {{ request()->is('warga*') ? 'active' : '' }}">Data
                                    Warga</a>
                                <a href="{{ route('kategoriAset.index') }}"
                                    class="nav-item nav-link {{ request()->is('kategoriAset*') ? 'active' : '' }}">Kategori
                                    Aset</a>
                                <a href="{{ route('user.index') }}"
                                    class="nav-item nav-link {{ request()->is('user*') ? 'active' : '' }}">Data User</a>
                                <a href="{{ url('/auth') }}" class="nav-item nav-link">Login</a>

                                {{-- <a href="{{ url('dashboard') }}" class="nav-item nav-link">Home</a>
                                <a href="{{ route('warga.index') }}" class="nav-item nav-link active">Data Warga</a>
                                <a href="{{ route('kategoriAset.index') }}" class="nav-item nav-link">Kategori Aset</a>
                                <a href="{{ route('user.index') }}" class="nav-item nav-link">Data User</a>
                                <a href="{{ route('auth.login') }}" class="nav-item nav-link">LOGIN</a> --}}

                            </div>
                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
