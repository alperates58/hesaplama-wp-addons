function hcKiteCalcHesapla() {
    const weight = parseFloat(document.getElementById('hc-kc-weight').value);
    const wind = parseFloat(document.getElementById('hc-kc-wind').value);

    if (!weight || !wind) {
        alert('Lütfen ağırlık ve rüzgar hızını giriniz.');
        return;
    }

    // Common rule of thumb: Kite Size = (Weight * 2.2) / WindSpeed
    // This is for imperial, let's adjust for metric and modern gear.
    // Base formula: Size = (K * Weight) / Wind
    // For 75kg at 18 knots, recommended is ~10-12m2.
    const size = (weight * 2.5) / wind;

    const resVal = document.getElementById('hc-kc-res-val');
    resVal.innerText = size.toFixed(1).toLocaleString('tr-TR');

    document.getElementById('hc-kite-calc-result').classList.add('visible');
}
