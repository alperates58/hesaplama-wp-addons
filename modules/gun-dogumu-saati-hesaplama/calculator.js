function hcGdsSehirSecildi() {
    var val = document.getElementById('hc-gds-sehir').value;
    if (val) {
        var coords = val.split('|');
        document.getElementById('hc-gds-enlem').value = coords[0];
        document.getElementById('hc-gds-boylam').value = coords[1];
    }
}

function hcGunDogumuSaatiHesapla() {
    var lat = parseFloat(document.getElementById('hc-gds-enlem').value);
    var lng = parseFloat(document.getElementById('hc-gds-boylam').value);
    var dateVal = document.getElementById('hc-gds-tarih').value;
    var tz = parseFloat(document.getElementById('hc-gds-gmt').value);
    
    if (isNaN(lat) || isNaN(lng) || !dateVal || isNaN(tz)) {
        alert('Lütfen tüm alanları doğru şekilde doldurunuz.');
        return;
    }
    
    var date = new Date(dateVal);
    var start = new Date(date.getFullYear(), 0, 0);
    var diff = date - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var dayOfYear = Math.floor(diff / oneDay);
    
    // NOAA Solar Calculations Algoritması
    var gamma = (2 * Math.PI / 365) * (dayOfYear - 1 + (6 - 12) / 24); // Varsayılan 06:00 saatlik düzeltme
    
    // Equation of Time (dakika)
    var eqt = 229.18 * (0.000075 + 0.001868 * Math.cos(gamma) - 0.032077 * Math.sin(gamma) - 0.014615 * Math.cos(2 * gamma) - 0.040849 * Math.sin(2 * gamma));
    
    // Güneş Deklinasyon Açısı (radyan)
    var decl = 0.006918 - 0.399912 * Math.cos(gamma) + 0.070257 * Math.sin(gamma) - 0.006758 * Math.cos(2 * gamma) + 0.000907 * Math.sin(2 * gamma) - 0.002697 * Math.cos(3 * gamma) + 0.00148 * Math.sin(3 * gamma);
    
    var latRad = lat * Math.PI / 180;
    
    var cosH = (Math.cos(90.833 * Math.PI / 180) - Math.sin(latRad) * Math.sin(decl)) / (Math.cos(latRad) * Math.cos(decl));
    
    var resultDiv = document.getElementById('hc-gun-dogumu-saati-hesaplama-result');
    
    if (cosH < -1) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p style="color: var(--hc-front-green); font-weight: bold; font-size: 18px;">Güneş Batmıyor!</p>' +
            '<p>Seçilen tarihte bu koordinatta 24 saat gündüz (Kutup Günü) yaşanmaktadır.</p>';
    } else if (cosH > 1) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p style="color: var(--hc-front-red); font-weight: bold; font-size: 18px;">Güneş Doğmuyor!</p>' +
            '<p>Seçilen tarihte bu koordinatta 24 saat gece (Kutup Gecesi) yaşanmaktadır.</p>';
    } else {
        var H = Math.acos(cosH) * 180 / Math.PI; // Saat Açısı
        
        // UTC cinsinden gün doğumu dakikası
        var sunriseUtcMin = 720 - 4 * (H + lng) - eqt;
        var localSunriseMin = sunriseUtcMin + tz * 60;
        
        localSunriseMin = (localSunriseMin + 1440) % 1440;
        
        var hour = Math.floor(localSunriseMin / 60);
        var min = Math.floor(localSunriseMin % 60);
        
        var hourStr = String(hour).padStart(2, '0');
        var minStr = String(min).padStart(2, '0');
        
        var sunsetUtcMin = 720 + 4 * (H - lng) - eqt;
        var dayLenMin = sunsetUtcMin - sunriseUtcMin;
        var dayLenHour = Math.floor(dayLenMin / 60);
        
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Gün Doğumu Saati:</strong> <span class="hc-result-value">' + hourStr + ':' + minStr + '</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Parametre</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Gündüz Süresi</td>' +
                        '<td>' + dayLenHour + ' saat ' + Math.floor(dayLenMin % 60) + ' dakika</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Güneş Deklinasyonu</td>' +
                        '<td>' + (decl * 180 / Math.PI).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Zaman Denklemi (EqT)</td>' +
                        '<td>' + eqt.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' dakika</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}
