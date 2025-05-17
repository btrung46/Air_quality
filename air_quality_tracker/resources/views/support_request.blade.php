@extends('layout')

@section('context')
<div class="container py-5">
    <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
            <h2 class="fw-bold text-primary mb-2">Support Requests</h2>
            <p class="text-muted">Manage and track customer support tickets</p>
            <div class="d-inline-block border-bottom border-primary mb-1" style="width: 50px;"></div>
        </div>
    </div>
    
    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
        <div class="card-header bg-white p-4 border-0">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <form method="GET" class="row g-2">
                        <div class="col-md-8">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="all"{{ request('status') == 'all' ? 'selected' : '' }}>All Statuses</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="/support-form" class="btn btn-primary btn-lg create-btn">
                        <i class="bi bi-plus-circle-fill me-2"></i> Create New Support Request
                    </a>
                </div>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="py-3 px-4 text-center" width="60">#</th>
                        <th class="py-3 px-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-fill text-primary me-2"></i> Name
                            </div>
                        </th>
                        <th class="py-3 px-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-envelope-fill text-primary me-2"></i> Email
                            </div>
                        </th>
                        <th class="py-3 px-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-telephone-fill text-primary me-2"></i> Phone
                            </div>
                        </th>
                        <th class="py-3 px-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-exclamation-circle-fill text-primary me-2"></i> Issue
                            </div>
                        </th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-date-fill text-primary me-2"></i> Date
                            </div>
                        </th>
                        <th class="py-3 px-4 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-gear-fill text-primary me-2"></i> Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $index => $req)
                        <tr class="request-row">
                            <td class="py-3 px-4 text-center fw-medium">{{ $index + $requests->firstItem() }}</td>
                            <td class="py-3 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-circle bg-primary bg-opacity-10 text-primary me-2">
                                        {{ strtoupper(substr($req->user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0">{{ $req->user->name }}</h6>
                                        <small class="text-muted d-md-none">{{ $req->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3 px-4 d-none d-md-table-cell">{{ $req->user->email }}</td>
                            <td class="py-3 px-4">{{ $req->phone }}</td>
                            <td class="py-3 px-4">
                                <div class="text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" title="{{ $req->issue }}">
                                    {{ $req->issue }}
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center">
                                @php
                                    $statusClass = $req->status == 'resolved' ? 'success' : ($req->status == 'in_progress' ? 'warning' : ($req->status == 'pending' ? 'info' : 'secondary'));
                                    $statusIcon = $req->status == 'resolved' ? 'check-circle-fill' : ($req->status == 'in_progress' ? 'hourglass-split' : ($req->status == 'pending' ? 'clock-fill' : 'question-circle-fill'));
                                @endphp
                                <span class="badge bg-{{ $statusClass }} bg-opacity-10 text-{{ $statusClass }} px-3 py-2 rounded-pill">
                                    <i class="bi bi-{{ $statusIcon }} me-1"></i> {{ ucfirst($req->status) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div data-bs-toggle="tooltip" title="Full date: {{ $req->created_at->format('F d, Y H:i') }}">
                                    <div class="fw-medium">{{ $req->created_at->format('d M Y') }}</div>
                                    <small class="text-muted">{{ $req->created_at->format('H:i') }}</small>
                                </div>
                            </td>
                            @if ($req->status ==='pending')
                                <td class="py-3 px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{route('support.edit',$req->id)}}" class="btn btn-sm btn-outline-primary action-btn" data-bs-toggle="tooltip" title="Edit Request">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    
                                    <form action="{{route('support.destroy',$req->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this support request?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger action-btn" data-bs-toggle="tooltip" title="Delete Request">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                            {{-- <td class="py-3 px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{route('support.edit',$req->id)}}" class="btn btn-sm btn-outline-primary action-btn" data-bs-toggle="tooltip" title="Edit Request">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    
                                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this support request?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger action-btn" data-bs-toggle="tooltip" title="Delete Request">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="empty-state-icon mb-3">
                                        <i class="bi bi-inbox-fill text-secondary" style="font-size: 3rem;"></i>
                                    </div>
                                    <h5 class="text-muted">No support requests found</h5>
                                    <p class="text-muted small mb-4">When customers submit support requests, they will appear here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="card-footer bg-white border-0 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    Showing 
                    <span class="fw-medium">{{ $requests->firstItem() ?? 0 }}</span> 
                    to 
                    <span class="fw-medium">{{ $requests->lastItem() ?? 0 }}</span> 
                    of 
                    <span class="fw-medium">{{ $requests->total() }}</span> 
                    entries
                </div>
                <div>
                    {{ $requests->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Bootstrap Icons CSS in your layout file or here -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<!-- Optional custom CSS -->
<style>
    /* Avatar circle */
    .avatar-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
    
    /* Table styles */
    .table th {
        font-weight: 600;
        white-space: nowrap;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    /* Row hover effect */
    .request-row {
        transition: all 0.2s ease;
    }
    
    .request-row:hover {
        background-color: rgba(13, 110, 253, 0.04);
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }
    
    /* Pagination styling */
    .pagination {
        margin-bottom: 0;
    }
    
    .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .page-link {
        color: #0d6efd;
    }
    
    /* Tooltip styling */
    .tooltip {
        font-size: 0.8rem;
    }
    
    /* Status badge styling */
    .badge {
        font-weight: 500;
        letter-spacing: 0.3px;
    }
    
    /* Empty state styling */
    .empty-state-icon {
        opacity: 0.5;
    }
    
    /* Create button styling */
    .create-btn {
        transition: all 0.3s ease;
        border-radius: 0.5rem;
        font-weight: 500;
    }
    
    .create-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
    }
    
    /* Action buttons styling */
    .action-btn {
        width: 32px;
        height: 32px;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        transition: all 0.2s ease;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.1);
    }
    
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    
    /* Floating action button for mobile */
    .fab-button {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }
    
    .fab-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }
    
    .fab-button i {
        font-size: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .create-btn {
            width: 100%;
            margin-top: 1rem;
        }
    }
</style>

<!-- Bootstrap JS for tooltips, dropdowns, etc. -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection