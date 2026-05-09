function hcEnzimAktivitesiHesapla() {
    const delta = parseFloat(document.getElementById('hc-enz-delta').value);
    const eps = parseFloat(document.getElementById('hc-enz-eps').value);
    const vt = parseFloat(document.getElementById('hc-enz-vt').value); // µL
    const vs = parseFloat(document.getElementById('hc-enz-vs').value); // µL

    if (isNaN(delta) || isNaN(eps) || isNaN(vt) || isNaN(vs) || eps <= 0 || vs <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // U/mL = (delta * Vt * 10^6) / (eps * d * Vs * 10^-3) -> simplified
    // Standard formula for 1cm path length:
    // U/mL = (delta * Vt) / (eps * Vs) * 10^3
    const activity = (delta * vt) / (eps * vs) * 1000;

    document.getElementById('hc-enz-val').innerText = activity.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' U/mL';
    document.getElementById('hc-enz-result').classList.add('visible');
}
