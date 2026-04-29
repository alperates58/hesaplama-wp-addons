var HC_VTA_VITAMINLER = [
    ['a', 'A vitamini', 'mcg RAE'],
    ['c', 'C vitamini', 'mg'],
    ['d', 'D vitamini', 'mcg'],
    ['e', 'E vitamini', 'mg'],
    ['k', 'K vitamini', 'mcg'],
    ['b1', 'B1 vitamini', 'mg'],
    ['b2', 'B2 vitamini', 'mg'],
    ['b3', 'B3 vitamini', 'mg NE'],
    ['b6', 'B6 vitamini', 'mg'],
    ['folat', 'Folat', 'mcg DFE'],
    ['b12', 'B12 vitamini', 'mcg'],
    ['pantotenik', 'Pantotenik asit', 'mg'],
    ['biotin', 'Biotin', 'mcg']
];

var HC_VTA_TABLO = {
    bebek_0_6:{ad:'0-6 ay bebek',v:{a:400,c:40,d:10,e:4,k:2,b1:0.2,b2:0.3,b3:2,b6:0.1,folat:65,b12:0.4,pantotenik:1.7,biotin:5}},
    bebek_7_12:{ad:'7-12 ay bebek',v:{a:500,c:50,d:10,e:5,k:2.5,b1:0.3,b2:0.4,b3:4,b6:0.3,folat:80,b12:0.5,pantotenik:1.8,biotin:6}},
    cocuk_1_3:{ad:'1-3 yaş çocuk',v:{a:300,c:15,d:15,e:6,k:30,b1:0.5,b2:0.5,b3:6,b6:0.5,folat:150,b12:0.9,pantotenik:2,biotin:8}},
    cocuk_4_8:{ad:'4-8 yaş çocuk',v:{a:400,c:25,d:15,e:7,k:55,b1:0.6,b2:0.6,b3:8,b6:0.6,folat:200,b12:1.2,pantotenik:3,biotin:12}},
    yas_9_13:{ad:'9-13 yaş',v:{a:600,c:45,d:15,e:11,k:60,b1:0.9,b2:0.9,b3:12,b6:1,folat:300,b12:1.8,pantotenik:4,biotin:20}},
    erkek_14_18:{ad:'14-18 yaş erkek',v:{a:900,c:75,d:15,e:15,k:75,b1:1.2,b2:1.3,b3:16,b6:1.3,folat:400,b12:2.4,pantotenik:5,biotin:25}},
    kadin_14_18:{ad:'14-18 yaş kadın',v:{a:700,c:65,d:15,e:15,k:75,b1:1,b2:1,b3:14,b6:1.2,folat:400,b12:2.4,pantotenik:5,biotin:25}},
    erkek_19_50:{ad:'19-50 yaş erkek',v:{a:900,c:90,d:15,e:15,k:120,b1:1.2,b2:1.3,b3:16,b6:1.3,folat:400,b12:2.4,pantotenik:5,biotin:30}},
    kadin_19_50:{ad:'19-50 yaş kadın',v:{a:700,c:75,d:15,e:15,k:90,b1:1.1,b2:1.1,b3:14,b6:1.3,folat:400,b12:2.4,pantotenik:5,biotin:30}},
    erkek_51_70:{ad:'51-70 yaş erkek',v:{a:900,c:90,d:15,e:15,k:120,b1:1.2,b2:1.3,b3:16,b6:1.7,folat:400,b12:2.4,pantotenik:5,biotin:30}},
    kadin_51_70:{ad:'51-70 yaş kadın',v:{a:700,c:75,d:15,e:15,k:90,b1:1.1,b2:1.1,b3:14,b6:1.5,folat:400,b12:2.4,pantotenik:5,biotin:30}},
    erkek_71:{ad:'71 yaş ve üzeri erkek',v:{a:900,c:90,d:20,e:15,k:120,b1:1.2,b2:1.3,b3:16,b6:1.7,folat:400,b12:2.4,pantotenik:5,biotin:30}},
    kadin_71:{ad:'71 yaş ve üzeri kadın',v:{a:700,c:75,d:20,e:15,k:90,b1:1.1,b2:1.1,b3:14,b6:1.5,folat:400,b12:2.4,pantotenik:5,biotin:30}},
    gebelik_14_18:{ad:'14-18 yaş gebelik',v:{a:750,c:80,d:15,e:15,k:75,b1:1.4,b2:1.4,b3:18,b6:1.9,folat:600,b12:2.6,pantotenik:6,biotin:30}},
    gebelik_19_50:{ad:'19-50 yaş gebelik',v:{a:770,c:85,d:15,e:15,k:90,b1:1.4,b2:1.4,b3:18,b6:1.9,folat:600,b12:2.6,pantotenik:6,biotin:30}},
    emzirme_14_18:{ad:'14-18 yaş emzirme',v:{a:1200,c:115,d:15,e:19,k:75,b1:1.4,b2:1.6,b3:17,b6:2,folat:500,b12:2.8,pantotenik:7,biotin:35}},
    emzirme_19_50:{ad:'19-50 yaş emzirme',v:{a:1300,c:120,d:15,e:19,k:90,b1:1.4,b2:1.6,b3:17,b6:2,folat:500,b12:2.8,pantotenik:7,biotin:35}}
};

