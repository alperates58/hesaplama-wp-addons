function hcHubbleYasasiHesapla() {
    var d = parseFloat(document.getElementById('hc-hy4-uzaklik').value);
    var H0 = parseFloat(document.getElementById('hc-hy4-hubble').value);
    
    if (isNaN(d) || d <= 0 || isNaN(H0) || H0 <= 0) {
        alert('Lütfen geçerli pozitif uzaklık ve Hubble sabiti değerleri giriniz.');
        return;
    }
    
    // v = H0 * d (km/s)
    var v = H0 * d;
    
    var c = 299792.458; // km/s (Işık hızı)
    
    // Relativistik Kırmızıya Kayma (Redshift z) hesabı:
    // z = sqrt((1 + v/c) / (1 - v/c)) - 1  (eğer v < c ise)
    var zText = '';
    var zVal = 0;
    
    if (v >= c) {
        // Işıktan hızlı uzaklaşma (Kozmolojik genişlemede mümkündür!)
        zText = 'Genişleme hızı ışık hızını aşmaktadır. Relativistik klasik formül sınır dışıdır. Evrenin kozmolojik genişleme ufkunun ötesindedir.';
    } else {
        zVal = Math.sqrt((1 + v / c) / (1 - v / c)) - 1;
        zText = zVal.toLocaleString('tr-TR', {maximumFractionDigits: 5});
    }
    
    // Uzaklık birim dönüşümleri
    var lightYears = d * 3261560; // 1 Mpc = 3.26156 milyon ışık yılı
    
    var resultDiv = document.getElementById('hc-hubble-yasasi-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Uzaklaşma Hızı (v):</strong> <span class="hc-result-value">' + v.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' km/s</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Kırmızıya Kayma Değeri (z)</td>' +
                    '<td>' + zText + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Işık Yılı Cinsinden Uzaklık</td>' +
                    '<td>~' + (lightYears / 1e6).toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' Milyon Işık Yılı</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Hubble Süresi (1 / H0)</td>' +
                    '<td>~' + (977.8 / H0).toLocaleString('tr-TR', {maximumFractionDigits: 1}) + ' Milyar Yıl (Evrenin yaklaşık yaşı)</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
