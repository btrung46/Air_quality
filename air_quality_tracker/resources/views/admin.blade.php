<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --topbar-height: 60px;
            --sidebar-bg: #ffffff;
            --sidebar-hover: #334155;
            --sidebar-active: #3a56d4;
            --sidebar-text: #94a3b8;
            --sidebar-active-text: #ffffff;
            --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f5f9;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .admin-navbar {
            height: var(--topbar-height);
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 1.5rem;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 1030;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 1.5rem;
        }

        .user-dropdown {
            position: relative;
        }

        .user-dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color var(--transition-speed);
        }

        .user-dropdown-toggle:hover {
            background-color: #f1f5f9;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #1e293b;
        }

        .user-role {
            font-size: 0.75rem;
            color: #64748b;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: var(--topbar-height);
            left: 0;
            bottom: 0;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            transition: width var(--transition-speed), transform var(--transition-speed);
            z-index: 1020;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .nav-item {
            margin: 0.25rem 0.75rem;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            color: var(--sidebar-text);
            border-radius: 0.5rem;
            transition: all var(--transition-speed);
            white-space: nowrap;
        }

        .sidebar .nav-link i {
            font-size: 1.25rem;
            margin-right: 1rem;
            min-width: 1.25rem;
            text-align: center;
        }

        .sidebar .nav-link:hover {
            background-color: var(--sidebar-hover);
            color: var(--sidebar-active-text);
        }

        .sidebar .nav-link.active {
            background-color: var(--sidebar-active);
            color: var(--sidebar-active-text);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: auto;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 2rem;
            min-height: calc(100vh - var(--topbar-height));
            transition: margin-left var(--transition-speed);
        }

        .page-title {
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card {
            border: none;
            border-radius: 0.75rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s, box-shadow 0.2s;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Responsive Styles */
        @media (max-width: 767.98px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1.5rem;
            }

            .admin-navbar {
                left: 0;
            }
        }

        /* Sidebar Toggle Button */
        .sidebar-toggle {
            background: none;
            border: none;
            color: #2f68b7;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color var(--transition-speed);
        }

        .sidebar-toggle:hover {
            color: var(--primary-color);
        }

        /* Animations */
        .fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Alert Styles */
        .alert-success {
            background-color: #ecfdf5;
            border-color: #d1fae5;
            color: #065f46;
        }

        .alert-success .bi {
            color: #10b981;
        }

        .alert {
            border-radius: 0.5rem;
            border-left-width: 4px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
    </style>
</head>

<body>
    @include('success')
    
    <!-- Navbar -->
    <nav class="admin-navbar d-flex align-items-center">
        <div class="d-flex align-items-center">
            <button class="sidebar-toggle me-3 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu">
                <i class="bi bi-list"></i>
            </button>
            <a class="navbar-brand" href="/admin">
                <i class="bi bi-stars"></i>
                <span>Admin Panel</span>
            </a>
        </div>

        <div class="d-flex align-items-center ms-auto">
            @auth
            <div class="user-dropdown">
                <div class="user-dropdown-toggle">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="user-info d-none d-md-flex">
                        <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="user-role">Administrator</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="ms-3">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="sidebar collapse d-md-block">
        <div class="position-sticky h-100 d-flex flex-column">
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link {{(Request::routeIs('admin')) ? 'active' : ''}}" href="/admin">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Request::routeIs('admin.user')) ? 'active' : ''}}" href="/admin/users">
                        <i class="bi bi-people"></i> User Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{(Request::routeIs('admin.support')) ? 'active' : ''}}" href="{{route('admin.support')}}">
                        <i class="bi bi-chat-dots"></i> Support Requests
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer mt-auto">
                <div class="text-center text-white-50 small">
                    <div>Admin Dashboard v1.0</div>
                    <div>© 2025 All Rights Reserved</div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content fade-in">
        @yield('context')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });
            }
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickOnToggle = sidebarToggle.contains(event.target);
                
                if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('show')) {
                    sidebar.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>
