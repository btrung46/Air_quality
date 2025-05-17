@extends('admin')
@section('context')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">
            <i class="bi bi-speedometer2 me-2"></i>Dashboard Overview
        </h1>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-primary-subtle text-primary me-3">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <div>
                            <h6 class="stats-title text-muted mb-1">Total Users</h6>
                            <h3 class="stats-amount mb-0">{{ $totalUsers }}</h3>
                        </div>
                    </div>
                    
                   
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-warning-subtle text-warning me-3">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div>
                            <h6 class="stats-title text-muted mb-1">Support Requests</h6>
                            <h3 class="stats-amount mb-0">{{ $totalRequest }}</h3>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon bg-success-subtle text-success me-3">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <div>
                            <h6 class="stats-title text-muted mb-1">Resolved Tickets</h6>
                            <h3 class="stats-amount mb-0">{{ $totalRequestResolve }}</h3>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
        
    </div>
</div>

<style>
    .avatar-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
    
    .stats-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    
    .bg-primary-subtle {
        background-color: rgba(67, 97, 238, 0.1);
    }
    
    .bg-warning-subtle {
        background-color: rgba(255, 193, 7, 0.1);
    }
    
    .bg-success-subtle {
        background-color: rgba(25, 135, 84, 0.1);
    }
    
    .bg-info-subtle {
        background-color: rgba(13, 202, 240, 0.1);
    }
    
    .color-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }
</style>
@endsection
