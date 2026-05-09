function hcYfhFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcYfhTamFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcYfhYontem() {
    return document.querySelector('input[name="hc-yfh-yontem"]:checked').value;
}

function hcYfhTarihOku(id) {
    var deger = document.getElementById(id).value;

    if (!deger) {
        return null;
    }

    var parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcYfhTakvimFarki(onceki, sonraki) {
    var yil = sonraki.getFullYear() - onceki.getFullYear();
    var ay = sonraki.getMonth() - onceki.getMonth();
    var gun = sonraki.getDate() - onceki.getDate();

    if (gun < 0) {
        ay -= 1;
        gun += new Date(sonraki.getFullYear(), sonraki.getMonth(), 0).getDate();
    }

    if (ay < 0) {
        yil -= 1;
        ay += 12;
    }

    return { yil: yil, ay: ay, gun: gun };
}

function hcYfhPanelGuncelle() {
    var yontem = hcYfhYontem();

    document.querySelectorAll('.hc-yfh-panel').forEach(function(panel) {
        panel.style.display = 'none';
    });

    document.getElementById('hc-yfh-panel-' + yontem).style.display = 'grid';
}

function hcYfhSonucYaz(sonuc) {
    document.getElementById('hc-yfh-badge').textContent = sonuc.badge;
    document.getElementById('hc-yfh-ana-sonuc').textContent = sonuc.ana;
    document.getElementById('hc-yfh-ozet').textContent = sonuc.ozet;
    document.getElementById('hc-yfh-buyuk').textContent = sonuc.buyuk;
    document.getElementById('hc-yfh-kucuk').textContent = sonuc.kucuk;
    document.getElementById('hc-yfh-fark').textContent = sonuc.fark;
    document.getElementById('hc-yfh-ay').textContent = sonuc.ay;
    document.getElementById('hc-yfh-gun').textContent = sonuc.gun;
    document.getElementById('hc-yfh-hafta').textContent = sonuc.hafta;
    document.getElementById('hc-yfh-yorum').textContent = sonuc.yorum;
    document.getElementById('hc-yfh-result').classList.add('visible');
}

function hcYasFarkiHesapla() {
    var yontem = hcYfhYontem();

    if (yontem === 'yas') {
        var yas1 = parseInt(document.getElementById('hc-yfh-yas-1').value, 10);
        var yas2 = parseInt(document.getElementById('hc-yfh-yas-2').value, 10);

        if (isNaN(yas1) || isNaN(yas2)) {
            alert('Lütfen iki kişinin yaşını girin.');
            return;
        }

        if (yas1 < 0 || yas1 > 130 || yas2 < 0 || yas2 > 130) {
            alert('Lütfen yaşları 0-130 arasında girin.');
            return;
        }

        var fark = Math.abs(yas1 - yas2);
        hcYfhSonucYaz({
            badge: hcYfhTamFormat(fark),
            ana: hcYfhTamFormat(fark) + ' yıl',
            ozet: 'Yaşa göre hesaplanan fark.',
            buyuk: yas1 === yas2 ? 'Aynı yaş' : (yas1 > yas2 ? '1. kişi' : '2. kişi'),
            kucuk: yas1 === yas2 ? 'Aynı yaş' : (yas1 < yas2 ? '1. kişi' : '2. kişi'),
            fark: hcYfhTamFormat(fark) + ' yıl',
            ay: hcYfhTamFormat(fark * 12) + ' ay',
            gun: hcYfhTamFormat(fark * 365.2425) + ' gün',
            hafta: hcYfhFormat((fark * 365.2425) / 7, 1) + ' hafta',
            yorum: fark === 0 ? 'İki kişi aynı yaştadır.' : 'Yaş bilgisine göre aradaki fark yaklaşık ' + hcYfhTamFormat(fark) + ' yıldır.'
        });
        return;
    }

    if (yontem === 'yil') {
        var yil1 = parseInt(document.getElementById('hc-yfh-yil-1').value, 10);
        var yil2 = parseInt(document.getElementById('hc-yfh-yil-2').value, 10);

        if (isNaN(yil1) || isNaN(yil2)) {
            alert('Lütfen iki kişinin doğum yılını girin.');
            return;
        }

        if (yil1 < 1900 || yil1 > 2100 || yil2 < 1900 || yil2 > 2100) {
            alert('Lütfen doğum yıllarını 1900-2100 arasında girin.');
            return;
        }

        var yilFarki = Math.abs(yil1 - yil2);
        hcYfhSonucYaz({
            badge: hcYfhTamFormat(yilFarki),
            ana: hcYfhTamFormat(yilFarki) + ' yıl',
            ozet: 'Doğum yılına göre yaklaşık fark.',
            buyuk: yil1 === yil2 ? 'Aynı yıl doğumlu' : (yil1 < yil2 ? '1. kişi' : '2. kişi'),
            kucuk: yil1 === yil2 ? 'Aynı yıl doğumlu' : (yil1 > yil2 ? '1. kişi' : '2. kişi'),
            fark: hcYfhTamFormat(yilFarki) + ' yıl',
            ay: hcYfhTamFormat(yilFarki * 12) + ' ay',
            gun: hcYfhTamFormat(yilFarki * 365.2425) + ' gün',
            hafta: hcYfhFormat((yilFarki * 365.2425) / 7, 1) + ' hafta',
            yorum: 'Doğum yılı yöntemi gün ve ayı bilmediği için yaklaşık sonuç verir.'
        });
        return;
    }

    var tarih1 = hcYfhTarihOku('hc-yfh-tarih-1');
    var tarih2 = hcYfhTarihOku('hc-yfh-tarih-2');

    if (!tarih1 || !tarih2) {
        alert('Lütfen iki kişinin doğum tarihini seçin.');
        return;
    }

    var buyukTarih = tarih1 <= tarih2 ? tarih1 : tarih2;
    var kucukTarih = tarih1 > tarih2 ? tarih1 : tarih2;
    var parca = hcYfhTakvimFarki(buyukTarih, kucukTarih);
    var gunFarki = Math.abs((tarih2.getTime() - tarih1.getTime()) / 86400000);

    hcYfhSonucYaz({
        badge: hcYfhTamFormat(parca.yil),
        ana: parca.yil + ' yıl ' + parca.ay + ' ay ' + parca.gun + ' gün',
        ozet: 'Doğum tarihine göre kesin takvim farkı.',
        buyuk: tarih1.getTime() === tarih2.getTime() ? 'Aynı gün doğumlu' : (tarih1 < tarih2 ? '1. kişi' : '2. kişi'),
        kucuk: tarih1.getTime() === tarih2.getTime() ? 'Aynı gün doğumlu' : (tarih1 > tarih2 ? '1. kişi' : '2. kişi'),
        fark: parca.yil + ' yıl ' + parca.ay + ' ay ' + parca.gun + ' gün',
        ay: hcYfhTamFormat(gunFarki / 30.436875) + ' ay',
        gun: hcYfhTamFormat(gunFarki) + ' gün',
        hafta: hcYfhFormat(gunFarki / 7, 1) + ' hafta',
        yorum: gunFarki === 0 ? 'İki kişi aynı gün doğmuştur.' : 'Doğum tarihleri arasında toplam ' + hcYfhTamFormat(gunFarki) + ' gün fark vardır.'
    });
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[name="hc-yfh-yontem"]').forEach(function(input) {
        input.addEventListener('change', hcYfhPanelGuncelle);
    });

    hcYfhPanelGuncelle();
});
