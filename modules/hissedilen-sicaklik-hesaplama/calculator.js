function hcHissedilenSicaklikHesapla() {
    var T = parseFloat(document.getElementById('hc-hs-sicaklik').value);
    var RH = parseFloat(document.getElementById('hc-hs-nem').value);
    var ws = parseFloat(document.getElementById('hc-hs-ruzgar').value); // km/h
    
    if (isNaN(T) || isNaN(RH) || RH < 0 || RH > 100 || isNaN(ws) || ws < 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurunuz.');
        return;
    }
    
    var feels = T;
    var yontem = 'Standart Sıcaklık';
    var aciklama = 'Sıcaklık ve nem/rüzgar değerleri standart aralıklarda olduğu için hissedilen sıcaklık gerçek sıcaklığa eşittir.';
    
    if (T >= 26.7) {
        // Rothfusz Heat Index regression formula (Celsius adaptation)
        feels = -8.784695 + 1.61139411 * T + 2.338549 * RH - 0.14611605 * T * RH - 0.012308094 * Math.pow(T, 2) - 0.016424828 * Math.pow(RH, 2) + 0.002211732 * Math.pow(T, 2) * RH + 0.00072546 * T * Math.pow(RH, 2) - 0.000003582 * Math.pow(T, 2) * Math.pow(RH, 2);
        yontem = 'Isı İndeksi (Sıcak/Nemli Hava)';
        aciklama = 'Yüksek sıcaklık ve yüksek nem altında vücudun terleme yoluyla soğuması zorlaştığından hissedilen sıcaklık artar.';
    } else if (T <= 10 && ws > 4.8) {
        // Wind Chill formula (Celsius / km/h)
        feels = 13.12 + 0.6215 * T - 11.37 * Math.pow(ws, 0.16) + 0.3965 * T * Math.pow(ws, 0.16);
        yontem = 'Rüzgar Soğuğu (Soğuk/Rüzgarlı Hava)';
        aciklama = 'Soğuk havada rüzgar hızı vücudun etrafındaki sıcak hava tabakasını uzaklaştırarak üşümeyi hızlandırır.';
    }
    
    var resultDiv = document.getElementById('hc-hissedilen-sicaklik-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hissedilen Sıcaklık:</strong> <span class="hc-result-value">' + feels.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' °C</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer / Açıklama</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Gerçek Hava Sıcaklığı</td>' +
                    '<td>' + T.toLocaleString('tr-TR') + ' °C</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kullanılan Model</td>' +
                    '<td>' + yontem + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Fiziksel Yorum</td>' +
                    '<td style="font-size: 13px; line-height: 1.35;">' + aciklama + '</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
