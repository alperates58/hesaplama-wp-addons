function hcIkiVektorArasindakiAciHesapla() {
    var ax = parseFloat(document.getElementById('hc-iva-ax').value);
    var ay = parseFloat(document.getElementById('hc-iva-ay').value);
    var az = parseFloat(document.getElementById('hc-iva-az').value);
    
    var bx = parseFloat(document.getElementById('hc-iva-bx').value);
    var by = parseFloat(document.getElementById('hc-iva-by').value);
    var bz = parseFloat(document.getElementById('hc-iva-bz').value);
    
    if (isNaN(ax) || isNaN(ay) || isNaN(az) || isNaN(bx) || isNaN(by) || isNaN(bz)) {
        alert('Lütfen tüm vektör bileşenlerini geçerli sayılar olarak doldurunuz.');
        return;
    }
    
    // Nokta Çarpımı (Dot Product) = A . B
    var dot = ax * bx + ay * by + az * bz;
    
    // Vektör Boyutları (Magnitudes)
    var magA = Math.sqrt(ax * ax + ay * ay + az * az);
    var magB = Math.sqrt(bx * bx + by * by + bz * bz);
    
    if (magA === 0 || magB === 0) {
        alert('Hata: Sıfır vektörünün (0,0,0) açısı tanımsızdır!');
        return;
    }
    
    // cos(theta) = (A . B) / (|A| * |B|)
    var cosTheta = dot / (magA * magB);
    
    // Kayan nokta hassasiyeti için sınırla
    if (cosTheta > 1) cosTheta = 1;
    if (cosTheta < -1) cosTheta = -1;
    
    var thetaRad = Math.acos(cosTheta);
    var thetaDeg = thetaRad * 180 / Math.PI;
    
    var resultDiv = document.getElementById('hc-iki-vektor-arasindaki-aci-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Vektörler Arasındaki Açı (θ):</strong> <span class="hc-result-value">' + thetaDeg.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '°</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Radyan Cinsinden Açı</td>' +
                    '<td>' + thetaRad.toLocaleString('tr-TR', {maximumFractionDigits: 5}) + ' rad</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Nokta Çarpımı (A · B)</td>' +
                    '<td>' + dot.toLocaleString('tr-TR', {maximumFractionDigits: 3}) + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>A Vektörü Uzunluğu (|A|)</td>' +
                    '<td>' + magA.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>B Vektörü Uzunluğu (|B|)</td>' +
                    '<td>' + magB.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + '</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
