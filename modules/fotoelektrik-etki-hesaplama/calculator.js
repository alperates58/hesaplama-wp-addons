function hcFotoelektrikEtkiHesapla() {
    var lambdaNm = parseFloat(document.getElementById('hc-fee-dalga').value);
    var phiEv = parseFloat(document.getElementById('hc-fee-esik').value);
    
    if (isNaN(lambdaNm) || lambdaNm <= 0 || isNaN(phiEv) || phiEv <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }
    
    var h = 6.62607015e-34; // J.s
    var c = 299792458; // m/s
    var evToJ = 1.602176634e-19;
    
    // Foton Enerjisi E = h * c / lambda
    var fotonEnergyEv = (h * c) / (lambdaNm * 1e-9 * evToJ);
    var kinetikEnergyEv = fotonEnergyEv - phiEv;
    
    var resultDiv = document.getElementById('hc-fotoelektrik-etki-hesaplama-result');
    
    if (kinetikEnergyEv < 0) {
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p style="color: var(--hc-front-red); font-weight: bold;">Fotoelektron Fırlamaz!</p>' +
            '<p>Gelen fotonun enerjisi metalin eşik enerjisinden küçüktür.</p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Parametre</th>' +
                        '<th>Enerji (eV)</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Gelen Foton Enerjisi</td>' +
                        '<td>' + fotonEnergyEv.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' eV</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Metalin Eşik Enerjisi</td>' +
                        '<td>' + phiEv.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' eV</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    } else {
        var durdurmaPotansiyeli = kinetikEnergyEv; // Volt
        var kinetikEnergyJ = kinetikEnergyEv * evToJ;
        
        resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
            '<p><strong>Maksimum Kinetik Enerji (Ek max):</strong> <span class="hc-result-value">' + kinetikEnergyEv.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' eV</span></p>' +
            '<table>' +
                '<thead>' +
                    '<tr>' +
                        '<th>Parametre</th>' +
                        '<th>Değer</th>' +
                    '</tr>' +
                '</thead>' +
                '<tbody>' +
                    '<tr>' +
                        '<td>Kinetik Enerji (Joule)</td>' +
                        '<td>' + kinetikEnergyJ.toExponential(4) + ' J</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Durdurma Potansiyeli (Vs)</td>' +
                        '<td>' + durdurmaPotansiyeli.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' V</td>' +
                    '</tr>' +
                    '<tr>' +
                        '<td>Gelen Foton Enerjisi</td>' +
                        '<td>' + fotonEnergyEv.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' eV</td>' +
                    '</tr>' +
                '</tbody>' +
            '</table>';
    }
    
    resultDiv.classList.add('visible');
}
