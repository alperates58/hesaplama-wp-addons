var HC_YBH_BURCLAR = [
    { ad: 'Koç', sembol: '♈', element: 'Ateş', nitelik: 'Öncü', yorum: 'Dış dünyaya hızlı, doğrudan ve girişken bir enerjiyle yansırsınız.' },
    { ad: 'Boğa', sembol: '♉', element: 'Toprak', nitelik: 'Sabit', yorum: 'Sakin, güven veren ve istikrarlı bir ilk izlenim bırakırsınız.' },
    { ad: 'İkizler', sembol: '♊', element: 'Hava', nitelik: 'Değişken', yorum: 'Meraklı, konuşkan ve çevik bir ifade tarzınız öne çıkar.' },
    { ad: 'Yengeç', sembol: '♋', element: 'Su', nitelik: 'Öncü', yorum: 'Duyarlı, koruyucu ve sezgisel bir duruş sergilersiniz.' },
    { ad: 'Aslan', sembol: '♌', element: 'Ateş', nitelik: 'Sabit', yorum: 'Sıcak, özgüvenli ve görünür olmayı seven bir aura taşırsınız.' },
    { ad: 'Başak', sembol: '♍', element: 'Toprak', nitelik: 'Değişken', yorum: 'Dikkatli, düzenli ve fayda odaklı bir izlenim verirsiniz.' },
    { ad: 'Terazi', sembol: '♎', element: 'Hava', nitelik: 'Öncü', yorum: 'Nazik, dengeli ve ilişki kurmaya açık bir tavırla algılanırsınız.' },
    { ad: 'Akrep', sembol: '♏', element: 'Su', nitelik: 'Sabit', yorum: 'Yoğun, sezgisel ve güçlü bir manyetik etki bırakırsınız.' },
    { ad: 'Yay', sembol: '♐', element: 'Ateş', nitelik: 'Değişken', yorum: 'Neşeli, açık sözlü ve keşfetmeye hazır bir enerji taşırsınız.' },
    { ad: 'Oğlak', sembol: '♑', element: 'Toprak', nitelik: 'Öncü', yorum: 'Ciddi, hedefli ve sorumluluk sahibi bir duruş sergilersiniz.' },
    { ad: 'Kova', sembol: '♒', element: 'Hava', nitelik: 'Sabit', yorum: 'Özgün, mesafeli ve bağımsız bir ilk izlenim yaratabilirsiniz.' },
    { ad: 'Balık', sembol: '♓', element: 'Su', nitelik: 'Değişken', yorum: 'Yumuşak, empatik ve hayal gücü yüksek bir ifade biçiminiz vardır.' }
];

document.addEventListener('DOMContentLoaded', function() {
    var sehir = document.getElementById('hc-ybh-sehir');
    if (!sehir) return;
    sehir.addEventListener('change', hcYukselenBurcKonumDegistir);
});

function hcYukselenBurcKonumDegistir() {
    var sehir = document.getElementById('hc-ybh-sehir').value;
    var manuel = document.getElementById('hc-ybh-manuel');
    manuel.style.display = sehir === 'manual' ? 'block' : 'none';
}

function hcYbhNormalize(derece) {
    var sonuc = derece % 360;
    return sonuc < 0 ? sonuc + 360 : sonuc;
}

function hcYbhRad(derece) {
    return derece * Math.PI / 180;
}

function hcYbhDeg(radyan) {
    return radyan * 180 / Math.PI;
}

function hcYbhFormat(sayi, hane) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: hane,
        maximumFractionDigits: hane
    });
}

function hcYbhJulianDay(yil, ay, gun, saat, dakika, utcFarki) {
    var utcMs = Date.UTC(yil, ay - 1, gun, saat, dakika, 0) - utcFarki * 60 * 60 * 1000;
    return utcMs / 86400000 + 2440587.5;
}

function hcYbhGmst(jd) {
    var t = (jd - 2451545.0) / 36525;
    return hcYbhNormalize(
        280.46061837 +
        360.98564736629 * (jd - 2451545.0) +
        0.000387933 * t * t -
        (t * t * t) / 38710000
    );
}

