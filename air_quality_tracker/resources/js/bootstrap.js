/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;


window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});



window.Echo.private('air-quality.${userId}')
    .listen('.AirQualityUpdated', (e) => {
        console.log('Realtime data:', e.data);
        // Giả sử e.data có dạng { temperature, humidity, PM2_5, CO, CO2, O3, TVOC }
        document.getElementById('temperature').innerHTML = e.data.temperature + '<span class="unit">°C</span>';
        document.getElementById('humidity').innerHTML = e.data.humidity + '<span class="unit">%</span>';
        document.getElementById('pm25').innerHTML = e.data.PM2_5 + '<span class="unit">μg/m³</span>';
        document.getElementById('co').innerHTML = e.data.CO + '<span class="unit">ppm</span>';
        document.getElementById('co2').innerHTML = e.data.CO2 + '<span class="unit">ppm</span>';
        document.getElementById('o3').innerHTML = e.data.O3 + '<span class="unit">ppb</span>';
        document.getElementById('tvoc').innerHTML = e.data.TVOC + '<span class="unit">ppb</span>';
        const aqi = e.data.aqi;
        console.log('AQI:', aqi);

        const aqiBadge = document.getElementById('aqi-badge-aqi');
        aqiBadge.innerText = 'AQI: ' + aqi;

        aqiBadge.classList.remove('bg-success', 'bg-warning', 'bg-orange', 'bg-danger', 'bg-purple', 'bg-maroon');

        if (aqi <= 50) {
            aqiBadge.classList.add('bg-success');
        } else if (aqi <= 100) {
            aqiBadge.classList.add('bg-warning');
        } else if (aqi <= 150) {
            aqiBadge.classList.add('bg-orange');
        } else if (aqi <= 200) {
            aqiBadge.classList.add('bg-danger');
        } else if (aqi <= 300) {
            aqiBadge.classList.add('bg-purple');
        } else {
            aqiBadge.classList.add('bg-maroon');
        }
        const aqiMarker = document.getElementById('aqi-marker-aqi');
        aqiMarker.style.left = Math.min((aqi * 100) / 500, 100) + '%';

        document.getElementById('aqi-value-aqi').innerText = aqi;
        const aqiInfo = document.getElementById('aqi-info');
        const aqiTitle = document.getElementById('aqi-title');
        const aqiDescription = document.getElementById('aqi-description');

        if (aqiInfo && aqiTitle && aqiDescription) {
            // Xóa tất cả class cũ trước khi thêm mới
            aqiInfo.className = 'aqi-info mt-4 p-3 rounded-3';

            if (aqi <= 50) {
                aqiInfo.classList.add('bg-success', 'bg-opacity-10', 'border', 'border-success', 'border-opacity-25', 'text-dark');
                aqiTitle.innerHTML = `<i class="bi bi-info-circle me-2"></i> Good Air Quality`;
                aqiDescription.innerText = 'Air quality is considered satisfactory, and air pollution poses little or no risk.';
            } else if (aqi <= 100) {
                aqiInfo.classList.add('bg-warning', 'bg-opacity-10', 'border', 'border-warning', 'border-opacity-25', 'text-dark');
                aqiTitle.innerHTML = `<i class="bi bi-info-circle me-2"></i> Moderate Air Quality`;
                aqiDescription.innerText = 'Air quality is acceptable; however, there may be a moderate health concern for a very small number of people.';
            } else if (aqi <= 150) {
                aqiInfo.classList.add('bg-orange', 'bg-opacity-10', 'border', 'border-warning', 'border-opacity-25', 'text-dark');
                aqiTitle.innerHTML = `<i class="bi bi-info-circle me-2"></i> Unhealthy for Sensitive Groups`;
                aqiDescription.innerText = 'Members of sensitive groups may experience health effects. The general public is not likely to be affected.';
            } else if (aqi <= 200) {
                aqiInfo.classList.add('bg-danger', 'bg-opacity-10', 'border', 'border-danger', 'border-opacity-25', 'text-dark');
                aqiTitle.innerHTML = `<i class="bi bi-info-circle me-2"></i> Unhealthy Air Quality`;
                aqiDescription.innerText = 'Everyone may begin to experience health effects; members of sensitive groups may experience more serious health effects.';
            } else if (aqi <= 300) {
                aqiInfo.classList.add('bg-purple', 'bg-opacity-10', 'border', 'border-purple', 'border-opacity-25', 'text-white');
                aqiTitle.innerHTML = `<i class="bi bi-info-circle me-2"></i> Very Unhealthy Air Quality`;
                aqiDescription.innerText = 'Health alert: everyone may experience more serious health effects.';
            } else {
                aqiInfo.classList.add('bg-maroon', 'bg-opacity-10', 'border', 'border-dark', 'border-opacity-25', 'text-white');
                aqiTitle.innerHTML = `<i class="bi bi-info-circle me-2"></i> Hazardous Air Quality`;
                aqiDescription.innerText = 'Health warnings of emergency conditions. The entire population is more likely to be affected.';
            }
        }
    });
