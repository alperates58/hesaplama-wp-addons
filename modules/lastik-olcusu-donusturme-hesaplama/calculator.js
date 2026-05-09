function hcTcHesapla() {
    const w = parseFloat(document.getElementById('hc-tc-width').value);
    const r = parseFloat(document.getElementById('hc-tc-ratio').value);
    const d = parseFloat(document.getElementById('hc-tc-rim').value);

    if (isNaN(w) || isNaN(r) || isNaN(d)) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    // Diameter in mm = (w * r / 100 * 2) + (d * 25.4)
    const diaMm = (w * r / 50) + (d * 25.4);
    const diaInch = diaMm / 25.4;
    const widthInch = w / 25.4;

    const result = diaInch.toFixed(1) + " x " + widthInch.toFixed(1) + " R" + d;

    document.getElementById('hc-tc-val').innerText = result;
    document.getElementById('hc-tc-result').classList.add('visible');
}
