function hcIsMalzemeSecildi() {
    var val = document.getElementById('hc-is-malzeme').value;
    if (val) {
        document.getElementById('hc-is-ozgul').value = val;
    }
}

function hcIsiSigasiHesapla() {
    var m = parseFloat(document.getElementById('hc-is-kutle').value);
    var c = parseFloat(document.getElementById('hc-is-ozgul').value);
    var deltaT = parseFloat(document.getElementById('hc-is-deltaT').value);
    
    if (isNaN(m) || m <= 0 || isNaN(c) || c <= 0 || isNaN(deltaT)) {
        alert('Lütfen geçerli kütle, özgül ısı ve sıcaklık değişimi değerleri giriniz.');
        return;
    }
    
    // Toplam Isı Sığası C = m * c
    var C = m * c;
    
    // Aktarılan Isı Enerjisi Q = m * c * dT
    var Q = C * deltaT;
    var Q_kJ = Q / 1000;
    
    var resultDiv = document.getElementById('hc-isi-sigasi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Aktarılan Isı Enerjisi (Q):</strong> <span class="hc-result-value">' + Q_kJ.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' kJ</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Isı Enerjisi (Joule)</td>' +
                    '<td>' + Q.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' J</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Toplam Isı Sığası (C)</td>' +
                    '<td>' + C.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' J/°C (veya J/K)</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kütle (m)</td>' +
                    '<td>' + m.toLocaleString('tr-TR') + ' kg</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
