@extends('layout')
@section('context')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card border-0 shadow-lg rounded-3">
                <div class="card-header bg-primary text-white p-4 border-0 rounded-top-3">
                    <h1 class="text-center mb-0 fw-bold">Terms of Service</h1>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <p class="text-muted">Last Updated: {{ date('F d, Y') }}</p>
                        <div class="d-inline-block border-bottom border-primary mb-3" style="width: 50px;"></div>
                        <p>Please read these terms carefully before using our services.</p>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="nav flex-column nav-pills sticky-md-top" id="terms-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link text-start active mb-2" id="introduction-tab" data-bs-toggle="pill" data-bs-target="#introduction" type="button" role="tab">Introduction</button>
                                <button class="nav-link text-start mb-2" id="acceptance-tab" data-bs-toggle="pill" data-bs-target="#acceptance" type="button" role="tab">Acceptance</button>
                                <button class="nav-link text-start mb-2" id="accounts-tab" data-bs-toggle="pill" data-bs-target="#accounts" type="button" role="tab">User Accounts</button>
                                <button class="nav-link text-start mb-2" id="conduct-tab" data-bs-toggle="pill" data-bs-target="#conduct" type="button" role="tab">User Conduct</button>
                                <button class="nav-link text-start mb-2" id="ip-tab" data-bs-toggle="pill" data-bs-target="#ip" type="button" role="tab">Intellectual Property</button>
                                <button class="nav-link text-start mb-2" id="termination-tab" data-bs-toggle="pill" data-bs-target="#termination" type="button" role="tab">Termination</button>
                                <button class="nav-link text-start mb-2" id="disclaimers-tab" data-bs-toggle="pill" data-bs-target="#disclaimers" type="button" role="tab">Disclaimers</button>
                                <button class="nav-link text-start mb-2" id="liability-tab" data-bs-toggle="pill" data-bs-target="#liability" type="button" role="tab">Limitation of Liability</button>
                                <button class="nav-link text-start" id="contact-tab" data-bs-toggle="pill" data-bs-target="#contact" type="button" role="tab">Contact Us</button>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="tab-content" id="terms-tabContent">
                                <div class="tab-pane fade show active" id="introduction" role="tabpanel" aria-labelledby="introduction-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Introduction</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>Welcome to our platform. These Terms of Service govern your access to and use of our website and services.</p>
                                        <p>By using our services, you agree to these terms. If you disagree with any part, you may not use our services.</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="acceptance" role="tabpanel" aria-labelledby="acceptance-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Acceptance of Terms</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>By creating an account or using our services, you acknowledge that you have read and agree to these terms.</p>
                                        <p>We may modify these terms at any time. Continued use after changes constitutes acceptance of modified terms.</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">User Accounts</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>You are responsible for maintaining the confidentiality of your account credentials and for all activities under your account.</p>
                                        <p>You must provide accurate and complete information during registration and keep it updated.</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="conduct" role="tabpanel" aria-labelledby="conduct-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">User Conduct</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>You agree not to use our services to:</p>
                                        <div class="row row-cols-1 row-cols-md-2 g-3 mb-3">
                                            <div class="col">
                                                <div class="card h-100 border-0 bg-light">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <i class="bi bi-x-circle text-danger me-2"></i>
                                                            <h6 class="card-title mb-0">Violate Laws</h6>
                                                        </div>
                                                        <p class="card-text small">Violate any applicable laws or regulations</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 border-0 bg-light">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <i class="bi bi-x-circle text-danger me-2"></i>
                                                            <h6 class="card-title mb-0">Infringe Rights</h6>
                                                        </div>
                                                        <p class="card-text small">Infringe the rights of any third party</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 border-0 bg-light">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <i class="bi bi-x-circle text-danger me-2"></i>
                                                            <h6 class="card-title mb-0">Harmful Content</h6>
                                                        </div>
                                                        <p class="card-text small">Transmit harmful, threatening, or objectionable material</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card h-100 border-0 bg-light">
                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center mb-2">
                                                            <i class="bi bi-x-circle text-danger me-2"></i>
                                                            <h6 class="card-title mb-0">Impersonation</h6>
                                                        </div>
                                                        <p class="card-text small">Impersonate any person or entity</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="ip" role="tabpanel" aria-labelledby="ip-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Intellectual Property</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>All content and materials on our services are our property or our licensors' and are protected by intellectual property laws.</p>
                                        <p>We grant you a limited license to access and use our services for personal, non-commercial use.</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="termination" role="tabpanel" aria-labelledby="termination-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Termination</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>We may terminate or suspend your access without notice for conduct that violates these terms.</p>
                                        <p>Upon termination, your right to use the services will cease immediately.</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="disclaimers" role="tabpanel" aria-labelledby="disclaimers-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Disclaimers</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <div class="alert alert-secondary">
                                            <p class="mb-0">THE SERVICES ARE PROVIDED "AS IS" AND "AS AVAILABLE" WITHOUT WARRANTIES OF ANY KIND.</p>
                                        </div>
                                        <p>We do not warrant that the services will be uninterrupted or error-free.</p>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="liability" role="tabpanel" aria-labelledby="liability-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Limitation of Liability</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <div class="alert alert-secondary">
                                            <p class="mb-0">IN NO EVENT WILL WE BE LIABLE FOR DAMAGES OF ANY KIND ARISING FROM YOUR USE OF OUR SERVICES.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="terms-section">
                                        <h3 class="fw-bold">Contact Us</h3>
                                        <div class="d-inline-block bg-primary mb-3" style="width: 50px; height: 3px;"></div>
                                        <p>If you have any questions about these Terms, please contact us:</p>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-envelope-fill text-primary me-3"></i>
                                            <span>support@example.com</span>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-geo-alt-fill text-primary me-3"></i>
                                            <span>123 Main Street, City, Country</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-telephone-fill text-primary me-3"></i>
                                            <span>+1 (123) 456-7890</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4 pt-3 border-top">
                        <a href="/login" class="btn btn-outline-primary me-2">
                            <i class="bi bi-arrow-left me-1"></i> Back to Login
                        </a>
                        <a href="/register" class="btn btn-outline-primary">
                            <i class="bi bi-person-plus me-1"></i> Back to Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap Icons CSS in your layout file or here -->


<!-- Optional custom CSS -->
<style>
    .nav-pills .nav-link {
        color: #495057;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }
    
    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: white;
        box-shadow: 0 4px 6px rgba(13, 110, 253, 0.2);
    }
    
    .nav-pills .nav-link:not(.active):hover {
        background-color: #f8f9fa;
        transform: translateX(5px);
    }
    
    .terms-section h3 {
        color: #0d6efd;
        font-size: 1.5rem;
    }
    
    .terms-section p {
        line-height: 1.6;
        font-size: 0.95rem;
    }
    
    @media (min-width: 768px) {
        .sticky-md-top {
            top: 2rem;
            z-index: 1000;
        }
    }
</style>

<!-- Bootstrap JS for tabs functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection