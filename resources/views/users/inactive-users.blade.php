<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs Désactivés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
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
            overflow-y: auto;
            z-index: 1000; /* Assurez-vous que la navbar est au-dessus des autres éléments */
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
            margin-left: 270px; /* Ajuste pour compenser la largeur de la navbar */
            padding: 20px;
            flex: 1;
            box-sizing: border-box;
            z-index: 1; /* Assurez-vous que le contenu est au-dessus de la navbar */
        }

        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .card-body {
            padding: 20px;
        }

        .card-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        .card-progress {
            height: 8px;
            border-radius: 4px;
            background-color: #e9ecef;
        }

        .card-progress-bar {
            height: 100%;
            border-radius: 4px;
            background-color: #007bff;
        }

        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .user-name {
            font-size: 18px;
            font-weight: bold;
        }


        .card-primary {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
        }

        .card-danger {
            background: linear-gradient(135deg, #e74a3b, #c0392b);
            color: #fff;
        }

        .card-success {
            background: linear-gradient(135deg, #1cc88a, #17a673);
            color: #fff;
        }

        .card-warning {
            background: linear-gradient(135deg, #f6c23e, #f1c40f);
            color: #333;
        }

        .chart-container {
            margin-top: 30px;
        }

        canvas {
            max-width: 100%;
            max-height: 400px;
        }

        /* Style pour le tableau des utilisateurs */
        table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1; /* Assurez-vous que le tableau est au-dessus de la navbar */
        }

        th, td {
            text-align: center;
            padding: 12px;
        }

        thead {
            background-color: #007bff;
            color: #ffffff;
        }

        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn-icon {
            padding: 5px;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    @include('layouts.navbar') <!-- Inclure la navbar -->

    <div class="content">
        <h1 class="mb-4 text-center">Utilisateurs Désactivés</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-success activate-btn" href="{{ route('admin.users.activate', $user->id) }}">Activer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{ $users->links() }}
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.activate-btn').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Êtes-vous sûr ?',
                        text: "Voulez-vous activer cet utilisateur ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Oui, activer !',
                        cancelButtonText: 'Annuler'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = button.href;
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
