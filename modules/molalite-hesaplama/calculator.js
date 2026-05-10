function hcMolaliteHesapla() {
    const mol = parseFloat(document.getElementById('hc-mo-mol').value);
    const mass = parseFloat(document.getElementById('hc-mo-mass').value);

    if (!mol || !mass) return;

    // m = mol / kg
    const molality = mol / mass;

    document.getElementById('hc-mo-val').innerText = molality.toFixed(4) + ' m';
    document.getElementById('hc-mo-result').classList.add('visible');
}
