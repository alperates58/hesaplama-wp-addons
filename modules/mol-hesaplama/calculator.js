function hcMolHesapla() {
    const mass = parseFloat(document.getElementById('hc-mol-mass').value);
    const mw = parseFloat(document.getElementById('hc-mol-mw').value);

    if (!mass || !mw) return;

    // n = m / MA
    const n = mass / mw;

    document.getElementById('hc-mol-val').innerText = n.toFixed(4) + ' mol';
    document.getElementById('hc-mol-result').classList.add('visible');
}
