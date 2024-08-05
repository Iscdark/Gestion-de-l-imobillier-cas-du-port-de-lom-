<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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

        .centered-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f8ff;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .form-floating {
            position: relative;
        }

        .form-floating .form-control {
            padding-left: 2.5rem;
        }

        .form-floating .form-control-icon {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            border-radius: 0.25rem;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        @include('layouts.navbar') <!-- Inclure la navbar -->

        <!-- Contenu principal -->
        <div class="content">
            @include('layouts.header')

            <section class="centered-container">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                            <div class="card border-light-subtle rounded-4">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('images/logo-togo-port.webp') }}" alt="Logo" class="logo">
                                        <h4 class="text-center">Créer un Compte Utilisateur</h4>
                                    </div>
                                    <form action="{{ route('account.processregister') }}" method="POST">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" required>
                                                    <label for="name">Nom</label>
                                                    @error('name')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                                                    <label for="email">Email</label>
                                                    @error('email')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                                                    <label for="password">Mot de Passe</label>
                                                    @error('password')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" required>
                                                    <label for="password_confirmation">Confirmer Mot de Passe</label>
                                                    @error('password_confirmation')
                                                        <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn-custom">Créer un Compte</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
