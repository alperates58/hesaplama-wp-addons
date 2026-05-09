function hcWaterHeatingHesapla() {
    const vol = parseFloat(document.getElementById('hc-wh-vol').value) || 0;
    const ti = parseFloat(document.getElementById('hc-wh-ti').value) || 0;
    const tf = parseFloat(document.getElementById('hc-wh-tf').value) || 0;
    const eff = (parseFloat(document.getElementById('hc-wh-eff').value) || 100) / 100;

    const cp = 4.186; // kJ/kg.K
    const mass = vol; // 1L = 1kg approx
    const deltaT = tf - ti;

    if (deltaT <= 0) {
        alert('Hedef sıcaklık ilk sıcaklıktan büyük olmalıdır.');
        return;
    }

    // Q (kJ) = m * cp * dt
    const qKj = (mass * cp * deltaT) / eff;
    // 1 kWh = 3600 kJ
    const qKwh = qKj / 3600;

    document.getElementById('hc-res-wh-val').innerText = qKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-water-heating-result').classList.add('visible');
}
