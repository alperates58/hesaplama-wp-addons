function hcEvcConvert() {
    const val = parseFloat(document.getElementById('hc-evc-input-val').value);

    if (isNaN(val) || val === 0) return;

    // Base: kWh / 100km
    const whkm = val * 10;
    const kmkwh = 100 / val;
    
    // To Imperial
    const whMile = whkm * 1.60934;
    const mpge = 33705 / whMile;
    const milKwh = 1 / (whMile / 1000);

    document.getElementById('hc-evc-whkm').innerText = Math.round(whkm) + " Wh/km";
    document.getElementById('hc-evc-kmkwh').innerText = kmkwh.toFixed(2) + " km/kWh";
    document.getElementById('hc-evc-mpge').innerText = mpge.toFixed(1) + " MPGe";
    document.getElementById('hc-evc-milkwh').innerText = milKwh.toFixed(2) + " mil/kWh";
}

// Initial run
window.addEventListener('load', hcEvcConvert);
