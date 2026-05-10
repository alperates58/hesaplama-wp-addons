function hcStokiyometriHesapla() {
    const c1 = parseFloat(document.getElementById('hc-st-coeff1').value);
    const c2 = parseFloat(document.getElementById('hc-st-coeff2').value);
    const m1 = parseFloat(document.getElementById('hc-st-mol1').value);

    if (!c1 || !c2 || !m1) return;

    // m1 / c1 = m2 / c2  => m2 = (m1 * c2) / c1
    const m2 = (m1 * c2) / c1;

    document.getElementById('hc-st-val').innerText = m2.toFixed(3) + ' mol';
    document.getElementById('hc-st-result').classList.add('visible');
}
