@extends('layout')
@section('context')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg rounded-3">
                <div class="card-header bg-primary text-white p-4 border-0 rounded-top-3">
                    <h2 class="text-center mb-0 fw-bold">Reset Password</h2>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="rounded-circle bg-light p-3 d-inline-flex mb-3">
                            <i class="bi bi-shield-lock-fill text-primary fs-3"></i>
                        </div>
                        <p class="text-muted">Please enter your new password</p>
                    </div>
                    
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="mb-4">
                            <label for="email" class="form-label fw-medium">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope-fill text-primary"></i>
                                </span>
                                <input type="email" name="email" id="email" class="form-control border-start-0 ps-0" 
                                    value="{{ $email ?? old('email') }}" required readonly>
                            </div>
                            @error('email')
                                <div class="text-danger mt-2 small">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label fw-medium">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock-fill text-primary"></i>
                                </span>
                                <input type="password" name="password" id="password" class="form-control border-start-0 border-end-0 ps-0" 
                                     required>
                                <button class="input-group-text bg-light border-start-0 password-toggle" type="button" data-target="password">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-medium">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-shield-lock-fill text-primary"></i>
                                </span>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control border-start-0 border-end-0 ps-0" 
                                     required>
                                <button class="input-group-text bg-light border-start-0 password-toggle" type="button" data-target="password-confirm">
                                    <i class="bi bi-eye-slash-fill"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger mt-2 small">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg py-2 fw-medium">
                                <i class="bi bi-check2-circle me-2"></i> Reset Password
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light p-4 text-center">
                    <p class="mb-0">Remembered your password? <a href="/login" class="text-decoration-none fw-medium">Login</a></p>
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