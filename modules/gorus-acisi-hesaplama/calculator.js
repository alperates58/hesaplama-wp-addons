function hcGorusAcisiSensorGuncelle() {
    var sensor = document.getElementById('hc-aov-sensor').value;
    var wGroup = document.getElementById('hc-aov-custom-w-group');
    var hGroup = document.getElementById('hc-aov-custom-h-group');
    if (sensor === 'custom') {
        wGroup.style.display = 'block';
        hGroup.style.display = 'block';
    } else {
        wGroup.style.display = 'none';
        hGroup.style.display = 'none';
    }
}

function hcGorusAcisiHesapla() {
    var focal = parseFloat(document.getElementById('hc-aov-focal').value);
    var sensor = document.getElementById('hc-aov-sensor').value;
    
    var w = 36.0;
    var h = 24.0;
    
    if (sensor === 'custom') {
        w = parseFloat(document.getElementById('hc-aov-custom-w').value);
        h = parseFloat(document.getElementById('hc-aov-custom-h').value);
    } else {
        var parts = sensor.split(',');
        w = parseFloat(parts[0]);
        h = parseFloat(parts[1]);
    }
    
    if (isNaN(focal) || isNaN(w) || isNaN(h) || focal <= 0 || w <= 0 || h <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }
    
    var diag = Math.sqrt(Math.pow(w, 2) + Math.pow(h, 2));
    
    // Görüş Açısı Formülü: AoV = 2 * arctan(d / (2 * f)) * (180 / pi)
    var aovHoriz = 2 * Math.atan(w / (2 * focal)) * (180 / Math.PI);
    var aovVert = 2 * Math.atan(h / (2 * focal)) * (180 / Math.PI);
    var aovDiag = 2 * Math.atan(diag / (2 * focal)) * (180 / Math.PI);
    
    document.getElementById('hc-aov-horiz-val').innerText = aovHoriz.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '°';
    document.getElementById('hc-aov-vert-val').innerText = aovVert.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '°';
    document.getElementById('hc-aov-diag-val').innerText = aovDiag.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '°';
    
    document.getElementById('hc-gorus-acisi-hesaplama-result').classList.add('visible');
}
