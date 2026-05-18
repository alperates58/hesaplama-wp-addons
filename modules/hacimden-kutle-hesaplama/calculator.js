function hcHkMalzemeSecildi() {
    var val = document.getElementById('hc-hk-malzeme').value;
    if (val) {
        document.getElementById('hc-hk-yogunluk').value = val;
    }
}

function hcHacimdenKutleHesapla() {
    var rho = parseFloat(document.getElementById('hc-hk-yogunluk').value);
    var vVal = parseFloat(document.getElementById('hc-hk-hacim').value);
    var vBirim = document.getElementById('hc-hk-birim').value;
    
    if (isNaN(rho) || rho <= 0 || isNaN(vVal) || vVal <= 0) {
        alert('Lütfen geçerli pozitif yoğunluk ve hacim değerleri giriniz.');
        return;
    }
    
    // Hacmi m³ cinsine dönüştür
    var vM3 = vVal;
    if (vBirim === 'litre') {
        vM3 = vVal / 1000;
    } else if (vBirim === 'cm3') {
        vM3 = vVal / 1e6;
    }
    
    // m = rho * V (kg)
    var m = rho * vM3;
    var mTon = m / 1000;
    var mGram = m * 1000;
    
    var resultDiv = document.getElementById('hc-hacimden-kutle-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hesaplanan Kütle (m):</strong> <span class="hc-result-value">' + m.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kg</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Ton (t)</td>' +
                    '<td>' + mTon.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' t</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Gram (g)</td>' +
                    '<td>' + mGram.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' g</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Hacim (Metreküp)</td>' +
                    '<td>' + vM3.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m³</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
