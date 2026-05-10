function hcMolariteHesapla() {
    const mol = parseFloat(document.getElementById('hc-ma-mol').value);
    const vol = parseFloat(document.getElementById('hc-ma-vol').value);

    if (!mol || !vol) return;

    // M = mol / L
    const molarity = mol / vol;

    document.getElementById('hc-ma-val').innerText = molarity.toFixed(4) + ' M';
    document.getElementById('hc-ma-result').classList.add('visible');
}
