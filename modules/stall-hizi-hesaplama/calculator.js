function hcStallSpeedHesapla() {
    const w = parseFloat(document.getElementById('hc-ss-w').value) || 0;
    const rho = parseFloat(document.getElementById('hc-ss-rho').value) || 1.225;
    const s = parseFloat(document.getElementById('hc-ss-s').value) || 1;
    const cl = parseFloat(document.getElementById('hc-ss-cl').value) || 1.5;
    const g = 9.81;

    // Vs = sqrt((2 * W * g) / (rho * S * CLmax))
    const vsMs = Math.sqrt((2 * w * g) / (rho * s * cl));
    const vsKmh = vsMs * 3.6;

    document.getElementById('hc-res-ss-val').innerText = Math.round(vsKmh).toLocaleString('tr-TR') + ' km/sa';
    document.getElementById('hc-stall-speed-result').classList.add('visible');
}
