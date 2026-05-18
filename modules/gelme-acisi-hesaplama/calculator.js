function hcGelmeAcisiModDegisti() {
    var mod = document.getElementById('hc-ga-mod').value;
    var girdiler = document.getElementById('hc-ga-girdiler');
    
    if (mod === 'yansima') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-ga-yansima">Yansıma Açısı (derece)</label>' +
            '<input type="number" step="any" id="hc-ga-yansima" placeholder="Örn: 30" required>' +
            '</div>';
    } else {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-ga-n1">1. Ortam Kırılma İndisi (n1 - gelen ortam)</label>' +
            '<input type="number" step="any" id="hc-ga-n1" value="1.0" placeholder="Boşluk/Hava: 1.0" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ga-n2">2. Ortam Kırılma İndisi (n2 - kırılan ortam)</label>' +
            '<input type="number" step="any" id="hc-ga-n2" value="1.33" placeholder="Su: 1.33, Cam: 1.5" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-ga-kirilma">Kırılma Açısı (θr - derece)</label>' +
            '<input type="number" step="any" id="hc-ga-kirilma" placeholder="Örn: 20" required>' +
            '</div>';
    }
}

function hcGelmeAcisiHesapla() {
    var mod = document.getElementById('hc-ga-mod').value;
    var resultDiv = document.getElementById('hc-gelme-acisi-hesaplama-result');
    
    if (mod === 'yansima') {
        var yansimaAcisi = parseFloat(document.getElementById('hc-ga-yansima').value);
        if (isNaN(yansimaAcisi) || yansimaAcisi < 0 || yansimaAcisi > 90) {
            alert('Lütfen 0 ile 90 derece arasında geçerli bir yansıma açısı giriniz.');
            return;
        }
        var gelmeAcisi = yansimaAcisi;
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Gelme Açısı (θi):</strong> <span class="hc-result-value">' + gelmeAcisi.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + '°</span></p>' +
            '<p>Yansıma kanununa göre gelme açısı yansıma açısına her zaman eşittir (θi = θr).</p>';
    } else {
        var n1 = parseFloat(document.getElementById('hc-ga-n1').value);
        var n2 = parseFloat(document.getElementById('hc-ga-n2').value);
        var thetaR = parseFloat(document.getElementById('hc-ga-kirilma').value);
        
        if (isNaN(n1) || n1 <= 0 || isNaN(n2) || n2 <= 0 || isNaN(thetaR) || thetaR < 0 || thetaR > 90) {
            alert('Lütfen tüm değerleri doğru ve pozitif aralıkta giriniz (açı 0-90° olmalı).');
            return;
        }
        
        // n1 * sin(thetaI) = n2 * sin(thetaR) => sin(thetaI) = (n2 / n1) * sin(thetaR)
        var sinThetaR = Math.sin(thetaR * Math.PI / 180);
        var sinThetaI = (n2 / n1) * sinThetaR;
        
        if (sinThetaI > 1 || sinThetaI < -1) {
            resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
                '<p style="color: var(--hc-front-red); font-weight: bold;">Fiziksel Olarak İmkansız Durum!</p>' +
                '<p>Girdiğiniz kırılma açısı ve indis oranlarına göre sin(θi) > 1 olmaktadır. Bu durum bir gelme açısına karşılık gelmez. Tam yansıma sınırını aşmış olabilirsiniz.</p>';
        } else {
            var thetaI = Math.asin(sinThetaI) * 180 / Math.PI;
            var sinSinir = n2 / n1;
            var sinirAcisiText = 'Yok (n1 < n2)';
            if (n1 > n2) {
                var sinirAcisi = Math.asin(sinSinir) * 180 / Math.PI;
                sinirAcisiText = sinirAcisi.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + '°';
            }
            
            resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
                '<p><strong>Gelme Açısı (θi):</strong> <span class="hc-result-value">' + thetaI.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + '°</span></p>' +
                '<table>' +
                    '<thead>' +
                        '<tr>' +
                            '<th>Parametre</th>' +
                            '<th>Değer</th>' +
                        '</tr>' +
                    '</thead>' +
                    '<tbody>' +
                        '<tr>' +
                            '<td>1. Ortam İndisi (n1)</td>' +
                            '<td>' + n1.toLocaleString('tr-TR') + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td>2. Ortam İndisi (n2)</td>' +
                            '<td>' + n2.toLocaleString('tr-TR') + '</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td>Kırılma Açısı (θr)</td>' +
                            '<td>' + thetaR.toLocaleString('tr-TR') + '°</td>' +
                        '</tr>' +
                        '<tr>' +
                            '<td>Sınır Açısı (θc)</td>' +
                            '<td>' + sinirAcisiText + '</td>' +
                        '</tr>' +
                    '</tbody>' +
                '</table>';
        }
    }
    
    resultDiv.classList.add('visible');
}
