function hcHamGoruntuDosyaBoyutuHesapla() {
    var megapixel = parseFloat(document.getElementById('hc-raw-megapixel').value);
    var bitDepth = parseFloat(document.getElementById('hc-raw-bit-depth').value);
    var compression = parseFloat(document.getElementById('hc-raw-compression').value);

    if (isNaN(megapixel) || isNaN(bitDepth) || isNaN(compression) || megapixel <= 0 || bitDepth <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Pixel sayısı
    var pixels = megapixel * 1000000;

    // Dosya boyutu = (pixels × bit depth) / 8 / 1000000 MB
    var fileSizeMb = (pixels * bitDepth / 8) / (1024 * 1024);
    fileSizeMb = fileSizeMb * compression;

    // 1000 fotoğraf
    var size1000 = fileSizeMb * 1000 / 1024; // GB cinsinden

    // 8 saat çekim (1 fps = 3600 × 8)
    var size8h = fileSizeMb * 28800 / 1024; // GB cinsinden

    var fileSizeStr = fileSizeMb.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' MB';
    var size1000Str = size1000.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB';
    var size8hStr = size8h.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB';

    document.getElementById('hc-raw-file-size-val').innerText = fileSizeStr;
    document.getElementById('hc-raw-1000-photos-val').innerText = size1000Str;
    document.getElementById('hc-raw-8h-shooting-val').innerText = size8hStr;

    document.getElementById('hc-ham-goruntu-dosya-boyutu-hesaplama-result').classList.add('visible');
}
