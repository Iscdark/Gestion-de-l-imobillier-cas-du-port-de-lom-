<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* Style pour centrer verticalement la div */
        .centered-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f0f8ff; /* Couleur de fond douce */
        }
        .logo {
            max-width: 150px; /* Ajustez la taille du logo selon vos besoins */
            margin-bottom: 20px; /* Espace entre le logo et le titre */
        }
        .form-floating {
            position: relative;
        }
        .form-floating .form-control {
            padding-left: 2.5rem; /* Ajuste le padding pour faire de la place à l'icône */
        }
        .form-floating .form-control-icon {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #6c757d; /* Couleur de l'icône */
        }
        .invalid-feedback {
            display: block;
            color: #dc3545; /* Couleur des messages d'erreur */
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
    </style>
</head>
<body class="bg-light">
    <section class="centered-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo-togo-port.webp') }}" alt="Logo" class="logo">
                                <h4 class="text-center">Register Here</h4>
                            </div>
                            <form action="{{ route('account.processregister') }}" method="POST">
                                @csrf
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
                                            <label for="name" class="form-label">Name</label>
                                            @error('name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                            <label for="email" class="form-label">Email</label>
                                            @error('email')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                            <label for="password" class="form-label">Password</label>
                                            @error('password')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            @error('password_confirmation')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <button class="btn btn-custom" type="submit">Register Now</button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                        <a href="{{ route('account.login') }}" class="link-secondary text-decoration-none">Already have an account? Log in</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
