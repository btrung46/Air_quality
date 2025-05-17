@extends('admin')
@section('context')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title">
            <i class="bi bi-people me-2"></i>User Management
        </h1>
       
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Users</h5>
            <div class="d-flex gap-2">
                <form action="/admin/users" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search users..." name='search'>
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                </form>  
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registration Date</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $index => $user)
                            <tr>
                                <td class="ps-4">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>{{ $user->name }}</div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center py-5">
                                        <i class="bi bi-people text-muted" style="font-size: 3rem;"></i>
                                        <p class="mt-3 text-muted">No users found</p>
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
                    Showing {{ count($users) }} users
                </div>
                <div>
                    <!-- Pagination would go here if available -->
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
</style>
@endsection
