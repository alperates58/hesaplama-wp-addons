function hcDrhFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcDrhYasPuani(yas) {
    if (yas < 45) return 0;
    if (yas < 55) return 2;
    if (yas < 65) return 3;
    return 4;
}

function hcDrhBkiPuani(bki) {
    if (bki < 25) return 0;
    if (bki <= 30) return 1;
    return 3;
}

function hcDrhBelPuani(bel, cinsiyet) {
    if (cinsiyet === 'erkek') {
        if (bel < 94) return 0;
        if (bel <= 102) return 3;
        return 4;
    }

    if (bel < 80) return 0;
    if (bel <= 88) return 3;
    return 4;
}

function hcDrhRiskBul(puan) {
    if (puan < 7) {
        return {
            seviye: 'Düşük risk',
            olasilik: 'Yaklaşık 100 kişiden 1 kişi',
            yorum: 'Önümüzdeki 10 yıl için tip 2 diyabet riski düşük görünür.'
        };
    }

    if (puan < 12) {
        return {
            seviye: 'Hafif artmış risk',
            olasilik: 'Yaklaşık 25 kişiden 1 kişi',
            yorum: 'Yaşam tarzı düzenlemeleri riski azaltmaya yardımcı olabilir.'
        };
    }

    if (puan < 15) {
        return {
            seviye: 'Orta risk',
            olasilik: 'Yaklaşık 6 kişiden 1 kişi',
            yorum: 'Risk belirginleşmiş durumda; kan şekeri ölçümü ve hekim değerlendirmesi faydalı olabilir.'
        };
    }

    if (puan <= 20) {
        return {
            seviye: 'Yüksek risk',
            olasilik: 'Yaklaşık 3 kişiden 1 kişi',
            yorum: 'Tip 2 diyabet riski yüksektir. Hekim kontrolü ve metabolik değerlendirme önerilir.'
        };
    }

    return {
        seviye: 'Çok yüksek risk',
        olasilik: 'Yaklaşık 2 kişiden 1 kişi',
        yorum: 'Risk çok yüksektir. Gecikmeden sağlık uzmanına başvurmanız önerilir.'
    };
}

function hcDrhDetayEkle(liste, etiket, puan) {
    var item = document.createElement('li');
    item.innerHTML = '<span>' + etiket + '</span><strong>' + puan.toLocaleString('tr-TR') + ' puan</strong>';
    liste.appendChild(item);
}

function hcDiyabetRiskiHesapla() {
    var yas = parseInt(document.getElementById('hc-drh-yas').value, 10);
    var cinsiyet = document.getElementById('hc-drh-cinsiyet').value;
    var boy = parseFloat(document.getElementById('hc-drh-boy').value);
    var kilo = parseFloat(document.getElementById('hc-drh-kilo').value);
    var bel = parseFloat(document.getElementById('hc-drh-bel').value);
    var aktivite = document.getElementById('hc-drh-aktivite').value;
    var beslenme = document.getElementById('hc-drh-beslenme').value;
    var tansiyon = document.getElementById('hc-drh-tansiyon').value;
    var glukoz = document.getElementById('hc-drh-glukoz').value;
    var aile = document.getElementById('hc-drh-aile').value;

    if (!yas || isNaN(boy) || isNaN(kilo) || isNaN(bel)) {
        alert('Lütfen yaş, boy, kilo ve bel çevresi alanlarını doldurun.');
        return;
    }

    if (yas < 18 || yas > 120) {
        alert('Lütfen 18 ile 120 arasında geçerli bir yaş girin.');
        return;
    }

    if (boy < 100 || boy > 230 || kilo < 30 || kilo > 300 || bel < 40 || bel > 200) {
        alert('Lütfen boy, kilo ve bel çevresi için gerçekçi değerler girin.');
        return;
    }

    var bki = kilo / Math.pow(boy / 100, 2);
    var puanlar = {
        yas: hcDrhYasPuani(yas),
        bki: hcDrhBkiPuani(bki),
        bel: hcDrhBelPuani(bel, cinsiyet),
        aktivite: aktivite === 'evet' ? 0 : 2,
        beslenme: beslenme === 'evet' ? 0 : 1,
        tansiyon: tansiyon === 'evet' ? 2 : 0,
        glukoz: glukoz === 'evet' ? 5 : 0,
        aile: aile === 'birinci' ? 5 : (aile === 'ikinci' ? 3 : 0)
    };

    var toplam = Object.keys(puanlar).reduce(function(sonuc, key) {
        return sonuc + puanlar[key];
    }, 0);
    var risk = hcDrhRiskBul(toplam);
    var detay = document.getElementById('hc-drh-detay');

    detay.innerHTML = '';
    hcDrhDetayEkle(detay, 'Yaş', puanlar.yas);
    hcDrhDetayEkle(detay, 'BKİ', puanlar.bki);
    hcDrhDetayEkle(detay, 'Bel çevresi', puanlar.bel);
    hcDrhDetayEkle(detay, 'Fiziksel aktivite', puanlar.aktivite);
    hcDrhDetayEkle(detay, 'Sebze/meyve tüketimi', puanlar.beslenme);
    hcDrhDetayEkle(detay, 'Tansiyon ilacı', puanlar.tansiyon);
    hcDrhDetayEkle(detay, 'Yüksek kan şekeri öyküsü', puanlar.glukoz);
    hcDrhDetayEkle(detay, 'Aile öyküsü', puanlar.aile);

    document.getElementById('hc-drh-puan').textContent = toplam.toLocaleString('tr-TR');
    document.getElementById('hc-drh-risk').textContent = risk.seviye;
    document.getElementById('hc-drh-olasilik').textContent = '10 yıllık risk: ' + risk.olasilik;
    document.getElementById('hc-drh-bki').textContent = hcDrhFormat(bki, 1) + ' kg/m²';
    document.getElementById('hc-drh-bel-puan').textContent = puanlar.bel.toLocaleString('tr-TR') + ' puan';
    document.getElementById('hc-drh-toplam').textContent = toplam.toLocaleString('tr-TR') + ' puan';
    document.getElementById('hc-drh-yorum').textContent = risk.yorum;
    document.getElementById('hc-drh-result').classList.add('visible');
}
