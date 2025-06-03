<!-- Current Air Quality Section - Moved to the top -->
<section class="mb-5">
    <div class="dashboard-header1">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h3 class="dashboard-title">Current Air Quality</h3>

            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <button onclick="location.reload()" class="btn btn-refresh">
                    <i class="bi bi-arrow-clockwise me-2"></i> Update Data
                </button>
            </div>
        </div>
    </div>

    <!-- First row - 3 equal columns -->
    <div class="row g-4 mb-4">
        <!-- Temperature Card -->
        <div class="col-md-4">
            <div class="metric-card">
                <div class="metric-icon temperature">
                    <i class="bi bi-thermometer-half"></i>
                </div>
                <div class="metric-details">
                    <h5>Temperature</h5>
                    <div class="metric-value" id='temperature'>{{ $current_dat->temperature }}<span
                            class="unit">°C</span></div>
                </div>
            </div>
        </div>

        <!-- Humidity Card -->
        <div class="col-md-4">
            <div class="metric-card">
                <div class="metric-icon humidity">
                    <i class="bi bi-droplet-fill"></i>
                </div>
                <div class="metric-details">
                    <h5>Humidity</h5>
                    <div class="metric-value" id='humidity'>{{ $current_dat->humidity }}<span class="unit">%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- PM2.5 Card -->
        <div class="col-md-4">
            <div class="metric-card">
                <div class="metric-icon pm25">
                    <i class="bi bi-wind"></i>
                </div>
                <div class="metric-details">
                    <h5>PM2.5</h5>
                    <div class="metric-value" id='pm25'>{{ $current_dat->PM2_5 }}<span class="unit">μg/m³</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second row - 4 equal columns -->
    <div class="row g-4">
        <!-- CO Card -->
        <div class="col-md-3">
            <div class="metric-card">
                <div class="metric-icon co">
                    <i class="bi bi-cloud-fill"></i>
                </div>
                <div class="metric-details">
                    <h5>Carbon Monoxide (CO)</h5>
                    <div class="metric-value" id='co'>{{ $current_dat->CO }}<span class="unit">ppm</span></div>
                </div>
            </div>
        </div>

        <!-- CO2 Card -->
        <div class="col-md-3">
            <div class="metric-card">
                <div class="metric-icon co2">
                    <i class="bi bi-cloud-haze2-fill"></i>
                </div>
                <div class="metric-details">
                    <h5>Equivalent Carbon Dioxide (eCO<sub>2</sub>)</h5>
                    <div class="metric-value" id='co2'>{{ $current_dat->CO2 }}<span class="unit">ppm</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- O3 Card -->
        <div class="col-md-3">
            <div class="metric-card">
                <div class="metric-icon ozone">
                    <i class="bi bi-layers-fill"></i>
                </div>
                <div class="metric-details">
                    <h5>Ozone (O<sub>3</sub>)</h5>
                    <div class="metric-value" id='o3'>{{ $current_dat->O3 }}<span class="unit">ppb</span></div>
                </div>
            </div>
        </div>

        <!-- TVOC Card -->
        <div class="col-md-3">
            <div class="metric-card">
                <div class="metric-icon tvoc">
                    <i class="bi bi-moisture"></i>
                </div>
                <div class="metric-details">
                    <h5>TVOC</h5>
                    <div class="metric-value"id='tvoc'>{{ $current_dat->TVOC }}<span class="unit">ppb</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('AQI')
