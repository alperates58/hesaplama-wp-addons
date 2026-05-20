function hcFotografBaskiBoyutuDpiHesapla() {
    var width = parseFloat(document.getElementById('hc-print-width').value);
    var height = parseFloat(document.getElementById('hc-print-height').value);
    var targetDpi = parseFloat(document.getElementById('hc-print-dpi').value);

    if (isNaN(width) || isNaN(height) || isNaN(targetDpi) || width <= 0 || height <= 0 || targetDpi <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // 300 DPI'da baskı boyutu
    var size300Width = width / 300;
    var size300Height = height / 300;

    // Hedef DPI'da baskı boyutu
    var sizeTargetWidth = width / targetDpi;
    var sizeTargetHeight = height / targetDpi;

    // Maksimum baskı boyutu (100 DPI)
    var sizeMaxWidth = width / 100;
    var sizeMaxHeight = height / 100;

    // Tavsiye
    var recommendation = '';
    if (targetDpi >= 300) {
        recommendation = 'Fotoğraf kalitesi için idealdir ✓';
    } else if (targetDpi >= 150) {
        recommendation = 'Kabul edilebilir kalite (biraz görüntü kaybı)';
    } else {
        recommendation = 'Web veya ekran görüntüleme için uygun';
    }

    var size300Str = size300Width.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" × ' +
                     size300Height.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" (' +
                     (size300Width * 2.54).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' × ' +
                     (size300Height * 2.54).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' cm)';

    var sizeTargetStr = sizeTargetWidth.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" × ' +
                        sizeTargetHeight.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" (' +
                        (sizeTargetWidth * 2.54).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' × ' +
                        (sizeTargetHeight * 2.54).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' cm)';

    var sizeMaxStr = sizeMaxWidth.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" × ' +
                     sizeMaxHeight.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" (' +
                     (sizeMaxWidth * 2.54).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' × ' +
                     (sizeMaxHeight * 2.54).toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' cm)';

    document.getElementById('hc-print-size-300-val').innerText = size300Str;
    document.getElementById('hc-print-size-target-val').innerText = sizeTargetStr;
    document.getElementById('hc-print-size-max-val').innerText = sizeMaxStr;
    document.getElementById('hc-print-recommendation-val').innerText = recommendation;

    document.getElementById('hc-fotograf-baski-boyutu-dpi-hesaplama-result').classList.add('visible');
}
