<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Create House</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Style pour centrer verticalement la div */
        .centered-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f8ff; 
        }
        .logo {
            max-width: 150px; /* Ajustez la taille du logo selon vos besoins */
            margin-bottom: 20px; /* Espace entre le logo et le titre */
        }
        .form-floating {
            position: relative;
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
        .navbar-custom {
            background-color: rgba(255, 255, 255, 0.9); /* Fond blanc semi-transparent */
            z-index: 1030; /* Assure que la navbar est au-dessus du reste */
        }
    </style>
</head>
<body>
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
    <section class="centered-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo-togo-port.webp') }}" alt="Logo" class="logo">
                                <h4 class="text-center">Create New House</h4>
                            </div>
                            <form action="{{ route('houses.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="description" id="description" class="form-control" required>
                                            <label for="description" class="form-label">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="available">Available</option>
                                                <option value="occupied">Occupied</option>
                                                <option value="maintenance">Maintenance</option>
                                            </select>
                                            <label for="status" class="form-label">Status</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="file" name="image" id="image" class="form-control">
                                            <label for="image" class="form-label">Image</label>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-custom">Create</button>
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
