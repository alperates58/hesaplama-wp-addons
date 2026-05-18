function hcKdiMalzemeSecildi() {
    var val = document.getElementById('hc-kdi-malzeme').value;
    if (val) {
        document.getElementById('hc-kdi-iletkenlik').value = val;
    }
}

function hcKararliDurumIsiIletimiHesapla() {
    var k = parseFloat(document.getElementById('hc-kdi-iletkenlik').value);
    var A = parseFloat(document.getElementById('hc-kdi-alan').value);
    var dCm = parseFloat(document.getElementById('hc-kdi-kalinlik').value);
    var thot = parseFloat(document.getElementById('hc-kdi-thot').value);
    var tcold = parseFloat(document.getElementById('hc-kdi-tcold').value);
    
    if (isNaN(k) || k <= 0 || isNaN(A) || A <= 0 || isNaN(dCm) || dCm <= 0 || isNaN(thot) || isNaN(tcold)) {
        alert('Lütfen tüm girdileri geçerli sayılar olarak doldurunuz (k, A ve kalınlık pozitif olmalıdır).');
        return;
    }
    
    var d = dCm / 100; // cm -> m
    var deltaT = thot - tcold;
    
    // Q = k * A * dT / d (Watt)
    var Q = (k * A * deltaT) / d;
    var Q_kW = Q / 1000;
    
    // Isıl direnç R = d / (k * A)
    var R = d / (k * A);
    
    var resultDiv = document.getElementById('hc-kararli-durum-isi-iletimi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Isı Transfer Hızı (Q):</strong> <span class="hc-result-value">' + Q.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' W</span> (Joule/saniye)</p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Isı Transfer Hızı (Kilowatt)</td>' +
                    '<td>' + Q_kW.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kW</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Sıcaklık Farkı (ΔT)</td>' +
                    '<td>' + deltaT.toLocaleString('tr-TR') + ' °C</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Malzemenin Isıl Direnci (R_thermal)</td>' +
                    '<td>' + R.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' K/W (veya °C/W)</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
