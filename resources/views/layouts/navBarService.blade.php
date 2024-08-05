<nav id="sidebar" class="navbar">
    <div class="navbar-header">
        <img src="{{ asset('images/port.webp') }}" alt="Logo du Port">
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('service.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Home-service </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('requests.validation')}}"><i class="fas fa-tachometer-alt"></i> Validation Demandes  </a>
        </li>
       
        <br>
        <br>

        <form action="{{ route('admin.logout') }}" method="GET" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </button>
        </form>
    </ul>
</nav>
