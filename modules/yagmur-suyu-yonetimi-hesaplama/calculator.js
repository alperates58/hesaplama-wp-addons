function hcRainwaterHesapla() {
    const area = parseFloat(document.getElementById('hc-rw-area').value) || 0;
    const rain = parseFloat(document.getElementById('hc-rw-rain').value) || 0;
    const coeff = parseFloat(document.getElementById('hc-rw-coeff').value) || 0.9;

    const liters = area * rain * coeff;
    const m3 = liters / 1000;

    document.getElementById('hc-res-rw-val').innerText = liters.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' Litre (' + m3.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m³)';
    document.getElementById('hc-rainwater-harvest-result').classList.add('visible');
}
