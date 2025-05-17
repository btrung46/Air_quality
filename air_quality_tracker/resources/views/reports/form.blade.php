@extends('layout')
@section('context')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                <div class="card-header bg-primary text-white p-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-arrow-down fs-3 me-3"></i>
                        <h2 class="mb-0 fs-4">Export Air Quality Report</h2>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <p class="text-muted mb-4">
                        Select a date range and format to export your air quality data. Reports include temperature, humidity, CO, O3, and PM2.5 measurements.
                    </p>
                    
                    <form action="{{ route('report.export') }}" method="GET" id="exportForm">
                        <div class="row g-4">
                            <!-- Date Range Selection -->
                            <div class="col-md-6">
                                <label for="from_date" class="form-label fw-medium">
                                    <i class="bi bi-calendar-event me-2"></i>From Date
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-calendar3"></i>
                                    </span>
                                    <input 
                                        type="date" 
                                        name="from_date" 
                                        id="from_date" 
                                        required 
                                        class="form-control"
                                        max="{{ date('Y-m-d') }}"
                                    >
                                </div>
                                <div class="form-text">Start date of your report period</div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="to_date" class="form-label fw-medium">
                                    <i class="bi bi-calendar-event-fill me-2"></i>To Date
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-calendar3"></i>
                                    </span>
                                    <input 
                                        type="date" 
                                        name="to_date" 
                                        id="to_date" 
                                        required 
                                        class="form-control"
                                        max="{{ date('Y-m-d') }}"
                                    >
                                </div>
                                <div class="form-text">End date of your report period</div>
                            </div>
                            
                            <!-- Report Options -->

                           
                            
                            <!-- Additional Options -->
                            
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-primary px-4 py-2" id="exportButton">
                                <i class="bi bi-download me-2"></i>Export Report
                                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true" id="exportSpinner"></span>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="card-footer bg-light p-3">
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bi bi-info-circle me-2"></i>
                        <span>Reports are generated based on available data. Large date ranges may take longer to process.</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    function resetForm() {
        document.getElementById('exportForm').reset();
        
        // Reset to default dates
        const today = new Date();
        const lastWeek = new Date();
        lastWeek.setDate(today.getDate() - 7);
        
        document.getElementById('to_date').valueAsDate = '';
        document.getElementById('from_date').valueAsDate = '';
    }
</script>
@endsection
