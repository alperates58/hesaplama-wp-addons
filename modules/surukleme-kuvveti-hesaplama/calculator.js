function hcDragForceHesapla() {
    const rho = parseFloat(document.getElementById('hc-df-rho').value) || 0;
    const v = parseFloat(document.getElementById('hc-df-v').value) || 0;
    const cd = parseFloat(document.getElementById('hc-df-cd').value) || 0;
    const a = parseFloat(document.getElementById('hc-df-a').value) || 0;

    const force = 0.5 * rho * Math.pow(v, 2) * cd * a;

    document.getElementById('hc-res-df-val').innerText = force.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Newton';
    document.getElementById('hc-drag-force-result').classList.add('visible');
}
