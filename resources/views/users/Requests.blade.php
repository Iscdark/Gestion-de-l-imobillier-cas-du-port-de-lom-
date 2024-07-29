<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Requests</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    

    <div class="container mt-5">
        <div class="card border-0 shadow">
            <div class="card-body">
                <h4 class="card-title">My Requests</h4>
                <div class="row">
                    @forelse($requests as $request)
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Request ID: {{ $request->id }}</h5>
                                    <p class="card-text">House ID: {{ $request->house_id }}</p>
                                    <p class="card-text">Status: {{ $request->status }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No requests found.</p>
                    @endforelse
                </div>

                <!-- Pagination -->
                {{ $requests->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
