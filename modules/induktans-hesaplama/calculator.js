function hcIndCekirdekDegisti() {
    var val = document.getElementById('hc-ind-cekirdek').value;
    var ozel = document.getElementById('hc-ind-ozel-kapsayici');
    if (val === 'custom') {
        ozel.style.display = 'block';
    } else {
        ozel.style.display = 'none';
        document.getElementById('hc-ind-mur').value = val;
    }
}

function hcInduktansHesapla() {
    var cekirdekVal = document.getElementById('hc-ind-cekirdek').value;
    var mur = 1;
    if (cekirdekVal === 'custom') {
        mur = parseFloat(document.getElementById('hc-ind-mur').value);
    } else {
        mur = parseFloat(cekirdekVal);
    }
    
    var N = parseInt(document.getElementById('hc-ind-sarim').value);
    var Lmm = parseFloat(document.getElementById('hc-ind-uzunluk').value);
    var dmm = parseFloat(document.getElementById('hc-ind-cap').value);
    
    if (isNaN(mur) || mur <= 0 || isNaN(N) || N <= 0 || isNaN(Lmm) || Lmm <= 0 || isNaN(dmm) || dmm <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }
    
    // Metre cinsine dönüşümler
    var l = Lmm / 1000; // mm -> m
    var r = (dmm / 2) / 1000; // yarıçap mm -> m
    
    // Kesit alanı A = pi * r^2
    var A = Math.PI * Math.pow(r, 2);
    
    // Boşluk geçirgenliği mu0 = 4 * pi * 1e-7
    var mu0 = 4 * Math.PI * 1e-7;
    
    // L = mu0 * mur * N^2 * A / l
    var L = mu0 * mur * Math.pow(N, 2) * A / l; // Henry
    
    var L_mH = L * 1000; // milliHenry
    var L_uH = L * 1e6; // microHenry
    
    var resultDiv = document.getElementById('hc-induktans-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hesaplanan İndüktans:</strong> <span class="hc-result-value">' + L_uH.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' μH</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>milliHenry (mH)</td>' +
                    '<td>' + L_mH.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' mH</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Henry (H)</td>' +
                    '<td>' + L.toExponential(4) + ' H</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Bobin Kesit Alanı (A)</td>' +
                    '<td>' + (A * 1e6).toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' mm²</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
