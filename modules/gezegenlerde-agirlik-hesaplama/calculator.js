function hcGezegenlerdeAgirlikHesapla() {
    var m = parseFloat(document.getElementById('hc-ga2-kilo').value);
    
    if (isNaN(m) || m <= 0) {
        alert('Lütfen geçerli pozitif bir ağırlık/kütle değeri giriniz.');
        return;
    }
    
    // Gezegen yerçekimi ivmeleri (m/s²)
    var gList = {
        'Merkür': 3.7,
        'Venüs': 8.87,
        'Dünya': 9.807,
        'Ay': 1.62,
        'Mars': 3.71,
        'Jüpiter': 24.79,
        'Satürn': 10.44,
        'Uranüs': 8.69,
        'Neptün': 11.15,
        'Plüton': 0.62
    };
    
    var resultDiv = document.getElementById('hc-gezegenlerde-agirlik-hesaplama-result');
    
    var html = '<h4>Farklı Gök Cisimlerindeki Ağırlığınız:</h4>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Gök Cismi</th>' +
                    '<th>Kütleçekim (m/s²)</th>' +
                    '<th>Ağırlık (kg-kuvvet)</th>' +
                    '<th>Ağırlık (Newton)</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>';
            
    for (var key in gList) {
        var gVal = gList[key];
        var weightN = m * gVal;
        var weightKg = m * (gVal / 9.807);
        
        var rowClass = (key === 'Dünya') ? 'style="background-color: #f1f6ff; font-weight: bold;"' : '';
        
        html += '<tr ' + rowClass + '>' +
            '<td>' + key + '</td>' +
            '<td>' + gVal.toLocaleString('tr-TR') + '</td>' +
            '<td>' + weightKg.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg-f</td>' +
            '<td>' + weightN.toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' N</td>' +
            '</tr>';
    }
    
    html += '</tbody></table>';
    resultDiv.innerHTML = html;
    resultDiv.classList.add('visible');
}
