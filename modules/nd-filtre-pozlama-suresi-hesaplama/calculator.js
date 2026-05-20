function hcNdFiltrePozlamaSuresiHesapla() {
    var originalTime = parseFloat(document.getElementById('hc-nd-original-time').value);
    var stops = parseFloat(document.getElementById('hc-nd-stops').value);

    if (isNaN(originalTime) || isNaN(stops) || originalTime <= 0 || stops <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // ND filtre çarpanı = 2^stops
    var ndFactor = Math.pow(2, stops);

    // Yeni pozlama süresi = orijinal süresi × ND çarpanı
    var newTime = originalTime * ndFactor;

    // Dakika:saniye formatı
    var minutes = Math.floor(newTime / 60);
    var seconds = (newTime % 60);
    var formattedTime = minutes > 0 ? minutes + 'm ' + seconds.toFixed(1) + 's' : seconds.toFixed(1) + 's';

    var factorStr = 'ND ' + stops.toLocaleString('tr-TR') + ' (' + ndFactor.toLocaleString('tr-TR') + 'x)';
    var newTimeStr = newTime.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 });
    var reductionStr = stops.toLocaleString('tr-TR') + ' stops (~' + ((1 - (1 / ndFactor)) * 100).toFixed(0) + '% işık azaltma)';

    document.getElementById('hc-nd-factor-val').innerText = factorStr;
    document.getElementById('hc-nd-new-time-val').innerText = newTimeStr;
    document.getElementById('hc-nd-new-time-formatted-val').innerText = formattedTime;
    document.getElementById('hc-nd-reduction-val').innerText = reductionStr;

    document.getElementById('hc-nd-filtre-pozlama-suresi-hesaplama-result').classList.add('visible');
}
