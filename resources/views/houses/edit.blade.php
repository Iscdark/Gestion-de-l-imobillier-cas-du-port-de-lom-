<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Edit House</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .navbar-custom {
            background-color: #ffffff; /* Fond blanc opaque */
            z-index: 1030; /* Assure que la navbar est au-dessus du reste */
            height: 60px; /* Hauteur de la navbar */
            position: fixed; /* Fixe la navbar en haut */
            width: 100%; /* Assure que la navbar occupe toute la largeur */
            top: 0; /* Assure que la navbar est en haut de la page */
            padding: 0; /* Supprime le padding par défaut */
        }
        .navbar-custom .navbar-brand {
            line-height: 60px; /* Alignement vertical du texte */
            margin: 0; /* Supprime les marges par défaut */
        }
        .navbar-custom .navbar-nav {
            align-items: center; /* Centre verticalement les éléments de navigation */
            margin-bottom: 0; /* Supprime la marge inférieure par défaut */
        }
        .navbar-custom .navbar-toggler {
            margin-top: 5px; /* Ajuste la position du bouton pour le menu hamburger */
        }
        .logo {
            max-width: 150px; /* Taille maximale du logo */
            margin-bottom: 20px; /* Espacement sous le logo */
        }
        .btn-custom {
            background-color: #007bff; /* Couleur de fond personnalisée */
            color: white; /* Couleur du texte */
            border: none; /* Supprime la bordure */
            padding: 0.5rem 1rem; /* Réduit les dimensions */
            font-size: 0.875rem; /* Réduit la taille de la police */
            border-radius: 0.25rem; /* Bordure arrondie */
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Couleur au survol */
        }
        .background-image {
            background-image: url('{{ asset('images/background.jpg') }}'); /* Chemin vers votre image de fond */
            background-size: cover; /* Couvre tout l'arrière-plan */
            background-position: center; /* Centre l'image */
            background-attachment: fixed; /* Fixe l'image de fond lors du défilement */
            background-repeat: no-repeat; /* Empêche la répétition de l'image */
            padding: 30px 0; /* Ajoute du padding pour éviter que le contenu touche les bords */
        }
        .container {
            margin-top: 70px; /* Ajout de marge pour compenser la hauteur de la navbar */
        }
        .card {
            border: 1px solid #ddd;
            border-radius: .5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.9); /* Fond blanc semi-transparent pour le formulaire */
        }
        .img-thumbnail {
            max-width: 200px; /* Limite la taille de l'image affichée */
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
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

    <!-- Main Content -->
    <section class="background-image">
        <div class="container mt-5"> <!-- Ajout de marge pour la navbar -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo-togo-port.webp') }}" alt="Logo" class="logo">
                                <h4 class="text-center">Edit House</h4>
                            </div>
                            <form action="{{ route('houses.update', $house->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $house->description) }}" required>
                                            <label for="description" class="form-label">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="available" {{ $house->status == 'available' ? 'selected' : '' }}>Available</option>
                                                <option value="occupied" {{ $house->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                                                <option value="maintenance" {{ $house->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                            </select>
                                            <label for="status" class="form-label">Status</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="file" name="image" id="image" class="form-control">
                                            <label for="image" class="form-label">Image</label>
                                            <small class="form-text">Current image: <img src="{{ asset('storage/' . $house->image) }}" alt="House Image" class="img-thumbnail mt-2"></small>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-custom">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
