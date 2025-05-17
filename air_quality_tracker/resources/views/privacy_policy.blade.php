@extends('layout')
@section('context')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card border-0 shadow-lg rounded-3">
                <div class="card-header bg-primary text-white p-4 border-0 rounded-top-3">
                    <h1 class="text-center mb-0 fw-bold">Privacy Policy</h1>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <p class="text-muted">Last Updated: {{ date('F d, Y') }}</p>
                        <div class="d-inline-block border-bottom border-primary mb-3" style="width: 50px;"></div>
                        <p>We value your privacy. This policy explains how we handle your information.</p>
                    </div>
                    
                    <!-- Accordion for Privacy Policy sections -->
                    <div class="accordion" id="privacyAccordion">
                        <!-- Introduction -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="bi bi-info-circle-fill text-primary me-2"></i> Introduction
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <p>We respect your privacy and are committed to protecting your personal data. This Privacy Policy explains how we collect, use, and safeguard your information.</p>
                                    <p>If you disagree with this policy, please do not access our website or use our services.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Information We Collect -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="bi bi-database-fill text-primary me-2"></i> Information We Collect
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <div class="row row-cols-1 row-cols-md-3 g-3">
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body text-center p-3">
                                                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                                        <i class="bi bi-person-fill text-primary fs-4"></i>
                                                    </div>
                                                    <h5 class="card-title">Personal Data</h5>
                                                    <p class="card-text small">Name, email, phone number, and other information you provide.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body text-center p-3">
                                                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                                        <i class="bi bi-activity text-primary fs-4"></i>
                                                    </div>
                                                    <h5 class="card-title">Usage Data</h5>
                                                    <p class="card-text small">Information about how you use our website and services.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body text-center p-3">
                                                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                                        <i class="bi bi-laptop-fill text-primary fs-4"></i>
                                                    </div>
                                                    <h5 class="card-title">Technical Data</h5>
                                                    <p class="card-text small">IP address, browser type, operating system, and device information.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- How We Use Your Information -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="bi bi-gear-fill text-primary me-2"></i> How We Use Your Information
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="bi bi-check2-circle text-success fs-4 me-2"></i>
                                                <div>
                                                    <h6 class="mb-1">Provide Services</h6>
                                                    <p class="small text-muted mb-0">Maintain and improve our website and services</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="bi bi-check2-circle text-success fs-4 me-2"></i>
                                                <div>
                                                    <h6 class="mb-1">Process Transactions</h6>
                                                    <p class="small text-muted mb-0">Handle payments and send related information</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="bi bi-check2-circle text-success fs-4 me-2"></i>
                                                <div>
                                                    <h6 class="mb-1">Communication</h6>
                                                    <p class="small text-muted mb-0">Respond to your comments and requests</p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-start mb-3">
                                                <i class="bi bi-check2-circle text-success fs-4 me-2"></i>
                                                <div>
                                                    <h6 class="mb-1">Security</h6>
                                                    <p class="small text-muted mb-0">Detect and prevent technical issues</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Information Sharing -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="bi bi-share-fill text-primary me-2"></i> Information Sharing
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <p>We may share your information in the following situations:</p>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td width="40"><i class="bi bi-building text-primary"></i></td>
                                                    <td><strong>Service Providers</strong></td>
                                                    <td>Third-party vendors who perform services for us</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-arrow-repeat text-primary"></i></td>
                                                    <td><strong>Business Transfers</strong></td>
                                                    <td>During mergers, acquisitions, or asset sales</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-check2-square text-primary"></i></td>
                                                    <td><strong>With Consent</strong></td>
                                                    <td>When you have given permission</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="bi bi-shield-fill text-primary"></i></td>
                                                    <td><strong>Legal Requirements</strong></td>
                                                    <td>When required by law or to protect rights</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Cookies -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="bi bi-cookie text-primary me-2"></i> Cookies and Tracking
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <p>We use cookies and similar tracking technologies to track activity and store information.</p>
                                    <p>You can set your browser to refuse cookies, but this may limit functionality.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Your Rights -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <i class="bi bi-person-check-fill text-primary me-2"></i> Your Rights
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <div class="row row-cols-1 row-cols-md-2 g-3">
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body p-3">
                                                    <h6 class="card-title d-flex align-items-center">
                                                        <i class="bi bi-eye-fill text-primary me-2"></i> Access
                                                    </h6>
                                                    <p class="card-text small">Right to access personal information we have about you</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body p-3">
                                                    <h6 class="card-title d-flex align-items-center">
                                                        <i class="bi bi-pencil-fill text-primary me-2"></i> Correction
                                                    </h6>
                                                    <p class="card-text small">Right to request correction of inaccurate information</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body p-3">
                                                    <h6 class="card-title d-flex align-items-center">
                                                        <i class="bi bi-trash-fill text-primary me-2"></i> Deletion
                                                    </h6>
                                                    <p class="card-text small">Right to request deletion of your personal information</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card h-100 border-0 bg-light">
                                                <div class="card-body p-3">
                                                    <h6 class="card-title d-flex align-items-center">
                                                        <i class="bi bi-x-circle-fill text-primary me-2"></i> Objection
                                                    </h6>
                                                    <p class="card-text small">Right to object to processing of your information</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Information -->
                        <div class="accordion-item border-0 mb-3 shadow-sm">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    <i class="bi bi-envelope-fill text-primary me-2"></i> Contact Us
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#privacyAccordion">
                                <div class="accordion-body">
                                    <p>If you have questions about this Privacy Policy, please contact us:</p>
                                    <div class="card bg-light border-0 p-3">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-envelope-fill text-primary me-3"></i>
                                            <span>privacy@example.com</span>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<!-- Optional custom CSS -->
<style>
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
        box-shadow: none;
    }
    
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(13, 110, 253, 0.25);
    }
    
    .accordion-button::after {
        background-size: 1rem;
    }
    
    .accordion-item {
        border-radius: 0.5rem !important;
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: none;
    }
    
    p {
        line-height: 1.6;
        font-size: 0.95rem;
    }
</style>

<!-- Bootstrap JS for accordion functionality -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection