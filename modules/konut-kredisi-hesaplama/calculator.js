function hcKonutKredisiHesapla() {
    var konutBedeli = parseFloat(document.getElementById('hc-konut-kredisi-konut-bedeli').value);
    var krediTutari = parseFloat(document.getElementById('hc-konut-kredisi-tutar').value);
    var vade = parseInt(document.getElementById('hc-konut-kredisi-vade').value, 10);
    var aylikFaizYuzde = parseFloat(document.getElementById('hc-konut-kredisi-faiz').value);
    var masraf = parseFloat(document.getElementById('hc-konut-kredisi-masraf').value) || 0;

    if (!konutBedeli || konutBedeli <= 0) {
        alert('Lütfen geçerli bir konut bedeli girin.');
        return;
    }

    if (!krediTutari || krediTutari <= 0) {
        alert('Lütfen geçerli bir kredi tutarı girin.');
        return;
    }

    if (krediTutari > konutBedeli) {
        alert('Kredi tutarı konut bedelinden yüksek olamaz.');
        return;
    }

    if (!vade || vade <= 0) {
        alert('Lütfen geçerli bir vade girin.');
        return;
    }

    if (aylikFaizYuzde < 0 || isNaN(aylikFaizYuzde)) {
        alert('Lütfen geçerli bir aylık faiz oranı girin.');
        return;
    }

    if (masraf < 0) {
        alert('Başlangıç masrafları negatif olamaz.');
        return;
    }

    var aylikFaiz = aylikFaizYuzde / 100;
    var aylikTaksit = aylikFaiz === 0
        ? krediTutari / vade
        : krediTutari * (aylikFaiz * Math.pow(1 + aylikFaiz, vade)) / (Math.pow(1 + aylikFaiz, vade) - 1);

    var toplamOdeme = aylikTaksit * vade;
    var toplamFaiz = toplamOdeme - krediTutari;
    var pesinat = konutBedeli - krediTutari;
    var krediOrani = (krediTutari / konutBedeli) * 100;
    var toplamMaliyet = toplamOdeme + masraf;

    var paraFmt = function(n) {
        return n.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    };

    var yuzdeFmt = function(n) {
        return '%' + n.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    };

    document.getElementById('hc-konut-kredisi-aylik-taksit').textContent = paraFmt(aylikTaksit);
    document.getElementById('hc-konut-kredisi-pesinat').textContent = paraFmt(pesinat);
    document.getElementById('hc-konut-kredisi-oran').textContent = yuzdeFmt(krediOrani);
    document.getElementById('hc-konut-kredisi-toplam-odeme').textContent = paraFmt(toplamOdeme);
    document.getElementById('hc-konut-kredisi-toplam-faiz').textContent = paraFmt(toplamFaiz);
    document.getElementById('hc-konut-kredisi-toplam-maliyet').textContent = paraFmt(toplamMaliyet);

    var kalanBorc = krediTutari;
    var planBody = document.getElementById('hc-konut-kredisi-plan-body');
    var satirlar = '';
    var planAySayisi = Math.min(vade, 12);

    for (var ay = 1; ay <= planAySayisi; ay++) {
        var faizTutari = kalanBorc * aylikFaiz;
        var anaparaTutari = aylikTaksit - faizTutari;
        var taksitTutari = aylikTaksit;

        if (ay === vade) {
            anaparaTutari = kalanBorc;
            taksitTutari = anaparaTutari + faizTutari;
        }

        kalanBorc = Math.max(0, kalanBorc - anaparaTutari);

        satirlar += '<tr>' +
            '<td>' + ay + '</td>' +
            '<td>' + paraFmt(taksitTutari) + '</td>' +
            '<td>' + paraFmt(faizTutari) + '</td>' +
            '<td>' + paraFmt(anaparaTutari) + '</td>' +
            '<td>' + paraFmt(kalanBorc) + '</td>' +
            '</tr>';
    }

    planBody.innerHTML = satirlar;
    document.getElementById('hc-konut-kredisi-result').classList.add('visible');
}
