<header class="fixed-top">
    <div class="pre-header px-4 py-1 d-none d-sm-flex">
        <div class="col-5 text-left">
            @if(isset($socmed))
                @foreach($socmed as $s)
                    @if(strtolower($s->media_sosial) == 'facebook')
                        <a href="{{ $s->link }}" class="d-inline-block mx-2"><i class="fa fa-facebook"></i></a>
                    @elseif(strtolower($s->media_sosial) == 'linkedin')
                        <a href="{{ $s->link }}" class="d-inline-block mx-2"><i class="fa fa-linkedin"></i></a>
                    @endif
                @endforeach
            @endif
        </div>
        <div class="col-4 text-right">
            <i>Sehat itu indah</i>
        </div>
        <div class="col-3 text-left pl-5">
            <img src="{{ asset('/img/icons/header-phone.png') }}" alt="?" class="mr-1"> 0857.6232.5129
        </div>
    </div>
    <nav class="navbar navbar-expand-md navbar-light px-4 pb-0">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logo.png') }}" height="60">
            <span class="hidden-folded d-none d-xl-inline-block m-l-xs text-logo">Margie Andalan</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ $title == 'Profil' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/profil') }}">Profil</a>
                </li>
                <li class="nav-item {{ $title == 'Produk' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/produk') }}">Produk</a>
                </li>
                <li class="nav-item {{ $title == 'Berita' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/berita') }}">Berita</a>
                </li>
                <li class="nav-item {{ $title == 'Galeri' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/galeri') }}">Galeri</a>
                </li>
                {{-- <li class="nav-item {{ $title == 'FAQ' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                </li> --}}
                <li class="nav-item {{ $title == 'Kontak' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/kontak') }}">Kontak</a>
                </li>
                <li class="nav-item {{ $title == 'Login' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </ul>
        </div>
    </nav>
</header>