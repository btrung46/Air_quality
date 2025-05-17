@extends('layout')
@section('context')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg rounded-3">
                <div class="card-header bg-primary text-white p-4 border-0 rounded-top-3">
                    <h2 class="text-center mb-0 fw-bold">Forgot Password</h2>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <div class="rounded-circle bg-light p-3 d-inline-flex mb-3">
                            <i class="bi bi-envelope-paper-fill text-primary fs-3"></i>
                        </div>
                        <p class="text-muted">Enter your email and we'll send you a password reset link</p>
                    </div>
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email-reset" class="form-label fw-medium">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope-fill text-primary"></i>
                                </span>
                                <input type="email" name="email" id="email-reset" class="form-control border-start-0 ps-0" 
                                     required>
                            </div>
                            @error('email')
                                <div class="text-danger mt-2 small">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg py-2 fw-medium">
                                <i class="bi bi-send-fill me-2"></i> Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light p-4">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                            <a href="/login" class="text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i> Back to Login
                            </a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="/register" class="text-decoration-none fw-medium ms-1">Register</a>
                        </div>
                    </div>
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
</style>

<!-- Bootstrap JS for alert dismissal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection