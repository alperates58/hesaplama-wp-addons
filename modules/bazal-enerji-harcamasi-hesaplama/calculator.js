function hcBeeFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcBeeOndalikFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcBeeHesapla(kilo, boy, yas, cinsiyet) {
    if (cinsiyet === 'erkek') {
        return 66.473 + (13.7516 * kilo) + (5.0033 * boy) - (6.755 * yas);
    }

    return 655.0955 + (9.5634 * kilo) + (1.8496 * boy) - (4.6756 * yas);
}

function hcBeeFormulMetni(cinsiyet) {
    if (cinsiyet === 'erkek') {
        return '66,473 + 13,7516 x kg + 5,0033 x cm - 6,755 x yaş';
    }

    return '655,0955 + 9,5634 x kg + 1,8496 x cm - 4,6756 x yaş';
}

function hcBeeYorum(bki) {
    if (bki < 18.5) {
        return 'BKİ düşük aralıkta. BEE sonucu beslenme hedefi için tek başına yeterli değildir.';
    }

    if (bki < 25) {
        return 'BKİ normal aralıkta. BEE değeri günlük enerji planının dinlenme temelini gösterir.';
    }

    if (bki < 30) {
        return 'BKİ fazla kilolu aralıkta. Günlük toplam ihtiyaç, hareket düzeyiyle birlikte ayrıca değerlendirilmelidir.';
    }

    return 'BKİ obezite aralığında. Enerji planı için hekim veya diyetisyen değerlendirmesi faydalı olabilir.';
}

function hcBazalEnerjiHarcamasiHesapla() {
    var yas = parseInt(document.getElementById('hc-bee-yas').value, 10);
    var cinsiyet = document.getElementById('hc-bee-cinsiyet').value;
    var boy = parseFloat(document.getElementById('hc-bee-boy').value);
    var kilo = parseFloat(document.getElementById('hc-bee-kilo').value);

    if (!yas || isNaN(boy) || isNaN(kilo)) {
        alert('Lütfen yaş, boy ve kilo alanlarını doldurun.');
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

    var bee = hcBeeHesapla(kilo, boy, yas, cinsiyet);
    var saatlik = bee / 24;
    var haftalik = bee * 7;
    var bki = kilo / Math.pow(boy / 100, 2);

    document.getElementById('hc-bee-deger').textContent = hcBeeFormat(bee) + ' kcal/gün';
    document.getElementById('hc-bee-ozet').textContent = 'Harris-Benedict denklemine göre tahmini bazal enerji harcaması.';
    document.getElementById('hc-bee-saatlik').textContent = hcBeeOndalikFormat(saatlik, 1) + ' kcal/saat';
    document.getElementById('hc-bee-haftalik').textContent = hcBeeFormat(haftalik) + ' kcal/hafta';
    document.getElementById('hc-bee-bki').textContent = hcBeeOndalikFormat(bki, 1) + ' kg/m²';
    document.getElementById('hc-bee-formul').textContent = hcBeeFormulMetni(cinsiyet);
    document.getElementById('hc-bee-yorum').textContent = hcBeeYorum(bki);
    document.getElementById('hc-bee-result').classList.add('visible');
}
