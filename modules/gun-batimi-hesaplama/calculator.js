function hcGBSelectCity() {
    const cityVal = document.getElementById('hc-gb-city').value;
    if (cityVal) {
        const coords = cityVal.split(',');
        document.getElementById('hc-gb-lat').value = coords[0];
        document.getElementById('hc-gb-lng').value = coords[1];
    }
}

function hcGBGetLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById('hc-gb-lat').value = position.coords.latitude.toFixed(4);
            document.getElementById('hc-gb-lng').value = position.coords.longitude.toFixed(4);
        }, function() {
            alert('Konum alınamadı.');
        });
    }
}

function computeSunTime(date, lat, lng, zenith, isSunrise) {
    const D2R = Math.PI / 180;
    const R2D = 180 / Math.PI;
    const start = new Date(date.getFullYear(), 0, 0);
    const day = Math.floor((date - start) / (1000 * 60 * 60 * 24));
    const lngHour = lng / 15;
    let t = isSunrise ? day + ((6 - lngHour) / 24) : day + ((18 - lngHour) / 24);
    const M = (0.9856 * t) - 3.2891;
    let L = (M + (1.916 * Math.sin(M * D2R)) + (0.020 * Math.sin(2 * M * D2R)) + 282.634 + 360) % 360;
    let RA = (R2D * Math.atan(0.91764 * Math.tan(L * D2R)) + 360) % 360;
    const Lquadrant = (Math.floor(L / 90)) * 90;
    const RAquadrant = (Math.floor(RA / 90)) * 90;
    RA = (RA + (Lquadrant - RAquadrant)) / 15;
    const sinDec = 0.39782 * Math.sin(L * D2R);
    const cosDec = Math.cos(Math.asin(sinDec));
    const cosH = (Math.cos(zenith * D2R) - (sinDec * Math.sin(lat * D2R))) / (cosDec * Math.cos(lat * D2R));
    if (cosH > 1) return "Doğmuyor";
    if (cosH < -1) return "Batmıyor";
    let H = isSunrise ? 360 - R2D * Math.acos(cosH) : R2D * Math.acos(cosH);
    H = H / 15;
    const T = H + RA - (0.06571 * t) - 6.622;
    let UT = (T - lngHour + 24) % 24;
    const localOffset = -date.getTimezoneOffset() / 60;
    let localTime = (UT + localOffset + 24) % 24;
    const h = Math.floor(localTime);
    const m = Math.floor((localTime - h) * 60);
    return (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m);
}

function hcGunBatimiHesapla() {
    const dateStr = document.getElementById('hc-gb-date').value;
    const lat = parseFloat(document.getElementById('hc-gb-lat').value);
    const lng = parseFloat(document.getElementById('hc-gb-lng').value);
    if (!dateStr || isNaN(lat) || isNaN(lng)) { alert('Lütfen tüm alanları doldurun.'); return; }
    const date = new Date(dateStr);
    const result = computeSunTime(date, lat, lng, 90.833, false);
    document.getElementById('hc-gb-val').innerText = result;
    document.getElementById('hc-gb-info').innerText = lat.toFixed(2) + "°K, " + lng.toFixed(2) + "°D için.";
    document.getElementById('hc-gb-result').classList.add('visible');
}
