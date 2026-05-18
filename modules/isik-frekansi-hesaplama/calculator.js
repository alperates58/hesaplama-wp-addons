function hcIsikFrekansiHesapla() {
    var lambdaNm = parseFloat(document.getElementById('hc-if-dalga').value);
    
    if (isNaN(lambdaNm) || lambdaNm <= 0) {
        alert('Lütfen geçerli pozitif bir dalga boyu değeri giriniz.');
        return;
    }
    
    var c = 299792458; // m/s (Işık hızı)
    var lambda = lambdaNm * 1e-9; // metre
    
    // f = c / lambda
    var fHz = c / lambda;
    var fThz = fHz / 1e12; // Terahertz
    
    // Foton enerjisi E = h * f
    var h = 6.62607015e-34;
    var eJoule = h * fHz;
    var eEv = eJoule / 1.602176634e-19;
    
    // Renk ve spektrum tayini
    var renk = 'Görünmez Spektrum (Kızılötesi veya Ultraviyole vb.)';
    var renkHex = '#64748b';
    var renkText = '#ffffff';
    
    if (lambdaNm >= 380 && lambdaNm < 450) {
        renk = 'Mor (Violet)';
        renkHex = '#7f00ff';
    } else if (lambdaNm >= 450 && lambdaNm < 485) {
        renk = 'Mavi (Blue)';
        renkHex = '#0000ff';
    } else if (lambdaNm >= 485 && lambdaNm < 500) {
        renk = 'Turkuaz / Macenta (Cyan)';
        renkHex = '#00ffff';
        renkText = '#0f172a';
    } else if (lambdaNm >= 500 && lambdaNm < 565) {
        renk = 'Yeşil (Green)';
        renkHex = '#00ff00';
        renkText = '#0f172a';
    } else if (lambdaNm >= 565 && lambdaNm < 590) {
        renk = 'Sarı (Yellow)';
        renkHex = '#ffff00';
        renkText = '#0f172a';
    } else if (lambdaNm >= 590 && lambdaNm < 625) {
        renk = 'Turuncu (Orange)';
        renkHex = '#ff7f00';
    } else if (lambdaNm >= 625 && lambdaNm <= 780) {
        renk = 'Kırmızı (Red)';
        renkHex = '#ff0000';
    }
    
    var resultDiv = document.getElementById('hc-isik-frekansi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Işık Frekansı:</strong> <span class="hc-result-value">' + fThz.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + ' THz</span></p>' +
        '<div style="margin: 15px 0; padding: 12px; border-radius: 8px; font-weight: bold; text-align: center; background-color: ' + renkHex + '; color: ' + renkText + ';">' +
            'Spektrum Rengi: ' + renk +
        '</div>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Frekans (Hertz)</td>' +
                    '<td>' + fHz.toExponential(5) + ' Hz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Foton Enerjisi (eV)</td>' +
                    '<td>' + eEv.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' eV</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Foton Enerjisi (Joule)</td>' +
                    '<td>' + eJoule.toExponential(5) + ' J</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
