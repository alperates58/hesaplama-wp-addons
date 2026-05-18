function hcEnerjidenDalgaBoyunaHesapla() {
    var enerji = parseFloat(document.getElementById('hc-edb-enerji').value);
    var birim = document.getElementById('hc-edb-birim').value;
    
    if (isNaN(enerji) || enerji <= 0) {
        alert('Lütfen pozitif bir foton enerjisi değeri giriniz.');
        return;
    }
    
    // Planck Sabiti (h) ve Işık Hızı (c)
    var h = 6.62607015e-34; // J.s
    var c = 299792458; // m/s
    var evToJ = 1.602176634e-19; // 1 eV kaç Joule?
    
    var eJoule = enerji;
    if (birim === 'ev') {
        eJoule = enerji * evToJ;
    }
    
    // lambda = h * c / E
    var lambda = (h * c) / eJoule; // metre cinsinden dalga boyu
    
    var lambdaUm = lambda * 1e6;  // mikrometre
    var lambdaNm = lambda * 1e9;  // nanometre
    var lambdaPm = lambda * 1e12; // pikometre
    
    var resultDiv = document.getElementById('hc-enerjiden-dalga-boyuna-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Dalga Boyu (Metre):</strong> <span class="hc-result-value">' + lambda.toExponential(6) + ' m</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Mikrometre (µm)</td>' +
                    '<td>' + lambdaUm.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' µm</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Nanometre (nm)</td>' +
                    '<td>' + lambdaNm.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' nm</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Pikometre (pm)</td>' +
                    '<td>' + lambdaPm.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' pm</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
