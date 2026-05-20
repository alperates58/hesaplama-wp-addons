function hcFotografCozunurlukBaskiKalitesiHesapla() {
    var width = parseFloat(document.getElementById('hc-quality-width').value);
    var height = parseFloat(document.getElementById('hc-quality-height').value);
    var viewingDistance = parseFloat(document.getElementById('hc-quality-viewing-distance').value);

    if (isNaN(width) || isNaN(height) || isNaN(viewingDistance) || width <= 0 || height <= 0 || viewingDistance <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Megapixel
    var mp = (width * height) / 1000000;

    // 300 DPI'da baskı boyutu (inç)
    var size300Width = width / 300;
    var size300Height = height / 300;

    // Görüş akuiteliği tabanlı tavsiye
    // İnsan gözü 60cm mesafede ~300 ppi ayırt edebilir
    var optimalDpi = 300 * (viewingDistance / 60);
    var recommendedWidth = width / optimalDpi;
    var recommendedHeight = height / optimalDpi;

    // Diagonal PPI
    var diagonal = Math.sqrt(width * width + height * height);
    var ppi = diagonal / Math.sqrt(width * width + height * height) * 300 * 2.54 / 25.4;

    var mpStr = mp.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' MP';
    var size300Str = size300Width.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" × ' +
                     size300Height.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '"';
    var recommendedStr = recommendedWidth.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '" × ' +
                         recommendedHeight.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '"';
    var ppiStr = ppi.toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 });

    document.getElementById('hc-quality-mp-val').innerText = mpStr;
    document.getElementById('hc-quality-300dpi-val').innerText = size300Str;
    document.getElementById('hc-quality-recommended-val').innerText = recommendedStr;
    document.getElementById('hc-quality-ppi-val').innerText = ppiStr;

    document.getElementById('hc-fotograf-cozunurluk-baski-kalitesi-hesaplama-result').classList.add('visible');
}
