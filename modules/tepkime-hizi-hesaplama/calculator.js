function hcTepkimeHızıHesapla() {
    const c1 = parseFloat(document.getElementById('hc-rr-c1').value);
    const c2 = parseFloat(document.getElementById('hc-rr-c2').value);
    const time = parseFloat(document.getElementById('hc-rr-time').value);

    if (isNaN(c1) || isNaN(c2) || !time) return;

    // r = |ΔC| / Δt
    const rate = Math.abs(c2 - c1) / time;

    document.getElementById('hc-rr-val').innerText = rate.toExponential(4) + ' M/s';
    document.getElementById('hc-rr-result').classList.add('visible');
}
