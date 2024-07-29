<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Houses</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .navbar-custom {
            background-color: #ffffff; /* Couleur de fond de la navbar */
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030; /* Assure que la navbar est au-dessus du reste */
            height: 60px; /* Hauteur de la navbar */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-custom .navbar-brand {
            line-height: 60px; /* Alignement vertical du texte */
        }
        .navbar-custom .nav-link {
            color: rgb(8, 8, 8);
        }
        .house-card {
            border: 1px solid #ddd;
            border-radius: .5rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            margin-bottom: 20px;
        }
        .house-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .house-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .house-card-body {
            padding: 15px;
        }
        .house-card-actions {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px;
            background-color: #f8f9fa;
        }
        .btn-icon {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        body {
            padding-top: 60px;
            background-color: #1d4c7a;/* Ajoute un padding en haut pour éviter que le contenu soit masqué sous la navbar */
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('houses.create') }}">Add New House</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">List of Houses</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach($houses as $house)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="house-card">
                        @if($house->image)
                            <img src="{{ asset('storage/' . $house->image) }}" alt="House Image">
                        @else
                            <img src="https://via.placeholder.com/400x200" alt="Placeholder Image">
                        @endif
                        <div class="house-card-body">
                            <h5 class="card-title">{{ $house->description }}</h5>
                        </div>
                        <div class="house-card-actions">
                            <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning btn-sm btn-icon">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('houses.destroy', $house->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-icon">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
