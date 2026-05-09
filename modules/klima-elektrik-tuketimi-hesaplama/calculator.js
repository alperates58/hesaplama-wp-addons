function hcKlimaTuketimHesapla() {
    const watt = parseFloat(document.getElementById('hc-ke-watt').value);
    const hours = parseFloat(document.getElementById('hc-ke-hours').value);
    const price = parseFloat(document.getElementById('hc-ke-price').value);

    if (isNaN(watt) || isNaN(hours) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Average load factor for Inverter AC: 0.6
    const totalKwh = (watt * hours * 0.6) / 1000;
    const totalCost = totalKwh * price;

    document.getElementById('hc-res-ke-kwh').innerText = totalKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-ke-cost').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ke-result').classList.add('visible');
}
