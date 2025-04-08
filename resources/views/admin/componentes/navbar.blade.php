<link rel="stylesheet" href="{{ asset('css/inicio/navbar.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<header class="header">
    <a href="#" class="text-decoration-none"><img src="{{ asset('img/logo.png') }}" style="height: 60px;" alt="logo de la pagina" class="img"></a>
    <nav class="navbar">
      <a href="{{ route('admin') }}" class="text-decoration-none">Resumen</a>
      <a href="{{ route('noticias') }}" class="text-decoration-none">Noticias</a>
      <a href="{{ route('publicaciones') }}" class="text-decoration-none">Publicaciones</a>
      <a href="{{ route('actividades.listar') }}" class="text-decoration-none">Actividades</a>
      <a href="{{ route('logout') }}" class="text-decoration-none">Cerrar Sesion</a>
    </nav>
    <button class="c-hamburguesa" id="btn-hamburguesa">
      <i class="bi bi-list i-hamburguesa"></i>
    </button>
</header>

<script src="{{ asset('js/inicio/navbar.js') }}"></script>