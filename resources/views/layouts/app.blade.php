<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Lost & Found</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { height: 100vh; background-color: #343a40; width: 250px; position: fixed; }
        .sidebar .nav-link { color: #dee2e6; border-radius: 0; }
        .sidebar .nav-link:hover { background-color: #495057; color: #fff; }
        .main { margin-left: 250px; padding: 20px; }
    </style>
</head>
<body>
<!-- Sidebar -->
<nav class="sidebar d-flex flex-column p-3">
    <div class="sidebar-brand mb-4 pb-2 border-bottom">
        <h5 class="text-white mb-0">Lost & Found</h5>
    </div>
    <nav class="nav nav-pills flex-column">
        <a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-house-door me-2"></i>Dashboard</a>
        <a class="nav-link" href="{{ route('lost-items.index') }}"><i class="bi bi-search me-2"></i>Lost Items</a>
        <a class="nav-link" href="{{ route('reporters.index') }}"><i class="bi bi-person me-2"></i>Reporters</a>
        <a class="nav-link" href="{{ route('claims.index') }}"><i class="bi bi-check-circle me-2"></i>Claims</a>
        <a class="nav-link" href="{{ route('reports.index') }}"><i class="bi bi-file-earmark-text me-2"></i>Reports</a>
    </nav>
    <hr class="my-3">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link border-0 bg-transparent text-start">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</nav>

<!-- Main content -->
<main class="main">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
