<header id="header" class="fixed-top d-flex align-items-center">
    <!-- Logo -->
    <div class="container d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="d-flex align-items-center">My Application
            </a>
        </div><!-- End Logo -->

        <!-- Menu Bar -->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto fw-bold" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto fw-bold" href="/posts">Post</a></li>
                @if(Auth::check() && Auth::user()->role == 'admin')
                <li><a class="nav-link scrollto fw-bold" href="/account">Akun</a></li>
                <li><a class="nav-link scrollto fw-bold" href="/logout">Logout</a></li>
                @elseif(Auth::check() && Auth::user()->role == 'author')
                <li><a class="nav-link scrollto fw-bold" href="/logout">Logout</a></li>
                @else
                <li><a class="getstarted small pt-1 fw-bold" href="/login">Login</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

    </div>
</header>
