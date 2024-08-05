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
            overflow: hidden;
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
            overflow-y: auto; /* Permet le défilement vertical si nécessaire */
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

        .welcome-section {
            background-color: #007bff;
            color: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .welcome-section h1 {
            margin-bottom: 10px;
        }

        .welcome-section p {
            font-size: 1.2em;
        }

        .info-cards {
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                height: auto;
                position: static;
                border-right: none;
                padding: 10px;
            }

            .content {
                margin-left: 0;
            }

            .navbar-nav {
                flex-direction: row;
                flex-wrap: wrap;
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        @include('layouts.navbar') <!-- Inclure la navbar -->
        
        <!-- Contenu principal -->
        <div class="content">
            @include('layouts.header') <!-- Inclure le header -->
            
            <div class="welcome-section">
                <h1>Bienvenue sur le Dashboard Admin</h1>
                <p>Voici un aperçu des principales statistiques et actions que vous pouvez effectuer sur le système. Utilisez les cartes ci-dessous pour accéder rapidement aux sections importantes.</p>
            </div>

            <div class="info-cards">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card card-primary">
                            <div class="card-body">
                                <i class="fas fa-home card-icon"></i>
                                <h5 class="card-title">Maisons</h5>
                                <p class="card-text">50 maisons disponibles</p>
                                <div class="card-progress">
                                    <div class="card-progress-bar" style="width: 70%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card card-danger">
                            <div class="card-body">
                                <i class="fas fa-user-times card-icon"></i>
                                <h5 class="card-title">Demandes Refusées</h5>
                                <p class="card-text">10 demandes refusées</p>
                                <div class="card-progress">
                                    <div class="card-progress-bar" style="width: 20%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card card-success">
                            <div class="card-body">
                                <i class="fas fa-check-circle card-icon"></i>
                                <h5 class="card-title">Demandes Acceptées</h5>
                                <p class="card-text">25 demandes acceptées</p>
                                <div class="card-progress">
                                    <div class="card-progress-bar" style="width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card card-warning">
                            <div class="card-body">
                                <i class="fas fa-chart-line card-icon"></i>
                                <h5 class="card-title">Statistiques</h5>
                                <p class="card-text">Analyse des performances</p>
                                <div class="card-progress">
                                    <div class="card-progress-bar" style="width: 90%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <h3>Statistiques des Maisons</h3>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Maisons Demandées',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
