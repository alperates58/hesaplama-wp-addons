function hcCihazYillikHesapla() {
    const watt = parseFloat(document.getElementById('hc-dy-watt').value);
    const hours = parseFloat(document.getElementById('hc-dy-hours').value);
    const price = parseFloat(document.getElementById('hc-dy-price').value);

    if (isNaN(watt) || isNaN(hours) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const yearlyKwh = (watt * hours * 365) / 1000;
    const yearlyCost = yearlyKwh * price;

    document.getElementById('hc-res-dy-yearly').innerText = yearlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-dy-cost').innerText = yearlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-dy-result').classList.add('visible');
}
