var HC_BURCLAR = [
    { ad: 'Oğlak',   sembol: '♑', element: 'Toprak', bas: [12,22], bit: [1,19]  },
    { ad: 'Kova',    sembol: '♒', element: 'Hava',   bas: [1,20],  bit: [2,18]  },
    { ad: 'Balık',   sembol: '♓', element: 'Su',     bas: [2,19],  bit: [3,20]  },
    { ad: 'Koç',     sembol: '♈', element: 'Ateş',  bas: [3,21],  bit: [4,19]  },
    { ad: 'Boğa',    sembol: '♉', element: 'Toprak', bas: [4,20],  bit: [5,20]  },
    { ad: 'İkizler', sembol: '♊', element: 'Hava',   bas: [5,21],  bit: [6,20]  },
    { ad: 'Yengeç',  sembol: '♋', element: 'Su',     bas: [6,21],  bit: [7,22]  },
    { ad: 'Aslan',   sembol: '♌', element: 'Ateş',  bas: [7,23],  bit: [8,22]  },
    { ad: 'Başak',   sembol: '♍', element: 'Toprak', bas: [8,23],  bit: [9,22]  },
    { ad: 'Terazi',  sembol: '♎', element: 'Hava',   bas: [9,23],  bit: [10,22] },
    { ad: 'Akrep',   sembol: '♏', element: 'Su',     bas: [10,23], bit: [11,21] },
    { ad: 'Yay',     sembol: '♐', element: 'Ateş',  bas: [11,22], bit: [12,21] },
];

// Burç uyum matrisi (12x12) — Koç'tan başlayarak
var HC_UYUM = [
//  Koç  Boğa İkiz Yenç Asln Başk Terz Akrp Yay  Oğlk Kova Balık
    [90,  50,  85,  40,  95,  45,  70,  55,  90,  45,  75,  55 ], // Koç
    [50,  90,  50,  75,  40,  90,  65,  75,  45,  85,  40,  80 ], // Boğa
    [85,  50,  90,  45,  80,  55,  85,  40,  75,  50,  90,  45 ], // İkizler
    [40,  75,  45,  90,  50,  70,  55,  90,  45,  65,  50,  85 ], // Yengeç
    [95,  40,  80,  50,  90,  50,  80,  55,  85,  45,  65,  45 ], // Aslan
    [45,  90,  55,  70,  50,  90,  55,  65,  50,  85,  45,  75 ], // Başak
    [70,  65,  85,  55,  80,  55,  90,  45,  70,  50,  85,  55 ], // Terazi
    [55,  75,  40,  90,  55,  65,  45,  90,  55,  70,  45,  90 ], // Akrep
    [90,  45,  75,  45,  85,  50,  70,  55,  90,  50,  80,  45 ], // Yay
    [45,  85,  50,  65,  45,  85,  50,  70,  50,  90,  55,  70 ], // Oğlak
    [75,  40,  90,  50,  65,  45,  85,  45,  80,  55,  90,  55 ], // Kova
    [55,  80,  45,  85,  45,  75,  55,  90,  45,  70,  55,  90 ], // Balık
];

// Element uyum tablosu
var HC_ELEMENT_UYUM = {
    'Ateş-Ateş':     85, 'Ateş-Hava':    80, 'Ateş-Toprak':  45, 'Ateş-Su':     40,
    'Hava-Ateş':     80, 'Hava-Hava':    85, 'Hava-Toprak':  50, 'Hava-Su':     55,
    'Toprak-Ateş':   45, 'Toprak-Hava':  50, 'Toprak-Toprak':90, 'Toprak-Su':   80,
    'Su-Ateş':       40, 'Su-Hava':      55, 'Su-Toprak':    80, 'Su-Su':       90,
};

var HC_YORUMLAR = {
    'Mükemmel':  'Yıldızlar sizin için hizalanmış! Bu birliktelik nadir bulunan derin bir uyum taşıyor.',
    'Çok İyi':   'Aranızdaki enerji oldukça güçlü. Birbirinizi tamamlayan yanlarınız öne çıkıyor.',
    'İyi':       'Sağlam bir uyum var. Küçük farklılıklar ilişkinizi zenginleştirebilir.',
    'Orta':      'Zaman zaman anlaşmazlıklar olsa da sevgi ve anlayışla aşılabilir.',
    'Gelişmeli': 'Farklılıklarınız fazla, ancak çaba ve sabırla güzel bir ilişki kurabilirsiniz.',
};

function hcBurcBul(tarih) {
    var d = new Date(tarih);
    var ay = d.getMonth() + 1;
    var gun = d.getDate();
    for (var i = 0; i < HC_BURCLAR.length; i++) {
        var b = HC_BURCLAR[i];
        var basAy = b.bas[0], basGun = b.bas[1];
        var bitAy = b.bit[0], bitGun = b.bit[1];
        if (basAy === bitAy) {
            if (ay === basAy && gun >= basGun) return i;
        } else if (basAy > bitAy) {
            if ((ay === basAy && gun >= basGun) || (ay === bitAy && gun <= bitGun)) return i;
        } else {
            if ((ay === basAy && gun >= basGun) || (ay > basAy && ay < bitAy) || (ay === bitAy && gun <= bitGun)) return i;
        }
    }
    return 0;
}

