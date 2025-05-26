<section class="mb-5">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <div class="d-flex align-items-center mb-3">
                <h2 class="card-title mb-0 fs-4 fw-bold">
                    <i class="bi bi-speedometer2 me-2"></i>Air Quality Index (AQI)
                </h2><br><br>
                <div class="ms-auto">
                    <span id="aqi-badge-aqi"
                        class="badge fs-6 px-3 py-2 
                            @if ($AQI <= 50) bg-success 
                            @elseif($AQI <= 100) bg-warning 
                            @elseif($AQI <= 150) bg-orange 
                            @elseif($AQI <= 200) bg-danger 
                            @elseif($AQI <= 300) bg-purple 
                            @else bg-maroon @endif">
                        AQI: {{ $AQI }}
                    </span>
                </div>
            </div>

            <div class="aqi-meter position-relative mb-4">
                <div class="progress rounded-pill" style="height: 30px;">
                    <div class="progress-bar bg-success" style="width: 10%;">0-50</div>
                    <div class="progress-bar bg-warning" style="width: 10%;">51-100</div>
                    <div class="progress-bar" style="background-color: orange; width: 10%;">101-150</div>
                    <div class="progress-bar bg-danger" style="width: 10%;">151-200</div>
                    <div class="progress-bar" style="background-color: purple; width: 20%;">201-300</div>
                    <div class="progress-bar" style="background-color: maroon; width: 40%;">301-500</div>
                </div>
                <div class="aqi-marker" id="aqi-marker-aqi"
                    style="left: {{ min(($AQI * 100) / 500, 100) }}%;">
                    <div class="aqi-value" id="aqi-value-aqi">{{ $AQI }}</div>
                </div>

            </div>

            <div class="aqi-legend mt-4">
                <div class="row g-3 text-center">
                    <div class="col">
                        <div class="aqi-category">
                            <div class="aqi-color bg-success rounded-circle mx-auto mb-2"></div>
                            <div class="aqi-label">Good</div>
                            <small class="text-muted">0-50</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="aqi-category">
                            <div class="aqi-color bg-warning rounded-circle mx-auto mb-2"></div>
                            <div class="aqi-label">Moderate</div>
                            <small class="text-muted">51-100</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="aqi-category">
                            <div class="aqi-color bg-orange rounded-circle mx-auto mb-2"></div>
                            <div class="aqi-label">Unhealthy for Sensitive Groups</div>
                            <small class="text-muted">101-150</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="aqi-category">
                            <div class="aqi-color bg-danger rounded-circle mx-auto mb-2"></div>
                            <div class="aqi-label">Unhealthy</div>
                            <small class="text-muted">151-200</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="aqi-category">
                            <div class="aqi-color bg-purple rounded-circle mx-auto mb-2"></div>
                            <div class="aqi-label">Very Unhealthy</div>
                            <small class="text-muted">201-300</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="aqi-category">
                            <div class="aqi-color bg-maroon rounded-circle mx-auto mb-2"></div>
                            <div class="aqi-label">Hazardous</div>
                            <small class="text-muted">301-500+</small>
                        </div>
                    </div>
                </div>
            </div>

            <div id="aqi-info"
                class="aqi-info mt-4 p-3 rounded-3 
                @if ($AQI <= 50) bg-success bg-opacity-10 border border-success border-opacity-25 text-dark
                @elseif($AQI <= 100) bg-warning bg-opacity-10 border border-warning border-opacity-25 text-dark
                @elseif($AQI <= 150) bg-orange bg-opacity-10 border border-warning border-opacity-25 text-dark
                @elseif($AQI <= 200) bg-danger bg-opacity-10 border border-danger border-opacity-25 text-dark
                @elseif($AQI <= 300) bg-purple bg-opacity-10 border border-purple border-opacity-25 text-white
                @else bg-maroon bg-opacity-10 border border-dark border-opacity-25 text-white @endif">

                <h5 id="aqi-title" class="mb-2 fw-semibold">
                    <i class="bi bi-info-circle me-2"></i>
                    @if ($AQI <= 50)
                        Good Air Quality
                    @elseif($AQI <= 100)
                        Moderate Air Quality
                    @elseif($AQI <= 150)
                        Unhealthy for Sensitive Groups
                    @elseif($AQI <= 200)
                        Unhealthy Air Quality
                    @elseif($AQI <= 300)
                        Very Unhealthy Air Quality
                    @else
                        Hazardous Air Quality
                    @endif
                </h5>

                <p id="aqi-description" class="mb-0">
                    @if ($AQI <= 50)
                        Air quality is considered satisfactory, and air pollution poses little or no risk.
                    @elseif($AQI <= 100)
                        Air quality is acceptable; however, there may be a moderate health concern for a very small
                        number of people.
                    @elseif($AQI <= 150)
                        Members of sensitive groups may experience health effects. The general public is not likely to
                        be affected.
                    @elseif($AQI <= 200)
                        Everyone may begin to experience health effects; members of sensitive groups may experience more
                        serious health effects.
                    @elseif($AQI <= 300)
                        Health alert: everyone may experience more serious health effects.
                    @else
                        Health warnings of emergency conditions. The entire population is more likely to be affected.
                    @endif
                </p>
            </div>

        </div>
    </div>
</section>
<style>
    .bg-orange {
        background-color: orange !important;
    }

    .bg-purple {
        background-color: purple !important;
    }

    .bg-maroon {
        background-color: maroon !important;
    }

    .aqi-color.bg-orange {
        background-color: orange;
    }

    .aqi-color.bg-purple {
        background-color: purple;
    }

    .aqi-color.bg-maroon {
        background-color: maroon;
    }
.aqi-value {
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #343a40;
    color: white;
    padding: 3px 10px;
    border-radius: 15px;
    font-weight: bold;
}
    .aqi-marker {
    position: absolute;
    top: -20px;
    transform: translateX(-50%);
    width: 2px;
    height: 35px;
    background-color: #000;
}

</style>
