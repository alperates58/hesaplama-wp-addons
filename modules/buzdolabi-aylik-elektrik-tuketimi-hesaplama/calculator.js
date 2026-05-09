function hcBuzdolabiHesapla() {
    const annualKwh = parseFloat(document.getElementById('hc-fr-annual-kwh').value);
    const price = parseFloat(document.getElementById('hc-fr-price').value);

    if (isNaN(annualKwh) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyKwh = annualKwh / 12;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-fr-monthly').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-fr-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-fr-result').classList.add('visible');
}
