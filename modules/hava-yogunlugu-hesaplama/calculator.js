function hcHavaYogunluguHesapla() {
    var T = parseFloat(document.getElementById('hc-hy2-sicaklik').value);
    var P = parseFloat(document.getElementById('hc-hy2-basinc').value); // hPa
    var RH = parseFloat(document.getElementById('hc-hy2-nem').value);
    
    if (isNaN(T) || isNaN(P) || P <= 0 || isNaN(RH) || RH < 0 || RH > 100) {
        alert('Lütfen tüm değerleri doğru aralıkta doldurunuz (Nem %0-100 olmalıdır).');
        return;
    }
    
    var Tkelvin = T + 273.15;
    var Ppascal = P * 100; // hPa -> Pa
    
    var Rd = 287.058; // Dry air gas constant
    var Rv = 461.495; // Water vapor gas constant
    
    // Saturation vapor pressure (es) using Magnus-Tetens
    var es = 6.1078 * Math.pow(10, (7.5 * T) / (T + 237.3)) * 100; // Pascal
    
    // Vapor pressure (pv)
    var pv = es * (RH / 100); // Pascal
    
    // Dry air partial pressure (pd)
    var pd = Ppascal - pv;
    
    if (pd < 0) {
        alert('Hata: Buhar basıncı toplam basıncı aşıyor. Lütfen girdileri kontrol edin.');
        return;
    }
    
    // rho = pd / (Rd * T) + pv / (Rv * T)
    var rho = (pd / (Rd * Tkelvin)) + (pv / (Rv * Tkelvin)); // kg/m³
    
    // Kuru hava yoğunluğu (karşılaştırma için)
    var rhoDry = Ppascal / (Rd * Tkelvin);
    
    var resultDiv = document.getElementById('hc-hava-yogunlugu-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Nemli Hava Yoğunluğu (ρ):</strong> <span class="hc-result-value">' + rho.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kg/m³</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Kuru Hava Yoğunluğu (RH = %0)</td>' +
                    '<td>' + rhoDry.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kg/m³</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kısmi Su Buharı Basıncı (pv)</td>' +
                    '<td>' + (pv / 100).toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' hPa</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kısmi Kuru Hava Basıncı (pd)</td>' +
                    '<td>' + (pd / 100).toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' hPa</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
