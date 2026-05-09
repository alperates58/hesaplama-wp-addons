function hcCihazTuketimiHesapla() {
    const watt = parseFloat(document.getElementById('hc-dc-watt').value);
    const hours = parseFloat(document.getElementById('hc-dc-hours').value);
    const days = parseFloat(document.getElementById('hc-dc-days').value);
    const price = parseFloat(document.getElementById('hc-dc-price').value);

    if (isNaN(watt) || isNaN(hours) || isNaN(days) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalKwh = (watt * hours * days) / 1000;
    const totalCost = totalKwh * price;

    document.getElementById('hc-res-dc-kwh').innerText = totalKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-dc-cost').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-dc-result').classList.add('visible');
}
