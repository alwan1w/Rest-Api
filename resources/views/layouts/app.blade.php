<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Arial', sans-serif; }
        .container { max-width: 1200px; margin-top: 50px; }
        .card { border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .btn-primary { background-color: #007bff; border: none; }
        .btn-primary:hover { background-color: #0056b3; }
        img { max-width: 100%; height: auto; border-radius: 10px; }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
