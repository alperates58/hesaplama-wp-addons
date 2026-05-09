function hcOrbitHesapla() {
    const M = parseFloat(document.getElementById('hc-oc-m').value) || 0;
    const rKm = parseFloat(document.getElementById('hc-oc-r').value) || 0;
    const G = 6.67430e-11; // Gravitational constant

    if (M <= 0 || rKm <= 0) return;

    const r = rKm * 1000; // to meters

    // v = sqrt(GM / r)
    const v = Math.sqrt((G * M) / r);
    const vKmS = v / 1000;

    // T = 2 * PI * sqrt(r^3 / GM)
    const T = 2 * Math.PI * Math.sqrt(Math.pow(r, 3) / (G * M));
    const tMin = T / 60;

    document.getElementById('hc-res-oc-v').innerText = vKmS.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/s';
    document.getElementById('hc-res-oc-t').innerText = tMin.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' dakika';
    
    document.getElementById('hc-orbit-calc-result').classList.add('visible');
}
