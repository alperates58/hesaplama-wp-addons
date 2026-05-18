function hcIgTipDegisti() {
    var tip = document.getElementById('hc-ig-tip').value;
    var baslangicLabel = document.getElementById('hc-ig-baslangic-label');
    var katsayiLabel = document.getElementById('hc-ig-katsayi-label');
    
    if (tip === 'boyca') {
        baslangicLabel.innerHTML = 'İlk Boy (L0 - metre)';
        katsayiLabel.innerHTML = 'Boyca Genleşme Katsayısı (α - x10⁻⁶ / °C)';
    } else {
        baslangicLabel.innerHTML = 'İlk Hacim (V0 - m³ veya Litre)';
        katsayiLabel.innerHTML = 'Hacimce Genleşme Katsayısı (β - x10⁻⁶ / °C)';
    }
}

function hcIgMalzemeSecildi() {
    var val = document.getElementById('hc-ig-malzeme').value;
    if (val) {
        var parts = val.split('|');
        var tip = parts[0];
        var katsayi = parseFloat(parts[1]);
        
        document.getElementById('hc-ig-tip').value = tip;
        hcIgTipDegisti();
        document.getElementById('hc-ig-katsayi').value = katsayi;
    }
}

function hcIsilGenlesmeHesapla() {
    var tip = document.getElementById('hc-ig-tip').value;
    var x0 = parseFloat(document.getElementById('hc-ig-baslangic').value);
    var coeff = parseFloat(document.getElementById('hc-ig-katsayi').value); // x 10^-6
    var deltaT = parseFloat(document.getElementById('hc-ig-deltaT').value);
    
    if (isNaN(x0) || x0 <= 0 || isNaN(coeff) || coeff <= 0 || isNaN(deltaT)) {
        alert('Lütfen geçerli pozitif başlangıç değeri, katsayı ve sıcaklık farkı giriniz.');
        return;
    }
    
    // Genleşme miktarı = x0 * (coeff * 10^-6) * deltaT
    var coeffReal = coeff * 1e-6;
    var delta = x0 * coeffReal * deltaT;
    var finalVal = x0 + delta;
    
    var unit = (tip === 'boyca') ? ' m' : ' L / m³';
    var deltaSubUnit = (tip === 'boyca') ? (delta * 1000).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' mm' : (delta * 1000).toLocaleString('tr-TR', {maximumFractionDigits: 4}) + ' mL';
    
    var resultDiv = document.getElementById('hc-isil-genlesme-hesaplama-result');
    resultDiv.innerHTML = '<h4>Hesaplama Sonuçları:</h4>' +
        '<p><strong>Boyutsal Genleşme Miktarı (Δ):</strong> <span class="hc-result-value">' + delta.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + unit + '</span></p>' +
        '<table>' +
            '<thead>' +
                '<tr>' +
                    '<th>Parametre</th>' +
                    '<th>Değer</th>' +
                '</tr>' +
            '</thead>' +
            '<tbody>' +
                '<tr>' +
                    '<td>Genleşme Miktarı (Küçük Birim)</td>' +
                    '<td>' + deltaSubUnit + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Son Boyut (Genleşmiş Hal)</td>' +
                    '<td>' + finalVal.toLocaleString('tr-TR', {maximumFractionDigits: 6}) + unit + '</td>' +
                '</tr>' +
                '<tr>' +
                    '<td>Genleşme Katsayısı (Net)</td>' +
                    '<td>' + coeffReal.toExponential(4) + ' / °C</td>' +
                '</tr>' +
            '</tbody>' +
        '</table>';
        
    resultDiv.classList.add('visible');
}
