function hcDroneUcusSuresiHesapla() {
    var batteryMah = parseFloat(document.getElementById('hc-drone-battery-mah').value);
    var avgCurrent = parseFloat(document.getElementById('hc-drone-avg-current').value);
    var dischargePercent = parseFloat(document.getElementById('hc-drone-discharge-percent').value);

    if (isNaN(batteryMah) || isNaN(avgCurrent) || isNaN(dischargePercent) || batteryMah <= 0 || avgCurrent <= 0 || dischargePercent <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Teorik uçuş süresi (dakika) = (batarya mAh × deşarj %) / (akım A × 1000)
    var theoreticalMinutes = (batteryMah * dischargePercent / 100) / (avgCurrent * 1000) * 60;

    // Pratik uçuş süresi (~75% of theoretical)
    var practicalMinutes = theoreticalMinutes * 0.75;

    // Çok güvenli dönüş süresi (~50% for safe return)
    var safeMinutes = theoreticalMinutes * 0.5;

    var formatTime = function(minutes) {
        var mins = Math.floor(minutes);
        var secs = Math.round((minutes - mins) * 60);
        return mins + ' dakika ' + secs + ' saniye';
    };

    var theoreticalStr = formatTime(theoreticalMinutes);
    var practicalStr = formatTime(practicalMinutes);
    var safeStr = formatTime(safeMinutes);
    var noteStr = 'Rüzgar, ağırlık ve irtifa faktörleri göz önünde bulundurulmalıdır.';

    document.getElementById('hc-drone-theoretical-val').innerText = theoreticalStr;
    document.getElementById('hc-drone-practical-val').innerText = practicalStr;
    document.getElementById('hc-drone-safe-val').innerText = safeStr;
    document.getElementById('hc-drone-note-val').innerText = noteStr;

    document.getElementById('hc-drone-ucus-suresi-hesaplama-result').classList.add('visible');
}
