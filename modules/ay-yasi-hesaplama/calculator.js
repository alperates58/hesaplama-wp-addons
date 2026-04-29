var HC_AYY_CIN_YENI_YILI = {
    1900:[1,31],1901:[2,19],1902:[2,8],1903:[1,29],1904:[2,16],1905:[2,4],1906:[1,25],1907:[2,13],1908:[2,2],1909:[1,22],
    1910:[2,10],1911:[1,30],1912:[2,18],1913:[2,6],1914:[1,26],1915:[2,14],1916:[2,3],1917:[1,23],1918:[2,11],1919:[2,1],
    1920:[2,20],1921:[2,8],1922:[1,28],1923:[2,16],1924:[2,5],1925:[1,24],1926:[2,13],1927:[2,2],1928:[1,23],1929:[2,10],
    1930:[1,30],1931:[2,17],1932:[2,6],1933:[1,26],1934:[2,14],1935:[2,4],1936:[1,24],1937:[2,11],1938:[1,31],1939:[2,19],
    1940:[2,8],1941:[1,27],1942:[2,15],1943:[2,5],1944:[1,25],1945:[2,13],1946:[2,2],1947:[1,22],1948:[2,10],1949:[1,29],
    1950:[2,17],1951:[2,6],1952:[1,27],1953:[2,14],1954:[2,3],1955:[1,24],1956:[2,12],1957:[1,31],1958:[2,18],1959:[2,8],
    1960:[1,28],1961:[2,15],1962:[2,5],1963:[1,25],1964:[2,13],1965:[2,2],1966:[1,21],1967:[2,9],1968:[1,30],1969:[2,17],
    1970:[2,6],1971:[1,27],1972:[2,15],1973:[2,3],1974:[1,23],1975:[2,11],1976:[1,31],1977:[2,18],1978:[2,7],1979:[1,28],
    1980:[2,16],1981:[2,5],1982:[1,25],1983:[2,13],1984:[2,2],1985:[2,20],1986:[2,9],1987:[1,29],1988:[2,17],1989:[2,6],
    1990:[1,27],1991:[2,15],1992:[2,4],1993:[1,23],1994:[2,10],1995:[1,31],1996:[2,19],1997:[2,7],1998:[1,28],1999:[2,16],
    2000:[2,5],2001:[1,24],2002:[2,12],2003:[2,1],2004:[1,22],2005:[2,9],2006:[1,29],2007:[2,18],2008:[2,7],2009:[1,26],
    2010:[2,14],2011:[2,3],2012:[1,23],2013:[2,10],2014:[1,31],2015:[2,19],2016:[2,8],2017:[1,28],2018:[2,16],2019:[2,5],
    2020:[1,25],2021:[2,12],2022:[2,1],2023:[1,22],2024:[2,10],2025:[1,29],2026:[2,17],2027:[2,6],2028:[1,26],2029:[2,13],
    2030:[2,3],2031:[1,23],2032:[2,11],2033:[1,31],2034:[2,19],2035:[2,8],2036:[1,28],2037:[2,15],2038:[2,4],2039:[1,24],
    2040:[2,12],2041:[2,1],2042:[1,22],2043:[2,10],2044:[1,30],2045:[2,17],2046:[2,6],2047:[1,26],2048:[2,14],2049:[2,2],
    2050:[1,23],2051:[2,11],2052:[2,1],2053:[2,19],2054:[2,8],2055:[1,28],2056:[2,15],2057:[2,4],2058:[1,24],2059:[2,12],
    2060:[2,2],2061:[1,21],2062:[2,9],2063:[1,29],2064:[2,17],2065:[2,5],2066:[1,26],2067:[2,14],2068:[2,3],2069:[1,23],
    2070:[2,11],2071:[1,31],2072:[2,19],2073:[2,7],2074:[1,27],2075:[2,15],2076:[2,5],2077:[1,24],2078:[2,12],2079:[2,2],
    2080:[1,22],2081:[2,9],2082:[1,29],2083:[2,17],2084:[2,6],2085:[1,26],2086:[2,14],2087:[2,3],2088:[1,24],2089:[2,10],
    2090:[1,30],2091:[2,18],2092:[2,7],2093:[1,27],2094:[2,15],2095:[2,5],2096:[1,25],2097:[2,12],2098:[2,1],2099:[1,21],
    2100:[2,9]
};

var HC_AYY_HAYVANLAR = [
    'Fare', 'Öküz', 'Kaplan', 'Tavşan', 'Ejderha', 'Yılan',
    'At', 'Keçi', 'Maymun', 'Horoz', 'Köpek', 'Domuz'
];

function hcAyyTarihOlustur(yil, ay, gun) {
    return new Date(yil, ay - 1, gun);
}

