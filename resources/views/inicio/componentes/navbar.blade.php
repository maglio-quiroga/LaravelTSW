<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
<header class="header">
    <a href="#" class="text-decoration-none"><img src="{{ asset('img/logo.png') }}" style="height: 60px;" alt="logo de la pagina" class="img"></a>
    <nav class="navbar">
      <a href="{{ route('inicio') }}" class="text-decoration-none">Inicio</a>
      <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
    </nav>
    <button class="c-hamburguesa" id="btn-hamburguesa">
      <i class="bi bi-list i-hamburguesa"></i>
    </button>
</header>

<script src="{{ asset('js/navbar.js') }}"></script>