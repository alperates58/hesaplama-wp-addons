function hcBuyuklukMertebesHesapla() {
    var sayi = parseFloat(document.getElementById('hc-bme-sayi').value);
    var sonuc = document.getElementById('hc-buyukluk-mertebesi-hesaplama-result');
    if (isNaN(sayi) || sayi === 0) { alert('Lütfen sıfırdan farklı bir sayı girin.'); return; }
    var mertebe = Math.floor(Math.log10(Math.abs(sayi)));
    var kategoriler = [
        { sinir: -15, ad: 'femto (f) mertebesi' }, { sinir: -12, ad: 'piko (p) mertebesi' },
        { sinir: -9, ad: 'nano (n) mertebesi' }, { sinir: -6, ad: 'mikro (μ) mertebesi' },
        { sinir: -3, ad: 'mili (m) mertebesi' }, { sinir: 0, ad: 'Birim mertebesi (1-9)' },
        { sinir: 3, ad: 'Kilo (k) mertebesi' }, { sinir: 6, ad: 'Mega (M) mertebesi' },
        { sinir: 9, ad: 'Giga (G) mertebesi' }, { sinir: 12, ad: 'Tera (T) mertebesi' }
    ];
    var kategori = 'Çok büyük ya da çok küçük';
    for (var i = 0; i < kategoriler.length - 1; i++) {
        if (mertebe >= kategoriler[i].sinir && mertebe < kategoriler[i+1].sinir) { kategori = kategoriler[i].ad; break; }
        if (i === kategoriler.length - 2) kategori = kategoriler[kategoriler.length-1].ad;
    }
    sonuc.innerHTML =
        '<p><strong>Sayı:</strong> ' + sayi.toLocaleString('tr-TR', {maximumFractionDigits: 15}) + '</p>' +
        '<p class="hc-result-value">Büyüklük Mertebesi: 10<sup>' + mertebe + '</sup></p>' +
        '<p><strong>Üs (n):</strong> ' + mertebe + '</p>' +
        '<p><strong>Kategori:</strong> ' + kategori + '</p>' +
        '<p><strong>Bilimsel Gösterim:</strong> ' + (sayi / Math.pow(10, mertebe)).toLocaleString('tr-TR', {maximumFractionDigits: 6}) + ' × 10<sup>' + mertebe + '</sup></p>';
    sonuc.classList.add('visible');
}
