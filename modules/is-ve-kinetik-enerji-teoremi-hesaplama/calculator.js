function hcIsVeKinetikEnerjiTeoremiHesapla() {
    var m = parseFloat(document.getElementById('hc-iket-kutle').value);
    var vi = parseFloat(document.getElementById('hc-iket-vilk').value);
    var vf = parseFloat(document.getElementById('hc-iket-vson').value);
    
    if (isNaN(m) || m <= 0 || isNaN(vi) || isNaN(vf)) {
        alert('Lütfen geçerli kütle ve hız değerleri giriniz (Kütle pozitif olmalıdır).');
        return;
    }
    
    // İlk Kinetik Enerji (KEi) = 0.5 * m * vi^2
    var kei = 0.5 * m * Math.pow(vi, 2);
    
    // Son Kinetik Enerji (KEf) = 0.5 * m * vf^2
    var kef = 0.5 * m * Math.pow(vf, 2);
    
    // Yapılan Net İş (W) = KEf - KEi
    var W = kef - kei;
    
    var resultDiv = document.getElementById('hc-is-ve-kinetik-enerji-teoremi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Yapılan Net İş (W):</strong> <span class="hc-result-value">' + W.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' J</span> (Joule)</p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>İlk Kinetik Enerji (KE_ilk)</td>' +
                    '<td>' + kei.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' J</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Son Kinetik Enerji (KE_son)</td>' +
                    '<td>' + kef.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' J</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kinetik Enerji Değişimi (ΔKE)</td>' +
                    '<td>' + (kef - kei).toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' J</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
