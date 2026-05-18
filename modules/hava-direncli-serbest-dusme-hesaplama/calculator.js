function hcHavaDirencliSerbestDusmeHesapla() {
    var m = parseFloat(document.getElementById('hc-hdsd-kutle').value);
    var A = parseFloat(document.getElementById('hc-hdsd-alan').value);
    var Cd = parseFloat(document.getElementById('hc-hdsd-cd').value);
    var rho = parseFloat(document.getElementById('hc-hdsd-yogunluk').value);
    var t = parseFloat(document.getElementById('hc-hdsd-sure').value);
    
    if (isNaN(m) || m <= 0 || isNaN(A) || A <= 0 || isNaN(Cd) || Cd <= 0 || isNaN(rho) || rho <= 0 || isNaN(t) || t < 0) {
        alert('Lütfen tüm girdileri geçerli pozitif sayılar olarak doldurunuz.');
        return;
    }
    
    var g = 9.80665; // Yerçekimi
    
    // k = 0.5 * rho * Cd * A
    var k = 0.5 * rho * Cd * A;
    
    // Limit Hız (Terminal Velocity) vt = sqrt( (m * g) / k )
    var vt = Math.sqrt((m * g) / k);
    var vtKmh = vt * 3.6;
    
    // v(t) = vt * tanh( (g * t) / vt )
    var gt_vt = (g * t) / vt;
    
    // tanh hesabı
    var expPlus = Math.exp(gt_vt);
    var expMinus = Math.exp(-gt_vt);
    var tanh = (expPlus - expMinus) / (expPlus + expMinus);
    
    var vFinal = vt * tanh;
    var vFinalKmh = vFinal * 3.6;
    
    // y(t) = (vt^2 / g) * ln( cosh( (g * t) / vt ) )
    var cosh = (expPlus + expMinus) / 2;
    var yFinal = (Math.pow(vt, 2) / g) * Math.log(cosh);
    
    var resultDiv = document.getElementById('hc-hava-direncli-serbest-dusme-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Limit Hız (Terminal Hız):</strong> <span class="hc-result-value">' + vt.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' m/s</span> (' + vtKmh.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' km/h)</p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>' + t.toLocaleString('tr-TR') + '. Saniyedeki Hız</td>' +
                    '<td>' + vFinal.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' m/s (' + vFinalKmh.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' km/h)</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Toplam Düşüş Mesafesi</td>' +
                    '<td>' + yFinal.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' m</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Sürüklenme Katsayısı Sabiti (k)</td>' +
                    '<td>' + k.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' kg/m</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
