@extends('layout')

@section('context')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white p-4 border-0">
                    <h3 class="text-center mb-0 fw-bold">
                        <i class="bi bi-headset me-2"></i> Support Request
                    </h3>
                    <p class="text-center mb-0 mt-2 text-white-50">
                        We're here to help! Please fill out the form below and we'll get back to you as soon as possible.
                    </p>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <form method="POST" action="{{route('support.update',$support_request->id)}}" class="needs-validation" novalidate>
                        @csrf
                        
                        <div class="row g-4">
                            <!-- Personal Information Section -->
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-4 text-primary">
                                    <i class="bi bi-person-circle me-2"></i> Personal Information
                                </h5>
                            </div>
                            
                            <!-- Name -->
                            <div class="col-md-6">
                                <div class="form-floating mb-md-0">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ old('name', $support_request->user->name) }}" 
                                           placeholder="Your name" required>
                                    <label for="name">
                                        <i class="bi bi-person me-1 text-primary"></i> Your Name
                                    </label>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ old('email', $support_request->user->email) }}" 
                                           placeholder="Your email" required>
                                    <label for="email">
                                        <i class="bi bi-envelope me-1 text-primary"></i> Your Email
                                    </label>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="col-12 mt-4">
                                <h5 class="border-bottom pb-2 mb-4 text-primary">
                                    <i class="bi bi-telephone me-2"></i> Contact Information
                                </h5>
                            </div>
                            
                            <!-- Phone -->
                            <div class="col-md-6">
                                <div class="form-floating mb-md-0">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ old('phone', $support_request->phone) }}" 
                                           placeholder="Your phone number" required>
                                    <label for="phone">
                                        <i class="bi bi-phone me-1 text-primary"></i> Phone Number
                                    </label>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text mt-1">
                                        <i class="bi bi-info-circle me-1"></i> Include country code if applicable
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                           id="address" name="address" value="{{ old('address', $support_request->address) }}" 
                                           placeholder="Your address" required>
                                    <label for="address">
                                        <i class="bi bi-geo-alt me-1 text-primary"></i> Your Address
                                    </label>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Issue Details Section -->
                            <div class="col-12 mt-4">
                                <h5 class="border-bottom pb-2 mb-4 text-primary">
                                    <i class="bi bi-exclamation-circle me-2"></i> Issue Details
                                </h5>
                            </div>
                            
                            <!-- Issue -->
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control @error('issue') is-invalid @enderror"
                                              id="issue" name="issue" style="height: 150px" 
                                              placeholder="Describe your issue" required>{{ old('issue', $support_request->issue) }}</textarea>
                                    <label for="issue">
                                        <i class="bi bi-chat-text me-1 text-primary"></i> Describe Your Issue
                                    </label>
                                    @error('issue')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text mt-1">
                                        <i class="bi bi-info-circle me-1"></i> Please provide as much detail as possible to help us assist you better
                                    </div>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="col-12 mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-sm">
                                    <i class="bi bi-send-fill me-2"></i> Submit Support Request
                                </button>
                                <p class="text-muted mt-3 small">
                                    <i class="bi bi-clock me-1"></i> Our team typically responds within 24 hours
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Additional Support Options -->
    </div>
</div>

<style>
    /* Form styling */
    .form-floating > label {
        padding-left: 1rem;
    }
    
    .form-floating > .form-control {
        padding: 1rem 0.75rem;
    }
    
    .form-floating > .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
    }
    
    .btn-primary {
        background-color: #3b82f6;
        border-color: #3b82f6;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #2563eb;
        border-color: #2563eb;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.2);
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .rounded-pill {
        border-radius: 50rem;
    }
    
    .text-primary {
        color: #3b82f6 !important;
    }
    
    .bg-primary {
        background-color: #3b82f6 !important;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .btn-lg {
            padding: 0.5rem 1.5rem !important;
            font-size: 1rem !important;
        }
    }
</style>

<script>
    // Form validation script
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch all forms that need validation
        var forms = document.querySelectorAll('.needs-validation');
        
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>
@endsection