function hcTvHesapla() {
    const watt = parseFloat(document.getElementById('hc-ot-size').value);
    const hours = parseFloat(document.getElementById('hc-ot-hours').value);

    if (isNaN(hours)) {
        alert('Lütfen kullanım süresini girin.');
        return;
    }

    const monthlyKwh = (watt * hours * 30) / 1000;
    const price = 3.11;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-ot-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-ot-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ot-result').classList.add('visible');
}
