function hcIshPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcIshFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcIshTarihOku(tarihId, saatId) {
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

function hcIshInputTarih(date) {
    return date.getFullYear() + '-' + hcIshPad(date.getMonth() + 1) + '-' + hcIshPad(date.getDate());
}

function hcIshInputSaat(date) {
    return hcIshPad(date.getHours()) + ':' + hcIshPad(date.getMinutes());
}

function hcIshTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcIshYilAyGunFarki(baslangic, bitis) {
    var yil = bitis.getFullYear() - baslangic.getFullYear();
    var ay = bitis.getMonth() - baslangic.getMonth();
    var gun = bitis.getDate() - baslangic.getDate();

    if (gun < 0) {
        ay -= 1;
        gun += new Date(bitis.getFullYear(), bitis.getMonth(), 0).getDate();
    }

    if (ay < 0) {
        yil -= 1;
        ay += 12;
    }

    return { yil: yil, ay: ay, gun: gun };
}

function hcIshYildonumu(baslangic, bitis) {
    var son = new Date(bitis.getFullYear(), baslangic.getMonth(), baslangic.getDate(), baslangic.getHours(), baslangic.getMinutes(), 0);

    if (son > bitis) {
        son.setFullYear(son.getFullYear() - 1);
    }

    var sonraki = new Date(son);
    sonraki.setFullYear(sonraki.getFullYear() + 1);

    return { son: son, sonraki: sonraki };
}

function hcIliskiSuresiHesapla() {
    var baslangic = hcIshTarihOku('hc-ish-baslangic', 'hc-ish-saat');
    var bitis = hcIshTarihOku('hc-ish-bugun', 'hc-ish-bugun-saat');

    if (!baslangic || !bitis) {
        alert('Lütfen başlangıç tarihi ve bugünün tarihini seçin.');
        return;
    }

    if (baslangic >= bitis) {
        alert('Başlangıç tarihi bugünden önce olmalıdır.');
        return;
    }

    var ms = bitis.getTime() - baslangic.getTime();
    var toplamSaniye = Math.floor(ms / 1000);
    var toplamDakika = Math.floor(toplamSaniye / 60);
    var toplamSaat = Math.floor(toplamDakika / 60);
    var toplamGun = Math.floor(toplamSaat / 24);
    var toplamAy = Math.floor(toplamGun / 30.436875);
    var toplamYil = Math.floor(toplamGun / 365.2425);
    var parca = hcIshYilAyGunFarki(baslangic, bitis);
    var yildonumu = hcIshYildonumu(baslangic, bitis);
    var kalanGun = Math.ceil((yildonumu.sonraki.getTime() - bitis.getTime()) / 86400000);

    document.getElementById('hc-ish-badge').textContent = hcIshFormat(toplamGun);
    document.getElementById('hc-ish-ana-sonuc').textContent = parca.yil + ' yıl ' + parca.ay + ' ay ' + parca.gun + ' gün';
    document.getElementById('hc-ish-ozet').textContent = 'Başlangıçtan bugüne geçen takvim süresi.';
    document.getElementById('hc-ish-yil').textContent = hcIshFormat(toplamYil) + ' yıl';
    document.getElementById('hc-ish-ay').textContent = hcIshFormat(toplamAy) + ' ay';
    document.getElementById('hc-ish-gun').textContent = hcIshFormat(toplamGun) + ' gün';
    document.getElementById('hc-ish-saat-sonuc').textContent = hcIshFormat(toplamSaat) + ' saat';
    document.getElementById('hc-ish-dakika').textContent = hcIshFormat(toplamDakika) + ' dakika';
    document.getElementById('hc-ish-saniye').textContent = hcIshFormat(toplamSaniye) + ' saniye';
    document.getElementById('hc-ish-son-yildonumu').textContent = hcIshTarihFormatla(yildonumu.son);
    document.getElementById('hc-ish-sonraki-yildonumu').textContent = hcIshTarihFormatla(yildonumu.sonraki);
    document.getElementById('hc-ish-kalan').textContent = hcIshFormat(kalanGun) + ' gün';
    document.getElementById('hc-ish-yorum').textContent = 'İlişkiniz toplam ' + hcIshFormat(toplamGun) + ' günü geride bırakmış. Bir sonraki yıl dönümüne ' + hcIshFormat(kalanGun) + ' gün kaldı.';
    document.getElementById('hc-ish-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var bugun = new Date();
    var bugunInput = document.getElementById('hc-ish-bugun');
    var bugunSaatInput = document.getElementById('hc-ish-bugun-saat');

    if (bugunInput && !bugunInput.value) {
        bugunInput.value = hcIshInputTarih(bugun);
    }

    if (bugunSaatInput && !bugunSaatInput.value) {
        bugunSaatInput.value = hcIshInputSaat(bugun);
    }
});
