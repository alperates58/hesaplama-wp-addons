var HC_ISSIZLIK_MAASI_2026 = {
    asgariBrut: 33030,
    damgaVergisi: 0.00759,
    uygunKodlar: ['04', '05', '15', '17', '18', '23', '24', '25', '27']
};

function hcIssizlikPara(value) {
    return value.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + ' TL';
}

function hcIssizlikTutarOku(value) {
    if (typeof value !== 'string') return NaN;
    var temiz = value.replace(/\s/g, '').replace(/\./g, '').replace(',', '.').replace(/[^\d.]/g, '');
    return parseFloat(temiz);
}

function hcIssizlikSonucYaz(hakVar, mesaj, aylikBrut, damga, net, sure, toplam, notMetni) {
    document.getElementById('hc-issizlik-durum').textContent = mesaj;
    document.getElementById('hc-issizlik-durum').className = 'hc-issizlik-maasi-hesaplama-status ' + (hakVar ? 'is-success' : 'is-warning');
    document.getElementById('hc-issizlik-net').textContent = hakVar ? hcIssizlikPara(net) : '-- TL';
    document.getElementById('hc-issizlik-sure').textContent = hakVar ? sure + ' ay' : '-- ay';
    document.getElementById('hc-issizlik-aylik-brut').textContent = hakVar ? hcIssizlikPara(aylikBrut) : '-- TL';
    document.getElementById('hc-issizlik-damga').textContent = hakVar ? hcIssizlikPara(damga) : '-- TL';
    document.getElementById('hc-issizlik-toplam').textContent = hakVar ? hcIssizlikPara(toplam) : '-- TL';
    document.getElementById('hc-issizlik-not').textContent = notMetni;
    document.getElementById('hc-issizlik-maasi-hesaplama-result').classList.add('visible');
}

function hcIssizlikMaasiHesapla() {
    var kod = document.getElementById('hc-issizlik-kod').value;
    var sure = parseInt(document.getElementById('hc-issizlik-prim').value, 10);
    var emekli = document.getElementById('hc-issizlik-emekli').value;
    var son120 = document.getElementById('hc-issizlik-son120').value;
    var toplamBrut = hcIssizlikTutarOku(document.getElementById('hc-issizlik-brut').value);

    if (!kod) {
        alert('Lütfen SGK işten ayrılış kodunu seçin.');
        return;
    }

    if (isNaN(sure)) {
        alert('Lütfen son 3 yıldaki prim gününüzü seçin.');
        return;
    }

    if (isNaN(toplamBrut) || toplamBrut <= 0) {
        alert('Lütfen son 4 aylık toplam brüt kazancı TL olarak girin.');
        return;
    }

    if (emekli === 'evet') {
        hcIssizlikSonucYaz(false, 'İşsizlik ödeneği hakkı oluşmaz.', 0, 0, 0, 0, 0, 'Emekli çalışanlar SGDP kapsamında değerlendirildiği için işsizlik sigortası primi üzerinden ödenek hesabı yapılmaz.');
        return;
    }

    if (son120 === 'hayir') {
        hcIssizlikSonucYaz(false, 'İşsizlik ödeneği hakkı oluşmaz.', 0, 0, 0, 0, 0, 'İşsizlik ödeneği için hizmet akdinin sona ermesinden önceki son 120 gün şartının sağlanması gerekir.');
        return;
    }

    if (sure <= 0) {
        hcIssizlikSonucYaz(false, 'İşsizlik ödeneği hakkı oluşmaz.', 0, 0, 0, 0, 0, 'Son 3 yılda en az 600 gün işsizlik sigortası primi bulunmalıdır.');
        return;
    }

    if (HC_ISSIZLIK_MAASI_2026.uygunKodlar.indexOf(kod) === -1) {
        hcIssizlikSonucYaz(false, 'Seçilen çıkış kodu ile doğrudan hak ediş görünmüyor.', 0, 0, 0, 0, 0, 'Haklı fesih veya hatalı çıkış kodu iddiası varsa İŞKUR ve uzman desteğiyle ayrıca değerlendirme yapılmalıdır.');
        return;
    }

    var ortalamaAylikBrut = toplamBrut / 4;
    var tavanBrut = HC_ISSIZLIK_MAASI_2026.asgariBrut * 0.80;
    var hesaplananAylikBrut = Math.min(ortalamaAylikBrut * 0.40, tavanBrut);
    var damga = hesaplananAylikBrut * HC_ISSIZLIK_MAASI_2026.damgaVergisi;
    var net = hesaplananAylikBrut - damga;
    var toplam = net * sure;
    var notMetni = hesaplananAylikBrut === tavanBrut
        ? 'Aylık brüt ödenek, 2026 brüt asgari ücretinin %80 tavanı ile sınırlandırılmıştır.'
        : 'Hesaplama son 4 aylık ortalama brüt kazancın %40’ı üzerinden yapılmıştır.';

    hcIssizlikSonucYaz(true, 'Tahmini net aylık işsizlik maaşı', hesaplananAylikBrut, damga, net, sure, toplam, notMetni);
}
