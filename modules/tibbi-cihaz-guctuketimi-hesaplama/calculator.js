function hcMedicalPowerHesapla() {
    const watts = parseFloat(document.getElementById('hc-mp-watt').value) || 0;
    const hours = parseFloat(document.getElementById('hc-mp-hours').value) || 0;

    const dailyKwh = (watts * hours) / 1000;
    const monthlyKwh = dailyKwh * 30;

    document.getElementById('hc-res-mp-val').innerText = dailyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-mp-monthly').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    
    document.getElementById('hc-medical-power-result').classList.add('visible');
}
