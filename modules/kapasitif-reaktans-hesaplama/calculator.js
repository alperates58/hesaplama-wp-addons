function hcKapasitifReaktansHesapla() {
    var cVal = parseFloat(document.getElementById('hc-kare-kapasitans').value);
    var cBirim = document.getElementById('hc-kare-kbirim').value;
    var fVal = parseFloat(document.getElementById('hc-kare-frekans').value);
    var fBirim = document.getElementById('hc-kare-fbirim').value;
    
    if (isNaN(cVal) || cVal <= 0 || isNaN(fVal) || fVal <= 0) {
        alert('Lütfen geçerli pozitif kapasitans ve frekans değerleri giriniz.');
        return;
    }
    
    // Kapasitansı Farad cinsine dönüştür
    var C = cVal;
    if (cBirim === 'uf') {
        C = cVal * 1e-6;
    } else if (cBirim === 'nf') {
        C = cVal * 1e-9;
    } else if (cBirim === 'pf') {
        C = cVal * 1e-12;
    }
    
    // Frekansı Hertz cinsine dönüştür
    var f = fVal;
    if (fBirim === 'khz') {
        f = fVal * 1000;
    } else if (fBirim === 'mhz') {
        f = fVal * 1e6;
    }
    
    // Xc = 1 / (2 * pi * f * C)
    var Xc = 1 / (2 * Math.PI * f * C);
    
    var resultDiv = document.getElementById('hc-kapasitif-reaktans-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Kapasitif Reaktans (Xc):</strong> <span class="hc-result-value">' + Xc.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' Ω</span> (Ohm)</p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Kiloohm (kΩ)</td>' +
                    '<td>' + (Xc / 1000).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' kΩ</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Megaohm (MΩ)</td>' +
                    '<td>' + (Xc / 1e6).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' MΩ</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Açısal Frekans (ω = 2πf)</td>' +
                    '<td>' + (2 * Math.PI * f).toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' rad/s</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
