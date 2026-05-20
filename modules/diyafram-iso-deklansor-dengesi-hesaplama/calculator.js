function hcDiyaframIsoDeklansorDengesiHesapla() {
    var aperture = parseFloat(document.getElementById('hc-exp-aperture').value);
    var iso = parseFloat(document.getElementById('hc-exp-iso').value);
    var shutterTime = parseFloat(document.getElementById('hc-exp-shutter').value);

    if (isNaN(aperture) || isNaN(iso) || isNaN(shutterTime) || aperture <= 0 || iso <= 0 || shutterTime <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // EV hesaplaması: EV = log2(aperture^2 / shutterTime) + log2(ISO / 100)
    var ev = Math.log2(Math.pow(aperture, 2) / shutterTime) + Math.log2(iso / 100);

    // Alternatif kombinasyonlar (±2 stops)
    var combinations = [];
    var apertures = [1.4, 1.8, 2.0, 2.8, 4.0, 5.6, 8.0, 11.0, 16.0, 22.0];
    var isos = [50, 100, 200, 400, 800, 1600, 3200, 6400];
    var shutters = [1/4000, 1/2000, 1/1000, 1/500, 1/250, 1/125, 1/60, 1/30, 1/15, 1/8, 0.25, 0.5, 1, 2, 4, 8, 15, 30];

    for (var i = 0; i < apertures.length; i++) {
        for (var j = 0; j < isos.length; j++) {
            var newShutter = shutterTime * Math.pow(2, (Math.pow(apertures[i], 2) - Math.pow(aperture, 2)) / (Math.pow(aperture, 2)) * 10 + (iso - isos[j]) / iso * 10);
            var closest = shutters.reduce((prev, curr) => Math.abs(curr - newShutter) < Math.abs(prev - newShutter) ? curr : prev);
            if (closest !== shutterTime && combinations.length < 3) {
                combinations.push('f/' + apertures[i].toFixed(1) + ' + ISO ' + isos[j] + ' + 1/' + Math.round(1 / closest) + 's');
            }
        }
    }

    var evStr = ev.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    var comboStr = combinations.length > 0 ? combinations.join('<br>') : 'Alternatif kombinasyonlar oluşturulamadı';

    document.getElementById('hc-exp-ev-val').innerText = evStr;
    document.getElementById('hc-exp-combinations-val').innerHTML = comboStr;

    document.getElementById('hc-diyafram-iso-deklansor-dengesi-hesaplama-result').classList.add('visible');
}
