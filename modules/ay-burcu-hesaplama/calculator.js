var HC_ABH_BURCLAR = [
    { ad: 'Koç', sembol: '♈', element: 'Ateş', nitelik: 'Öncü', yorum: 'Duygular hızlı, doğrudan ve cesur biçimde görünür olur.' },
    { ad: 'Boğa', sembol: '♉', element: 'Toprak', nitelik: 'Sabit', yorum: 'Duygusal güven, huzur ve istikrar ihtiyacı belirgindir.' },
    { ad: 'İkizler', sembol: '♊', element: 'Hava', nitelik: 'Değişken', yorum: 'Duygular zihinsel hareketlilik, konuşma ve merakla ifade edilir.' },
    { ad: 'Yengeç', sembol: '♋', element: 'Su', nitelik: 'Öncü', yorum: 'Koruma, aidiyet ve duygusal yakınlık ihtiyacı güçlüdür.' },
    { ad: 'Aslan', sembol: '♌', element: 'Ateş', nitelik: 'Sabit', yorum: 'İç dünyada sıcaklık, gurur ve görünür olma isteği öne çıkar.' },
    { ad: 'Başak', sembol: '♍', element: 'Toprak', nitelik: 'Değişken', yorum: 'Duygular düzen, fayda ve ayrıntılara dikkat ederek işlenir.' },
    { ad: 'Terazi', sembol: '♎', element: 'Hava', nitelik: 'Öncü', yorum: 'Duygusal denge, uyum ve ilişkilerde nezaket ihtiyacı baskındır.' },
    { ad: 'Akrep', sembol: '♏', element: 'Su', nitelik: 'Sabit', yorum: 'Duygular yoğun, sezgisel ve derin bağ kurmaya dönüktür.' },
    { ad: 'Yay', sembol: '♐', element: 'Ateş', nitelik: 'Değişken', yorum: 'İç dünyada özgürlük, anlam ve keşif duygusu canlıdır.' },
    { ad: 'Oğlak', sembol: '♑', element: 'Toprak', nitelik: 'Öncü', yorum: 'Duygular sorumluluk, dayanıklılık ve kontrol ihtiyacıyla şekillenir.' },
    { ad: 'Kova', sembol: '♒', element: 'Hava', nitelik: 'Sabit', yorum: 'Duygusal tepkiler bağımsız, gözlemci ve özgün bir çizgi taşır.' },
    { ad: 'Balık', sembol: '♓', element: 'Su', nitelik: 'Değişken', yorum: 'Sezgi, empati ve hayal gücü iç dünyada güçlü çalışır.' }
];

function hcAbhNormalize(derece) {
    var sonuc = derece % 360;
    return sonuc < 0 ? sonuc + 360 : sonuc;
}

function hcAbhRad(derece) {
    return derece * Math.PI / 180;
}

function hcAbhDeg(radyan) {
    return radyan * 180 / Math.PI;
}

function hcAbhSin(derece) {
    return Math.sin(hcAbhRad(derece));
}

function hcAbhFormat(sayi, hane) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: hane,
        maximumFractionDigits: hane
    });
}

function hcAbhJulianDay(yil, ay, gun, saat, dakika, utcFarki) {
    var utcMs = Date.UTC(yil, ay - 1, gun, saat, dakika, 0) - utcFarki * 60 * 60 * 1000;
    return utcMs / 86400000 + 2440587.5;
}

