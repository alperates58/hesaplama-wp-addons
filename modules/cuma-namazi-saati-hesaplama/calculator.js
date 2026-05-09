function hcCNSelectCity() {
    const cityVal = document.getElementById('hc-cn-city').value;
    if (cityVal) {
        const coords = cityVal.split(',');
        document.getElementById('hc-cn-lat').value = coords[0];
        document.getElementById('hc-cn-lng').value = coords[1];
    }
}

function hcCumaHesapla() {
    const dateStr = document.getElementById('hc-cn-date').value;
    const lat = parseFloat(document.getElementById('hc-cn-lat').value);
    const lng = parseFloat(document.getElementById('hc-cn-lng').value);

    if (!dateStr || isNaN(lat) || isNaN(lng)) { alert('Lütfen bilgileri girin.'); return; }

    const date = new Date(dateStr);
    const localOffset = -date.getTimezoneOffset() / 60;
    const lngHour = lng / 15;
    
    // Simplified Solar Noon (Öğle)
    let noon = (12 - lngHour + localOffset + 24) % 24;
    
    const h = Math.floor(noon);
    const m = Math.floor((noon - h) * 60);
    const result = (h < 10 ? '0' + h : h) + ':' + (m < 10 ? '0' + m : m);

    document.getElementById('hc-cn-val').innerText = result;
    document.getElementById('hc-cn-result').classList.add('visible');
}
