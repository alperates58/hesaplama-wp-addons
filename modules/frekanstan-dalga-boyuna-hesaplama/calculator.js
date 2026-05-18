function hcFrekanstanDalgaBoyunaHesapla() {
    var fVal = parseFloat(document.getElementById('hc-fdb2-frekans').value);
    var fBirim = document.getElementById('hc-fdb2-birim').value;
    var v = parseFloat(document.getElementById('hc-fdb2-hiz').value);
    
    if (isNaN(fVal) || fVal <= 0 || isNaN(v) || v <= 0) {
        alert('Lütfen geçerli pozitif frekans ve yayılma hızı değerleri giriniz.');
        return;
    }
    
    var hz = fVal;
    if (fBirim === 'khz') hz = fVal * 1e3;
    else if (fBirim === 'mhz') hz = fVal * 1e6;
    else if (fBirim === 'ghz') hz = fVal * 1e9;
    
    var lambda = v / hz; // metre
    var lambdaCm = lambda * 100;
    var lambdaMm = lambda * 1000;
    var lambdaNm = lambda * 1e9;
    
    var resultDiv = document.getElementById('hc-frekanstan-dalga-boyuna-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Dalga Boyu (Metre):</strong> <span class="hc-result-value">' + lambda.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' m</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Santimetre (cm)</td>' +
                    '<td>' + lambdaCm.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' cm</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Milimetre (mm)</td>' +
                    '<td>' + lambdaMm.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' mm</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Nanometre (nm)</td>' +
                    '<td>' + lambdaNm.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' nm</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