function hcAbhAyBoylami(jd) {
    var d = jd - 2451543.5;
    var n = hcAbhNormalize(125.1228 - 0.0529538083 * d);
    var i = 5.1454;
    var w = hcAbhNormalize(318.0634 + 0.1643573223 * d);
    var a = 60.2666;
    var e = 0.054900;
    var m = hcAbhNormalize(115.3654 + 13.0649929509 * d);
    var ms = hcAbhNormalize(356.0470 + 0.9856002585 * d);
    var ws = hcAbhNormalize(282.9404 + 0.0000470935 * d);
    var ls = hcAbhNormalize(ms + ws);
    var lm = hcAbhNormalize(n + w + m);
    var elongasyon = hcAbhNormalize(lm - ls);
    var f = hcAbhNormalize(lm - n);
    var eAnomali = m + hcAbhDeg(e * Math.sin(hcAbhRad(m)) * (1 + e * Math.cos(hcAbhRad(m))));
    var x = a * (Math.cos(hcAbhRad(eAnomali)) - e);
    var y = a * Math.sqrt(1 - e * e) * Math.sin(hcAbhRad(eAnomali));
    var r = Math.sqrt(x * x + y * y);
    var v = hcAbhDeg(Math.atan2(y, x));
    var xeclip = r * (Math.cos(hcAbhRad(n)) * Math.cos(hcAbhRad(v + w)) - Math.sin(hcAbhRad(n)) * Math.sin(hcAbhRad(v + w)) * Math.cos(hcAbhRad(i)));
    var yeclip = r * (Math.sin(hcAbhRad(n)) * Math.cos(hcAbhRad(v + w)) + Math.cos(hcAbhRad(n)) * Math.sin(hcAbhRad(v + w)) * Math.cos(hcAbhRad(i)));
    var lon = hcAbhNormalize(hcAbhDeg(Math.atan2(yeclip, xeclip)));

    lon += -1.274 * hcAbhSin(m - 2 * elongasyon);
    lon += 0.658 * hcAbhSin(2 * elongasyon);
    lon += -0.186 * hcAbhSin(ms);
    lon += -0.059 * hcAbhSin(2 * m - 2 * elongasyon);
    lon += -0.057 * hcAbhSin(m - 2 * elongasyon + ms);
    lon += 0.053 * hcAbhSin(m + 2 * elongasyon);
    lon += 0.046 * hcAbhSin(2 * elongasyon - ms);
    lon += 0.041 * hcAbhSin(m - ms);
    lon += -0.035 * hcAbhSin(elongasyon);
    lon += -0.031 * hcAbhSin(m + ms);
    lon += -0.015 * hcAbhSin(2 * f - 2 * elongasyon);
    lon += 0.011 * hcAbhSin(m - 4 * elongasyon);

    return hcAbhNormalize(lon);
}

function hcAyBurcuHesapla() {
    var tarih = document.getElementById('hc-abh-tarih').value;
    var saat = document.getElementById('hc-abh-saat').value;
    var utcFarki = parseFloat(document.getElementById('hc-abh-utc').value);

    if (!tarih || !saat || isNaN(utcFarki)) {
        alert('Lütfen doğum tarihi, doğum saati ve UTC farkını girin.');
        return;
    }

    var tarihParca = tarih.split('-');
    var saatParca = saat.split(':');
    var yil = parseInt(tarihParca[0], 10);
    var ay = parseInt(tarihParca[1], 10);
    var gun = parseInt(tarihParca[2], 10);
    var saatDegeri = parseInt(saatParca[0], 10);
    var dakika = parseInt(saatParca[1], 10);
    var jd = hcAbhJulianDay(yil, ay, gun, saatDegeri, dakika, utcFarki);
    var ayBoylami = hcAbhAyBoylami(jd);
    var burcIndex = Math.floor(ayBoylami / 30);
    var burcIciDerece = ayBoylami - burcIndex * 30;
    var burc = HC_ABH_BURCLAR[burcIndex];

    document.getElementById('hc-abh-sembol').textContent = burc.sembol;
    document.getElementById('hc-abh-burc').textContent = burc.ad;
    document.getElementById('hc-abh-derece').textContent = hcAbhFormat(burcIciDerece, 2) + '° ' + burc.ad;
    document.getElementById('hc-abh-element').textContent = burc.element;
    document.getElementById('hc-abh-nitelik').textContent = burc.nitelik;
    document.getElementById('hc-abh-boylam').textContent = hcAbhFormat(ayBoylami, 2) + '°';
    document.getElementById('hc-abh-yorum').textContent = burc.yorum;

    var uyari = '';
    if (burcIciDerece < 1 || burcIciDerece > 29) {
        uyari = 'Sonuç burç sınırına yakın. Doğum saati veya UTC farkı birkaç dakika değişirse Ay burcu değişebilir.';
    }

    document.getElementById('hc-abh-uyari').textContent = uyari;
    document.getElementById('hc-abh-uyari').style.display = uyari ? 'block' : 'none';
    document.getElementById('hc-abh-result').classList.add('visible');
}
