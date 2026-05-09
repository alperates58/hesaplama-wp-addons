function hcEvapotranspirasyonHesapla() {
    const t = parseFloat(document.getElementById('hc-et-temp').value);
    const p = parseFloat(document.getElementById('hc-et-p').value);

    if (isNaN(t) || isNaN(p) || p <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Blaney-Criddle: ETo = p * (0.46 * T + 8)
    const eto = p * (0.46 * t + 8);

    document.getElementById('hc-et-val').innerText = eto.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mm/gün';
    document.getElementById('hc-et-result').classList.add('visible');
}
