function hcHelmholtzRezonatoruHesapla() {
    var v = parseFloat(document.getElementById('hc-hr-hiz').value);
    var vLitres = parseFloat(document.getElementById('hc-hr-hacim').value);
    var Lcm = parseFloat(document.getElementById('hc-hr-boyun-boy').value);
    var dcm = parseFloat(document.getElementById('hc-hr-boyun-cap').value);
    var duzeltme = document.getElementById('hc-hr-duzeltme').value;
    
    if (isNaN(v) || v <= 0 || isNaN(vLitres) || vLitres <= 0 || isNaN(Lcm) || Lcm < 0 || isNaN(dcm) || dcm <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz (Boyun uzunluğu 0 olabilir).');
        return;
    }
    
    // Metrik birimlere çevrim
    var V = vLitres / 1000; // Litre -> m³
    var L = Lcm / 100; // cm -> m
    var r = (dcm / 2) / 100; // Yarıçap cm -> m
    
    // Boyun Kesit Alanı (A = pi * r^2)
    var A = Math.PI * Math.pow(r, 2);
    
    // Uç düzeltmesi (End Correction factor)
    var deltaL = 0.613 * r;
    if (duzeltme === 'iki-flans') {
        deltaL = 0.85 * r;
    } else if (duzeltme === 'flanssiz') {
        deltaL = 0.6 * r;
    }
    
    var Leq = L + deltaL;
    
    // Helmholtz Rezonansı Frekansı f = (v / 2pi) * sqrt( A / (V * Leq) )
    var f = (v / (2 * Math.PI)) * Math.sqrt(A / (V * Leq));
    
    var resultDiv = document.getElementById('hc-helmholtz-rezonatoru-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Rezonans Frekansı (f):</strong> <span class="hc-result-value">' + f.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' Hz</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Eşdeğer Boyun Uzunluğu (Leq)</td>' +
                    '<td>' + (Leq * 100).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' cm</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Boyun Kesit Alanı (A)</td>' +
                    '<td>' + (A * 10000).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' cm²</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kabin Hacmi (V)</td>' +
                    '<td>' + vLitres.toLocaleString('tr-TR') + ' Litre (' + V.toLocaleString('tr-TR') + ' m³)</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
