function hcImgSizeHesapla() {
    const w = parseFloat(document.getElementById('hc-is-w').value);
    const h = parseFloat(document.getElementById('hc-is-h').value);
    const bit = parseFloat(document.getElementById('hc-is-bit').value);

    if (isNaN(w) || isNaN(h) || w <= 0 || h <= 0) {
        alert('Lütfen geçerli piksel boyutları girin.');
        return;
    }

    // Ham Boyut (Byte) = w * h * (bit / 8)
    const rawBytes = w * h * (bit / 8);
    const rawMB = rawBytes / (1024 * 1024);

    // PNG Sıkıştırma (Genellikle %50-70 arası, %60 alalım)
    const pngMB = rawMB * 0.6;

    // JPG Sıkıştırma (Yüksek kalite %10, orta %5 katsayı)
    const jpgMB = rawMB * 0.1;

    document.getElementById('hc-is-res-raw').innerText = rawMB.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MB (Ham/RAW)';
    document.getElementById('hc-is-res-png').innerText = 'PNG (Kayıpsız Sıkış.): ~' + pngMB.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MB';
    document.getElementById('hc-is-res-jpg').innerText = 'JPG (Yüksek Kalite): ~' + jpgMB.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' MB';
    
    document.getElementById('hc-is-result').classList.add('visible');
}
