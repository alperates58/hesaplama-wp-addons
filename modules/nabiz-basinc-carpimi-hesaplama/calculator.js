function hcRPPHesapla() {
    const sys = parseFloat(document.getElementById('hc-rpp-sys').value);
    const hr = parseFloat(document.getElementById('hc-rpp-hr').value);

    if (!sys || !hr) return;

    // RPP = SBP * HR
    const rpp = sys * hr;

    document.getElementById('hc-rpp-val').innerText = Math.round(rpp).toLocaleString('tr-TR');
    document.getElementById('hc-rpp-result').classList.add('visible');
}
