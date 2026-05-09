function hcWindLoadHesapla() {
    const v = parseFloat(document.getElementById('hc-wl-v').value) || 0;
    const cp = parseFloat(document.getElementById('hc-wl-cp').value) || 0.8;
    const kz = parseFloat(document.getElementById('hc-wl-kz').value) || 1.0;

    // Standard wind pressure formula: q = 0.5 * rho * V^2
    // rho approx 1.225 -> 0.5 * 1.225 = 0.6125
    const q = 0.6125 * Math.pow(v, 2) * kz * cp;

    document.getElementById('hc-res-wl-val').innerText = Math.round(q).toLocaleString('tr-TR') + ' N/m² (Pa)';
    document.getElementById('hc-wind-load-result').classList.add('visible');
}
