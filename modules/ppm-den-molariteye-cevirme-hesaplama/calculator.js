function hcPpmDenMolariteyeÇevirmeHesapla() {
    const val = parseFloat(document.getElementById('hc-ptm-val').value);
    const mw = parseFloat(document.getElementById('hc-ptm-mw').value);

    if (!val || !mw) return;

    // ppm = mg/L (approx for dilute aq solutions)
    // Molarite = (ppm / 1000) / MW
    const molarity = (val / 1000) / mw;

    document.getElementById('hc-ptm-res').innerText = molarity.toExponential(4) + ' M';
    document.getElementById('hc-ptm-result').classList.add('visible');
}