function hcAyyTarihOku(id) {
    var deger = document.getElementById(id).value;
    if (!deger) {
        return null;
    }

    var parcalar = deger.split('-');
    return {
        yil: parseInt(parcalar[0], 10),
        ay: parseInt(parcalar[1], 10),
        gun: parseInt(parcalar[2], 10),
        tarih: hcAyyTarihOlustur(parseInt(parcalar[0], 10), parseInt(parcalar[1], 10), parseInt(parcalar[2], 10))
    };
}

function hcAyyGecerliAraliktaMi(tarih) {
    return tarih && tarih.yil >= 1900 && tarih.yil <= 2100 && HC_AYY_CIN_YENI_YILI[tarih.yil];
}

function hcAyyCinYeniYiliTarihi(yil) {
    var deger = HC_AYY_CIN_YENI_YILI[yil];
    return deger ? hcAyyTarihOlustur(yil, deger[0], deger[1]) : null;
}

function hcAyyCinTakvimYili(tarih) {
    var yeniYil = hcAyyCinYeniYiliTarihi(tarih.yil);
    return tarih.tarih < yeniYil ? tarih.yil - 1 : tarih.yil;
}

function hcAyyMiladiYas(dogum, hedef) {
    var yas = hedef.yil - dogum.yil;
    if (hedef.ay < dogum.ay || (hedef.ay === dogum.ay && hedef.gun < dogum.gun)) {
        yas -= 1;
    }
    return yas;
}

function hcAyyTarihFormatla(tarih) {
    return tarih.toLocaleDateString('tr-TR', {
        day: 'numeric',
        month: 'long',
        year: 'numeric'
    });
}

function hcAyyHayvan(yil) {
    var index = (yil - 1900) % 12;
    if (index < 0) {
        index += 12;
    }
    return HC_AYY_HAYVANLAR[index];
}

function hcAyYasiHesapla() {
    var dogum = hcAyyTarihOku('hc-ayy-dogum');
    var hedef = hcAyyTarihOku('hc-ayy-tarih');

    if (!dogum || !hedef) {
        alert('Lütfen doğum tarihi ve hesaplama tarihini seçin.');
        return;
    }

    if (!hcAyyGecerliAraliktaMi(dogum) || !hcAyyGecerliAraliktaMi(hedef)) {
        alert('Lütfen 1900 ile 2100 arasında bir tarih girin.');
        return;
    }

    if (dogum.tarih > hedef.tarih) {
        alert('Doğum tarihi hesaplama tarihinden sonra olamaz.');
        return;
    }

    var dogumCinYili = hcAyyCinTakvimYili(dogum);
    var hedefCinYili = hcAyyCinTakvimYili(hedef);
    var ayYasi = hedefCinYili - dogumCinYili + 1;
    var miladiYas = hcAyyMiladiYas(dogum, hedef);
    var hedefYeniYil = hcAyyCinYeniYiliTarihi(hedef.yil);
    var dogumYeniYil = hcAyyCinYeniYiliTarihi(dogum.yil);
    var dogumDurumu = dogum.tarih < dogumYeniYil ? 'Doğum tarihi, doğduğu yılın Çin Yeni Yılı öncesinde.' : 'Doğum tarihi, doğduğu yılın Çin Yeni Yılı sonrasında.';

    document.getElementById('hc-ayy-badge').textContent = ayYasi.toLocaleString('tr-TR');
    document.getElementById('hc-ayy-ay-yasi').textContent = ayYasi.toLocaleString('tr-TR') + ' yaş';
    document.getElementById('hc-ayy-ozet').textContent = 'Çin takvimine göre ay yaşınız.';
    document.getElementById('hc-ayy-miladi').textContent = miladiYas.toLocaleString('tr-TR') + ' yaş';
    document.getElementById('hc-ayy-cin-yili').textContent = hedefCinYili.toLocaleString('tr-TR') + ' ' + hcAyyHayvan(hedefCinYili) + ' yılı';
    document.getElementById('hc-ayy-yeni-yil').textContent = hcAyyTarihFormatla(hedefYeniYil);
    document.getElementById('hc-ayy-yorum').textContent = dogumDurumu + ' Bu nedenle ay yaşı, doğumun Çin takvim yılındaki yerine ve hesaplama tarihindeki Çin Yeni Yılı durumuna göre belirlenir.';

    var fark = ayYasi - miladiYas;
    document.getElementById('hc-ayy-uyari').textContent = 'Ay yaşı Miladi yaştan ' + fark.toLocaleString('tr-TR') + ' yaş fazladır. Sonuç geleneksel Çin yaşı yaklaşımına göredir.';
    document.getElementById('hc-ayy-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var hedefInput = document.getElementById('hc-ayy-tarih');

    if (!hedefInput || hedefInput.value) {
        return;
    }

    var bugun = new Date();
    var yil = bugun.getFullYear();
    var ay = String(bugun.getMonth() + 1).padStart(2, '0');
    var gun = String(bugun.getDate()).padStart(2, '0');

    if (yil >= 1900 && yil <= 2100) {
        hedefInput.value = yil + '-' + ay + '-' + gun;
    }
});
