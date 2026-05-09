function hcTytDeger(id) {
    var deger = parseFloat(document.getElementById(id).value.replace(',', '.'));
    return isNaN(deger) ? 0 : deger;
}

function hcTytFormatla(sayi) {
    return sayi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function hcTytTestOku(ad, dogruId, yanlisId, soruSayisi, katsayi) {
    var dogru = hcTytDeger(dogruId);
    var yanlis = hcTytDeger(yanlisId);

    if (dogru < 0 || yanlis < 0 || dogru + yanlis > soruSayisi) {
        return null;
    }

    return {
        ad: ad,
        dogru: dogru,
        yanlis: yanlis,
        net: dogru - (yanlis / 4),
        soruSayisi: soruSayisi,
        katsayi: katsayi
    };
}

function hcTytNetSatiri(test) {
    return '<div class="hc-tyt-puan-hesaplama-card">' +
        '<span class="hc-tyt-puan-hesaplama-label">' + test.ad + '</span>' +
        '<strong class="hc-tyt-puan-hesaplama-value">' + hcTytFormatla(test.net) + ' net</strong>' +
        '<small>' + hcTytFormatla(test.dogru) + ' doğru, ' + hcTytFormatla(test.yanlis) + ' yanlış</small>' +
    '</div>';
}

function hcTytPuanHesapla() {
    var testler = [
        hcTytTestOku('Türkçe', 'hc-tyt-turkce-dogru', 'hc-tyt-turkce-yanlis', 40, 3.30),
        hcTytTestOku('Sosyal Bilimler', 'hc-tyt-sosyal-dogru', 'hc-tyt-sosyal-yanlis', 20, 3.40),
        hcTytTestOku('Temel Matematik', 'hc-tyt-matematik-dogru', 'hc-tyt-matematik-yanlis', 40, 3.30),
        hcTytTestOku('Fen Bilimleri', 'hc-tyt-fen-dogru', 'hc-tyt-fen-yanlis', 20, 3.40)
    ];

    for (var i = 0; i < testler.length; i++) {
        if (!testler[i]) {
            alert('Lütfen her test için doğru ve yanlış sayılarını soru sayısını aşmayacak şekilde girin.');
            return;
        }
    }

    var turkceNet = testler[0].net;
    var matematikNet = testler[2].net;

    if (turkceNet < 0.5 && matematikNet < 0.5) {
        alert('TYT puanının hesaplanması için Türkçe veya Temel Matematik testlerinden en az 0,5 net gerekir.');
        return;
    }

    var toplamNet = 0;
    var hamPuan = 100;
    var sonucHTML = '';

    for (var j = 0; j < testler.length; j++) {
        toplamNet += testler[j].net;
        hamPuan += testler[j].net * testler[j].katsayi;
        sonucHTML += hcTytNetSatiri(testler[j]);
    }

    var diplomaInput = document.getElementById('hc-tyt-diploma').value.trim();
    var yerlestirmePuani = null;
    var obpKatki = 0;

    if (diplomaInput !== '') {
        var diploma = hcTytDeger('hc-tyt-diploma');
        if (diploma < 50 || diploma > 100) {
            alert('Lütfen 50 ile 100 arasında geçerli bir diploma notu girin.');
            return;
        }

        var obpKatsayi = parseFloat(document.getElementById('hc-tyt-obp-katsayi').value);
        obpKatki = diploma * 5 * obpKatsayi;
        yerlestirmePuani = hamPuan + obpKatki;
    }

    document.getElementById('hc-tyt-ham-puan').textContent = hcTytFormatla(hamPuan) + ' puan';
    document.getElementById('hc-tyt-yerlestirme-puani').textContent = yerlestirmePuani === null ? 'Diploma notu girilmedi' : hcTytFormatla(yerlestirmePuani) + ' puan';
    document.getElementById('hc-tyt-toplam-net').textContent = hcTytFormatla(toplamNet) + ' / 120 net';
    document.getElementById('hc-tyt-netler').innerHTML = sonucHTML;

    var uyari = 'Net hesabı: Doğru - Yanlış / 4. ';
    uyari += yerlestirmePuani === null ? 'OBP katkısı hesaplanmadı.' : 'OBP katkısı: +' + hcTytFormatla(obpKatki) + ' puan.';
    document.getElementById('hc-tyt-uyari').textContent = uyari;

    document.getElementById('hc-tyt-puan-hesaplama-result').classList.add('visible');
}
