function hcMgLDenMolariteyeÇevirmeHesapla() {
    const val = parseFloat(document.getElementById('hc-mtm-val').value);
    const mw = parseFloat(document.getElementById('hc-mtm-mw').value);

    if (!val || !mw) return;

    // Molarite = (mg/L / 1000) / MW
    const molarity = (val / 1000) / mw;

    document.getElementById('hc-mtm-res').innerText = molarity.toExponential(4) + ' M';
    document.getElementById('hc-mtm-result').classList.add('visible');
}
