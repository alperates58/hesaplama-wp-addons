function hcDroneBataryaMenzilHesapla() {
    var voltage = parseFloat(document.getElementById('hc-range-battery-voltage').value);
    var capacity = parseFloat(document.getElementById('hc-range-battery-capacity').value);
    var avgSpeed = parseFloat(document.getElementById('hc-range-avg-speed').value);
    var powerConsumption = parseFloat(document.getElementById('hc-range-power-consumption').value);
    var safetyPercent = parseFloat(document.getElementById('hc-range-safety-percent').value);

    if (isNaN(voltage) || isNaN(capacity) || isNaN(avgSpeed) || isNaN(powerConsumption) ||
        voltage <= 0 || capacity <= 0 || avgSpeed <= 0 || powerConsumption <= 0 || safetyPercent <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Batarya enerjisi (Wh) = Volt × (mAh / 1000)
    var energyWh = voltage * (capacity / 1000);
    var usableEnergyWh = energyWh * (safetyPercent / 100);

    // Uçuş süresi (saat) = usable energy / power consumption
    var flightTimeHours = usableEnergyWh / powerConsumption;
    var flightTimeMinutes = flightTimeHours * 60;

    // Maksimum menzil (km) = hız (km/h) × uçuş süresi (saat)
    var maxRange = avgSpeed * flightTimeHours;

    // Güvenli dönüş menzili (gidiş: maxRange / 2, dönüş: maxRange / 2)
    var safeReturnRange = maxRange / 2;

    var energyStr = energyWh.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' Wh';
    var flightTimeStr = Math.floor(flightTimeMinutes) + ' dakika ' + Math.round(flightTimeMinutes % 60) + ' saniye';
    var maxRangeStr = maxRange.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' km';
    var safeReturnStr = safeReturnRange.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' km';
    var recommendationStr = safePercent < 80 ? '✓ Çok Güvenli' : (safePercent < 100 ? '✓ Güvenli' : '⚠ Riskli (yedek batarya önerilir)');

    document.getElementById('hc-range-energy-val').innerText = energyStr;
    document.getElementById('hc-range-flight-time-val').innerText = flightTimeStr;
    document.getElementById('hc-range-max-range-val').innerText = maxRangeStr;
    document.getElementById('hc-range-safe-return-val').innerText = safeReturnStr;
    document.getElementById('hc-range-recommendation-val').innerText = recommendationStr;

    document.getElementById('hc-drone-batarya-menzil-hesaplama-result').classList.add('visible');
}
