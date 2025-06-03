@extends('layout')
@section('context')
    @auth
        @if ($check_data === false)
            <section class="empty-state text-center my-5 py-5">
                <div class="container">
                    <i class="bi bi-cloud-slash display-1 text-secondary mb-3"></i>
                    <h1 class="display-5 fw-bold text-secondary">Welcome to Air Quality Dashboard</h1>
                    <p class="lead text-muted mx-auto" style="max-width: 600px;">No data available at the moment. Please check
                        back later or contact support if this issue persists.</p>
                    <button onclick="location.reload()" class="btn btn-primary mt-3">
                        <i class="bi bi-arrow-clockwise me-2"></i>Refresh Data
                    </button>
                </div>
            </section>
        @else
            <div>
                @include('current_index')


                @include('hourly_table')
            </div>
        @endif
    @endauth
    <script>
        // Gắn sự kiện click vào mọi link bên trong .pagination (dù được render động hay không)
        document.addEventListener('click', function(event) {
            const targetLink = event.target.closest('.pagination a');
            if (targetLink) {
                localStorage.setItem('scrollY', window.scrollY);
            }
        });

        window.addEventListener('load', function() {
            const scrollY = localStorage.getItem('scrollY');
            if (scrollY !== null) {
                window.scrollTo(0, parseInt(scrollY));
                localStorage.removeItem('scrollY');
            }
        });
    </script>
    @if (auth()->check())
        window.Laravel = {
        userId: @json(auth()->user()->id)
        };
    @endif
    @if ($check_data)
        <!-- Ensure Chart.js is loaded before using it -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            console.log(window.Laravel.userId);
            setTimeout(() => {
                location.reload();
            }, 20 * 60 * 1000);

            document.addEventListener('DOMContentLoaded', function() {
                // Cấu hình mặc định cho Chart.js


                // Khởi tạo đối tượng lưu trữ các biểu đồ
                window.myCharts = {};

                // Tạo biểu đồ ban đầu (kiểu line)
                createChart('hourlyTemperatureChart', 'Temperature (°C) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['temperature']).reverse(), 'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 1)',
                    'line');
                createChart('dailyTemperatureChart', 'Temperature (°C) - Daily', @json($dailyLabels),
                    @json($dailyValues['temperature']).reverse(), 'rgba(255, 99, 132, 0.2)', 'rgba(255, 99, 132, 1)',
                    'line');

                createChart('hourlyHumidityChart', 'Humidity (%) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['humidity']).reverse(), 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 1)',
                    'line');
                createChart('dailyHumidityChart', 'Humidity (%) - Daily', @json($dailyLabels),
                    @json($dailyValues['humidity']).reverse(), 'rgba(54, 162, 235, 0.2)', 'rgba(54, 162, 235, 1)',
                    'line');

                createChart('hourlyCOChart', 'CO (ppm) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['co']).reverse(), 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 1)',
                    'line');
                createChart('dailyCOChart', 'CO (ppm) - Daily', @json($dailyLabels),
                    @json($dailyValues['co']).reverse(), 'rgba(255, 206, 86, 0.2)', 'rgba(255, 206, 86, 1)',
                    'line');

                createChart('hourlyO3Chart', 'O3 (ppb) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['o3']).reverse(), 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)',
                    'line');
                createChart('dailyO3Chart', 'O3 (ppb) - Daily', @json($dailyLabels),
                    @json($dailyValues['o3']).reverse(), 'rgba(75, 192, 192, 0.2)', 'rgba(75, 192, 192, 1)',
                    'line');

                createChart('hourlyPM25Chart', 'PM2.5 (μg/m³) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['pm25']).reverse(), 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 1)',
                    'line');
                createChart('dailyPM25Chart', 'PM2.5 (μg/m³) - Daily', @json($dailyLabels),
                    @json($dailyValues['pm25']).reverse(), 'rgba(153, 102, 255, 0.2)', 'rgba(153, 102, 255, 1)',
                    'line');

                createChart('hourlyCO2Chart', 'CO2 (ppm) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['co2']).reverse(), 'rgba(219, 112, 147, 0.2)', 'rgba(219, 112, 147, 1)',
                    'line');
                createChart('dailyCO2Chart', 'CO2 (ppm) - Daily', @json($dailyLabels),
                    @json($dailyValues['co2']).reverse(), 'rgba(219, 112, 147, 0.2)', 'rgba(219, 112, 147, 1)',
                    'line');

                createChart('hourlyTVOCChart', 'TVOC (ppb) - Hourly', @json($hourlyLabels),
                    @json($hourlyValues['tvoc']).reverse(), 'rgba(0, 100, 0, 0.2)', 'rgba(0, 100, 0, 1)', 'line');
                createChart('dailyTVOCChart', 'TVOC (ppb) - Daily', @json($dailyLabels),
                    @json($dailyValues['tvoc']).reverse(), 'rgba(0, 100, 0, 0.2)', 'rgba(0, 100, 0, 1)', 'line');

                // Xử lý khi thay đổi loại biểu đồ
                document.getElementById('chartTypeSelector').addEventListener('change', function() {
                    const selectedType = this.value;
                    createChart('hourlyTemperatureChart', 'Temperature (°C) - Hourly',
                        @json($hourlyLabels),
                        @json($hourlyValues['temperature']).reverse(), 'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 1)', selectedType);
                    createChart('dailyTemperatureChart', 'Temperature (°C) - Daily',
                        @json($dailyLabels),
                        @json($dailyValues['temperature']).reverse(), 'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 1)', selectedType);

                    createChart('hourlyHumidityChart', 'Humidity (%) - Hourly', @json($hourlyLabels),
                        @json($hourlyValues['humidity']).reverse(), 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 1)', selectedType);
                    createChart('dailyHumidityChart', 'Humidity (%) - Daily', @json($dailyLabels),
                        @json($dailyValues['humidity']).reverse(), 'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 1)', selectedType);

                    createChart('hourlyCOChart', 'CO (ppm) - Hourly', @json($hourlyLabels),
                        @json($hourlyValues['co']).reverse(), 'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 1)', selectedType);
                    createChart('dailyCOChart', 'CO (ppm) - Daily', @json($dailyLabels),
                        @json($dailyValues['co']).reverse(), 'rgba(255, 206, 86, 0.2)',
                        'rgba(255, 206, 86, 1)', selectedType);

                    createChart('hourlyO3Chart', 'O3 (ppb) - Hourly', @json($hourlyLabels),
                        @json($hourlyValues['o3']).reverse(), 'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 1)', selectedType);
                    createChart('dailyO3Chart', 'O3 (ppb) - Daily', @json($dailyLabels),
                        @json($dailyValues['o3']).reverse(), 'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 1)', selectedType);

                    createChart('hourlyPM25Chart', 'PM2.5 (μg/m³) - Hourly', @json($hourlyLabels),
                        @json($hourlyValues['pm25']).reverse(), 'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 1)', selectedType);
                    createChart('dailyPM25Chart', 'PM2.5 (μg/m³) - Daily', @json($dailyLabels),
                        @json($dailyValues['pm25']).reverse(), 'rgba(153, 102, 255, 0.2)',
                        'rgba(153, 102, 255, 1)', selectedType);

                    createChart('hourlyCO2Chart', 'CO2 (ppm) - Hourly', @json($hourlyLabels),
                        @json($hourlyValues['co2']).reverse(), 'rgba(219, 112, 147, 0.2)',
                        'rgba(219, 112, 147, 1)', selectedType);
                    createChart('dailyCO2Chart', 'CO2 (ppm) - Daily', @json($dailyLabels),
                        @json($dailyValues['co2']).reverse(), 'rgba(219, 112, 147, 0.2)',
                        'rgba(219, 112, 147, 1)', selectedType);

                    createChart('hourlyTVOCChart', 'TVOC (ppb) - Hourly', @json($hourlyLabels),
                        @json($hourlyValues['tvoc']).reverse(), 'rgba(0, 100, 0, 0.2)',
                        'rgba(0, 100, 0, 1)', selectedType);
                    createChart('dailyTVOCChart', 'TVOC (ppb) - Daily', @json($dailyLabels),
                        @json($dailyValues['tvoc']).reverse(), 'rgba(0, 100, 0, 0.2)',
                        'rgba(0, 100, 0, 1)', selectedType);
                });
            });
            // Function to create a chart
            function createChart(canvasId, label, labels, data, backgroundColor, borderColor, chartType = 'line') {
                const ctx = document.getElementById(canvasId).getContext('2d');

                // Hủy biểu đồ cũ nếu có
                if (window.myCharts[canvasId]) {
                    window.myCharts[canvasId].destroy();
                }

                // Tạo biểu đồ mới
                const newChart = new Chart(ctx, {
                    type: chartType,
                    data: {
                        labels: labels,
                        datasets: [{
                            label: label,
                            data: data,
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 2,
                            tension: 0.3,
                            pointRadius: 2,
                            pointHoverRadius: 3,


                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: "top",
                            },
                            tooltip: {
                                mode: "index",
                                intersect: false,
                            },
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    drawBorder: false,
                                },
                            },
                            x: {
                                grid: {
                                    display: false,
                                },
                            },
                        },
                    },
                });

                // Lưu lại biểu đồ vào biến toàn cục
                window.myCharts[canvasId] = newChart;
            }
        </script>
    @endif

    <style>
        /* Custom styles for Air Quality Dashboard */
        :root {
            --orange: #fd7e14;
            --purple: #6f42c1;
        }

        /* AQI Meter Styling */
        .aqi-meter {
            margin: 20px 0;
        }

        .aqi-meter .progress {
            height: 30px;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .aqi-meter .progress-bar {
            text-align: center;
            font-weight: 600;
            font-size: 0.85rem;
            line-height: 30px;
            transition: width 1s ease;
        }

        .bg-orange {
            background-color: var(--orange);
        }

        .bg-purple {
            background-color: var(--purple);
        }

        .aqi-marker {
            position: absolute;
            top: -15px;
            transform: translateX(-50%);
            transition: left 1s ease;
        }




        .aqi-color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .aqi-category {
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .aqi-category:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: translateY(-2px);
        }

        .aqi-label {
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 2px;
        }

        /* Chart Styling */
        .chart-card {
            transition: all 0.3s ease;
            background-color: #ffffff;
        }

        .chart-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transform: translateY(-3px);
        }

        .chart-title {
            font-weight: 600;
            color: #495057;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            padding: 0.75rem 1rem;
            border-bottom: 3px solid transparent;
            transition: all 0.2s ease;
        }

        .nav-tabs .nav-link.active {
            color: var(--bs-primary);
            background: transparent;
            border-bottom: 3px solid var(--bs-primary);
        }

        .nav-tabs .nav-link:hover:not(.active) {
            border-bottom: 3px solid #dee2e6;
        }

        /* Table Styling */
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
        }

        .table td,
        .table th {
            padding: 0.75rem 1rem;
        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .table-hover>tbody>tr:hover>* {
            background-color: rgba(13, 110, 253, 0.05);
        }

        /* Empty state styling */
        .empty-state {
            padding: 3rem 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .aqi-legend .row {
                flex-wrap: nowrap;
                overflow-x: auto;
                padding-bottom: 10px;
            }

            .aqi-legend .col {
                min-width: 120px;
            }

            .aqi-label {
                font-size: 0.8rem;
            }
        }

        .welcome-card {
            transition: all 0.3s ease;
        }

        .welcome-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .icon-wrapper {
            transition: all 0.3s ease;
        }

        .welcome-card:hover .icon-wrapper {
            transform: scale(1.05);
        }

        .feature-item {
            padding: 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background-color: rgba(13, 110, 253, 0.05);
            transform: translateY(-3px);
        }
    </style>
@endsection
