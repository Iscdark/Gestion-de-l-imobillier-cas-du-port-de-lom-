<nav id="sidebar" class="navbar">
    <div class="navbar-header">
        <img src="{{ asset('images/port.webp') }}" alt="Logo du Port">
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-users"></i> Compte Utilisateur
            </a>
            <div class="dropdown-menu" aria-labelledby="userMenu">
                <a class="dropdown-item" href="{{route('users.index')}}">Liste des Comptes</a>
                <a class="dropdown-item" href="{{route('admin.createUser')}}">Créer un Compte Utilisateur</a>
                <a class="dropdown-item" href="{{route('users.active')}}">Comptes Activés</a>
                <a class="dropdown-item" href=" {{route('users.inactive')}} ">Comptes Désactivés</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-shield"></i> Comptes Administrateur
            </a>
            <div class="dropdown-menu" aria-labelledby="adminMenu">
                <a class="dropdown-item" href=" {{route('admin.administrators.index')}}">Liste des Comptes</a>
                <a class="dropdown-item" href=" {{route('admin.administrators.create')}}">Créer un Compte Admin</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="propertyMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-home"></i> Propriétés
            </a>
            <div class="dropdown-menu" aria-labelledby="propertyMenu">
                <a class="dropdown-item" href=" {{route('houses.index')}} ">Liste des Propriétés</a>
                <a class="dropdown-item" href="{{route('houses.create')}}">Créer une Propriété</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="propertyMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-home"></i> Demandes
            </a>
            <div class="dropdown-menu" aria-labelledby="propertyMenu">
                <a class="dropdown-item" href=" {{route('requests.index')}} ">Liste des demandes</a>
                <a class="dropdown-item" href="{{route('houses.create')}}">Validation de demande</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="residentMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-users"></i> Résidents
            </a>
            <div class="dropdown-menu" aria-labelledby="residentMenu">
                <a class="dropdown-item" href="#">Liste des Résidents</a>
                <a class="dropdown-item" href="#">Ajouter un Résident</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-cogs"></i> Paramètres</a>
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
