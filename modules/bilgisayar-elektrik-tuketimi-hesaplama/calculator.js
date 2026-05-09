function hcBilgisayarTuketimHesapla() {
    const watt = parseFloat(document.getElementById('hc-pc-watt').value);
    const hours = parseFloat(document.getElementById('hc-pc-hours').value);
    const price = parseFloat(document.getElementById('hc-pc-price').value);

    if (isNaN(watt) || isNaN(hours) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyKwh = (watt * hours * 30) / 1000;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-pc-usage').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-pc-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-pc-result').classList.add('visible');
}
