<h1>Bienvenido {{ Auth::user()->name }} - {{ ucfirst(Auth::user()->role_id == 2 ? 'Teacher' : 'Student') }}</h1>
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>