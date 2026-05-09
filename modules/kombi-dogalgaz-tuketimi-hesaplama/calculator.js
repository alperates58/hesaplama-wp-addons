function hcKombiTuketimHesapla() {
    const power = parseFloat(document.getElementById('hc-bc-power').value);
    const hours = parseFloat(document.getElementById('hc-bc-hours').value);
    const price = parseFloat(document.getElementById('hc-bc-price').value);

    if (isNaN(hours) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // 1 kW heat ~ 0.105 m3/h gas consumption for condensing boilers
    const m3PerHourAtFullLoad = power * 0.105;
    
    // Most boilers run at 60% average capacity during cycling
    const dailyM3 = m3PerHourAtFullLoad * hours * 0.6;
    const monthlyCost = dailyM3 * 30 * price;

    document.getElementById('hc-res-bc-daily').innerText = dailyM3.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    document.getElementById('hc-res-bc-monthly').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-bc-result').classList.add('visible');
}
