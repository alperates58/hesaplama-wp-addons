function hcKlimaAylikHesapla() {
    const btu = parseFloat(document.getElementById('hc-am-btu').value);
    const seer = parseFloat(document.getElementById('hc-am-seer').value);
    const hours = parseFloat(document.getElementById('hc-am-hours').value);
    const price = parseFloat(document.getElementById('hc-am-price').value);

    if (isNaN(hours) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Power (kW) = (BTU / SEER) / 3412 (1 kW = 3412 BTU/h)
    // Or simplified: BTU / SEER * 0.000293
    const kw = (btu / seer) / 1000;
    
    // Monthly kWh = kw * hours * 30 * partial_load_factor (0.7 for inverter)
    const monthlyKwh = kw * hours * 30 * 0.7;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-am-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-am-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-am-result').classList.add('visible');
}