function hcYbhAscendant(lst, enlem) {
    var theta = hcYbhRad(lst);
    var phi = hcYbhRad(enlem);
    var eps = hcYbhRad(23.4392911);

    var a = Math.cos(phi) * Math.cos(theta);
    var b = Math.cos(eps) * Math.cos(phi) * Math.sin(theta) + Math.sin(eps) * Math.sin(phi);
    var aday = hcYbhNormalize(hcYbhDeg(Math.atan2(-a, b)));
    var diger = hcYbhNormalize(aday + 180);

    function doguUfku(derece) {
        var lambda = hcYbhRad(derece);
        return -Math.cos(lambda) * Math.sin(theta) + Math.sin(lambda) * Math.cos(eps) * Math.cos(theta);
    }

    return doguUfku(aday) > doguUfku(diger) ? aday : diger;
}

function hcYukselenBurcHesapla() {
    var tarih = document.getElementById('hc-ybh-tarih').value;
    var saat = document.getElementById('hc-ybh-saat').value;
    var sehir = document.getElementById('hc-ybh-sehir').value;
    var utcFarki = parseFloat(document.getElementById('hc-ybh-utc').value);

    if (!tarih || !saat || !sehir || isNaN(utcFarki)) {
        alert('Lütfen doğum tarihi, saati, yeri ve UTC farkını girin.');
        return;
    }

    var enlem;
    var boylam;

    if (sehir === 'manual') {
        enlem = parseFloat(document.getElementById('hc-ybh-enlem').value);
        boylam = parseFloat(document.getElementById('hc-ybh-boylam').value);
    } else {
        var parcalar = sehir.split(',');
        enlem = parseFloat(parcalar[0]);
        boylam = parseFloat(parcalar[1]);
    }

    if (isNaN(enlem) || isNaN(boylam)) {
        alert('Lütfen geçerli enlem ve boylam değerleri girin.');
        return;
    }

    if (enlem < -66 || enlem > 66 || boylam < -180 || boylam > 180) {
        alert('Enlem -66 ile 66, boylam -180 ile 180 derece arasında olmalıdır.');
        return;
    }

    var tarihParca = tarih.split('-');
    var saatParca = saat.split(':');
    var yil = parseInt(tarihParca[0], 10);
    var ay = parseInt(tarihParca[1], 10);
    var gun = parseInt(tarihParca[2], 10);
    var saatDegeri = parseInt(saatParca[0], 10);
    var dakika = parseInt(saatParca[1], 10);

    var jd = hcYbhJulianDay(yil, ay, gun, saatDegeri, dakika, utcFarki);
    var gmst = hcYbhGmst(jd);
    var lst = hcYbhNormalize(gmst + boylam);
    var yukselenDerece = hcYbhAscendant(lst, enlem);
    var burcIndex = Math.floor(yukselenDerece / 30);
    var burcIciDerece = yukselenDerece - burcIndex * 30;
    var burc = HC_YBH_BURCLAR[burcIndex];

    document.getElementById('hc-ybh-sembol').textContent = burc.sembol;
    document.getElementById('hc-ybh-burc').textContent = burc.ad;
    document.getElementById('hc-ybh-derece').textContent = hcYbhFormat(burcIciDerece, 2) + '° ' + burc.ad;
    document.getElementById('hc-ybh-element').textContent = burc.element;
    document.getElementById('hc-ybh-nitelik').textContent = burc.nitelik;
    document.getElementById('hc-ybh-lst').textContent = hcYbhFormat(lst, 2) + '°';
    document.getElementById('hc-ybh-yorum').textContent = burc.yorum;

    var uyari = '';
    if (burcIciDerece < 1 || burcIciDerece > 29) {
        uyari = 'Sonuç burç sınırına yakın. Doğum saati birkaç dakika farklıysa yükselen burç değişebilir.';
    }
    document.getElementById('hc-ybh-uyari').textContent = uyari;
    document.getElementById('hc-ybh-uyari').style.display = uyari ? 'block' : 'none';

    document.getElementById('hc-ybh-result').classList.add('visible');
}
