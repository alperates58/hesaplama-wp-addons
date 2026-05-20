function hcCropFaktoruPresetGuncelle() {
    var preset = document.getElementById('hc-cf-preset').value;
    if (preset !== 'custom') {
        var parts = preset.split(',');
        document.getElementById('hc-cf-width').value = parseFloat(parts[0]);
        document.getElementById('hc-cf-height').value = parseFloat(parts[1]);
    }
}

function hcCropFaktoruHesapla() {
    var w = parseFloat(document.getElementById('hc-cf-width').value);
    var h = parseFloat(document.getElementById('hc-cf-height').value);
    
    if (isNaN(w) || isNaN(h) || w <= 0 || h <= 0) {
        alert('Lütfen geçerli sensör boyutları giriniz.');
        return;
    }
    
    // Standart Full Frame köşegeni (36x24 mm)
    var stdDiagonal = Math.sqrt(Math.pow(36, 2) + Math.pow(24, 2)); // ~43.2666 mm
    var diagonal = Math.sqrt(Math.pow(w, 2) + Math.pow(h, 2));
    
    var cropFactor = stdDiagonal / diagonal;
    
    document.getElementById('hc-cf-diag-val').innerText = diagonal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' mm';
    document.getElementById('hc-cf-factor-val').innerText = cropFactor.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + 'x';
    
    document.getElementById('hc-crop-faktoru-hesaplama-result').classList.add('visible');
}
