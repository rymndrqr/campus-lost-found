<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar { min-height: 100vh; background: #1e293b; width: 240px; position: fixed; }
        .sidebar a { color: #94a3b8; text-decoration: none; display: block; padding: 10px 20px; }
        .sidebar a:hover, .sidebar a.active { color: #fff; background: rgba(255,255,255,.08); }
        .sidebar .brand { color: #fff; font-size: 18px; font-weight: 700; padding: 20px; border-bottom: 1px solid #334155; }
        .main-content { margin-left: 240px; padding: 30px; }
        .sidebar .nav-section { color: #475569; font-size: 11px; font-weight: 600;
          letter-spacing: .08em; text-transform: uppercase; padding: 14px 20px 4px; }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="brand">📚 Library System</div>
    <div class="nav-section">Main Menu</div>
    <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
    <div class="nav-section">Modules</div>
    <a href="{{ route('books.index') }}"><i class="bi bi-book me-2"></i> Books</a>
    <a href="{{ route('members.index') }}"><i class="bi bi-people me-2"></i> Members</a>
    <a href="{{ route('borrows.index') }}"><i class="bi bi-arrow-left-right me-2"></i> Borrowing</a>
    <div class="nav-section">Reports</div>
    <a href="{{ route('reports.index') }}"><i class="bi bi-file-earmark-pdf me-2"></i> Reports</a>
    <div class="nav-section">Account</div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="background:none;border:none;width:100%;">
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </a>
        </button>
    </form>
</div>

<!-- MAIN -->
<div class="main-content">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>