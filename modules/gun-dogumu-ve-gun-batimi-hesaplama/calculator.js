function hcGdgbSehirSecildi() {
    var val = document.getElementById('hc-gdgb-sehir').value;
    if (val) {
        var coords = val.split('|');
        document.getElementById('hc-gdgb-enlem').value = coords[0];
        document.getElementById('hc-gdgb-boylam').value = coords[1];
    }
}

function hcGunDogumuVeGunBatimiHesapla() {
    var lat = parseFloat(document.getElementById('hc-gdgb-enlem').value);
    var lng = parseFloat(document.getElementById('hc-gdgb-boylam').value);
    var dateVal = document.getElementById('hc-gdgb-tarih').value;
    var tz = parseFloat(document.getElementById('hc-gdgb-gmt').value);
    
    if (isNaN(lat) || isNaN(lng) || !dateVal || isNaN(tz)) {
        alert('Lütfen tüm alanları doğru şekilde doldurunuz.');
        return;
    }
    
    var date = new Date(dateVal);
    var start = new Date(date.getFullYear(), 0, 0);
    var diff = date - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var dayOfYear = Math.floor(diff / oneDay);
    
    var gamma = (2 * Math.PI / 365) * (dayOfYear - 1 + (12 - 12) / 24);
    var eqt = 229.18 * (0.000075 + 0.001868 * Math.cos(gamma) - 0.032077 * Math.sin(gamma) - 0.014615 * Math.cos(2 * gamma) - 0.040849 * Math.sin(2 * gamma));
    var decl = 0.006918 - 0.399912 * Math.cos(gamma) + 0.070257 * Math.sin(gamma) - 0.006758 * Math.cos(2 * gamma) + 0.000907 * Math.sin(2 * gamma) - 0.002697 * Math.cos(3 * gamma) + 0.00148 * Math.sin(3 * gamma);
    
    var latRad = lat * Math.PI / 180;
    var cosH = (Math.cos(90.833 * Math.PI / 180) - Math.sin(latRad) * Math.sin(decl)) / (Math.cos(latRad) * Math.cos(decl));
    
    var resultDiv = document.getElementById('hc-gun-dogumu-ve-gun-batimi-hesaplama-result');
    
    if (cosH < -1) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p style="color: var(--hc-front-green); font-weight: bold; font-size: 18px;">Güneş Batmıyor (Kutup Günü)!</p>' +
            '<p>Seçilen tarihte 24 saat gündüz yaşanır. Güneş hiç batmaz.</p>';
    } else if (cosH > 1) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p style="color: var(--hc-front-red); font-weight: bold; font-size: 18px;">Güneş Doğmuyor (Kutup Gecesi)!</p>' +
            '<p>Seçilen tarihte 24 saat gece yaşanır. Güneş hiç doğmaz.</p>';
    } else {
        var H = Math.acos(cosH) * 180 / Math.PI;
        
        var sunriseUtcMin = 720 - 4 * (H + lng) - eqt;
        var sunsetUtcMin = 720 + 4 * (H - lng) - eqt;
        
        var localSunrise = (sunriseUtcMin + tz * 60 + 1440) % 1440;
        var localSunset = (sunsetUtcMin + tz * 60 + 1440) % 1440;
        
        var riseHour = String(Math.floor(localSunrise / 60)).padStart(2, '0');
        var riseMin = String(Math.floor(localSunrise % 60)).padStart(2, '0');
        
        var setHour = String(Math.floor(localSunset / 60)).padStart(2, '0');
        var setMin = String(Math.floor(localSunset % 60)).padStart(2, '0');
        
        var dayLenMin = sunsetUtcMin - sunriseUtcMin;
        var dayLenHour = Math.floor(dayLenMin / 60);
        var dayLenMinPart = Math.floor(dayLenMin % 60);
        
        // Güneşin en tepede olduğu saat (Transit/Solar Noon)
        var solarNoonUtc = 720 - 4 * lng - eqt;
        var localSolarNoon = (solarNoonUtc + tz * 60 + 1440) % 1440;
        var noonHour = String(Math.floor(localSolarNoon / 60)).padStart(2, '0');
        var noonMin = String(Math.floor(localSolarNoon % 60)).padStart(2, '0');
        
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<div style="display: flex; gap: 15px; margin-bottom: 20px; flex-wrap: wrap;">' +
                '<div style="flex: 1; min-width: 120px; padding: 14px; border: 1px solid #dce5f0; border-radius: 12px; background: #fff;">' +
                    '<span style="display: block; font-size: 12px; color: var(--hc-front-muted); font-weight: bold; text-transform: uppercase;">Gün Doğumu</span>' +
                    '<span class="hc-result-value" style="font-size: 26px;">' + riseHour + ':' + riseMin + '</span>' +
                '</div>' +
                '<div style="flex: 1; min-width: 120px; padding: 14px; border: 1px solid #dce5f0; border-radius: 12px; background: #fff;">' +
                    '<span style="display: block; font-size: 12px; color: var(--hc-front-muted); font-weight: bold; text-transform: uppercase;">Gün Batımı</span>' +
                    '<span class="hc-result-value" style="font-size: 26px; color: var(--hc-front-gold);">' + setHour + ':' + setMin + '</span>' +
                '</div>' +
            '</div>' +
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
                        '<td>' + dayLenHour + ' saat ' + dayLenMinPart + ' dakika</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Öğle Vakti (Tepe Noktası)</td>' +
                        '<td>' + noonHour + ':' + noonMin + '</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Güneş Deklinasyonu</td>' +
                        '<td>' + (decl * 180 / Math.PI).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}
