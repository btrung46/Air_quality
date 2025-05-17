@extends('layout')
@section('context')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">Welcome Back</h2>
                            <p class="text-muted">Sign in to your account</p>
                        </div>

                        <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-envelope-fill text-primary"></i>
                                    </span>
                                    <input type="email" name="email" id="email"
                                        class="form-control border-start-0 ps-0" value="{{ old('email') }}"
                                        autocomplete="email">
                                </div>
                                @error('email')
                                    <div class="text-danger mt-2 small">
                                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label fw-medium mb-0">Password</label>
                                    <a href="/password/reset" class="text-decoration-none small text-primary">Forgot
                                        password?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input type="password" name="password" id="password"
                                        class="form-control border-start-0 border-end-0 ps-0"
                                        autocomplete="current-password">
                                    <button class="input-group-text bg-light border-start-0 password-toggle" type="button"
                                        data-target="password">
                                        <i class="bi bi-eye-slash-fill"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="text-danger mt-2 small">
                                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
                                <label class="form-check-label" for="remember-me">Remember me</label>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-primary btn-lg w-100 w-sm-auto py-2 fw-medium signin-button d-flex justify-content-center align-items-center">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    <span>Sign In</span>
                                    <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>



                        </form>
                    </div>
                    <div class="card-footer bg-light p-4 text-center">
                        <p class="mb-0">Don't have an account? <a href="/register"
                                class="text-decoration-none fw-medium">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap Icons CSS in your layout file or here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Optional custom CSS -->
    <style>
        .card {
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .input-group-text {
            color: #6c757d;
        }

        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .password-toggle {
            cursor: pointer;
        }

        .password-toggle:hover {
            color: #0d6efd;
        }
    </style>

    <!-- JavaScript for password toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.password-toggle');

            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const icon = this.querySelector('i');

                    // Toggle password visibility
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        icon.classList.remove('bi-eye-slash-fill');
                        icon.classList.add('bi-eye-fill');
                    } else {
                        passwordInput.type = 'password';
                        icon.classList.remove('bi-eye-fill');
                        icon.classList.add('bi-eye-slash-fill');
                    }
                });
            });
        });
    </script>
@endsection
