function hcFizikselSarkacHesapla() {
    var I = parseFloat(document.getElementById('hc-fs-moment').value);
    var m = parseFloat(document.getElementById('hc-fs-kutle').value);
    var d = parseFloat(document.getElementById('hc-fs-uzaklik').value);
    
    if (isNaN(I) || I <= 0 || isNaN(m) || m <= 0 || isNaN(d) || d <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }
    
    var g = 9.80665; // Yerçekimi ivmesi
    
    // T = 2 * pi * sqrt( I / (m * g * d) )
    var T = 2 * Math.PI * Math.sqrt(I / (m * g * d));
    var f = 1 / T;
    
    var resultDiv = document.getElementById('hc-fiziksel-sarkac-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Salınım Periyodu (T):</strong> <span class="hc-result-value">' + T.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' saniye</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Frekans (f)</td>' +
                    '<td>' + f.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' Hz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Açısal Frekans (ω)</td>' +
                    '<td>' + (2 * Math.PI * f).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' rad/s</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
