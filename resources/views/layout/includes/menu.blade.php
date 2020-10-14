<style> 
    .bg-primary {
        background-color: #c81e21!important;
    }
    .navbar-dark .navbar-nav .nav-link {
    color: #fff;
    }
    .navbar-brand {
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <a class="navbar-brand" href="#">RD Market</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.clientes') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.produto') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pedidos') }}">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                </li> -->
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.clientes') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.produto') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pedidos') }}">Pedidos</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest

        </ul>
    </div>
</nav>