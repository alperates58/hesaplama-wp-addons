function hcIMSelectCity() {
    const cityVal = document.getElementById('hc-im-city').value;
    if (cityVal) {
        const coords = cityVal.split(',');
        document.getElementById('hc-im-lat').value = coords[0];
        document.getElementById('hc-im-lng').value = coords[1];
    }
}

function computeTime(date, lat, lng, zenith, isSunrise) {
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
    if (cosH > 1 || cosH < -1) return null;
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

function hcImsakHesapla() {
    const dateStr = document.getElementById('hc-im-date').value;
    const lat = parseFloat(document.getElementById('hc-im-lat').value);
    const lng = parseFloat(document.getElementById('hc-im-lng').value);
    if (!dateStr || isNaN(lat) || isNaN(lng)) { alert('Lütfen bilgileri girin.'); return; }
    const date = new Date(dateStr);
    const imsak = computeTime(date, lat, lng, 108, true);
    document.getElementById('hc-im-val').innerText = imsak || "Hesaplanamadı";
    document.getElementById('hc-im-result').classList.add('visible');
}