function hcVtaYasYilOlarak(yas, birim) {
    return birim === 'ay' ? yas / 12 : yas;
}

function hcVtaGrupBul(yasYil, cinsiyet, durum) {
    if (yasYil < 0.5) return 'bebek_0_6';
    if (yasYil < 1) return 'bebek_7_12';
    if (yasYil < 4) return 'cocuk_1_3';
    if (yasYil < 9) return 'cocuk_4_8';
    if (yasYil < 14) return 'yas_9_13';

    if (durum === 'gebelik') {
        return yasYil < 19 ? 'gebelik_14_18' : 'gebelik_19_50';
    }

    if (durum === 'emzirme') {
        return yasYil < 19 ? 'emzirme_14_18' : 'emzirme_19_50';
    }

    if (yasYil < 19) return cinsiyet + '_14_18';
    if (yasYil < 51) return cinsiyet + '_19_50';
    if (yasYil < 71) return cinsiyet + '_51_70';
    return cinsiyet + '_71';
}

function hcVtaFormat(sayi) {
    return sayi.toLocaleString('tr-TR', {
        maximumFractionDigits: 1
    });
}

function hcVtaSatirOlustur(vitamin, degerler) {
    var tr = document.createElement('tr');
    var ad = document.createElement('td');
    var deger = document.createElement('td');

    ad.textContent = vitamin[1];
    deger.textContent = hcVtaFormat(degerler[vitamin[0]]) + ' ' + vitamin[2];
    tr.appendChild(ad);
    tr.appendChild(deger);

    return tr;
}

function hcOnerilenGunlukVitaminAlimiHesapla() {
    var yas = parseFloat(document.getElementById('hc-vta-yas').value);
    var birim = document.getElementById('hc-vta-yas-birim').value;
    var cinsiyet = document.getElementById('hc-vta-cinsiyet').value;
    var durum = document.getElementById('hc-vta-durum').value;
    var sigara = document.getElementById('hc-vta-sigara').checked;

    if (isNaN(yas) || yas < 0) {
        alert('Lütfen geçerli bir yaş girin.');
        return;
    }

    if (birim === 'ay' && yas > 12) {
        alert('Ay olarak yaş girerken 0-12 ay aralığını kullanın.');
        return;
    }

    var yasYil = hcVtaYasYilOlarak(yas, birim);
    if (yasYil > 120) {
        alert('Lütfen 0 ile 120 yaş arasında bir değer girin.');
        return;
    }

    if ((durum === 'gebelik' || durum === 'emzirme') && cinsiyet !== 'kadin') {
        alert('Gebelik veya emzirme seçeneği yalnızca kadın cinsiyeti için kullanılabilir.');
        return;
    }

    if ((durum === 'gebelik' || durum === 'emzirme') && (yasYil < 14 || yasYil > 50)) {
        alert('Gebelik ve emzirme referans değerleri 14-50 yaş aralığı için listelenir.');
        return;
    }

    var grupKey = hcVtaGrupBul(yasYil, cinsiyet, durum);
    var grup = HC_VTA_TABLO[grupKey];
    var degerler = Object.assign({}, grup.v);
    var notlar = [];

    if (sigara && yasYil >= 14) {
        degerler.c += 35;
        notlar.push('Sigara kullanımı seçildiği için C vitamini değerine 35 mg eklenmiştir.');
    } else if (sigara) {
        notlar.push('Sigara için ek C vitamini notu yetişkin ve ergen referanslarında kullanılır.');
    }

    var tablo = document.getElementById('hc-vta-tablo');
    tablo.innerHTML = '';
    HC_VTA_VITAMINLER.forEach(function(vitamin) {
        tablo.appendChild(hcVtaSatirOlustur(vitamin, degerler));
    });

    document.getElementById('hc-vta-baslik').textContent = grup.ad;
    document.getElementById('hc-vta-ozet').textContent = 'Günlük önerilen vitamin alım değerleri';
    document.getElementById('hc-vta-not').textContent = notlar.length ? notlar.join(' ') : 'Değerler RDA veya yeterli alım referanslarına göre listelenir.';
    document.getElementById('hc-vta-result').classList.add('visible');
}
