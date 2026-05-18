function hcGKuvvetiTipDegisti() {
    var tip = document.getElementById('hc-gk-tip').value;
    var girdiler = document.getElementById('hc-gk-girdiler');
    
    if (tip === 'lineer') {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-gk-ivme">Lineer İvme (a - m/s²)</label>' +
            '<input type="number" step="any" id="hc-gk-ivme" placeholder="Örn: 25" required>' +
            '</div>';
    } else {
        girdiler.innerHTML = '<div class="hc-form-group">' +
            '<label for="hc-gk-hiz">Çizgisel Hız (v - m/s)</label>' +
            '<input type="number" step="any" id="hc-gk-hiz" placeholder="Örn: 30" required>' +
            '</div>' +
            '<div class="hc-form-group">' +
            '<label for="hc-gk-yari">Dönüş Yarıçapı (r - metre)</label>' +
            '<input type="number" step="any" id="hc-gk-yari" placeholder="Örn: 10" required>' +
            '</div>';
    }
}

function hcGKuvvetiHesapla() {
    var tip = document.getElementById('hc-gk-tip').value;
    var gFactor = 9.80665;
    var gForce = 0;
    var acc = 0;
    
    if (tip === 'lineer') {
        var ivme = parseFloat(document.getElementById('hc-gk-ivme').value);
        if (isNaN(ivme)) {
            alert('Lütfen geçerli bir ivme değeri giriniz.');
            return;
        }
        acc = ivme;
        gForce = ivme / gFactor;
    } else {
        var v = parseFloat(document.getElementById('hc-gk-hiz').value);
        var r = parseFloat(document.getElementById('hc-gk-yari').value);
        
        if (isNaN(v) || isNaN(r) || r <= 0) {
            alert('Lütfen geçerli hız ve pozitif yarıçap giriniz.');
            return;
        }
        acc = Math.pow(v, 2) / r;
        gForce = acc / gFactor;
    }
    
    var resultDiv = document.getElementById('hc-g-kuvveti-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>G Kuvveti:</strong> <span class="hc-result-value">' + gForce.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' g</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Net İvme (a)</td>' +
                    '<td>' + acc.toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' m/s²</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Ağırlık Artış Faktörü</td>' +
                    '<td>Kendi ağırlığınızın ' + gForce.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' katı</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
