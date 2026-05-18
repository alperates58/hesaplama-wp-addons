function hcKhMalzemeSecildi() {
    var val = document.getElementById('hc-kh-malzeme').value;
    if (val) {
        document.getElementById('hc-kh-yogunluk').value = val;
    }
}

function hcKutledenHacimHesapla() {
    var m = parseFloat(document.getElementById('hc-kh-kutle').value);
    var rho = parseFloat(document.getElementById('hc-kh-yogunluk').value);
    
    if (isNaN(m) || m <= 0 || isNaN(rho) || rho <= 0) {
        alert('Lütfen geçerli pozitif kütle ve yoğunluk değerleri giriniz.');
        return;
    }
    
    // V = m / rho (m³)
    var V = m / rho;
    var Vlitre = V * 1000;
    
    var resultDiv = document.getElementById('hc-kutleden-hacim-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hesaplanan Hacim (V):</strong> <span class="hc-result-value">' + Vlitre.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' L</span> (Litre)</p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Metreküp (m³)</td>' +
                    '<td>' + V.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m³</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Mililitre (mL)</td>' +
                    '<td>' + (Vlitre * 1000).toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' mL</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Yoğunluk (ρ)</td>' +
                    '<td>' + rho.toLocaleString('tr-TR') + ' kg/m³</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
