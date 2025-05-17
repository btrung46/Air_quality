<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Quality Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        html, body {
            height: 100%;
        }
    
        body {
            display: flex;
            flex-direction: column;
        }
    
        main {
            flex: 1 0 auto;
        }
    
        footer {
            flex-shrink: 0;
        }
    </style>
    
</head>
<body>
     @include('success')
    <!-- Header -->
    <header class="dashboard-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo and title -->
                <div class="header-logo">
                    <h2>
                        <a href="/" class="logo-link">
                            <i class="bi bi-wind"></i>
                            <span>Air Quality Dashboard</span>
                        </a>
                    </h2>
                </div>
    
                <!-- Navigation buttons -->
                <div class="header-actions">
                    @auth
                        <!-- Support requests button -->
                        <a href="{{route('support.show')}}" class="btn btn-support">
                            <i class="bi bi-life-preserver"></i>
                            <span>Support Requests</span>
                        </a>
    
                        <!-- Logout button -->
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn btn-logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-auth {{ Request::is('login') ? 'active' : '' }}">
                            <i class="bi bi-person"></i>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-auth {{ Request::is('register') ? 'active' : '' }}">
                            <i class="bi bi-person-plus"></i>
                            <span>Register</span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>
    
    
    
    
    

    <!-- Main Content -->
    <main class="container my-4">
        @yield('context')
    </main>
    

    <!-- Footer -->
    <footer class="bg-light py-4 mt-5 border-top">
        <div class="container">
            <div class="text-center">
                <p class="mb-1">&copy; 2025 Air Quality Dashboard. All rights reserved.</p>
                @auth
                     <p class="mb-1">For support or to report issues, please contact us:</p>
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="mailto:support@airquality.com" class="text-decoration-none text-primary">
                            Email Support
                        </a>
                    </li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">
                        <a href="tel:+84337237363" class="text-decoration-none text-primary">
                            +84 333 723 736
                        </a>
                    </li>
                </ul>
                
                @endauth
               
            </div>
        </div>
    </footer>
    
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart Initialization Script -->

</body>
</html>
<style>
    /* Header Styles */
:root {
  --primary-color: #3498db;
  --primary-dark: #2980b9;
  --primary-light: #5dade2;
  --warning-color: #f39c12;
  --warning-dark: #e67e22;
  --white: #ffffff;
  --light-gray: #f8f9fa;
  --text-color: #2c3e50;
  --shadow-sm: 0 2px 5px rgba(0, 0, 0, 0.1);
  --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.1);
  --transition: all 0.3s ease;
}

.dashboard-header {
  background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
  color: var(--white);
  padding: 1rem 0;
  box-shadow: var(--shadow-md);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.header-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 1rem;
}

.header-logo h2 {
  margin: 0;
  font-size: 1.5rem;
}

.logo-link {
  color: var(--white);
  text-decoration: none;
  font-weight: 700;
  display: flex;
  align-items: center;
  transition: var(--transition);
}

.logo-link:hover {
  color: var(--light-gray);
  transform: scale(1.02);
}

.logo-link i {
  margin-right: 0.5rem;
  font-size: 1.75rem;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.btn {
  display: inline-flex;
  align-items: center;
  padding: 0.5rem 1rem;
  border-radius: 50px;
  font-weight: 500;
  text-decoration: none;
  transition: var(--transition);
  border: none;
  cursor: pointer;
  font-size: 0.9rem;
}

.btn i {
  margin-right: 0.5rem;
}

.btn-support {
  background-color: var(--warning-color);
  color: var(--white);
}

.btn-support:hover {
  background-color: var(--warning-dark);
  transform: translateY(-2px);
  box-shadow: var(--shadow-sm);
}

.btn-logout {
  background-color: transparent;
  color: var(--white);
  border: 1px solid var(--white);
}

.btn-logout:hover {
  background-color: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

.btn-auth {
  background-color: transparent;
  color: var(--white);
  border: 1px solid var(--white);
}

.btn-auth:hover,
.btn-auth.active {
  background-color: var(--white);
  color: var(--primary-color);
  transform: translateY(-2px);
  box-shadow: var(--shadow-sm);
}

.logout-form {
  display: inline;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .header-content {
    justify-content: center;
    text-align: center;
  }

  .header-logo {
    margin-bottom: 0.5rem;
  }

  .btn {
    padding: 0.4rem 0.8rem;
    font-size: 0.85rem;
  }

  .btn span {
    display: none;
  }

  .btn i {
    margin-right: 0;
    font-size: 1rem;
  }
}

@media (max-width: 576px) {
  .header-actions {
    gap: 0.5rem;
  }
}

</style>