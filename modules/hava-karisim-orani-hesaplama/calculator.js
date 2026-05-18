function hcHavaKarisimOraniHesapla() {
    var T = parseFloat(document.getElementById('hc-hko-sicaklik').value);
    var RH = parseFloat(document.getElementById('hc-hko-nem').value);
    var P = parseFloat(document.getElementById('hc-hko-basinc').value);
    
    if (isNaN(T) || isNaN(RH) || RH < 0 || RH > 100 || isNaN(P) || P <= 0) {
        alert('Lütfen geçerli değerler giriniz (Bağıl nem %0-100 arasında olmalı).');
        return;
    }
    
    // Magnus-Tetens Equation for Saturated Vapor Pressure (es)
    var es = 6.112 * Math.exp((17.67 * T) / (T + 243.5)); // hPa
    
    // Actual Vapor Pressure (e)
    var e = es * (RH / 100); // hPa
    
    if (e >= P) {
        alert('Hata: Buhar basıncı toplam atmosferik basınçtan büyük veya eşit olamaz!');
        return;
    }
    
    // Karışım Oranı (w) = 621.97 * e / (P - e)  (gram su buharı / kilogram kuru hava)
    var w = 621.97 * (e / (P - e));
    
    // Doymuş Karışım Oranı (ws)
    var ws = 621.97 * (es / (P - es));
    
    // Özgül nem (Specific humidity) q = w / (1 + w/1000)
    var q = w / (1 + w / 1000);
    
    var resultDiv = document.getElementById('hc-hava-karisim-orani-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Su Buharı Karışım Oranı (w):</strong> <span class="hc-result-value">' + w.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' g/kg</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Doymuş Karışım Oranı (ws)</td>' +
                    '<td>' + ws.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' g/kg</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Özgül Nem (q)</td>' +
                    '<td>' + q.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' g/kg</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Aktüel Buhar Basıncı (e)</td>' +
                    '<td>' + e.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' hPa</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Doymuş Buhar Basıncı (es)</td>' +
                    '<td>' + es.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' hPa</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
