function hcAkvaryumSuKapasitesiHesapla() {
    const w = parseFloat(document.getElementById('hc-aq-w').value);
    const d = parseFloat(document.getElementById('hc-aq-d').value);
    const h = parseFloat(document.getElementById('hc-aq-h').value);
    const safety = parseFloat(document.getElementById('hc-aq-safety').value) || 0;

    if (!w || !d || !h) return;

    // Hacim (Litre) = (G * D * (Y-Pay)) / 1000
    const netH = Math.max(0, h - safety);
    const liters = (w * d * netH) / 1000;

    document.getElementById('hc-aq-val').innerText = Math.round(liters) + ' Litre';
    document.getElementById('hc-aq-result').classList.add('visible');
}
