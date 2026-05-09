function hcBSKHesapla() {
    const l = parseFloat(document.getElementById('hc-bsk-len').value);
    const dMm = parseFloat(document.getElementById('hc-bsk-diam').value);
    const v = parseFloat(document.getElementById('hc-bsk-v').value);
    const f = parseFloat(document.getElementById('hc-bsk-f').value);
    const g = 9.80665;

    if (isNaN(l) || isNaN(dMm) || isNaN(v) || isNaN(f) || dMm <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const dM = dMm / 1000;
    // h_f = f * (L/D) * (v^2 / 2g)
    const hf = f * (l / dM) * (Math.pow(v, 2) / (2 * g));

    document.getElementById('hc-bsk-val').innerText = hf.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m (Su Sütunu)';
    document.getElementById('hc-bsk-result').classList.add('visible');
}
