function hcTitrasyonHesapla() {
    const va = parseFloat(document.getElementById('hc-ti-va').value);
    const mt = parseFloat(document.getElementById('hc-ti-mt').value);
    const vt = parseFloat(document.getElementById('hc-ti-vt').value);

    if (!va || !mt || !vt) return;

    // Ma = (Mt * Vt) / Va
    const ma = (mt * vt) / va;

    document.getElementById('hc-ti-val').innerText = ma.toFixed(4) + ' M';
    document.getElementById('hc-ti-result').classList.add('visible');
}
