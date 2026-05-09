function hcIhtiyacParaFormatla(tutar) {
    return tutar.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    }) + ' ₺';
}

function hcIhtiyacOranFormatla(oran) {
    return '%' + oran.toLocaleString('tr-TR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function hcIhtiyacTaksitHesapla(tutar, efektifOran, vade) {
    if (efektifOran === 0) {
        return tutar / vade;
    }

    var kuvvet = Math.pow(1 + efektifOran, vade);
    return tutar * efektifOran * kuvvet / (kuvvet - 1);
}

function hcIhtiyacKredisiHesapla() {
    var krediTutari = parseFloat(document.getElementById('hc-ihtiyac-tutar').value);
    var aylikFaiz = parseFloat(document.getElementById('hc-ihtiyac-faiz').value);
    var vade = parseInt(document.getElementById('hc-ihtiyac-vade').value, 10);
    var tahsisOrani = parseFloat(document.getElementById('hc-ihtiyac-tahsis').value);
    var sigortaMasrafi = parseFloat(document.getElementById('hc-ihtiyac-sigorta').value) || 0;
    var kkdfOrani = 15;
    var bsmvOrani = 15;
    var result = document.getElementById('hc-ihtiyac-result');

    if (!krediTutari || krediTutari <= 0) {
        alert('Lütfen geçerli bir kredi tutarı girin.');
        return;
    }

    if (isNaN(aylikFaiz) || aylikFaiz < 0) {
        alert('Lütfen geçerli bir aylık faiz oranı girin.');
        return;
    }

    if (!vade || vade <= 0) {
        alert('Lütfen geçerli bir vade ayı girin.');
        return;
    }

    if (isNaN(tahsisOrani) || tahsisOrani < 0) {
        alert('Lütfen geçerli bir kredi tahsis ücreti oranı girin.');
        return;
    }

    if (sigortaMasrafi < 0) {
        alert('Lütfen geçerli bir masraf tutarı girin.');
        return;
    }

    var akdiOran = aylikFaiz / 100;
    var efektifAylikOran = akdiOran * (1 + kkdfOrani / 100 + bsmvOrani / 100);
    var aylikTaksit = hcIhtiyacTaksitHesapla(krediTutari, efektifAylikOran, vade);
    var kalanBorc = krediTutari;
    var toplamFaiz = 0;
    var toplamKkdf = 0;
    var toplamBsmv = 0;
    var toplamAnapara = 0;
    var tbody = document.getElementById('hc-ihtiyac-tbody');

    tbody.innerHTML = '';

    for (var ay = 1; ay <= vade; ay++) {
        var faiz = kalanBorc * akdiOran;
        var kkdf = faiz * kkdfOrani / 100;
        var bsmv = faiz * bsmvOrani / 100;
        var taksit = aylikTaksit;
        var anapara = taksit - faiz - kkdf - bsmv;

        if (ay === vade) {
            anapara = kalanBorc;
            taksit = anapara + faiz + kkdf + bsmv;
        }

        kalanBorc = Math.max(0, kalanBorc - anapara);
        toplamFaiz += faiz;
        toplamKkdf += kkdf;
        toplamBsmv += bsmv;
        toplamAnapara += anapara;

        var tr = document.createElement('tr');
        tr.innerHTML =
            '<td>' + ay + '</td>' +
            '<td>' + hcIhtiyacParaFormatla(taksit) + '</td>' +
            '<td>' + hcIhtiyacParaFormatla(anapara) + '</td>' +
            '<td>' + hcIhtiyacParaFormatla(faiz) + '</td>' +
            '<td>' + hcIhtiyacParaFormatla(kkdf) + '</td>' +
            '<td>' + hcIhtiyacParaFormatla(bsmv) + '</td>' +
            '<td>' + hcIhtiyacParaFormatla(kalanBorc) + '</td>';
        tbody.appendChild(tr);
    }

    var toplamVergi = toplamKkdf + toplamBsmv;
    var toplamTaksitOdemesi = toplamAnapara + toplamFaiz + toplamVergi;
    var tahsisUcreti = krediTutari * tahsisOrani / 100;
    var tahsisBsmv = tahsisUcreti * bsmvOrani / 100;
    var pesinMasraf = tahsisUcreti + tahsisBsmv + sigortaMasrafi;
    var toplamGeriOdeme = toplamTaksitOdemesi + pesinMasraf;
    var netTutar = Math.max(0, krediTutari - pesinMasraf);
    var efektifYillik = (Math.pow(1 + efektifAylikOran, 12) - 1) * 100;

    document.getElementById('hc-ihtiyac-taksit').textContent = hcIhtiyacParaFormatla(aylikTaksit);
    document.getElementById('hc-ihtiyac-aylik-taksit').textContent = hcIhtiyacParaFormatla(aylikTaksit);
    document.getElementById('hc-ihtiyac-toplam-odeme').textContent = hcIhtiyacParaFormatla(toplamGeriOdeme);
    document.getElementById('hc-ihtiyac-toplam-faiz').textContent = hcIhtiyacParaFormatla(toplamFaiz);
    document.getElementById('hc-ihtiyac-toplam-vergi').textContent = hcIhtiyacParaFormatla(toplamVergi);
    document.getElementById('hc-ihtiyac-pesin-masraf').textContent = hcIhtiyacParaFormatla(pesinMasraf);
    document.getElementById('hc-ihtiyac-net-tutar').textContent = hcIhtiyacParaFormatla(netTutar);
    document.getElementById('hc-ihtiyac-efektif-aylik').textContent = hcIhtiyacOranFormatla(efektifAylikOran * 100);
    document.getElementById('hc-ihtiyac-efektif-yillik').textContent = hcIhtiyacOranFormatla(efektifYillik);
    document.getElementById('hc-ihtiyac-not').textContent = 'Taksitler, faiz üzerinden %15 KKDF ve %15 BSMV eklenerek eşit taksitli ihtiyaç kredisi formülüyle hesaplanır. Banka kampanyaları, sigorta ve ek ücretler sonucu değiştirebilir.';
    result.classList.add('visible');
}
