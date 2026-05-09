function hcKaloriferMaliyetHesapla() {
    const area = parseFloat(document.getElementById('hc-gh-area').value);
    const insulation = parseFloat(document.getElementById('hc-gh-insulation').value);
    const temp = parseFloat(document.getElementById('hc-gh-temp').value);
    const price = parseFloat(document.getElementById('hc-gh-price').value);

    if (isNaN(area) || isNaN(price)) {
        alert('Lütfen ev alanını girin.');
        return;
    }

    // Base consumption: ~1.2 m3 per m2 per month for moderate insulation in winter
    const baseM3PerM2 = 1.2;
    const estimatedM3 = area * baseM3PerM2 * insulation * temp;
    const estimatedCost = estimatedM3 * price;

    document.getElementById('hc-res-gh-m3').innerText = estimatedM3.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' m³';
    document.getElementById('hc-res-gh-cost').innerText = estimatedCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gh-result').classList.add('visible');
}
