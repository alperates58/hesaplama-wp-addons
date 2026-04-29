function hcDghPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcDghFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcDghOndalikFormat(sayi) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function hcDghTarihOku(id) {
    var deger = document.getElementById(id).value;

    if (!deger) {
        return null;
    }

    var parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcDghInputTarih(date) {
    return date.getFullYear() + '-' + hcDghPad(date.getMonth() + 1) + '-' + hcDghPad(date.getDate());
}

function hcDghTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcDghGunAdi(date) {
    return date.toLocaleDateString('tr-TR', { weekday: 'long' });
}

function hcDghYilAyGunFarki(dogum, hesaplama) {
    var yil = hesaplama.getFullYear() - dogum.getFullYear();
    var ay = hesaplama.getMonth() - dogum.getMonth();
    var gun = hesaplama.getDate() - dogum.getDate();

    if (gun < 0) {
        ay -= 1;
        gun += new Date(hesaplama.getFullYear(), hesaplama.getMonth(), 0).getDate();
    }

    if (ay < 0) {
        yil -= 1;
        ay += 12;
    }

    return { yil: yil, ay: ay, gun: gun };
}

function hcDghSonrakiDogumGunu(dogum, hesaplama) {
    var sonraki = new Date(hesaplama.getFullYear(), dogum.getMonth(), dogum.getDate(), 0, 0, 0);

    if (sonraki < hesaplama) {
        sonraki.setFullYear(sonraki.getFullYear() + 1);
    }

    return sonraki;
}

function hcDogumGunuHesapla() {
    var dogum = hcDghTarihOku('hc-dgh-dogum');
    var hesaplama = hcDghTarihOku('hc-dgh-hesaplama');

    if (!dogum || !hesaplama) {
        alert('Lütfen doğum tarihi ve hesaplama tarihini seçin.');
        return;
    }

    if (dogum > hesaplama) {
        alert('Doğum tarihi hesaplama tarihinden sonra olamaz.');
        return;
    }

    var ms = hesaplama.getTime() - dogum.getTime();
    var toplamSaniye = Math.floor(ms / 1000);
    var toplamDakika = Math.floor(toplamSaniye / 60);
    var toplamSaat = Math.floor(toplamDakika / 60);
    var toplamGun = Math.floor(toplamSaat / 24);
    var toplamHafta = toplamGun / 7;
    var toplamAy = Math.floor(toplamGun / 30.436875);
    var toplamYil = Math.floor(toplamGun / 365.2425);
    var parca = hcDghYilAyGunFarki(dogum, hesaplama);
    var sonraki = hcDghSonrakiDogumGunu(dogum, hesaplama);
    var kalanGun = Math.ceil((sonraki.getTime() - hesaplama.getTime()) / 86400000);
    var yeniYas = sonraki.getFullYear() - dogum.getFullYear();

    document.getElementById('hc-dgh-badge').textContent = hcDghFormat(parca.yil);
    document.getElementById('hc-dgh-ana-sonuc').textContent = parca.yil + ' yıl ' + parca.ay + ' ay ' + parca.gun + ' gün';
    document.getElementById('hc-dgh-ozet').textContent = 'Hesaplama tarihindeki takvim yaşınız.';
    document.getElementById('hc-dgh-yil').textContent = hcDghFormat(toplamYil) + ' yıl';
    document.getElementById('hc-dgh-ay').textContent = hcDghFormat(toplamAy) + ' ay';
    document.getElementById('hc-dgh-hafta').textContent = hcDghOndalikFormat(toplamHafta) + ' hafta';
    document.getElementById('hc-dgh-gun').textContent = hcDghFormat(toplamGun) + ' gün';
    document.getElementById('hc-dgh-saat').textContent = hcDghFormat(toplamSaat) + ' saat';
    document.getElementById('hc-dgh-dakika').textContent = hcDghFormat(toplamDakika) + ' dakika';
    document.getElementById('hc-dgh-saniye').textContent = hcDghFormat(toplamSaniye) + ' saniye';
    document.getElementById('hc-dgh-dogulan-gun').textContent = hcDghGunAdi(dogum);
    document.getElementById('hc-dgh-sonraki').textContent = hcDghTarihFormatla(sonraki);
    document.getElementById('hc-dgh-kalan').textContent = kalanGun === 0 ? 'Bugün' : hcDghFormat(kalanGun) + ' gün';
    document.getElementById('hc-dgh-yeni-yas').textContent = hcDghFormat(yeniYas) + ' yaş';
    document.getElementById('hc-dgh-yorum').textContent = kalanGun === 0
        ? 'Bugün doğum gününüz. Nice mutlu yıllar!'
        : 'Bir sonraki doğum gününüz ' + hcDghGunAdi(sonraki) + ' günü. Yeni yaşınıza ' + hcDghFormat(kalanGun) + ' gün kaldı.';
    document.getElementById('hc-dgh-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var hesaplama = document.getElementById('hc-dgh-hesaplama');

    if (hesaplama && !hesaplama.value) {
        hesaplama.value = hcDghInputTarih(new Date());
    }
});
