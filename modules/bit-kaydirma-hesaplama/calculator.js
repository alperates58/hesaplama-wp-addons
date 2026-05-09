function hcBitKaydirmaHesapla() {
    var sayi = parseInt(document.getElementById('hc-bka-sayi').value);
    var yon = document.getElementById('hc-bka-yon').value;
    var miktar = parseInt(document.getElementById('hc-bka-miktar').value);
    var sonuc = document.getElementById('hc-bit-kaydirma-hesaplama-result');

    if (isNaN(sayi)) { alert('Lütfen geçerli bir sayı girin.'); return; }
    if (isNaN(miktar) || miktar < 1 || miktar > 31) { alert('Kaydırma miktarı 1 ile 31 arasında olmalıdır.'); return; }

    var onceIkili = (sayi >>> 0).toString(2).padStart(32, '0');
    var sonucSayi = (yon === 'left') ? (sayi << miktar) : (sayi >> miktar);
    var sonraIkili = (sonucSayi >>> 0).toString(2).padStart(32, '0');
    var islemSembol = (yon === 'left') ? '<<' : '>>';
    var aciklama = (yon === 'left')
        ? (sayi + ' × 2<sup>' + miktar + '</sup> = ' + sonucSayi)
        : (sayi + ' ÷ 2<sup>' + miktar + '</sup> = ' + sonucSayi);

    sonuc.innerHTML =
        '<p><strong>Özgün Sayı:</strong> ' + sayi.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>İkili:</strong> <code>' + onceIkili + '</code></p>' +
        '<p><strong>İşlem:</strong> ' + sayi + ' ' + islemSembol + ' ' + miktar + '</p>' +
        '<p class="hc-result-value">' + sonucSayi.toLocaleString('tr-TR') + '</p>' +
        '<p><strong>Sonuç İkili:</strong> <code>' + sonraIkili + '</code></p>' +
        '<p><strong>Karşılığı:</strong> ' + aciklama + '</p>';
    sonuc.classList.add('visible');
}
