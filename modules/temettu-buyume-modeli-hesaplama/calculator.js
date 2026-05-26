function hcGordonHesapla() {
    var d0 = parseFloat(document.getElementById('hc-tbm-d0').value) || 0;
    var g = parseFloat(document.getElementById('hc-tbm-growth').value) || 0;
    var r = parseFloat(document.getElementById('hc-tbm-discount').value) || 0;

    if (d0 <= 0) {
        alert('Lütfen geçerli bir temettü ödeme değeri giriniz.');
        return;
    }

    if (r <= g) {
        alert('İskonto oranı (r) temettü büyüme hızından (g) büyük olmalıdır. Aksi halde Gordon formülü uygulanamaz (sonsuz değerleme verir).');
        return;
    }

    // D1 = D0 * (1 + g)
    var d1 = d0 * (1 + (g / 100));
    
    // Değer = D1 / (r - g)
    var deger = d1 / ((r - g) / 100);

    document.getElementById('hc-tbm-res-d1').innerText = d1.toFixed(2) + ' ₺';
    document.getElementById('hc-tbm-res-deger').innerText = deger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-tbm-res-bilgi').innerText = 'Gordon Model Koşulu Sağlandı (r > g)';

    document.getElementById('hc-tbm-result').classList.add('visible');
}