@extends('admin')

@section('context')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-gradient-primary text-white p-4 border-0 rounded-top-4">
                    <h3 class="mb-0 text-center fw-bold">Update Support Request</h3>
                </div>
                <div class="card-body p-4">
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin.support.update',$support_request)}}">
                        @csrf
                        @method('put')
                        
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="form-group">
                                    <label class="form-label fw-semibold text-muted small mb-2">Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-person-fill text-primary"></i>
                                        </span>
                                        <input type="text" class="form-control bg-light border-start-0" value="{{ $support_request->user->name }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-semibold text-muted small mb-2">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="bi bi-envelope-fill text-primary"></i>
                                        </span>
                                        <input type="email" class="form-control bg-light border-start-0" value="{{ $support_request->user->email}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small mb-2">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-telephone-fill text-primary"></i>
                                </span>
                                <input type="text" class="form-control bg-light border-start-0" value="{{ $support_request->phone }}" disabled>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small mb-2">Issue Description</label>
                            <div class="form-control bg-light p-3 rounded-3" style="min-height: 120px; max-height: 200px; overflow-y: auto;">
                                {{ $support_request->issue }}
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold text-muted small mb-2">Status</label>
                            <select class="form-select form-select-lg border" name="status" id="status" required>
                                <option value="pending" {{ $support_request->status == 'pending' ? 'selected' : '' }}>
                                    <span>🟠 Pending</span>
                                </option>
                                <option value="in_progress" {{ $support_request->status == 'in_progress' ? 'selected' : '' }}>
                                    <span>🔵 In Progress</span>
                                </option>
                                <option value="resolved" {{ $support_request->status == 'resolved' ? 'selected' : '' }}>
                                    <span>🟢 Resolved</span>
                                </option>
                            </select>
                        </div>
                        
                        <div class="d-flex justify-content-center gap-3 mt-5">
                            <a href="{{ route('admin.support') }}" class="btn btn-light btn-lg px-4 fw-medium">
                                <i class="bi bi-arrow-left me-2"></i> Back
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg px-4 fw-medium">
                                <i class="bi bi-check-circle me-2"></i> Update Status
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    
    .form-control:disabled, .form-control[readonly] {
        opacity: 0.8;
        cursor: not-allowed;
    }
    
    .form-select {
        transition: all 0.2s ease;
    }
    
    .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .btn {
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(46, 89, 217, 0.2);
    }
    
    .btn-light:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .input-group-text {
        color: #6c757d;
    }
    
    .text-primary {
        color: #4e73df !important;
    }
    
    /* Status colors */
    select option[value="pending"] {
        color: #fd7e14;
    }
    
    select option[value="in_progress"] {
        color: #4e73df;
    }
    
    select option[value="resolved"] {
        color: #1cc88a;
    }
    
    /* Custom scrollbar for the issue description */
    .form-control::-webkit-scrollbar {
        width: 8px;
    }
    
    .form-control::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .form-control::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    
    .form-control::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
    
    @media (max-width: 768px) {
        .card-header {
            padding: 1.5rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .btn-lg {
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }
    }
</style>
@endsection