var HC_DHH_BURCLAR = [
    { ad: 'Koç', sembol: '♈', element: 'Ateş', nitelik: 'Öncü' },
    { ad: 'Boğa', sembol: '♉', element: 'Toprak', nitelik: 'Sabit' },
    { ad: 'İkizler', sembol: '♊', element: 'Hava', nitelik: 'Değişken' },
    { ad: 'Yengeç', sembol: '♋', element: 'Su', nitelik: 'Öncü' },
    { ad: 'Aslan', sembol: '♌', element: 'Ateş', nitelik: 'Sabit' },
    { ad: 'Başak', sembol: '♍', element: 'Toprak', nitelik: 'Değişken' },
    { ad: 'Terazi', sembol: '♎', element: 'Hava', nitelik: 'Öncü' },
    { ad: 'Akrep', sembol: '♏', element: 'Su', nitelik: 'Sabit' },
    { ad: 'Yay', sembol: '♐', element: 'Ateş', nitelik: 'Değişken' },
    { ad: 'Oğlak', sembol: '♑', element: 'Toprak', nitelik: 'Öncü' },
    { ad: 'Kova', sembol: '♒', element: 'Hava', nitelik: 'Sabit' },
    { ad: 'Balık', sembol: '♓', element: 'Su', nitelik: 'Değişken' }
];

function hcDhhNormalize(derece) {
    var sonuc = derece % 360;
    return sonuc < 0 ? sonuc + 360 : sonuc;
}

function hcDhhRad(derece) {
    return derece * Math.PI / 180;
}

function hcDhhDeg(radyan) {
    return radyan * 180 / Math.PI;
}

function hcDhhSin(derece) {
    return Math.sin(hcDhhRad(derece));
}

function hcDhhFormat(sayi, hane) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: hane,
        maximumFractionDigits: hane
    });
}

function hcDhhJulianDay(yil, ay, gun, saat, dakika, utcFarki) {
    var utcMs = Date.UTC(yil, ay - 1, gun, saat, dakika, 0) - utcFarki * 60 * 60 * 1000;
    return utcMs / 86400000 + 2440587.5;
}

function hcDhhGmst(jd) {
    var t = (jd - 2451545.0) / 36525;
    return hcDhhNormalize(
        280.46061837 +
        360.98564736629 * (jd - 2451545.0) +
        0.000387933 * t * t -
        (t * t * t) / 38710000
    );
}

function hcDhhAscendant(lst, enlem) {
    var theta = hcDhhRad(lst);
    var phi = hcDhhRad(enlem);
    var eps = hcDhhRad(23.4392911);
    var a = Math.cos(phi) * Math.cos(theta);
    var b = Math.cos(eps) * Math.cos(phi) * Math.sin(theta) + Math.sin(eps) * Math.sin(phi);
    var aday = hcDhhNormalize(hcDhhDeg(Math.atan2(-a, b)));
    var diger = hcDhhNormalize(aday + 180);

    function doguUfku(derece) {
        var lambda = hcDhhRad(derece);
        return -Math.cos(lambda) * Math.sin(theta) + Math.sin(lambda) * Math.cos(eps) * Math.cos(theta);
    }

    return doguUfku(aday) > doguUfku(diger) ? aday : diger;
}

