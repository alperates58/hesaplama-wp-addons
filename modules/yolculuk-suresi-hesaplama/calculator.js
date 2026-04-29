function hcYshFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcYshTamFormat(sayi) {
    return Math.round(sayi).toLocaleString('tr-TR');
}

function hcYshSureFormat(dakika) {
    var toplam = Math.round(dakika);
    var gun = Math.floor(toplam / 1440);
    var kalan = toplam % 1440;
    var saat = Math.floor(kalan / 60);
    var dk = kalan % 60;
    var parcalar = [];

    if (gun > 0) parcalar.push(gun.toLocaleString('tr-TR') + ' gün');
    if (saat > 0) parcalar.push(saat.toLocaleString('tr-TR') + ' saat');
    if (dk > 0 || parcalar.length === 0) parcalar.push(dk.toLocaleString('tr-TR') + ' dakika');

    return parcalar.join(' ');
}

function hcYshVarisFormat(toplamDakika) {
    var tarih = new Date();
    tarih.setMinutes(tarih.getMinutes() + Math.round(toplamDakika));

    return tarih.toLocaleString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

function hcYolculukSuresiHesapla() {
    var mesafe = parseFloat(document.getElementById('hc-ysh-mesafe').value);
    var hiz = parseFloat(document.getElementById('hc-ysh-hiz').value);
    var mola = parseFloat(document.getElementById('hc-ysh-mola').value);
    var tuketim = parseFloat(document.getElementById('hc-ysh-tuketim').value);
    var fiyat = parseFloat(document.getElementById('hc-ysh-fiyat').value);
    var yolcu = parseInt(document.getElementById('hc-ysh-yolcu').value, 10);

    if (isNaN(mesafe) || isNaN(hiz)) {
        alert('Lütfen mesafe ve ortalama hız alanlarını doldurun.');
        return;
    }

    if (isNaN(mola)) {
        mola = 0;
    }

    if (mesafe <= 0 || mesafe > 20000 || hiz <= 0 || hiz > 300 || mola < 0 || mola > 3000) {
        alert('Lütfen mesafe, hız ve mola için gerçekçi değerler girin.');
        return;
    }

    if ((!isNaN(tuketim) && (tuketim < 0 || tuketim > 50)) || (!isNaN(fiyat) && (fiyat < 0 || fiyat > 500))) {
        alert('Lütfen yakıt tüketimi ve yakıt fiyatı için gerçekçi değerler girin.');
        return;
    }

    if (!isNaN(yolcu) && (yolcu < 1 || yolcu > 100)) {
        alert('Lütfen yolcu sayısını 1-100 arasında girin.');
        return;
    }

    var surusDakika = (mesafe / hiz) * 60;
    var toplamDakika = surusDakika + mola;
    var yuzKmDakika = (100 / hiz) * 60;
    var efektifHiz = mesafe / (toplamDakika / 60);
    var yakit = !isNaN(tuketim) ? (mesafe * tuketim / 100) : null;
    var maliyet = yakit !== null && !isNaN(fiyat) ? yakit * fiyat : null;
    var kisiMaliyet = maliyet !== null && !isNaN(yolcu) ? maliyet / yolcu : null;

    document.getElementById('hc-ysh-badge').textContent = hcYshTamFormat(toplamDakika);
    document.getElementById('hc-ysh-toplam-sure').textContent = hcYshSureFormat(toplamDakika);
    document.getElementById('hc-ysh-ozet').textContent = 'Mola dahil toplam yolculuk süresi.';
    document.getElementById('hc-ysh-surus').textContent = hcYshSureFormat(surusDakika);
    document.getElementById('hc-ysh-mola-sonuc').textContent = hcYshSureFormat(mola);
    document.getElementById('hc-ysh-dakika').textContent = hcYshTamFormat(toplamDakika) + ' dakika';
    document.getElementById('hc-ysh-tempo').textContent = hcYshFormat(efektifHiz, 1) + ' km/sa';
    document.getElementById('hc-ysh-varis').textContent = hcYshVarisFormat(toplamDakika);
    document.getElementById('hc-ysh-yuz-km').textContent = hcYshSureFormat(yuzKmDakika);
    document.getElementById('hc-ysh-yakit').textContent = yakit === null ? 'Girilmeyen veri' : hcYshFormat(yakit, 2) + ' L';
    document.getElementById('hc-ysh-maliyet').textContent = maliyet === null ? 'Girilmeyen veri' : hcYshFormat(maliyet, 2) + ' TL';
    document.getElementById('hc-ysh-kisi').textContent = kisiMaliyet === null ? 'Girilmeyen veri' : hcYshFormat(kisiMaliyet, 2) + ' TL/kişi';
    document.getElementById('hc-ysh-yorum').textContent = 'Bu hesaplama trafik, yol çalışması, hava koşulu ve bekleme sürelerini içermez. Uzun yolculuklarda düzenli mola vermeyi planlayın.';
    document.getElementById('hc-ysh-result').classList.add('visible');
}
