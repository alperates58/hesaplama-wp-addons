function hcAlbüminDüzeltilmişKalsiyumHesapla() {
    const ca = parseFloat(document.getElementById('hc-ac-ca').value);
    const alb = parseFloat(document.getElementById('hc-ac-alb').value);

    if (!ca || !alb) return;

    // Corrected Ca = Ca + 0.8 * (4 - Alb)
    const corrected = ca + (0.8 * (4.0 - alb));

    document.getElementById('hc-ac-val').innerText = corrected.toFixed(2) + ' mg/dL';
    document.getElementById('hc-ac-result').classList.add('visible');
}