function hcDhhElementler(ad, d) {
    var elemanlar = {
        Merkür: { n: 48.3313 + 0.0000324587 * d, i: 7.0047 + 0.00000005 * d, w: 29.1241 + 0.0000101444 * d, a: 0.387098, e: 0.205635 + 0.000000000559 * d, m: 168.6562 + 4.0923344368 * d },
        Venüs: { n: 76.6799 + 0.000024659 * d, i: 3.3946 + 0.0000000275 * d, w: 54.8910 + 0.0000138374 * d, a: 0.723330, e: 0.006773 - 0.000000001302 * d, m: 48.0052 + 1.6021302244 * d },
        Mars: { n: 49.5574 + 0.0000211081 * d, i: 1.8497 - 0.0000000178 * d, w: 286.5016 + 0.0000292961 * d, a: 1.523688, e: 0.093405 + 0.000000002516 * d, m: 18.6021 + 0.5240207766 * d },
        Jüpiter: { n: 100.4542 + 0.0000276854 * d, i: 1.3030 - 0.0000001557 * d, w: 273.8777 + 0.0000164505 * d, a: 5.20256, e: 0.048498 + 0.000000004469 * d, m: 19.8950 + 0.0830853001 * d },
        Satürn: { n: 113.6634 + 0.000023898 * d, i: 2.4886 - 0.0000001081 * d, w: 339.3939 + 0.0000297661 * d, a: 9.55475, e: 0.055546 - 0.000000009499 * d, m: 316.9670 + 0.0334442282 * d }
    };
    return elemanlar[ad];
}

function hcDhhDunya(d) {
    var w = 282.9404 + 0.0000470935 * d;
    var e = 0.016709 - 0.000000001151 * d;
    var m = hcDhhNormalize(356.0470 + 0.9856002585 * d);
    var eAnomali = m + hcDhhDeg(e * Math.sin(hcDhhRad(m)) * (1 + e * Math.cos(hcDhhRad(m))));
    var xv = Math.cos(hcDhhRad(eAnomali)) - e;
    var yv = Math.sqrt(1 - e * e) * Math.sin(hcDhhRad(eAnomali));
    var v = hcDhhDeg(Math.atan2(yv, xv));
    var r = Math.sqrt(xv * xv + yv * yv);
    var lon = hcDhhNormalize(v + w);

    return {
        xs: r * Math.cos(hcDhhRad(lon)),
        ys: r * Math.sin(hcDhhRad(lon)),
        lon: lon
    };
}

function hcDhhGezegenBoylami(ad, d, dunya) {
    var el = hcDhhElementler(ad, d);
    var eAnomali = el.m + hcDhhDeg(el.e * Math.sin(hcDhhRad(el.m)) * (1 + el.e * Math.cos(hcDhhRad(el.m))));

    for (var j = 0; j < 4; j++) {
        eAnomali = eAnomali - (eAnomali - hcDhhDeg(el.e * Math.sin(hcDhhRad(eAnomali))) - el.m) / (1 - el.e * Math.cos(hcDhhRad(eAnomali)));
    }

    var xv = el.a * (Math.cos(hcDhhRad(eAnomali)) - el.e);
    var yv = el.a * (Math.sqrt(1 - el.e * el.e) * Math.sin(hcDhhRad(eAnomali)));
    var v = hcDhhDeg(Math.atan2(yv, xv));
    var r = Math.sqrt(xv * xv + yv * yv);
    var xh = r * (Math.cos(hcDhhRad(el.n)) * Math.cos(hcDhhRad(v + el.w)) - Math.sin(hcDhhRad(el.n)) * Math.sin(hcDhhRad(v + el.w)) * Math.cos(hcDhhRad(el.i)));
    var yh = r * (Math.sin(hcDhhRad(el.n)) * Math.cos(hcDhhRad(v + el.w)) + Math.cos(hcDhhRad(el.n)) * Math.sin(hcDhhRad(v + el.w)) * Math.cos(hcDhhRad(el.i)));
    var xg = xh + dunya.xs;
    var yg = yh + dunya.ys;

    return hcDhhNormalize(hcDhhDeg(Math.atan2(yg, xg)));
}

