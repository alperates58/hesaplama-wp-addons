function hcGroundResistanceHesapla() {
    const rho = parseFloat(document.getElementById('hc-gr-rho').value) || 100;
    const l = parseFloat(document.getElementById('hc-gr-l').value) || 1;
    const r = parseFloat(document.getElementById('hc-gr-r').value) || 0.01;

    // R = (rho / (2 * PI * L)) * (ln(4L/r) - 1)
    const res = (rho / (2 * Math.PI * l)) * (Math.log((4 * l) / r) - 1);

    document.getElementById('hc-res-gr-val').innerText = res.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ω';
    document.getElementById('hc-ground-resistance-result').classList.add('visible');
}
