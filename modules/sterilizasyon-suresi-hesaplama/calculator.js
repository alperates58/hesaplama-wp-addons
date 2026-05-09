function hcSterilTimeHesapla() {
    const t = parseFloat(document.getElementById('hc-st-temp').value) || 0;
    const time = parseFloat(document.getElementById('hc-st-time').value) || 0;
    const z = parseFloat(document.getElementById('hc-st-z').value) || 10;

    // F0 = t * 10^((T - 121.1) / z)
    const f0 = time * Math.pow(10, (t - 121.1) / z);

    document.getElementById('hc-res-st-val').innerText = f0.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' dakika';
    document.getElementById('hc-steril-time-result').classList.add('visible');
}