function hcDhhAyBoylami(jd) {
    var d = jd - 2451543.5;
    var n = hcDhhNormalize(125.1228 - 0.0529538083 * d);
    var i = 5.1454;
    var w = hcDhhNormalize(318.0634 + 0.1643573223 * d);
    var a = 60.2666;
    var e = 0.054900;
    var m = hcDhhNormalize(115.3654 + 13.0649929509 * d);
    var ms = hcDhhNormalize(356.0470 + 0.9856002585 * d);
    var ws = hcDhhNormalize(282.9404 + 0.0000470935 * d);
    var ls = hcDhhNormalize(ms + ws);
    var lm = hcDhhNormalize(n + w + m);
    var elongasyon = hcDhhNormalize(lm - ls);
    var f = hcDhhNormalize(lm - n);
    var eAnomali = m + hcDhhDeg(e * Math.sin(hcDhhRad(m)) * (1 + e * Math.cos(hcDhhRad(m))));
    var x = a * (Math.cos(hcDhhRad(eAnomali)) - e);
    var y = a * Math.sqrt(1 - e * e) * Math.sin(hcDhhRad(eAnomali));
    var r = Math.sqrt(x * x + y * y);
    var v = hcDhhDeg(Math.atan2(y, x));
    var xeclip = r * (Math.cos(hcDhhRad(n)) * Math.cos(hcDhhRad(v + w)) - Math.sin(hcDhhRad(n)) * Math.sin(hcDhhRad(v + w)) * Math.cos(hcDhhRad(i)));
    var yeclip = r * (Math.sin(hcDhhRad(n)) * Math.cos(hcDhhRad(v + w)) + Math.cos(hcDhhRad(n)) * Math.sin(hcDhhRad(v + w)) * Math.cos(hcDhhRad(i)));
    var lon = hcDhhNormalize(hcDhhDeg(Math.atan2(yeclip, xeclip)));

    lon += -1.274 * hcDhhSin(m - 2 * elongasyon);
    lon += 0.658 * hcDhhSin(2 * elongasyon);
    lon += -0.186 * hcDhhSin(ms);
    lon += -0.059 * hcDhhSin(2 * m - 2 * elongasyon);
    lon += -0.057 * hcDhhSin(m - 2 * elongasyon + ms);
    lon += 0.053 * hcDhhSin(m + 2 * elongasyon);
    lon += 0.046 * hcDhhSin(2 * elongasyon - ms);
    lon += 0.041 * hcDhhSin(m - ms);
    lon += -0.035 * hcDhhSin(elongasyon);
    lon += -0.031 * hcDhhSin(m + ms);
    lon += -0.015 * hcDhhSin(2 * f - 2 * elongasyon);
    lon += 0.011 * hcDhhSin(m - 4 * elongasyon);

    return hcDhhNormalize(lon);
}

function hcDhhKonum(ad, boylam) {
    var burcIndex = Math.floor(hcDhhNormalize(boylam) / 30);
    var burcIciDerece = hcDhhNormalize(boylam) - burcIndex * 30;
    var burc = HC_DHH_BURCLAR[burcIndex];

    return {
        ad: ad,
        burc: burc.ad,
        sembol: burc.sembol,
        element: burc.element,
        nitelik: burc.nitelik,
        derece: burcIciDerece,
        boylam: hcDhhNormalize(boylam)
    };
}

function hcDhhYerlesimMetni(konum) {
    return konum.sembol + ' ' + konum.burc + ' ' + hcDhhFormat(konum.derece, 2) + '°';
}

