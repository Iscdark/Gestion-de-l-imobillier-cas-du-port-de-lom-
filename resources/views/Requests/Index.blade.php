<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - Requests</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-white shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong>Admin Dashboard</strong>
            </a>
            <!-- Navbar items here -->
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h3 class="h5 pt-2">Requests</h3>
                @foreach($requests as $request)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Request ID: {{ $request->id }}</h5>
                            <p class="card-text"><strong>House:</strong> {{ $request->house->description }}</p>
                            <p class="card-text"><strong>User:</strong> {{ $request->user->name }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $request->status }}</p>
                            
                            <form action="{{ route('requests.updateStatus', $request->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <select name="status" class="form-select">
                                        <option value="en attente" {{ $request->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </form>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                {{ $requests->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