<!-- Charts Section - Now below the current metrics -->
<section class="mb-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 fw-bold">Data chart</h4>
                <div class="mb-3">
                    <select id="chartTypeSelector" class="form-select w-auto">
                        <option value="line">Line</option>
                        <option value="bar">Bar</option>
                    </select>
                </div>
            </div>


            <ul class="nav nav-tabs card-header-tabs" id="chartTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-medium" id="hourly-tab" data-bs-toggle="tab"
                        data-bs-target="#hourly" type="button" role="tab" aria-controls="hourly"
                        aria-selected="true">
                        <i class="bi bi-clock me-2"></i>Hourly Data
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-medium" id="daily-tab" data-bs-toggle="tab" data-bs-target="#daily"
                        type="button" role="tab" aria-controls="daily" aria-selected="false">
                        <i class="bi bi-calendar3 me-2"></i>Daily Data
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body p-4">
            <div class="tab-content" id="chartTabsContent">
                <!-- Hourly Charts -->
                <div class="tab-pane fade show active" id="hourly" role="tabpanel" aria-labelledby="hourly-tab">
                    <div class="row g-4">
                        <!-- Environmental Conditions Charts -->
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-thermometer-half me-2"></i>Temperature (°C)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyTemperatureChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-droplet-half me-2"></i>Humidity (%)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyHumidityChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Air Pollutants Charts -->
                        <div class="col-md-4">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-cloud-fill me-2"></i>CO (ppm)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyCOChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-cloud-haze2-fill me-2"></i>eCO<sub>2</sub> (ppm)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyCO2Chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-layers me-2"></i>O3 (ppb)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyO3Chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Particulate Matter and VOC Charts -->
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-wind me-2"></i>PM2.5 (μg/m³)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyPM25Chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-moisture me-2"></i>TVOC (ppb)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="hourlyTVOCChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daily Charts -->
                <div class="tab-pane fade" id="daily" role="tabpanel" aria-labelledby="daily-tab">
                    <div class="row g-4">
                        <!-- Environmental Conditions Charts -->
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-thermometer-half me-2"></i>Temperature (°C)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyTemperatureChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-droplet-half me-2"></i>Humidity (%)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyHumidityChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Air Pollutants Charts -->
                        <div class="col-md-4">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-cloud-fill me-2"></i>CO (ppm)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyCOChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-cloud-haze2-fill me-2"></i>eCO<sub>2</sub> (ppm)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyCO2Chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-layers me-2"></i>O3 (ppb)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyO3Chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Particulate Matter and VOC Charts -->
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-wind me-2"></i>PM2.5 (μg/m³)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyPM25Chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="chart-card p-3 border rounded-3 h-100">
                                <h5 class="chart-title mb-3 text-primary">
                                    <i class="bi bi-moisture me-2"></i>TVOC (ppb)
                                </h5>
                                <div class="chart-container" style="position: relative; height:250px;">
                                    <canvas id="dailyTVOCChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
  
</script>
<style>
    :root {
        --primary-color: #3498db;
        --temperature-color: #e74c3c;
        --humidity-color: #3498db;
        --co-color: #e67e22;
        --ozone-color: #9b59b6;
        --pm25-color: #2ecc71;
        --co2-color: #16a085;
        --tvoc-color: #8e44ad;
        --card-bg: #ffffff;
        --card-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        --card-border-radius: 16px;
        --text-primary: #2c3e50;
        --text-secondary: #7f8c8d;
    }

    body {
        background-color: #f8f9fa;
        color: var(--text-primary);
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-header1 {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0;
        font-size: 2rem;
    }

    .dashboard-title {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.25rem;
        font-size: 1.75rem;
    }

    .btn-refresh {
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 50px;
        padding: 10px 20px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-refresh:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: white;
    }

    .metric-card {
        background-color: var(--card-bg);
        border-radius: var(--card-border-radius);
        box-shadow: var(--card-shadow);
        padding: 20px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        border: none;
        height: 100%;
    }

    .metric-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
    }

    .metric-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        flex-shrink: 0;
    }

    .metric-icon i {
        font-size: 1.8rem;
        color: white;
    }

    .temperature {
        background-color: var(--temperature-color);
    }

    .humidity {
        background-color: var(--humidity-color);
    }

    .co {
        background-color: var(--co-color);
    }

    .ozone {
        background-color: var(--ozone-color);
    }

    .pm25 {
        background-color: var(--pm25-color);
    }

    .co2 {
        background-color: var(--co2-color);
    }

    .tvoc {
        background-color: var(--tvoc-color);
    }

    .metric-details {
        flex-grow: 1;
    }

    .metric-details h5 {
        font-size: 1rem;
        color: var(--text-secondary);
        margin-bottom: 5px;
        font-weight: 500;
    }

    .metric-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-primary);
        display: flex;
        align-items: baseline;
    }

    .unit {
        font-size: 1rem;
        color: var(--text-secondary);
        margin-left: 5px;
        font-weight: 400;
    }

    .chart-card {
        background-color: var(--card-bg);
        transition: all 0.3s ease;
    }

    .chart-card:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    .chart-title {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .nav-tabs .nav-link {
        color: var(--text-secondary);
        border: none;
        border-bottom: 2px solid transparent;
        padding: 0.75rem 1rem;
    }

    .nav-tabs .nav-link.active {
        color: var(--primary-color);
        border-bottom: 2px solid var(--primary-color);
        background-color: transparent;
    }

    @media (max-width: 768px) {
        .metric-card {
            padding: 15px;
        }

        .metric-icon {
            width: 50px;
            height: 50px;
        }

        .metric-icon i {
            font-size: 1.5rem;
        }

        .metric-value {
            font-size: 1.5rem;
        }
    }
</style>