function hcYasamYolu(tarih) {
    var d = new Date(tarih);
    var toplam = '' + (d.getFullYear()) + (d.getMonth() + 1) + d.getDate();
    var sayi = toplam.split('').reduce(function(a, b) { return a + parseInt(b); }, 0);
    while (sayi > 9 && sayi !== 11 && sayi !== 22) {
        sayi = ('' + sayi).split('').reduce(function(a, b) { return a + parseInt(b); }, 0);
    }
    return sayi;
}

var HC_NUMEROLOJI = [
//   1   2   3   4   5   6   7   8   9  11  22
    [80, 55, 75, 60, 85, 65, 70, 60, 75, 80, 65], // 1
    [55, 80, 70, 85, 55, 90, 60, 75, 65, 70, 80], // 2
    [75, 70, 80, 55, 80, 75, 85, 60, 90, 75, 65], // 3
    [60, 85, 55, 80, 60, 80, 65, 90, 60, 65, 85], // 4
    [85, 55, 80, 60, 90, 60, 75, 65, 80, 85, 60], // 5
    [65, 90, 75, 80, 60, 90, 65, 75, 85, 70, 80], // 6
    [70, 60, 85, 65, 75, 65, 90, 55, 70, 90, 65], // 7
    [60, 75, 60, 90, 65, 75, 55, 90, 65, 65, 90], // 8
    [75, 65, 90, 60, 80, 85, 70, 65, 80, 75, 70], // 9
    [80, 70, 75, 65, 85, 70, 90, 65, 75, 90, 75], // 11
    [65, 80, 65, 85, 60, 80, 65, 90, 70, 75, 90], // 22
];

function hcNumerolojiBul(sayi) {
    var siralar = [1,2,3,4,5,6,7,8,9,11,22];
    return siralar.indexOf(sayi);
}

function hcKategori(puan) {
    if (puan >= 85) return 'Mükemmel';
    if (puan >= 70) return 'Çok İyi';
    if (puan >= 55) return 'İyi';
    if (puan >= 40) return 'Orta';
    return 'Gelişmeli';
}

function hcAskUyumuHesapla() {
    var ad1 = document.getElementById('hc-ask-ad1').value.trim() || 'Kişi 1';
    var ad2 = document.getElementById('hc-ask-ad2').value.trim() || 'Kişi 2';
    var dt1 = document.getElementById('hc-ask-dt1').value;
    var dt2 = document.getElementById('hc-ask-dt2').value;

    if (!dt1 || !dt2) { alert('Lütfen her iki kişinin doğum tarihini girin.'); return; }

    // Burçları bul (HC_BURCLAR içindeki index)
    var bi1 = hcBurcBul(dt1);
    var bi2 = hcBurcBul(dt2);
    var b1  = HC_BURCLAR[bi1];
    var b2  = HC_BURCLAR[bi2];

    // Koç = index 3 (HC_BURCLAR'da), matris için Koç = 0 → dönüşüm
    var burcSirasi = [3,4,5,6,7,8,9,10,11,0,1,2]; // HC_BURCLAR idx → matris idx
    var mi1 = burcSirasi[bi1];
    var mi2 = burcSirasi[bi2];

    var burcPuan = HC_UYUM[mi1][mi2];

    // Element uyumu
    var elementKey = b1.element + '-' + b2.element;
    var elementPuan = HC_ELEMENT_UYUM[elementKey] || 60;

    // Numeroloji
    var yl1 = hcYasamYolu(dt1);
    var yl2 = hcYasamYolu(dt2);
    var ni1 = hcNumerolojiBul(yl1);
    var ni2 = hcNumerolojiBul(yl2);
    var numerolPuan = (ni1 >= 0 && ni2 >= 0) ? HC_NUMEROLOJI[ni1][ni2] : 65;

    // Genel puan: burç %50, element %30, numeroloji %20
    var genelPuan = Math.round(burcPuan * 0.5 + elementPuan * 0.3 + numerolPuan * 0.2);
    var kategori  = hcKategori(genelPuan);

    // DOM'a yaz
    document.getElementById('hc-r-ad1').textContent      = ad1;
    document.getElementById('hc-r-burc1').textContent    = b1.ad;
    document.getElementById('hc-r-sembol1').textContent  = b1.sembol;
    document.getElementById('hc-r-element1').textContent = b1.element;

    document.getElementById('hc-r-ad2').textContent      = ad2;
    document.getElementById('hc-r-burc2').textContent    = b2.ad;
    document.getElementById('hc-r-sembol2').textContent  = b2.sembol;
    document.getElementById('hc-r-element2').textContent = b2.element;

    document.getElementById('hc-r-puan').textContent     = '%' + genelPuan;
    document.getElementById('hc-r-kategori').textContent = kategori;
    document.getElementById('hc-r-bar').style.width      = genelPuan + '%';

    var renk = genelPuan >= 70 ? '#c0392b' : genelPuan >= 50 ? '#e67e22' : '#7f8c8d';
    document.getElementById('hc-r-bar').style.background = renk;
    document.getElementById('hc-r-puan').style.color     = renk;

    document.getElementById('hc-r-burc-puan').textContent       = '%' + burcPuan;
    document.getElementById('hc-r-element-puan').textContent    = '%' + elementPuan;
    document.getElementById('hc-r-numeroloji-puan').textContent = '%' + numerolPuan + ' (Sayı ' + yl1 + ' & ' + yl2 + ')';

    document.getElementById('hc-r-yorum').textContent = HC_YORUMLAR[kategori] || '';

    document.getElementById('hc-ask-result').classList.add('visible');
}
