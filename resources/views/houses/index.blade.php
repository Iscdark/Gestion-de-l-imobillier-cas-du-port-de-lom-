<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Houses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .container-fluid {
            display: flex;
            flex-direction: row;
            height: 100vh;
        }

        .navbar {
            width: 270px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            border-right: 1px solid #ddd;
            padding: 20px;
            box-sizing: border-box;
            color: #fff;
        }

        .navbar-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .navbar-header img {
            width: 150px;
        }

        .navbar-nav {
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        .navbar-nav .nav-item {
            margin-bottom: 15px;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            background-color: #495057;
        }

        .navbar-nav .nav-link i {
            margin-right: 10px;
        }

        .navbar-nav .nav-link:hover {
            background-color: #6c757d;
        }

        .navbar-nav .dropdown-menu {
            position: absolute;
            background-color: #495057;
        }

        .navbar-nav .dropdown-item {
            padding: 10px;
            color: #ffffff;
            text-decoration: none;
        }

        .navbar-nav .dropdown-item:hover {
            background-color: #6c757d;
        }

        .navbar .logout {
            margin-top: auto;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar .logout i {
            margin-right: 5px;
        }

        .content {
            margin-left: 270px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            background-color: #ffffff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
            background-color: #007bff;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2em;
        }

        .house-card {
            border: 1px solid #ddd;
            border-radius: .5rem;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            margin-bottom: 20px;
            background-color: #ffffff;
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
            color: #333;
        }

        .house-card-title {
            font-size: 1.25em;
            margin-bottom: 10px;
            color: #007bff;
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
            font-size: 0.875em;
        }

        
    </style>
</head>
<body class="bg-light">
    <!-- Navbar -->
    <div class="container-fluid">
        @include('layouts.navbar') <!-- Inclure la navbar -->
        
        <!-- Contenu principal -->
        <div class="content">
            @include('layouts.header')
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
                                    <h5 class="house-card-title">{{ $house->description }}</h5>
                                </div>
                                <div class="house-card-actions">
                                    <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning btn-sm btn-icon">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('houses.destroy', $house->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn btn-sm btn-icon">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>            document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous ne pourrez pas revenir en arrière après cela !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer !',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                    Swal.fire({
                        title: 'Succès',
                        text: 'L\'utilisateur a bien été supprimé !',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 </body>
</html>
