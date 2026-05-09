function hcUtuHesapla() {
    const watt = parseFloat(document.getElementById('hc-ue-watt').value);
    const weeklyHours = parseFloat(document.getElementById('hc-ue-hours').value);

    if (isNaN(watt) || isNaN(weeklyHours)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Iron cycles on and off. Average duty cycle ~70%
    const dutyCycle = 0.7;
    const monthlyHours = weeklyHours * 4.33; // Average weeks per month
    const monthlyKwh = (watt * monthlyHours * dutyCycle) / 1000;
    const price = 3.11;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-ue-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-ue-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ue-result').classList.add('visible');
}
