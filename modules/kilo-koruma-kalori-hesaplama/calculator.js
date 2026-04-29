function hcKkkFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcKkkOndalikFormat(sayi) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 3
    });
}

function hcKkkBmrHesapla(kilo, boy, yas, cinsiyet) {
    var sabit = cinsiyet === 'erkek' ? 5 : -161;
    return (10 * kilo) + (6.25 * boy) - (5 * yas) + sabit;
}

function hcKiloKorumaKaloriHesapla() {
    var yas = parseInt(document.getElementById('hc-kkk-yas').value, 10);
    var cinsiyet = document.getElementById('hc-kkk-cinsiyet').value;
    var boy = parseFloat(document.getElementById('hc-kkk-boy').value);
    var kilo = parseFloat(document.getElementById('hc-kkk-kilo').value);
    var aktivite = parseFloat(document.getElementById('hc-kkk-aktivite').value);

    if (!yas || isNaN(boy) || isNaN(kilo) || isNaN(aktivite)) {
        alert('Lütfen yaş, boy, kilo ve aktivite düzeyi alanlarını doldurun.');
        return;
    }

    if (yas < 18 || yas > 100) {
        alert('Lütfen 18 ile 100 arasında geçerli bir yaş girin.');
        return;
    }

    if (boy < 100 || boy > 230 || kilo < 30 || kilo > 300) {
        alert('Lütfen boy ve kilo için gerçekçi değerler girin.');
        return;
    }

    var bmr = hcKkkBmrHesapla(kilo, boy, yas, cinsiyet);
    var koruma = bmr * aktivite;
    var alt = koruma * 0.95;
    var ust = koruma * 1.05;
    var haftalik = koruma * 7;

    document.getElementById('hc-kkk-koruma').textContent = hcKkkFormat(koruma) + ' kcal/gün';
    document.getElementById('hc-kkk-ozet').textContent = 'Mevcut kiloyu korumak için tahmini günlük enerji ihtiyacı.';
    document.getElementById('hc-kkk-bmr').textContent = hcKkkFormat(bmr) + ' kcal/gün';
    document.getElementById('hc-kkk-katsayi').textContent = hcKkkOndalikFormat(aktivite);
    document.getElementById('hc-kkk-haftalik').textContent = hcKkkFormat(haftalik) + ' kcal/hafta';
    document.getElementById('hc-kkk-alt').textContent = hcKkkFormat(alt) + ' kcal/gün';
    document.getElementById('hc-kkk-ust').textContent = hcKkkFormat(ust) + ' kcal/gün';
    document.getElementById('hc-kkk-yorum').textContent = 'Koruma kalorisi gün içinde harcadığınız toplam enerjiyi tahmin eder. Günlük aktivite, uyku, kas kütlesi ve takip edilen adım sayısı sonucu etkileyebilir.';
    document.getElementById('hc-kkk-result').classList.add('visible');
}
