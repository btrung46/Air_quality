<section class="mb-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between py-3">
            <h2 class="card-title mb-0 fs-4 fw-bold">
                <i class="bi bi-clock-history me-2"></i>Historical Data
            </h2>
            <a href="{{ route('report.form') }}" class="btn btn-light btn-sm fw-medium">
                <i class="bi bi-download me-1"></i>Export Data
            </a>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="fw-semibold">Date / Time</th>
                            <th scope="col" class="fw-semibold">Temp (°C)</th>
                            <th scope="col" class="fw-semibold">Humidity (%)</th>
                            <th scope="col" class="fw-semibold">CO (ppm)</th>
                            <th scope="col" class="fw-semibold">O3 (ppb)</th>
                            <th scope="col" class="fw-semibold">PM2.5 (μg/m³)</th>
                            <th scope="col" class="fw-semibold">CO2 (ppm)</th>
                            <th scope="col" class="fw-semibold">TVOC (ppb)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hourlyTableData as $item)
                            <tr>
                                <td>
                                    <span class="fw-medium">{{ $item->date }}</span>
                                    <span class="text-muted">{{ $item->hour }}:00</span>
                                </td>
                                <td>{{ number_format($item->avg_temperature, 2) }}</td>
                                <td>{{ number_format($item->avg_humidity, 2) }}</td>
                                <td>{{ number_format($item->avg_co, 2) }}</td>
                                <td>{{ number_format($item->avg_o3, 2) }}</td>
                                <td>{{ number_format($item->avg_pm25, 2) }}</td>
                                <td>{{ number_format($item->avg_co2, 2) }}</td>
                                <td>{{ number_format($item->avg_tvoc, 2) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted py-4 text-center">
                                    <i class="bi bi-inbox me-2"></i>No data available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Phân trang --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $hourlyTableData->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>