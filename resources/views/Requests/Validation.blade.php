<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Style de la page */
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
            z-index: 1;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .chart-container {
            margin-top: 30px;
        }

        canvas {
            max-width: 100%;
            max-height: 400px;
        }

        table {
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    @include('layouts.navbarService')

    <div class="content">
        <h1>Validation des Demandes</h1>
    
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->first_name }} {{ $request->last_name }}</td>
                            <td>
                                <!-- Formulaire pour approuver la demande -->
                                <form action="{{ route('requests.approve', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <div class="form-group">
                                        <label for="motif">Motif for Approval</label>
                                        <input type="text" id="motif" name="motif" class="form-control" required placeholder="Reason for approval">
                                    </div>
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
            
                                <form action="{{ route('requests.reject', $request->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <div class="form-group">
                                        <label for="motif">Motif for Rejection</label>
                                        <input type="text" id="motif" name="motif" class="form-control" required placeholder="Reason for rejection">
                                    </div>
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
