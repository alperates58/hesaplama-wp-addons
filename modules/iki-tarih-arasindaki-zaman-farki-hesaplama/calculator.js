function hcItfPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcItfFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcItfOndalikFormat(sayi) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function hcItfTarihOku(tarihId, saatId) {
    var tarih = document.getElementById(tarihId).value;
    var saat = document.getElementById(saatId).value || '00:00';

    if (!tarih) {
        return null;
    }

    var tarihParca = tarih.split('-');
    var saatParca = saat.split(':');

    return new Date(
        parseInt(tarihParca[0], 10),
        parseInt(tarihParca[1], 10) - 1,
        parseInt(tarihParca[2], 10),
        parseInt(saatParca[0], 10),
        parseInt(saatParca[1], 10),
        0
    );
}

function hcItfInputTarih(date) {
    return date.getFullYear() + '-' + hcItfPad(date.getMonth() + 1) + '-' + hcItfPad(date.getDate());
}

function hcItfGunAdi(date) {
    return date.toLocaleDateString('tr-TR', { weekday: 'long' });
}

function hcItfTakvimFarki(onceki, sonraki) {
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

function hcItfSaatDakikaFarki(onceki, sonraki) {
    var oncekiGun = new Date(onceki.getFullYear(), onceki.getMonth(), onceki.getDate(), 0, 0, 0);
    var sonrakiGun = new Date(sonraki.getFullYear(), sonraki.getMonth(), sonraki.getDate(), 0, 0, 0);
    var saatDakikaMs = (sonraki.getTime() - sonrakiGun.getTime()) - (onceki.getTime() - oncekiGun.getTime());

    if (saatDakikaMs < 0) {
        saatDakikaMs += 86400000;
    }

    var toplamDakika = Math.floor(saatDakikaMs / 60000);
    return {
        saat: Math.floor(toplamDakika / 60),
        dakika: toplamDakika % 60
    };
}

function hcIkiTarihArasindakiZamanFarkiHesapla() {
    var baslangic = hcItfTarihOku('hc-itf-baslangic', 'hc-itf-baslangic-saat');
    var bitis = hcItfTarihOku('hc-itf-bitis', 'hc-itf-bitis-saat');

    if (!baslangic || !bitis) {
        alert('Lütfen başlangıç ve bitiş tarihlerini seçin.');
        return;
    }

    var yon = baslangic <= bitis ? 'ileri' : 'geri';
    var onceki = baslangic <= bitis ? baslangic : bitis;
    var sonraki = baslangic <= bitis ? bitis : baslangic;
    var ms = sonraki.getTime() - onceki.getTime();
    var toplamSaniye = Math.floor(ms / 1000);
    var toplamDakika = Math.floor(toplamSaniye / 60);
    var toplamSaat = Math.floor(toplamDakika / 60);
    var toplamGun = Math.floor(toplamSaat / 24);
    var toplamHafta = toplamGun / 7;
    var takvim = hcItfTakvimFarki(onceki, sonraki);
    var saatDakika = hcItfSaatDakikaFarki(onceki, sonraki);

    document.getElementById('hc-itf-badge').textContent = hcItfFormat(toplamGun);
    document.getElementById('hc-itf-ana-sonuc').textContent = takvim.yil + ' yıl ' + takvim.ay + ' ay ' + takvim.gun + ' gün';
    document.getElementById('hc-itf-ozet').textContent = saatDakika.saat + ' saat ' + saatDakika.dakika + ' dakika ek süreyle.';
    document.getElementById('hc-itf-yil').textContent = hcItfFormat(takvim.yil) + ' yıl';
    document.getElementById('hc-itf-ay').textContent = hcItfFormat(takvim.ay) + ' ay';
    document.getElementById('hc-itf-gun').textContent = hcItfFormat(takvim.gun) + ' gün';
    document.getElementById('hc-itf-hafta').textContent = hcItfOndalikFormat(toplamHafta) + ' hafta';
    document.getElementById('hc-itf-toplam-gun').textContent = hcItfFormat(toplamGun) + ' gün';
    document.getElementById('hc-itf-saat').textContent = hcItfFormat(toplamSaat) + ' saat';
    document.getElementById('hc-itf-dakika').textContent = hcItfFormat(toplamDakika) + ' dakika';
    document.getElementById('hc-itf-saniye').textContent = hcItfFormat(toplamSaniye) + ' saniye';
    document.getElementById('hc-itf-baslangic-gun').textContent = hcItfGunAdi(baslangic);
    document.getElementById('hc-itf-bitis-gun').textContent = hcItfGunAdi(bitis);
    document.getElementById('hc-itf-yon').textContent = yon === 'ileri' ? 'Başlangıçtan bitişe' : 'Bitiş tarihi başlangıçtan önce';
    document.getElementById('hc-itf-yorum').textContent = 'İki tarih arasında toplam ' + hcItfFormat(toplamGun) + ' gün, yani yaklaşık ' + hcItfOndalikFormat(toplamHafta) + ' hafta fark vardır.';
    document.getElementById('hc-itf-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var bugun = new Date();
    var baslangic = document.getElementById('hc-itf-baslangic');
    var bitis = document.getElementById('hc-itf-bitis');

    if (baslangic && !baslangic.value) {
        var onceki = new Date(bugun);
        onceki.setDate(onceki.getDate() - 7);
        baslangic.value = hcItfInputTarih(onceki);
    }

    if (bitis && !bitis.value) {
        bitis.value = hcItfInputTarih(bugun);
    }
});
