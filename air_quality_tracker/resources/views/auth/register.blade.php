@extends('layout')
@section('context')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">Create Account</h2>
                            <p class="text-muted">Join us today and get started</p>
                        </div>

                        <form action="{{ route('register') }}" method="post">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="form-label fw-medium">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-person-fill text-primary"></i>
                                    </span>
                                    <input type="text" name="name" id="name"
                                        class="form-control border-start-0 ps-0" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <div class="text-danger mt-2 small">
                                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-envelope-fill text-primary"></i>
                                    </span>
                                    <input type="email" name="email" id="email"
                                        class="form-control border-start-0 ps-0" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-danger mt-2 small">
                                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-lock-fill text-primary"></i>
                                    </span>
                                    <input type="password" name="password" id="password"
                                        class="form-control border-start-0 border-end-0 ps-0">
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

                            <div class="mb-4">
                                <label for="confirm-password" class="form-label fw-medium">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bi bi-shield-lock-fill text-primary"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" id="confirm-password"
                                        class="form-control border-start-0 border-end-0 ps-0">
                                    <button class="input-group-text bg-light border-start-0 password-toggle" type="button"
                                        data-target="confirm-password">
                                        <i class="bi bi-eye-slash-fill"></i>
                                    </button>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger mt-2 small">
                                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                <label class="form-check-label small" for="terms">
                                    I agree to the <a href="/terms_of_service" class="text-decoration-none">Terms of
                                        Service</a> and <a href="/privacy_policy" class="text-decoration-none">Privacy
                                        Policy</a>
                                </label>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="btn btn-primary btn-lg w-100 w-sm-auto py-2 fw-medium signin-button d-flex justify-content-center align-items-center">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    <span>Create Account</span>
                                    <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer bg-light p-4 text-center">
                        <p class="mb-0">Already have an account? <a href="/login"
                                class="text-decoration-none fw-medium">Login here</a></p>
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
