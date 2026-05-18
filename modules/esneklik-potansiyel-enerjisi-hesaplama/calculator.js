function hcEsneklikPotansiyelEnerjisiHesapla() {
    var k = parseFloat(document.getElementById('hc-epe-yay').value);
    var x = parseFloat(document.getElementById('hc-epe-uzama').value);
    
    if (isNaN(k) || k <= 0 || isNaN(x)) {
        alert('Lütfen geçerli sayısal değerler giriniz.');
        return;
    }
    
    // E = 0.5 * k * x^2
    var epe = 0.5 * k * Math.pow(x, 2);
    var epeKj = epe / 1000;
    
    var resultDiv = document.getElementById('hc-esneklik-potansiyel-enerjisi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Esneklik Potansiyel Enerjisi:</strong> <span class="hc-result-value">' + epe.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' J</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Joule (J)</td>' +
                    '<td>' + epe.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' J</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Kilojoule (kJ)</td>' +
                    '<td>' + epeKj.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' kJ</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
