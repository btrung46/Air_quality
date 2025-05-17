@extends('admin')
@section('context')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">
            <i class="bi bi-headset me-2"></i>Support Requests
        </h1>
    </div>

    <div class="card">
        <div class="card-header bg-white">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="mb-0">All Support Tickets</h5>
                </div>
                <div class="col-md-4">
                    <form method="GET" class="d-flex gap-2">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="all"{{ request('status') == 'all' ? ' selected' : '' }}>All Statuses</option>
                            <option value="pending"{{ request('status') == 'pending' ? ' selected' : '' }}>Pending</option>
                            <option value="in_progress"{{ request('status') == 'in_progress' ? ' selected' : '' }}>In Progress</option>
                            <option value="resolved"{{ request('status') == 'resolved' ? ' selected' : '' }}>Resolved</option>
                        </select>
                        <button type="submit" class="btn btn-primary d-none">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>User</th>
                            <th>Contact Info</th>
                            <th>Issue</th>
                            <th>Status</th>
                            <th>Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($requests as $index => $req)
                            <tr>
                                <td class="ps-4">{{ $index + $requests->firstItem() }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="fw-medium">{{ $req->user->name }}</div>
                                            <div class="small text-muted">{{ $req->user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div><i class="bi bi-telephone me-1 text-muted"></i> {{ $req->phone }}</div>
                                    <div class="small text-muted"><i class="bi bi-geo-alt me-1"></i> {{ $req->address }}</div>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 200px;" title="{{ $req->issue }}">
                                        {{ $req->issue }}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.support.edit', $req->id) }}" class="status-badge 
                                        {{ $req->status == 'resolved' ? 'bg-success' : 
                                           ($req->status == 'in_progress' ? 'bg-warning' : 
                                           ($req->status == 'pending' ? 'bg-info' : 'bg-secondary')) }}">
                                        <i class="bi {{ $req->status == 'resolved' ? 'bi-check-circle' : 
                                                      ($req->status == 'in_progress' ? 'bi-hourglass-split' : 
                                                      'bi-clock') }} me-1"></i>
                                        {{ ucfirst(str_replace('_', ' ', $req->status)) }}
                                    </a>
                                </td>
                                <td>
                                    <div>{{ $req->created_at->format('d-m-Y') }}</div>
                                    <div class="small text-muted">{{ $req->created_at->format('H:i') }}</div>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center py-5">
                                        <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                                        <p class="mt-3 text-muted">No support requests found</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    Showing {{ $requests->count() }} of {{ $requests->total() }} requests
                </div>
                <div>
                    {{ $requests->links() }}
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
    
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.35rem 0.65rem;
        font-size: 0.75rem;
        font-weight: 600;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 50rem;
    }
    
    /* Custom pagination styling */
    .pagination {
        margin-bottom: 0;
    }
    
    .page-link {
        border-radius: 0.25rem;
        margin: 0 0.15rem;
    }
</style>
@endsection
