<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/images/home.avif');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            padding-top: 56px; /* Hauteur de la navbar */
        }
        .navbar-custom {
            background-color: #ffffff; /* Fond complètement opaque */
            z-index: 1030; /* Assure que la navbar est au-dessus du reste */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optionnel : ajoute une légère ombre pour plus de contraste *//* Assure que la navbar est au-dessus du reste */
        }
        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card-icon {
            font-size: 3rem;
            color: #007bff; /* Couleur principale du Port */
        }
        .card-content {
            text-align: center;
        }
        .card-title {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::guard('admin')->user()->name }}</a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                            <li>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Container -->
    <div class="dashboard-container">
        <div class="container">
            <div class="row text-center">
                <!-- Card pour la gestion des maisons -->
                <div class="col-md-4 mb-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <div class="card-icon mb-3">
                                <i class="fas fa-house-user"></i>
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">Gérer les maisons</h5>
                                <p class="card-text">Créer, modifier ou supprimer des maisons.</p>
                                <a href="{{ route('houses.index') }}" class="btn btn-primary">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card pour la gestion des utilisateurs -->
                <div class="col-md-4 mb-4">
                    <div class="card border-success">
                        <div class="card-body">
                            <div class="card-icon mb-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">Gérer les utilisateurs</h5>
                                <p class="card-text">modifier ou supprimer des utilisateurs.</p>
                                <a href="{{route('users.index')}}" class="btn btn-success">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card pour la gestion des résidents -->
                <div class="col-md-4 mb-4">
                    <div class="card border-info">
                        <div class="card-body">
                            <div class="card-icon mb-3">
                                <i class="fas fa-user-check"></i>
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">Gérer les résidents</h5>
                                <p class="card-text">Attribuer des propriétés aux utilisateurs.</p>
                                <a href="#" class="btn btn-info">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card pour les notifications -->
                <div class="col-md-4 mb-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <div class="card-icon mb-3">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">Notifications</h5>
                                <p class="card-text">Envoyer des notifications aux résidents.</p>
                                <a href="#" class="btn btn-warning">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card pour les statistiques -->
                <div class="col-md-4 mb-4">
                    <div class="card border-danger">
                        <div class="card-body">
                            <div class="card-icon mb-3">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">Statistiques</h5>
                                <p class="card-text">Produire des statistiques sur les résidents.</p>
                                <a href="#" class="btn btn-danger">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card pour la gestion des paiements -->
                <div class="col-md-4 mb-4">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <div class="card-icon mb-3">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">Gestion des paiements</h5>
                                <p class="card-text">Gérer le paiement des loyers des résidents.</p>
                                <a href="#" class="btn btn-secondary">Accéder</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
