function hcHbA1cHesapla() {
    const a1c = parseFloat(document.getElementById('hc-ha-val').value);

    if (!a1c) return;

    // Formula: eAG = (28.7 * A1C) - 46.7
    const eag = (28.7 * a1c) - 46.7;

    document.getElementById('hc-ha-res').innerText = Math.round(eag) + ' mg/dL';
    document.getElementById('hc-ha-result').classList.add('visible');
}
