var hcGeriSayimEtkinlikleri = {
    'yilbasi': { ad: 'Yılbaşı', ay: 1, gun: 1, kategori: 'Resmi tatil', not: 'Her yıl 1 Ocak tarihinde kutlanır.' },
    'ramazan-bayrami-2026': { ad: 'Ramazan Bayramı 2026', tarih: '2026-03-20', kategori: 'Dini bayram', not: '2026 için ilk bayram günü esas alınmıştır.' },
    'ulusal-egemenlik': { ad: '23 Nisan Ulusal Egemenlik ve Çocuk Bayramı', ay: 4, gun: 23, kategori: 'Resmi tatil', not: 'Her yıl 23 Nisan tarihinde kutlanır.' },
    'emek-dayanisma': { ad: '1 Mayıs Emek ve Dayanışma Günü', ay: 5, gun: 1, kategori: 'Resmi tatil', not: 'Her yıl 1 Mayıs tarihinde kutlanır.' },
    'genclik-spor': { ad: "19 Mayıs Atatürk'ü Anma, Gençlik ve Spor Bayramı", ay: 5, gun: 19, kategori: 'Resmi tatil', not: 'Her yıl 19 Mayıs tarihinde kutlanır.' },
    'kurban-bayrami-2026': { ad: 'Kurban Bayramı 2026', tarih: '2026-05-27', kategori: 'Dini bayram', not: '2026 için ilk bayram günü esas alınmıştır.' },
    'demokrasi-birlik': { ad: '15 Temmuz Demokrasi ve Milli Birlik Günü', ay: 7, gun: 15, kategori: 'Resmi tatil', not: 'Her yıl 15 Temmuz tarihinde anılır.' },
    'zafer-bayrami': { ad: '30 Ağustos Zafer Bayramı', ay: 8, gun: 30, kategori: 'Resmi tatil', not: 'Her yıl 30 Ağustos tarihinde kutlanır.' },
    'cumhuriyet-bayrami': { ad: '29 Ekim Cumhuriyet Bayramı', ay: 10, gun: 29, kategori: 'Resmi tatil', not: 'Her yıl 29 Ekim tarihinde kutlanır.' },
    'on-kasim': { ad: "10 Kasım Atatürk'ü Anma Günü", ay: 11, gun: 10, kategori: 'Önemli gün', not: 'Her yıl 10 Kasım tarihinde anılır.' },
    'ogretmenler-gunu': { ad: '24 Kasım Öğretmenler Günü', ay: 11, gun: 24, kategori: 'Önemli gün', not: 'Her yıl 24 Kasım tarihinde kutlanır.' },
    'msu-2026': { ad: '2026-MSÜ', tarih: '2026-03-01T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'ales-1-2026': { ad: '2026-ALES/1', tarih: '2026-05-10T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'yks-tyt-2026': { ad: '2026-YKS TYT', tarih: '2026-06-20T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'yks-ayt-2026': { ad: '2026-YKS AYT', tarih: '2026-06-21T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'yks-ydt-2026': { ad: '2026-YKS YDT', tarih: '2026-06-21T15:45:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'dgs-2026': { ad: '2026-DGS', tarih: '2026-07-19T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'ales-2-2026': { ad: '2026-ALES/2', tarih: '2026-07-26T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'kpss-lisans-2026': { ad: '2026-KPSS Lisans GY-GK', tarih: '2026-09-06T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'kpss-alan-1-2026': { ad: '2026-KPSS Lisans Alan Bilgisi 1. gün', tarih: '2026-09-12T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'kpss-alan-2-2026': { ad: '2026-KPSS Lisans Alan Bilgisi 2. gün', tarih: '2026-09-13T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'kpss-onlisans-2026': { ad: '2026-KPSS Ön Lisans', tarih: '2026-10-04T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'kpss-ortaogretim-2026': { ad: '2026-KPSS Ortaöğretim', tarih: '2026-10-25T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' },
    'ales-3-2026': { ad: '2026-ALES/3', tarih: '2026-11-29T10:15:00', kategori: 'ÖSYM sınavı', not: 'ÖSYM takvimindeki sınav tarihi esas alınmıştır.' }
};

function hcGeriSayimEtkinlikDegisti() {
    var secim = document.getElementById('hc-geri-sayim-etkinlik').value;
    var ozelAlan = document.getElementById('hc-geri-sayim-ozel-alan');
    var yilAlani = document.getElementById('hc-geri-sayim-yil');

    ozelAlan.style.display = secim === 'ozel' ? 'grid' : 'none';
    yilAlani.disabled = secim.indexOf('-2026') !== -1;
}

function hcGeriSayimHesapla() {
    var secim = document.getElementById('hc-geri-sayim-etkinlik').value;
    var yil = parseInt(document.getElementById('hc-geri-sayim-yil').value, 10);

    if (!secim) {
        alert('Lütfen bir önemli gün, sınav veya özel tarih seçin.');
        return;
    }

    var hedef = hcGeriSayimHedefiniBul(secim, yil);
    if (!hedef) {
        return;
    }

    var simdi = new Date();
    var fark = hedef.tarih.getTime() - simdi.getTime();
    var gecmis = fark < 0;
    var mutlakFark = Math.abs(fark);
    var toplamDakika = Math.floor(mutlakFark / 60000);
    var gun = Math.floor(toplamDakika / 1440);
    var saat = Math.floor((toplamDakika % 1440) / 60);
    var dakika = toplamDakika % 60;

    document.getElementById('hc-geri-sayim-kategori').textContent = hedef.kategori;
    document.getElementById('hc-geri-sayim-baslik').textContent = hedef.ad;
    document.getElementById('hc-geri-sayim-tarih').textContent = hcGeriSayimTarihFormatla(hedef.tarih);
    document.getElementById('hc-geri-sayim-gun').textContent = gun.toLocaleString('tr-TR');
    document.getElementById('hc-geri-sayim-saat').textContent = saat.toLocaleString('tr-TR');
    document.getElementById('hc-geri-sayim-dakika').textContent = dakika.toLocaleString('tr-TR');
    document.getElementById('hc-geri-sayim-yorum').textContent = gecmis ? 'Bu tarih geçeli ' + gun.toLocaleString('tr-TR') + ' gün oldu.' : 'Bu tarihe ' + gun.toLocaleString('tr-TR') + ' gün kaldı.';
    document.getElementById('hc-geri-sayim-not').textContent = hedef.not || '';
    document.getElementById('hc-geri-sayim-result').classList.add('visible');
}

function hcGeriSayimHedefiniBul(secim, yil) {
    if (secim === 'ozel') {
        var ad = document.getElementById('hc-geri-sayim-ozel-ad').value.trim();
        var tarihDegeri = document.getElementById('hc-geri-sayim-ozel-tarih').value;

        if (!ad || !tarihDegeri) {
            alert('Lütfen özel tarih adını ve tarih alanını doldurun.');
            return null;
        }

        return {
            ad: ad,
            tarih: hcGeriSayimTarihOlustur(tarihDegeri),
            kategori: 'Özel tarih',
            not: 'Hesaplama seçtiğiniz özel tarihe göre yapılmıştır.'
        };
    }

    var etkinlik = hcGeriSayimEtkinlikleri[secim];
    if (!etkinlik) {
        alert('Seçilen etkinlik bulunamadı.');
        return null;
    }

    if (etkinlik.tarih) {
        return {
            ad: etkinlik.ad,
            tarih: hcGeriSayimTarihOlustur(etkinlik.tarih),
            kategori: etkinlik.kategori,
            not: etkinlik.not
        };
    }

    if (!yil || yil < 2026 || yil > 2100) {
        alert('Lütfen 2026 ile 2100 arasında geçerli bir yıl girin.');
        return null;
    }

    return {
        ad: etkinlik.ad,
        tarih: new Date(yil, etkinlik.ay - 1, etkinlik.gun, 0, 0, 0),
        kategori: etkinlik.kategori,
        not: etkinlik.not
    };
}

function hcGeriSayimTarihOlustur(deger) {
    if (deger.indexOf('T') === -1) {
        return new Date(deger + 'T00:00:00');
    }

    return new Date(deger);
}

function hcGeriSayimTarihFormatla(tarih) {
    return tarih.toLocaleString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var yilAlani = document.getElementById('hc-geri-sayim-yil');
    if (yilAlani && !yilAlani.value) {
        yilAlani.value = new Date().getFullYear();
    }
    hcGeriSayimEtkinlikDegisti();
});
