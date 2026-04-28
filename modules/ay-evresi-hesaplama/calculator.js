var HC_AEH_SINODIK_AY = 29.530588853;
var HC_AEH_REFERANS_YENIAY_MS = Date.UTC(2000, 0, 6, 18, 14, 0);

var HC_AEH_EVRELER = [
    {
        ad: 'Yeni ay',
        rozet: 'YA',
        yorum: 'Ay, Güneş ile yaklaşık aynı doğrultudadır ve Dünya\'dan çok az görünür.',
        dongu: 'Döngünün başlangıcı'
    },
    {
        ad: 'Büyüyen hilal',
        rozet: 'BH',
        yorum: 'Aydınlık yüzey artmaya başlar; ince hilal görünümü öne çıkar.',
        dongu: 'Yeni aydan dolunaya gider'
    },
    {
        ad: 'İlk dördün',
        rozet: 'İD',
        yorum: 'Ay diskinin yaklaşık yarısı aydınlıktır.',
        dongu: 'Döngünün ilk çeyreği'
    },
    {
        ad: 'Büyüyen şişkin ay',
        rozet: 'BŞ',
        yorum: 'Dolunaya yaklaşırken aydınlanma oranı hızla yükselir.',
        dongu: 'Dolunay öncesi dönem'
    },
    {
        ad: 'Dolunay',
        rozet: 'DO',
        yorum: 'Ay\'ın Dünya\'ya bakan yüzü büyük ölçüde aydınlıktır.',
        dongu: 'Döngünün orta noktası'
    },
    {
        ad: 'Küçülen şişkin ay',
        rozet: 'KŞ',
        yorum: 'Dolunay sonrası aydınlanma oranı azalmaya başlar.',
        dongu: 'Dolunaydan yeni aya döner'
    },
    {
        ad: 'Son dördün',
        rozet: 'SD',
        yorum: 'Ay diskinin yaklaşık yarısı yine aydınlıktır, ancak küçülme evresindedir.',
        dongu: 'Döngünün son çeyreği'
    },
    {
        ad: 'Küçülen hilal',
        rozet: 'KH',
        yorum: 'Yeni aya yaklaşırken görünen aydınlık kısım incelir.',
        dongu: 'Döngü kapanışına yakın'
    }
];

function hcAehFormat(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', {
        minimumFractionDigits: basamak,
        maximumFractionDigits: basamak
    });
}

function hcAehNormalizeAge(gunFarki) {
    var yas = gunFarki % HC_AEH_SINODIK_AY;
    return yas < 0 ? yas + HC_AEH_SINODIK_AY : yas;
}

function hcAehEvreBul(yas) {
    var evreUzunlugu = HC_AEH_SINODIK_AY / 8;
    var index = Math.floor(((yas + evreUzunlugu / 2) % HC_AEH_SINODIK_AY) / evreUzunlugu);
    return HC_AEH_EVRELER[index];
}

function hcAyEvresiHesapla() {
    var tarih = document.getElementById('hc-aeh-tarih').value;

    if (!tarih) {
        alert('Lütfen bir tarih seçin.');
        return;
    }

    var parcalar = tarih.split('-');
    var yil = parseInt(parcalar[0], 10);
    var ay = parseInt(parcalar[1], 10);
    var gun = parseInt(parcalar[2], 10);

    if (!yil || !ay || !gun) {
        alert('Lütfen geçerli bir tarih girin.');
        return;
    }

    var secilenMs = Date.UTC(yil, ay - 1, gun, 0, 0, 0);
    var gunFarki = (secilenMs - HC_AEH_REFERANS_YENIAY_MS) / 86400000;
    var ayYasi = hcAehNormalizeAge(gunFarki);
    var evre = hcAehEvreBul(ayYasi);
    var fazOrani = ayYasi / HC_AEH_SINODIK_AY;
    var aydinlanma = ((1 - Math.cos(2 * Math.PI * fazOrani)) / 2) * 100;

    var anaEvreAralik = HC_AEH_SINODIK_AY / 4;
    var anaEvreKalani = ayYasi % anaEvreAralik;
    var anaEvreMesafesi = Math.min(anaEvreKalani, anaEvreAralik - anaEvreKalani);

    document.getElementById('hc-aeh-badge').textContent = evre.rozet;
    document.getElementById('hc-aeh-faz').textContent = evre.ad;
    document.getElementById('hc-aeh-yorum').textContent = evre.yorum;
    document.getElementById('hc-aeh-yas').textContent = hcAehFormat(ayYasi, 2) + ' gün';
    document.getElementById('hc-aeh-aydinlanma').textContent = hcAehFormat(aydinlanma, 1) + ' %';
    document.getElementById('hc-aeh-dongu').textContent = evre.dongu;
    document.getElementById('hc-aeh-bilgi').textContent = 'Bu hesaplama, ortalama 29,53 günlük sinodik ay döngüsüne göre yaklaşık sonuç verir.';

    var uyariMetni = '';
    if (anaEvreMesafesi < 0.75) {
        uyariMetni = 'Seçilen tarih bir ana evre geçişine çok yakın olabilir. Gün içindeki saate göre sonuç bir önceki veya sonraki evreye kayabilir.';
    }

    document.getElementById('hc-aeh-uyari').textContent = uyariMetni;
    document.getElementById('hc-aeh-uyari').style.display = uyariMetni ? 'block' : 'none';
    document.getElementById('hc-aeh-result').classList.add('visible');
}

document.addEventListener('DOMContentLoaded', function() {
    var tarihInput = document.getElementById('hc-aeh-tarih');

    if (!tarihInput || tarihInput.value) {
        return;
    }

    var bugun = new Date();
    var yil = bugun.getFullYear();
    var ay = String(bugun.getMonth() + 1).padStart(2, '0');
    var gun = String(bugun.getDate()).padStart(2, '0');

    tarihInput.value = yil + '-' + ay + '-' + gun;
});
