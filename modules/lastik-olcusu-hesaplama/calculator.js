function hcTscHesapla() {
    const w = parseFloat(document.getElementById('hc-tsc-width').value);
    const r = parseFloat(document.getElementById('hc-tsc-ratio').value);
    const j = parseFloat(document.getElementById('hc-tsc-rim').value);

    if (isNaN(w) || isNaN(r) || isNaN(j)) {
        alert('Lütfen tüm ölçüleri girin.');
        return;
    }

    const sidewall = w * (r / 100);
    const diameter = (sidewall * 2) + (j * 25.4);
    const circ = diameter * Math.PI;
    const revs = 1000000 / circ; // revs per km

    document.getElementById('hc-tsc-diameter').innerText = diameter.toFixed(1) + " mm";
    document.getElementById('hc-tsc-sidewall').innerText = sidewall.toFixed(1) + " mm";
    document.getElementById('hc-tsc-circ').innerText = circ.toFixed(1) + " mm";
    document.getElementById('hc-tsc-revs').innerText = Math.round(revs);

    document.getElementById('hc-tsc-result').classList.add('visible');
}
