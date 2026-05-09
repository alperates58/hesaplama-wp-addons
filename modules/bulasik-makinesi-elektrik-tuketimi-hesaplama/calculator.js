function hcBulasikMakinesiHesapla() {
    const cycleKwh = parseFloat(document.getElementById('hc-dw-cycle-kwh').value);
    const count = parseFloat(document.getElementById('hc-dw-count').value);
    const price = parseFloat(document.getElementById('hc-dw-price').value);

    if (isNaN(cycleKwh) || isNaN(count) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyKwh = cycleKwh * count * 4.33; // 4.33 weeks per month
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-dw-monthly').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-dw-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-dw-result').classList.add('visible');
}