function hcDogumHaritasiHesapla() {
    var tarih = document.getElementById('hc-dhh-tarih').value;
    var saat = document.getElementById('hc-dhh-saat').value;
    var utcFarki = parseFloat(document.getElementById('hc-dhh-utc').value);
    var enlem = parseFloat(document.getElementById('hc-dhh-enlem').value);
    var boylam = parseFloat(document.getElementById('hc-dhh-boylam').value);

    if (!tarih || !saat || isNaN(utcFarki) || isNaN(enlem) || isNaN(boylam)) {
        alert('Lütfen doğum tarihi, saati, UTC farkı, enlem ve boylam değerlerini girin.');
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

    if (yil < 1900 || yil > 2100) {
        alert('Bu hesaplayıcı 1900-2100 yılları arasındaki tarihler için uygundur.');
        return;
    }

    var jd = hcDhhJulianDay(yil, ay, gun, saatDegeri, dakika, utcFarki);
    var d = jd - 2451543.5;
    var dunya = hcDhhDunya(d);
    var gmst = hcDhhGmst(jd);
    var lst = hcDhhNormalize(gmst + boylam);
    var yerlesimler = [
        hcDhhKonum('Güneş', dunya.lon),
        hcDhhKonum('Ay', hcDhhAyBoylami(jd)),
        hcDhhKonum('Yükselen', hcDhhAscendant(lst, enlem)),
        hcDhhKonum('Merkür', hcDhhGezegenBoylami('Merkür', d, dunya)),
        hcDhhKonum('Venüs', hcDhhGezegenBoylami('Venüs', d, dunya)),
        hcDhhKonum('Mars', hcDhhGezegenBoylami('Mars', d, dunya)),
        hcDhhKonum('Jüpiter', hcDhhGezegenBoylami('Jüpiter', d, dunya)),
        hcDhhKonum('Satürn', hcDhhGezegenBoylami('Satürn', d, dunya))
    ];
    var elementSayilari = { Ateş: 0, Toprak: 0, Hava: 0, Su: 0 };
    var tablo = '';
    var siniraYakin = [];

    for (var i = 0; i < yerlesimler.length; i++) {
        var item = yerlesimler[i];
        elementSayilari[item.element]++;
        tablo += '<tr><td>' + item.ad + '</td><td>' + item.sembol + ' ' + item.burc + '</td><td>' + hcDhhFormat(item.derece, 2) + '°</td><td>' + item.element + '</td></tr>';

        if (item.derece < 1 || item.derece > 29) {
            siniraYakin.push(item.ad);
        }
    }

    var gunes = yerlesimler[0];
    var ayKonum = yerlesimler[1];
    var yukselen = yerlesimler[2];
    var baskinElement = Object.keys(elementSayilari).sort(function(a, b) {
        return elementSayilari[b] - elementSayilari[a];
    })[0];

    document.getElementById('hc-dhh-gunes').textContent = hcDhhYerlesimMetni(gunes);
    document.getElementById('hc-dhh-ay').textContent = hcDhhYerlesimMetni(ayKonum);
    document.getElementById('hc-dhh-yukselen').textContent = hcDhhYerlesimMetni(yukselen);
    document.getElementById('hc-dhh-tablo').innerHTML = tablo;
    document.getElementById('hc-dhh-ates').textContent = elementSayilari['Ateş'].toLocaleString('tr-TR');
    document.getElementById('hc-dhh-toprak').textContent = elementSayilari.Toprak.toLocaleString('tr-TR');
    document.getElementById('hc-dhh-hava').textContent = elementSayilari.Hava.toLocaleString('tr-TR');
    document.getElementById('hc-dhh-su').textContent = elementSayilari.Su.toLocaleString('tr-TR');
    document.getElementById('hc-dhh-yorum').textContent = 'Temel üçlüde Güneş ' + gunes.burc + ', Ay ' + ayKonum.burc + ', yükselen ' + yukselen.burc + ' görünüyor. Haritadaki baskın element ' + baskinElement + ' olarak öne çıkıyor.';

    var uyari = 'Gezegen konumları düşük hassasiyetli astronomik yaklaşımla hesaplanır; profesyonel efemeris yerine hızlı ön değerlendirme amaçlıdır.';
    if (siniraYakin.length) {
        uyari += ' ' + siniraYakin.join(', ') + ' burç sınırına yakın olduğu için doğum saati veya UTC farkındaki küçük değişimler yorumu etkileyebilir.';
    }

    document.getElementById('hc-dhh-uyari').textContent = uyari;
    document.getElementById('hc-dhh-result').classList.add('visible');
}
