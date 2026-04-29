function hcGkiFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcGkiBmr(kilo, boy, yas, cinsiyet) {
    return (10 * kilo) + (6.25 * boy) - (5 * yas) + (cinsiyet === 'erkek' ? 5 : -161);
}

function hcGunlukKaloriIhtiyaciHesapla() {
    var yas = parseInt(document.getElementById('hc-gki-yas').value, 10);
    var cinsiyet = document.getElementById('hc-gki-cinsiyet').value;
    var boy = parseFloat(document.getElementById('hc-gki-boy').value);
    var kilo = parseFloat(document.getElementById('hc-gki-kilo').value);
    var aktivite = parseFloat(document.getElementById('hc-gki-aktivite').value);
    var hedef = document.getElementById('hc-gki-hedef').value;

    if (!yas || isNaN(boy) || isNaN(kilo) || isNaN(aktivite)) {
        alert('Lütfen yaş, boy, kilo ve aktivite düzeyini girin.');
        return;
    }

    if (yas < 18 || yas > 100 || boy < 100 || boy > 230 || kilo < 30 || kilo > 300) {
        alert('Lütfen gerçekçi yaş, boy ve kilo değerleri girin.');
        return;
    }

    var bmr = hcGkiBmr(kilo, boy, yas, cinsiyet);
    var tdee = bmr * aktivite;
    var hedefKalori = tdee;
    var haftalik = 'Kilo koruma';
    var yorum = 'Bu değer mevcut kiloyu korumaya yönelik tahmini günlük toplam enerji ihtiyacıdır.';

    if (hedef === 'kayip') {
        hedefKalori = tdee - 500;
        haftalik = 'Yaklaşık 0,45 kg kayıp';
        yorum = 'Günlük yaklaşık 500 kcal açık, çoğu kişi için orta tempolu kilo kaybı hedefidir.';
    } else if (hedef === 'alma') {
        hedefKalori = tdee + 300;
        haftalik = 'Yaklaşık 0,25 kg artış';
        yorum = 'Günlük yaklaşık 300 kcal fazlalık, daha kontrollü kilo alma hedefi sunar.';
    }

    document.getElementById('hc-gki-hedef-kalori').textContent = hcGkiFormat(hedefKalori) + ' kcal/gün';
    document.getElementById('hc-gki-ozet').textContent = 'Hedefe göre önerilen günlük kalori.';
    document.getElementById('hc-gki-bmr').textContent = hcGkiFormat(bmr) + ' kcal/gün';
    document.getElementById('hc-gki-tdee').textContent = hcGkiFormat(tdee) + ' kcal/gün';
    document.getElementById('hc-gki-haftalik').textContent = haftalik;
    document.getElementById('hc-gki-yorum').textContent = yorum;
    document.getElementById('hc-gki-result').classList.add('visible');
}
