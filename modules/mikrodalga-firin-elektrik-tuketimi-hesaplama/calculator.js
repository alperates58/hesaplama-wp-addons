function hcMikroHesapla() {
    const watt = parseFloat(document.getElementById('hc-mf-watt').value);
    const mins = parseFloat(document.getElementById('hc-mf-mins').value);

    if (isNaN(watt) || isNaN(mins)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const dailyKwh = (watt * (mins / 60)) / 1000;
    const monthlyKwh = dailyKwh * 30;
    const price = 3.11;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-mf-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-mf-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-mf-result').classList.add('visible');
}
