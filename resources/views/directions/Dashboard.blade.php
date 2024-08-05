<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Service</title>
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
            z-index: 1000;
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
            box-sizing: border-box;
        }

        .dashboard-card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        .dashboard-card .card-body {
            padding: 20px;
        }

        .dashboard-card .card-icon {
            font-size: 2.5em;
            margin-bottom: 15px;
        }

        .dashboard-card .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .dashboard-card .card-text {
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    @include('layouts.navbarDierction')

    <div class="content">
        <h1 class="mb-4">Dashboard direction</h1>

        <div class="row">
            <!-- Card pour le nombre de demandes en attente -->
            <div class="col-md-4">
                <div class="dashboard-card bg-warning text-dark">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <h5 class="card-title">Demandes en Attente</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>

            <!-- Autres cartes peuvent être ajoutées ici -->
        </div>
    </div>
</body>
</html>
