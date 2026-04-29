function hcBmhFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcBmhOndalikFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcBmhHesapla(kilo, boy, yas, cinsiyet) {
    var sabit = cinsiyet === 'erkek' ? 5 : -161;
    return (10 * kilo) + (6.25 * boy) - (5 * yas) + sabit;
}

function hcBmhKategori(bki) {
    if (bki < 18.5) return 'BKİ düşük aralıkta; enerji ihtiyacı klinik duruma göre değişebilir.';
    if (bki < 25) return 'BKİ normal aralıkta; BMH günlük toplam enerji hesabı için başlangıç değeridir.';
    if (bki < 30) return 'BKİ fazla kilolu aralıkta; aktivite ve vücut kompozisyonu toplam ihtiyacı etkiler.';
    return 'BKİ obezite aralığında; kişisel enerji planı için uzman desteği faydalı olabilir.';
}

function hcBazalMetabolizmaHiziHesapla() {
    var yas = parseInt(document.getElementById('hc-bmh-yas').value, 10);
    var cinsiyet = document.getElementById('hc-bmh-cinsiyet').value;
    var boy = parseFloat(document.getElementById('hc-bmh-boy').value);
    var kilo = parseFloat(document.getElementById('hc-bmh-kilo').value);

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

    var bmh = hcBmhHesapla(kilo, boy, yas, cinsiyet);
    var saatlik = bmh / 24;
    var haftalik = bmh * 7;
    var bki = kilo / Math.pow(boy / 100, 2);

    document.getElementById('hc-bmh-deger').textContent = hcBmhFormat(bmh) + ' kcal/gün';
    document.getElementById('hc-bmh-ozet').textContent = 'Tam dinlenme halinde tahmini günlük enerji ihtiyacı.';
    document.getElementById('hc-bmh-saatlik').textContent = hcBmhOndalikFormat(saatlik, 1) + ' kcal/saat';
    document.getElementById('hc-bmh-haftalik').textContent = hcBmhFormat(haftalik) + ' kcal/hafta';
    document.getElementById('hc-bmh-bki').textContent = hcBmhOndalikFormat(bki, 1) + ' kg/m²';
    document.getElementById('hc-bmh-yorum').textContent = hcBmhKategori(bki);
    document.getElementById('hc-bmh-result').classList.add('visible');
}
