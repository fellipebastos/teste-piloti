<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="{{ route('index') }}" title="Home">Home</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <div class="nav-link">
                            <a class="btn btn-sm btn-outline-primary" href="{{ route('register') }}">Registrar</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalLoginForm">
                                Login
                            </button>
                        </div>

                        @include('_partials.modal.loginModal')
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">Meu Perfil</a>
                            
                            @if (auth()->user()->isAdmin())
                                <a class="dropdown-item" href="{{ route('panel') }}">Painel Admin</a>
                            @endif
                            
                            <div class="dropdown-divider"></div>
                            
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            @include('_partials.form.logoutForm')
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>