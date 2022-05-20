<header class=" position-fixed vw-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-md">
            <a class="navbar-brand" href="#">Genie EMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'login' ? 'active' : ''}}" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::currentRouteName() == 'signup' ? 'active' : ''}}" href="{{route('signup')}}">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
