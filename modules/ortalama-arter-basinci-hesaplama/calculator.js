function hcMAPHesapla() {
    const sys = parseFloat(document.getElementById('hc-map-sys').value);
    const dia = parseFloat(document.getElementById('hc-map-dia').value);

    if (!sys || !dia) return;

    // MAP = (SBP + 2*DBP) / 3
    const map = (sys + 2 * dia) / 3;

    document.getElementById('hc-map-val').innerText = Math.round(map) + ' mmHg';
    document.getElementById('hc-map-result').classList.add('visible');
}
