function hcAkisEnerjiHesapla() {
    const flowLps = parseFloat(document.getElementById('hc-fe-flow').value);
    const speed = parseFloat(document.getElementById('hc-fe-speed').value);

    if (isNaN(flowLps) || isNaN(speed)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const rho = 1000; // Density
    const flowM3s = flowLps / 1000;
    
    // Kinetic Power (W) = 0.5 * rho * Q * v^2
    const powerW = 0.5 * rho * flowM3s * Math.pow(speed, 2);
    const dailyKwh = (powerW * 24) / 1000;

    document.getElementById('hc-res-fe-watt').innerText = powerW.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Watt';
    document.getElementById('hc-res-fe-kwh').innerText = dailyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh/gün';

    document.getElementById('hc-fe-result').classList.add('visible');
}
