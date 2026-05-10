function hcCRPAlbüminOranıHesapla() {
    const crp = parseFloat(document.getElementById('hc-ca-crp').value);
    const alb = parseFloat(document.getElementById('hc-ca-alb').value);

    if (!crp || !alb) return;

    // Ratio = CRP (mg/L) / Albumin (g/dL)
    const ratio = crp / alb;

    document.getElementById('hc-ca-val').innerText = ratio.toFixed(3);
    document.getElementById('hc-ca-result').classList.add('visible');
}
