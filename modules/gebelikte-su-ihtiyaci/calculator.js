function hcPregSuHesapla() {
    const w = parseFloat(document.getElementById('hc-pw-w').value);

    if (isNaN(w)) {
        alert('Lütfen kilonuzu girin.');
        return;
    }

    // Base: 35ml/kg + 500ml for pregnancy
    const totalMl = (w * 35) + 500;
    const totalL = totalMl / 1000;

    document.getElementById('hc-pw-res').innerText = totalL.toFixed(1).toLocaleString('tr-TR') + " Litre";
    document.getElementById('hc-preg-water-result').classList.add('visible');
}
