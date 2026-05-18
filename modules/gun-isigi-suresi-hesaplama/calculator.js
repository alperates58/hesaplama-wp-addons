function hcGunIsigiSuresiHesapla() {
    var lat = parseFloat(document.getElementById('hc-gis-enlem').value);
    var dateVal = document.getElementById('hc-gis-tarih').value;
    
    if (isNaN(lat) || !dateVal) {
        alert('Lütfen tüm alanları doldurunuz.');
        return;
    }
    
    var date = new Date(dateVal);
    var start = new Date(date.getFullYear(), 0, 0);
    var diff = date - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var dayOfYear = Math.floor(diff / oneDay);
    
    var gamma = (2 * Math.PI / 365) * (dayOfYear - 1 + (12 - 12) / 24);
    var decl = 0.006918 - 0.399912 * Math.cos(gamma) + 0.070257 * Math.sin(gamma) - 0.006758 * Math.cos(2 * gamma) + 0.000907 * Math.sin(2 * gamma) - 0.002697 * Math.cos(3 * gamma) + 0.00148 * Math.sin(3 * gamma);
    
    var latRad = lat * Math.PI / 180;
    var cosH = (Math.cos(90.833 * Math.PI / 180) - Math.sin(latRad) * Math.sin(decl)) / (Math.cos(latRad) * Math.cos(decl));
    
    var resultDiv = document.getElementById('hc-gun-isigi-suresi-hesaplama-result');
    
    if (cosH < -1) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Toplam Gün Işığı Süresi:</strong> <span class="hc-result-value">24 Saat</span></p>' +
            '<p>Bu koordinat ve tarihte Kutup Günü yaşanmaktadır (Güneş 24 saat boyunca ufkun üzerindedir).</p>';
    } else if (cosH > 1) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Toplam Gün Işığı Süresi:</strong> <span class="hc-result-value">0 Saat</span></p>' +
            '<p>Bu koordinat ve tarihte Kutup Gecesi yaşanmaktadır (Güneş 24 saat boyunca ufkun altındadır).</p>';
    } else {
        var H = Math.acos(cosH) * 180 / Math.PI; // Saat Açısı (derece)
        
        // Gün ışığı süresi (dakika) = 2 * H * 4
        var dayLenMin = 2 * H * 4;
        var dayLenHour = Math.floor(dayLenMin / 60);
        var dayLenMinPart = Math.floor(dayLenMin % 60);
        
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Toplam Gün Işığı Süresi:</strong> <span class="hc-result-value">' + dayLenHour + ' saat ' + dayLenMinPart + ' dakika</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Parametre</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Gündüz Süresi (Ondalık)</td>' +
                        '<td>' + (dayLenMin / 60).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' saat</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Gece Süresi</td>' +
                        '<td>' + (24 - dayLenHour) + ' saat ' + (60 - dayLenMinPart === 60 ? 0 : 60 - dayLenMinPart) + ' dakika</td>' +
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
