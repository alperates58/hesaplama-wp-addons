function hcLambaderHesapla() {
    const bulbWatt = parseFloat(document.getElementById('hc-lc-bulb').value);
    const count = parseFloat(document.getElementById('hc-lc-count').value);
    const hours = parseFloat(document.getElementById('hc-lc-hours').value);

    if (isNaN(count) || isNaN(hours)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalWatt = bulbWatt * count;
    const monthlyKwh = (totalWatt * hours * 30) / 1000;
    const price = 3.11; // 2026 default
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-lc-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-lc-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-lc-result').classList.add('visible');
}
