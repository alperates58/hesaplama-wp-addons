function hcHacimdenYogunlukHesapla() {
    var kVal = parseFloat(document.getElementById('hc-hy-kutle').value);
    var kBirim = document.getElementById('hc-hy-kbirim').value;
    var hVal = parseFloat(document.getElementById('hc-hy-hacim').value);
    var hBirim = document.getElementById('hc-hy-hbirim').value;
    
    if (isNaN(kVal) || kVal <= 0 || isNaN(hVal) || hVal <= 0) {
        alert('Lütfen geçerli pozitif kütle ve hacim değerleri giriniz.');
        return;
    }
    
    // Kütleyi kg cinsine dönüştür
    var kKg = kVal;
    if (kBirim === 'ton') {
        kKg = kVal * 1000;
    } else if (kBirim === 'gram') {
        kKg = kVal / 1000;
    }
    
    // Hacmi m³ cinsine dönüştür
    var hM3 = hVal;
    if (hBirim === 'litre') {
        hM3 = hVal / 1000;
    } else if (hBirim === 'cm3') {
        hM3 = hVal / 1e6;
    }
    
    // rho = m / V (kg/m³)
    var rho = kKg / hM3;
    var rhoGcm3 = rho / 1000; // g/cm³
    
    var resultDiv = document.getElementById('hc-hacimden-yogunluk-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hesaplanan Yoğunluk (ρ):</strong> <span class="hc-result-value">' + rho.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg/m³</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Gram / Santimetreküp (g/cm³)</td>' +
                    '<td>' + rhoGcm3.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' g/cm³</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kütle (Kilogram)</td>' +
                    '<td>' + kKg.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kg</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Hacim (Metreküp)</td>' +
                    '<td>' + hM3.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m³</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
