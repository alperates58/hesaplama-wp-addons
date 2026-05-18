function hcKapYalitkanDegisti() {
    var val = document.getElementById('hc-kap-yalitkan').value;
    var ozel = document.getElementById('hc-kap-ozel-kapsayici');
    if (val === 'custom') {
        ozel.style.display = 'block';
    } else {
        ozel.style.display = 'none';
        document.getElementById('hc-kap-er').value = val;
    }
}

function hcKapasitansHesapla() {
    var yalitkanVal = document.getElementById('hc-kap-yalitkan').value;
    var er = 1;
    if (yalitkanVal === 'custom') {
        er = parseFloat(document.getElementById('hc-kap-er').value);
    } else {
        er = parseFloat(yalitkanVal);
    }
    
    var A_cm2 = parseFloat(document.getElementById('hc-kap-alan').value);
    var d_mm = parseFloat(document.getElementById('hc-kap-mesafe').value);
    
    if (isNaN(er) || er <= 0 || isNaN(A_cm2) || A_cm2 <= 0 || isNaN(d_mm) || d_mm <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }
    
    // Metrik birimlere çevrim
    var A = A_cm2 / 10000; // cm² -> m²
    var d = d_mm / 1000; // mm -> m
    
    // e0 = 8.8541878128e-12 F/m (Boşluk geçirgenliği)
    var e0 = 8.8541878128e-12;
    
    // C = e0 * er * A / d
    var C = e0 * er * A / d; // Farad
    
    var C_uF = C * 1e6; // microFarad
    var C_nF = C * 1e9; // nanoFarad
    var C_pF = C * 1e12; // picoFarad
    
    var resultDiv = document.getElementById('hc-kapasitans-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hesaplanan Kapasitans:</strong> <span class="hc-result-value">' + C_pF.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' pF</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>nanoFarad (nF)</td>' +
                    '<td>' + C_nF.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' nF</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>mikroFarad (μF)</td>' +
                    '<td>' + C_uF.toLocaleString('tr-TR', {maximumFractionDigits: 7}) + ' μF</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Farad (F)</td>' +
                    '<td>' + C.toExponential(4) + ' F</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
