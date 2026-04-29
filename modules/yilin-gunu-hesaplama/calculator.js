function hcYgPad(sayi) {
    return String(sayi).padStart(2, '0');
}

function hcYgFormat(sayi) {
    return sayi.toLocaleString('tr-TR');
}

function hcYgArtikYilMi(yil) {
    return (yil % 4 === 0 && yil % 100 !== 0) || yil % 400 === 0;
}

function hcYgYilGunSayisi(yil) {
    return hcYgArtikYilMi(yil) ? 366 : 365;
}

function hcYgTarihOku(id) {
    var deger = document.getElementById(id).value;

    if (!deger) {
        return null;
    }

    var parca = deger.split('-');
    return new Date(parseInt(parca[0], 10), parseInt(parca[1], 10) - 1, parseInt(parca[2], 10), 0, 0, 0);
}

function hcYgInputTarih(date) {
    return date.getFullYear() + '-' + hcYgPad(date.getMonth() + 1) + '-' + hcYgPad(date.getDate());
}

function hcYgTarihFormatla(date) {
    return date.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcYgGunAdi(date) {
    return date.toLocaleDateString('tr-TR', { weekday: 'long' });
}

function hcYgYilinGunu(date) {
    var baslangic = new Date(date.getFullYear(), 0, 1, 0, 0, 0);
    return Math.floor((date.getTime() - baslangic.getTime()) / 86400000) + 1;
}

function hcYgHaftaNo(date) {
    return Math.floor((hcYgYilinGunu(date) - 1) / 7) + 1;
}

function hcYgTarihAlanlariniDoldur(prefix, date) {
    var gunNo = hcYgYilinGunu(date);
    var yilGunSayisi = hcYgYilGunSayisi(date.getFullYear());
    var kalan = yilGunSayisi - gunNo;

    document.getElementById(prefix + '-gun').value = hcYgFormat(gunNo);
    document.getElementById(prefix + '-kalan').value = hcYgFormat(kalan);
    document.getElementById(prefix + '-bilgi').value = date.getFullYear() + ' ' + (hcYgArtikYilMi(date.getFullYear()) ? 'artık yıl' : 'normal yıl') + ' - ' + hcYgGunAdi(date);
}

function hcYilinGunuHesapla() {
    var bugun = hcYgTarihOku('hc-yg-bugun');
    var secilen = hcYgTarihOku('hc-yg-tarih');
    var gunNo = parseInt(document.getElementById('hc-yg-gun-no').value, 10);
    var yil = parseInt(document.getElementById('hc-yg-yil').value, 10);

    if (!bugun) {
        alert('Lütfen bugünün tarihini seçin.');
        return;
    }

    var bugunGunNo = hcYgYilinGunu(bugun);
    var bugunYilGunSayisi = hcYgYilGunSayisi(bugun.getFullYear());

    document.getElementById('hc-yg-bugun-gun').value = hcYgFormat(bugunGunNo);
    document.getElementById('hc-yg-bugun-kalan').value = hcYgFormat(bugunYilGunSayisi - bugunGunNo);
    document.getElementById('hc-yg-bugun-hafta').value = hcYgFormat(hcYgHaftaNo(bugun));

    if (secilen) {
        hcYgTarihAlanlariniDoldur('hc-yg-tarih', secilen);
    } else {
        document.getElementById('hc-yg-tarih-gun').value = '';
        document.getElementById('hc-yg-tarih-kalan').value = '';
        document.getElementById('hc-yg-tarih-bilgi').value = '';
    }

    if (!isNaN(gunNo) || !isNaN(yil)) {
        if (isNaN(gunNo) || isNaN(yil)) {
            alert('Gün numarasından tarih bulmak için hem gün numarası hem yıl girin.');
            return;
        }

        if (yil < 1 || yil > 9999) {
            alert('Lütfen geçerli bir yıl girin.');
            return;
        }

        var yilGunSayisi = hcYgYilGunSayisi(yil);
        if (gunNo < 1 || gunNo > yilGunSayisi) {
            alert('Seçilen yıl için gün numarası 1 ile ' + yilGunSayisi + ' arasında olmalıdır.');
            return;
        }

        var sonucTarih = new Date(yil, 0, gunNo, 0, 0, 0);
        document.getElementById('hc-yg-sonuc-tarih').value = hcYgTarihFormatla(sonucTarih);
        document.getElementById('hc-yg-sonuc-gun').value = hcYgGunAdi(sonucTarih);
    } else {
        document.getElementById('hc-yg-sonuc-tarih').value = '';
        document.getElementById('hc-yg-sonuc-gun').value = '';
    }

    document.getElementById('hc-yg-badge').textContent = hcYgFormat(bugunGunNo);
    document.getElementById('hc-yg-ana-sonuc').textContent = 'Bugün yılın ' + hcYgFormat(bugunGunNo) + '. günü';
    document.getElementById('hc-yg-ozet').textContent = bugun.getFullYear() + ' yılının bitmesine ' + hcYgFormat(bugunYilGunSayisi - bugunGunNo) + ' gün kaldı.';
    document.getElementById('hc-yg-yorum').textContent = bugun.getFullYear() + (hcYgArtikYilMi(bugun.getFullYear()) ? ' artık yıldır ve 366 gün sürer.' : ' normal yıldır ve 365 gün sürer.');
    document.getElementById('hc-yg-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var bugun = new Date();
    var bugunInput = document.getElementById('hc-yg-bugun');
    var yilInput = document.getElementById('hc-yg-yil');

    if (bugunInput && !bugunInput.value) {
        bugunInput.value = hcYgInputTarih(bugun);
    }

    if (yilInput && !yilInput.value) {
        yilInput.value = bugun.getFullYear();
    }

    hcYilinGunuHesapla();
});
