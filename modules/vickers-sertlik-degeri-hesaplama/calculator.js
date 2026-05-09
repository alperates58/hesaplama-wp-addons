function hcVickersHesapla() {
    const f = parseFloat(document.getElementById('hc-vc-force').value) || 0;
    const d = parseFloat(document.getElementById('hc-vc-diag').value) || 0;

    if (d <= 0) return;

    const hv = 1.8544 * (f / Math.pow(d, 2));

    document.getElementById('hc-res-vc-val').innerText = Math.round(hv) + ' HV';
    document.getElementById('hc-vickers-calc-result').classList.add('visible');
}
