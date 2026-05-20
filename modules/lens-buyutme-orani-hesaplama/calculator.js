function hcLensBuyutmeOraniHesapla() {
    var focal = parseFloat(document.getElementById('hc-lm-focal').value); // mm
    var distCm = parseFloat(document.getElementById('hc-lm-distance').value); // cm
    
    if (isNaN(focal) || isNaN(distCm) || focal <= 0 || distCm <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }
    
    var distMm = distCm * 10; // mm
    
    if (distMm <= focal) {
        alert('Netleme mesafesi odak uzaklığından büyük olmalıdır.');
        return;
    }
    
    // M = f / (d - f)
    var m = focal / (distMm - focal);
    
    var decimalStr = m.toLocaleString('tr-TR', { minimumFractionDigits: 3, maximumFractionDigits: 3 }) + 'x';
    
    var ratioVal = 1 / m;
    var ratioStr = '1 : ' + ratioVal.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    
    var descStr = "";
    if (m >= 1) {
        descStr = "Gerçek boyuttan daha büyük veya eşit (Makro çekim standardı)";
    } else if (m >= 0.5) {
        descStr = "Yarı makro çekim (0.5x - 1x arası)";
    } else {
        descStr = "Normal çekim ölçeği (0.5x altı)";
    }
    
    document.getElementById('hc-lm-decimal-val').innerText = decimalStr;
    document.getElementById('hc-lm-ratio-val').innerText = ratioStr;
    document.getElementById('hc-lm-desc-val').innerText = descStr;
    
    document.getElementById('hc-lens-buyutme-orani-hesaplama-result').classList.add('visible');
}
