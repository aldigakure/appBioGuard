
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a href="/" class="logo navbar-brand">
            <div class="logo-icon">🌿</div>
            BIOGUARD
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
                <li class="nav-item">

                    <a href="#features" class="nav-link">Fitur</a>
                </li>
                <li class="nav-item">

                    <a href="#entities" class="nav-link">Entitas</a>
                </li>
                <li class="nav-item">

                    <a href="#stats" class="nav-link">Statistik</a>
                </li>
                <li class="nav-item">

                    <a href="#about" class="nav-link">Tentang</a>
                </li>
              
            </ul>
            <div class="d-flex">
                @auth
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline me-2">Masuk</a>

                    <a href="{{ route('register') }}" class="btn btn-primary ">Daftar</a>

                @endauth
            </div>

        </div>
    </div>
</nav>
