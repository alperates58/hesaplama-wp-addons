function hcSuIsiticiHesapla() {
    const volume = parseFloat(document.getElementById('hc-wh-volume').value);
    const tIn = parseFloat(document.getElementById('hc-wh-tin').value);
    const tOut = parseFloat(document.getElementById('hc-wh-tout').value);

    if (isNaN(volume) || isNaN(tIn) || isNaN(tOut)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const deltaT = tOut - tIn;
    if (deltaT <= 0) {
        alert('Hedef sıcaklık giriş sıcaklığından yüksek olmalıdır.');
        return;
    }

    // Energy (kWh) = (Volume * DeltaT) / 860 / efficiency
    const efficiency = 0.9;
    const kwh = (volume * deltaT) / 860 / efficiency;
    const price = 3.11;
    const cost = kwh * price;

    document.getElementById('hc-res-wh-kwh').innerText = kwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-wh-cost').innerText = cost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-wh-result').classList.add('visible');
}
