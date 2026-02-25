<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'سیستم گردش کار') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background: #475569;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .sidebar {
            background: #334155;
            min-height: 100vh;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar .nav-link {
            color: #e2e8f0;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: none;
        }

        .sidebar .nav-link.active {
            background-color: #64748b;
            color: #ffffff;
        }

        .card {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .btn-primary {
            background: #475569;
            border: 2px solid #475569;
            border-radius: 8px;
            padding: 10px 20px;
        }

        .table thead th {
            background: #475569;
            color: white;
            border: none;
            font-weight: 600;
        }

        .priority-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 500;
        }

        .priority-low { background-color: #00b894; color: white; }
        .priority-medium { background-color: #fdcb6e; color: #2d3436; }
        .priority-high { background-color: #e17055; color: white; }
        .priority-critical { background-color: #d63031; color: white; }

        /* Dashboard Professional Styles */
        .dashboard-card {
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .dashboard-card .card-body {
            padding: 1.75rem;
        }

        .dashboard-stat-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 0.75rem;
        }

        .dashboard-stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0;
        }

        .dashboard-stat-icon {
            color: #64748b;
            font-size: 2.25rem;
        }

        /* Professional Color Scheme */
        .card-departments {
            border-left: 5px solid #334155;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
        }

        .card-workflows {
            border-left: 5px solid #475569;
            background: linear-gradient(135deg, #f1f5f9 0%, #ffffff 100%);
        }

        .card-tasks {
            border-left: 5px solid #64748b;
            background: linear-gradient(135deg, #e2e8f0 0%, #ffffff 100%);
        }

        .card-pending {
            border-left: 5px solid #94a3b8;
            background: linear-gradient(135deg, #cbd5e1 0%, #ffffff 100%);
        }

        /* Table Styles */
        .table-professional {
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .table-professional thead th {
            background: #475569;
            border: none;
            padding: 1.25rem 1rem;
            font-weight: 600;
            color: #ffffff;
            font-size: 0.9rem;
            text-align: right;
        }

        .table-professional tbody td {
            padding: 1.25rem 1rem;
            border: none;
            border-bottom: 1px solid #e2e8f0;
            color: #334155;
            font-size: 0.9rem;
        }

        /* Status Badges */
        .status-badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.6rem;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            min-width: 90px;
            border: 1px solid;
        }

        .status-active {
            background: #f0f9ff;
            color: #0c4a6e;
            border-color: #0ea5e9;
        }

        .status-inactive {
            background: #fef2f2;
            color: #991b1b;
            border-color: #dc2626;
        }

        .status-archived {
            background: #f8fafc;
            color: #475569;
            border-color: #94a3b8;
        }

        .status-pending {
            background: #fffbeb;
            color: #92400e;
            border-color: #f59e0b;
        }

        .status-in_progress {
            background: #eff6ff;
            color: #1e40af;
            border-color: #3b82f6;
        }

        .status-completed {
            background: #f0fdf4;
            color: #166534;
            border-color: #22c55e;
        }

        .status-rejected {
            background: #fef2f2;
            color: #991b1b;
            border-color: #dc2626;
        }

        .status-on_hold {
            background: #f8fafc;
            color: #475569;
            border-color: #94a3b8;
        }

        /* Priority Badges */
        .priority-badge {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.6rem;
            font-weight: 600;
            text-align: center;
            display: inline-block;
            min-width: 70px;
            border: 1px solid;
        }

        .priority-1, .priority-low {
            background: #f0fdf4;
            color: #166534;
            border-color: #22c55e;
        }

        .priority-2, .priority-medium {
            background: #fffbeb;
            color: #92400e;
            border-color: #f59e0b;
        }

        .priority-3, .priority-high {
            background: #fef2f2;
            color: #991b1b;
            border-color: #dc2626;
        }

        .priority-4, .priority-critical {
            background: #fef2f2;
            color: #7f1d1d;
            border-color: #b91c1c;
        }

        /* Card Headers */
        .card-header-professional {
            background: #475569;
            border-bottom: 2px solid #334155;
            padding: 1.25rem 1.5rem;
        }

        .card-header-professional h6 {
            color: #ffffff;
            font-weight: 600;
            margin: 0;
            font-size: 1.1rem;
        }

        /* Buttons */
        .btn-professional {
            background: #475569;
            border: 2px solid #475569;
            color: #ffffff;
            padding: 0.6rem 1.25rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
        }

        /* Links */
        .link-professional {
            color: #475569;
            text-decoration: none;
            font-weight: 500;
        }

        /* Dashboard Title */
        .dashboard-title {
            color: #1e293b;
            font-weight: 700;
            font-size: 2.25rem;
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 3px solid #475569;
            text-align: center;
        }

        .dashboard-title i {
            color: #475569;
            margin-left: 0.75rem;
        }

        /* Action Buttons Styling - RTL Compatible */
        .btn-group {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-start;
            flex-direction: row;
        }

        .btn-group .btn {
            margin: 0;
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            border: none;
            transition: none;
            min-width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-group .btn-info {
            background: #0ea5e9;
            color: #ffffff;
        }

        .btn-group .btn-warning {
            background: #f59e0b;
            color: #ffffff;
        }

        .btn-group .btn-danger {
            background: #dc2626;
            color: #ffffff;
        }

        .btn-group .btn-success {
            background: #22c55e;
            color: #ffffff;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }

            .btn-group {
                gap: 0.25rem;
            }

            .btn-group .btn {
                padding: 0.4rem 0.6rem;
                font-size: 0.8rem;
                min-width: 35px;
                height: 35px;
            }

            .dashboard-stat-value {
                font-size: 1.5rem;
            }

            .dashboard-stat-icon {
                font-size: 1.75rem;
            }

            .card-body {
                padding: 1rem;
            }

            .table-professional thead th,
            .table-professional tbody td {
                padding: 0.75rem 0.5rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
                align-items: stretch;
            }

            .btn-group .btn {
                margin: 0;
                width: 100%;
                text-align: center;
                min-width: auto;
                height: auto;
                padding: 0.5rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .dashboard-title {
                font-size: 1.75rem;
                margin-bottom: 1.5rem;
            }

            .col-xl-3 {
                margin-bottom: 1rem;
            }
        }

        /* Table Responsiveness */
        .table-responsive {
            border-radius: 10px;
            overflow-x: auto;
        }

        /* Card Responsiveness */
        .dashboard-card {
            margin-bottom: 1rem;
        }

        /* Navigation Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                right: -100%;
                width: 250px;
                z-index: 1000;
                transition: right 0.3s ease;
            }

            .sidebar.show {
                right: 0;
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .navbar-brand {
                font-size: 1rem;
            }
        }

        /* RTL Specific Styles */
        .table-professional thead th,
        .table-professional tbody td {
            text-align: right;
        }

        .btn-group {
            direction: rtl;
        }

        .dashboard-stat-label,
        .dashboard-stat-value {
            text-align: right;
        }

        .card-header-professional h6 {
            text-align: right;
        }

        /* Table Cell Alignment */
        .table-professional td:last-child {
            text-align: center;
        }

        .table-professional th:last-child {
            text-align: center;
        }

        /* Text Overflow Handling */
        .text-overflow-safe {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        .card-body p {
            word-wrap: break-word;
            overflow-wrap: break-word;
            line-height: 1.6;
        }

        .dashboard-card .card-body {
            overflow: hidden;
        }

        /* Responsive Text */
        @media (max-width: 768px) {
            .card-body p {
                font-size: 0.9rem;
                line-height: 1.5;
            }

            .dashboard-stat-label,
            .dashboard-stat-value {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler d-md-none" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="fas fa-project-diagram me-2"></i>
                {{ config('app.name', 'سیستم گردش کار') }}
            </a>

            <div class="navbar-nav ms-auto">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i>
                        {{ Auth::user()->name ?? 'کاربر' }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>پروفایل</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>تنظیمات</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-2"></i>خروج
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar-overlay" id="sidebarOverlay"></div>

            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebar">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                داشبورد
                            </a>
                        </li>

                        @if(auth()->user()->canManageDepartments())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('departments.*') ? 'active' : '' }}" href="{{ route('departments.index') }}">
                                <i class="fas fa-building me-2"></i>
                                دپارتمان‌ها
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->canManageWorkflows())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('workflows.*') ? 'active' : '' }}" href="{{ route('workflows.index') }}">
                                <i class="fas fa-project-diagram me-2"></i>
                                گردش کارها
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->canManageTasks())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">
                                <i class="fas fa-tasks me-2"></i>
                                تسک‌ها
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });

            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            });

            // بستن سایدبار با کلیک روی لینک‌ها در موبایل
            const sidebarLinks = sidebar.querySelectorAll('.nav-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('show');
                        sidebarOverlay.classList.remove('show');
                    }
                });
            });
        });
    </script>
</body>
</html>
