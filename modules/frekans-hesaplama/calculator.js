function hcFrekansHesaplamaModDegisti() {
    var mod = document.getElementById('hc-fh-mod').value;
    var girdiler = document.getElementById('hc-fh-girdiler');
    
    if (mod === 'periyot') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-fh-periyot">Periyot (T - saniye)</label>' +
            '<input type="number" step="any" id="hc-fh-periyot" placeholder="Örn: 0.02" required>' +
            '</div>';
    } else {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-fh-hiz">Dalga Hızı (v - m/s)</label>' +
            '<input type="number" step="any" id="hc-fh-hiz" placeholder="Ses hızı: 343, Işık hızı: 299792458" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-fh-dalga">Dalga Boyu (λ - metre)</label>' +
            '<input type="number" step="any" id="hc-fh-dalga" placeholder="Örn: 0.17" required>' +
            '</div>';
    }
}

function hcFrekansHesaplamaHesapla() {
    var mod = document.getElementById('hc-fh-mod').value;
    var f = 0;
    
    if (mod === 'periyot') {
        var T = parseFloat(document.getElementById('hc-fh-periyot').value);
        if (isNaN(T) || T <= 0) {
            alert('Lütfen geçerli pozitif bir periyot değeri giriniz.');
            return;
        }
        f = 1 / T;
    } else {
        var v = parseFloat(document.getElementById('hc-fh-hiz').value);
        var lambda = parseFloat(document.getElementById('hc-fh-dalga').value);
        
        if (isNaN(v) || v <= 0 || isNaN(lambda) || lambda <= 0) {
            alert('Lütfen geçerli pozitif dalga hızı ve dalga boyu değerleri giriniz.');
            return;
        }
        f = v / lambda;
    }
    
    var resultDiv = document.getElementById('hc-frekans-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Hesaplanan Frekans (f):</strong> <span class="hc-result-value">' + f.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' Hz</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Birim</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Kilohertz (kHz)</td>' +
                    '<td>' + (f / 1000).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' kHz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Megahertz (MHz)</td>' +
                    '<td>' + (f / 1e6).toLocaleString('tr-TR', {maximumFractionDigits: 9}) + ' MHz</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Açısal Frekans (ω)</td>' +
                    '<td>' + (2 * Math.PI * f).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' rad/s</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
