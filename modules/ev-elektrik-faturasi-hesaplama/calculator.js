function hcEvFaturasiHesapla() {
    const fridge = parseFloat(document.getElementById('hc-hb-fridge').value);
    const washing = parseFloat(document.getElementById('hc-hb-washing').value);
    const other = parseFloat(document.getElementById('hc-hb-other').value);
    const hvacHours = parseFloat(document.getElementById('hc-hb-hvac').value);

    // kWh Calculations
    const washingKwh = washing * 1.0 * 4.33; // 1kWh per cycle
    const hvacKwh = hvacHours * 1.5 * 30; // 1.5kW per hour
    
    const totalKwh = fridge + washingKwh + other + hvacKwh;

    // 2026 Prices
    const limit = 240;
    const lowPrice = 3.11;
    const highPrice = 4.82;

    let totalCost = 0;
    if (totalKwh <= limit) {
        totalCost = totalKwh * lowPrice;
    } else {
        totalCost = (limit * lowPrice) + ((totalKwh - limit) * highPrice);
    }

    document.getElementById('hc-res-hb-kwh').innerText = totalKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-hb-total').innerText = totalCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-hb-result').classList.add('visible');
}
