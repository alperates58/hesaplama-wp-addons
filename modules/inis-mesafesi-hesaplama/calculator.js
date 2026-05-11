function hcLandingDistHesapla() {
    const vKmh = parseFloat(document.getElementById('hc-id-v').value);
    const f = parseFloat(document.getElementById('hc-id-f').value);
    const slopeDeg = parseFloat(document.getElementById('hc-id-slope').value);

    if (isNaN(vKmh) || vKmh <= 0) {
        alert('Lütfen geçerli bir iniş hızı girin.');
        return;
    }

    // V to m/s
    const vMs = vKmh / 3.6;
    const g = 9.81;
    const theta = (slopeDeg * Math.PI) / 180;

    // d = V^2 / (2 * g * (f + sin(theta)))
    const d = Math.pow(vMs, 2) / (2 * g * (f + Math.sin(theta)));

    document.getElementById('hc-id-res-val').innerText = Math.round(d).toLocaleString('tr-TR') + ' m';
    
    document.getElementById('hc-id-result').classList.add('visible');
}
