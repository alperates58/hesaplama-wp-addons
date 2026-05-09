function hcSolarBataryaHesapla() {
    const power = parseFloat(document.getElementById('hc-sb-power').value);
    const capacity = parseFloat(document.getElementById('hc-sb-cap').value);
    const sunHours = parseFloat(document.getElementById('hc-sb-sun').value);

    if (isNaN(power) || isNaN(capacity) || isNaN(sunHours)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const systemLoss = 0.85; // 15% loss
    const dailyGeneration = power * sunHours * systemLoss;
    
    // Time to charge battery: Capacity / (Power * systemLoss)
    // This is theoretical max charging speed
    const chargeTimeHours = capacity / (power * systemLoss);

    document.getElementById('hc-res-sb-time').innerText = chargeTimeHours.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Saat';
    document.getElementById('hc-res-sb-gen').innerText = dailyGeneration.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh/gün';

    document.getElementById('hc-sb-result').classList.add('visible');
}
