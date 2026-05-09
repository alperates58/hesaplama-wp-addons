function hcJeoEnerjiHesapla() {
    const flow = parseFloat(document.getElementById('hc-ge-flow').value); // L/s
    const tIn = parseFloat(document.getElementById('hc-ge-tin').value);
    const tOut = parseFloat(document.getElementById('hc-ge-tout').value);

    if (isNaN(flow) || isNaN(tIn) || isNaN(tOut)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const deltaT = tIn - tOut;
    const cp = 4.187; // kJ/kgC
    
    // Power (kW) = flow (kg/s) * cp * deltaT
    const powerKw = flow * cp * deltaT;
    const powerKcal = powerKw * 860; // 1 kW = 860 kcal/h

    document.getElementById('hc-res-ge-kw').innerText = powerKw.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kW';
    document.getElementById('hc-res-ge-kcal').innerText = powerKcal.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal/saat';

    document.getElementById('hc-ge-result').classList.add('visible');
}
