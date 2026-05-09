function hcElektrikFaturasiHesapla() {
    const kwh = parseFloat(document.getElementById('hc-eb-kwh').value);
    const type = document.getElementById('hc-eb-type').value;

    if (isNaN(kwh)) {
        alert('Lütfen toplam tüketim miktarını girin.');
        return;
    }

    // 2026 Mesken Projeksiyonu
    // Kademe sınırı: 240 kWh/ay (günlük 8 kWh)
    const limit = 240;
    const lowPrice = type === 'mesken' ? 3.11 : 5.50;
    const highPrice = type === 'mesken' ? 4.82 : 7.20;

    let lowCost = 0;
    let highCost = 0;

    if (kwh <= limit) {
        lowCost = kwh * lowPrice;
        document.getElementById('hc-row-eb-high').style.display = 'none';
    } else {
        lowCost = limit * lowPrice;
        highCost = (kwh - limit) * highPrice;
        document.getElementById('hc-row-eb-high').style.display = 'flex';
    }

    const total = lowCost + highCost;

    document.getElementById('hc-res-eb-low').innerText = lowCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-eb-high').innerText = highCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-eb-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-eb-result').classList.add('visible');
}
