function hcGa3SehirSecildi() {
    var val = document.getElementById('hc-ga3-sehir').value;
    if (val) {
        var coords = val.split('|');
        document.getElementById('hc-ga3-enlem').value = coords[0];
        document.getElementById('hc-ga3-boylam').value = coords[1];
    }
}

function hcGunesAcisiHesapla() {
    var lat = parseFloat(document.getElementById('hc-ga3-enlem').value);
    var lng = parseFloat(document.getElementById('hc-ga3-boylam').value);
    var dateVal = document.getElementById('hc-ga3-tarih').value;
    var timeVal = document.getElementById('hc-ga3-saat').value;
    var tz = parseFloat(document.getElementById('hc-ga3-gmt').value);
    
    if (isNaN(lat) || isNaN(lng) || !dateVal || !timeVal || isNaN(tz)) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }
    
    var timeParts = timeVal.split(':');
    var localHour = parseInt(timeParts[0]);
    var localMin = parseInt(timeParts[1]);
    
    var date = new Date(dateVal);
    var start = new Date(date.getFullYear(), 0, 0);
    var diff = date - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var dayOfYear = Math.floor(diff / oneDay);
    
    // Günü ondalıklı saat olarak hesapla
    var timeDecimal = localHour + localMin / 60;
    
    // NOAA Solar Calculations Algoritması
    var gamma = (2 * Math.PI / 365) * (dayOfYear - 1 + (timeDecimal - 12) / 24);
    var eqt = 229.18 * (0.000075 + 0.001868 * Math.cos(gamma) - 0.032077 * Math.sin(gamma) - 0.014615 * Math.cos(2 * gamma) - 0.040849 * Math.sin(2 * gamma));
    var decl = 0.006918 - 0.399912 * Math.cos(gamma) + 0.070257 * Math.sin(gamma) - 0.006758 * Math.cos(2 * gamma) + 0.000907 * Math.sin(2 * gamma) - 0.002697 * Math.cos(3 * gamma) + 0.00148 * Math.sin(3 * gamma);
    
    // Gerçek solar saati hesapla
    var timeOffset = eqt + 4 * lng - 60 * tz; // dakikalar
    var trueSolarTime = timeDecimal * 60 + timeOffset; // dakika
    
    // Saat Açısı (Hour Angle - derece)
    var hourAngle = (trueSolarTime / 4) - 180; // solar öğle vaktinde 0 derece
    
    var latRad = lat * Math.PI / 180;
    var haRad = hourAngle * Math.PI / 180;
    
    // Zenith Açısı (Zenith Angle)
    var cosZenith = Math.sin(latRad) * Math.sin(decl) + Math.cos(latRad) * Math.cos(decl) * Math.cos(haRad);
    if (cosZenith > 1) cosZenith = 1;
    if (cosZenith < -1) cosZenith = -1;
    
    var zenithRad = Math.acos(cosZenith);
    var zenithDeg = zenithRad * 180 / Math.PI;
    
    // Güneş Yükseliş Açısı (Elevation Angle)
    var elevationDeg = 90 - zenithDeg;
    
    // Azimut Açısı (Azimuth Angle)
    var cosAzimuth = (Math.sin(decl) - Math.sin(latRad) * cosZenith) / (Math.cos(latRad) * Math.sin(zenithRad));
    if (cosAzimuth > 1) cosAzimuth = 1;
    if (cosAzimuth < -1) cosAzimuth = -1;
    
    var azimuthRad = Math.acos(cosAzimuth);
    var azimuthDeg = azimuthRad * 180 / Math.PI;
    
    // Saat açısı sıfırdan büyükse batı tarafındadır
    if (hourAngle > 0) {
        azimuthDeg = 360 - azimuthDeg;
    } else {
        azimuthDeg = azimuthDeg;
    }
    
    var durum = 'Gündüz (Güneş ufkun üzerinde)';
    var durumColor = 'var(--hc-front-green)';
    if (elevationDeg < 0) {
        durum = 'Gece (Güneş ufkun altında)';
        durumColor = 'var(--hc-front-red)';
    }
    
    var resultDiv = document.getElementById('hc-gunes-acisi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Güneş Konum Analizi:</h4>' +
        '<div style="margin-bottom: 15px;">' +
            '<span style="font-weight: bold; color: ' + durumColor + '; font-size: 15px;">' + durum + '</span>' +
        '</div>' +
        '<p><strong>Güneş Yükseliş Açısı:</strong> <span class="hc-result-value">' + elevationDeg.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Açı Türü</th>' +
                    '<th>Açıklama</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Azimut Açısı</td>' +
                    '<td>Kuzeyden saat yönünde dönüş (Doğu: 90°, Güney: 180°, Batı: 270°)</td>' +
                    '<td>' + azimuthDeg.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Zenit Açısı</td>' +
                    '<td>Başucu noktası (tam dikey eksen) ile olan açı</td>' +
                    '<td>' + zenithDeg.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Güneş Deklinasyonu</td>' +
                    '<td>Ekvator düzlemi ile güneş ışınları arasındaki açı</td>' +
                    '<td>' + (decl * 180 / Math.PI).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Zaman Denklemi (EqT)</td>' +
                    '<td>Gerçek solar öğle ile saat dilimi arasındaki sapma</td>' +
                    '<td>' + eqt.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' dakika</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
