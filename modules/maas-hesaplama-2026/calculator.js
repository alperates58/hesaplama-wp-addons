var HC_MAAS_2026 = {
    aylar: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
    sgkIsci: 0.14,
    issizlikIsci: 0.01,
    sgkIsveren: 0.205,
    issizlikIsveren: 0.02,
    damga: 0.00759,
    asgariBrut: 33030,
    gvTarife: [
        { sinir: 190000, oran: 0.15 },
        { sinir: 400000, oran: 0.20 },
        { sinir: 1500000, oran: 0.27 },
        { sinir: 5300000, oran: 0.35 },
        { sinir: Infinity, oran: 0.40 }
    ]
};

function hcRound2(n) { return Math.round(n * 100) / 100; }

function hcTL(n) {
    return hcRound2(n).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function hcGelirVergisi(kumulatifOnce, matrahAy) {
    var kalan = matrahAy;
    var vergi = 0;
    var alt = kumulatifOnce;

    for (var i = 0; i < HC_MAAS_2026.gvTarife.length && kalan > 0; i++) {
        var d = HC_MAAS_2026.gvTarife[i];
        var kapasite = Math.max(0, d.sinir - alt);
        var parca = Math.min(kalan, kapasite);
        vergi += parca * d.oran;
        kalan -= parca;
        alt += parca;
    }

    return vergi;
}

function hcBruttenNete(brut, kumulatif, istisna) {
    var sskIsci = brut * HC_MAAS_2026.sgkIsci;
    var issizlikIsci = brut * HC_MAAS_2026.issizlikIsci;
    var matrah = brut - sskIsci - issizlikIsci;

    var gelirVergisi = hcGelirVergisi(kumulatif, matrah);
    var damgaVergisi = brut * HC_MAAS_2026.damga;

    var gvIstisna = 0;
    var damgaIstisna = 0;

    if (istisna) {
        gvIstisna = (HC_MAAS_2026.asgariBrut * (1 - HC_MAAS_2026.sgkIsci - HC_MAAS_2026.issizlikIsci)) * 0.15;
        damgaIstisna = HC_MAAS_2026.asgariBrut * HC_MAAS_2026.damga;
    }

    var odenecekGV = Math.max(0, gelirVergisi - gvIstisna);
    var odenecekDamga = Math.max(0, damgaVergisi - damgaIstisna);
    var net = brut - sskIsci - issizlikIsci - odenecekGV - odenecekDamga;

    return {
        brut: brut,
        net: net,
        sskIsci: sskIsci,
        issizlikIsci: issizlikIsci,
        gelirVergisi: odenecekGV,
        damgaVergisi: odenecekDamga,
        matrah: matrah,
        gvIstisna: gvIstisna,
        damgaIstisna: damgaIstisna,
        agi: 0,
        kumulatifSonra: kumulatif + matrah
    };
}

function hcNettenBrute(hedefNet, kumulatif, istisna) {
    var alt = hedefNet;
    var ust = hedefNet * 2;

    for (var g = 0; g < 20; g++) {
        var test = hcBruttenNete(ust, kumulatif, istisna);
        if (test.net >= hedefNet) break;
        ust *= 1.5;
    }

    var sonuc = hcBruttenNete(ust, kumulatif, istisna);
    for (var i = 0; i < 55; i++) {
        var mid = (alt + ust) / 2;
        var hesap = hcBruttenNete(mid, kumulatif, istisna);
        if (hesap.net >= hedefNet) {
            ust = mid;
            sonuc = hesap;
        } else {
            alt = mid;
        }
    }

    return sonuc;
}

function hcSgkIsverenOran(indirim5, indirim2) {
    if (indirim5) return 0.155;
    if (indirim2) return 0.185;
    return HC_MAAS_2026.sgkIsveren;
}

function hcMaasTableRowInput(i) {
    return '<input type="number" class="hc-maas-input" id="hc-maas-ay-' + i + '" min="0" step="0.01" placeholder="0" />';
}

function hcOlusturTablo() {
    var tbody = document.getElementById('hc-maas-tbody');
    var html = '';

    for (var i = 0; i < HC_MAAS_2026.aylar.length; i++) {
        html += '<tr>' +
            '<td class="hc-maas-month">' + HC_MAAS_2026.aylar[i] + '</td>' +
            '<td>' + hcMaasTableRowInput(i) + '</td>' +
            '<td data-k="sskIsci"></td>' +
            '<td data-k="issizlikIsci"></td>' +
            '<td data-k="gelirVergisi"></td>' +
            '<td data-k="damgaVergisi"></td>' +
            '<td data-k="kumulatif"></td>' +
            '<td data-k="net"></td>' +
            '<td data-k="agi"></td>' +
            '<td data-k="gvIstisna"></td>' +
            '<td data-k="damgaIstisna"></td>' +
            '<td data-k="toplamNet"></td>' +
            '<td class="hc-maas-employer-col" data-k="sskIsveren"></td>' +
            '<td class="hc-maas-employer-col" data-k="issizlikIsveren"></td>' +
            '<td class="hc-maas-employer-col" data-k="toplamMaliyet"></td>' +
        '</tr>';
    }

    tbody.innerHTML = html;
}

function hcMaasTabloHesapla2026() {
    var tur = document.getElementById('hc-maas-ucret-tipi').value;
    var cocuk = parseInt(document.getElementById('hc-maas-cocuk').value, 10);
    var maliyetGoster = document.getElementById('hc-maas-maliyet').checked;
    var indirim5 = document.getElementById('hc-maas-indirim5').checked;
    var indirim2 = document.getElementById('hc-maas-indirim2').checked;
    var istisna = document.getElementById('hc-maas-istisna').checked;

    if (isNaN(cocuk) || cocuk < 0) {
        alert('Çocuk sayısı 0 veya daha büyük olmalıdır.');
        return;
    }

    if (indirim5 && indirim2) {
        alert('5 puan ve 2 puan indirim aynı anda uygulanamaz.');
        return;
    }

    var sskIsverenOran = hcSgkIsverenOran(indirim5, indirim2);
    var tbody = document.getElementById('hc-maas-tbody');
    var rows = tbody.querySelectorAll('tr');
    var kumulatif = 0;

    var toplam = {
        brut: 0, sskIsci: 0, issizlikIsci: 0, gelirVergisi: 0, damgaVergisi: 0, net: 0,
        agi: 0, gvIstisna: 0, damgaIstisna: 0, toplamNet: 0, sskIsveren: 0, issizlikIsveren: 0, toplamMaliyet: 0
    };

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var input = row.querySelector('.hc-maas-input');
        var girilen = parseFloat(input.value);

        if (isNaN(girilen) || girilen <= 0) {
            alert(HC_MAAS_2026.aylar[i] + ' için geçerli bir tutar girin.');
            return;
        }

        var hesap = tur === 'brutten'
            ? hcBruttenNete(girilen, kumulatif, istisna)
            : hcNettenBrute(girilen, kumulatif, istisna);

        kumulatif = hesap.kumulatifSonra;

        var sskIsveren = hesap.brut * sskIsverenOran;
        var issizlikIsveren = hesap.brut * HC_MAAS_2026.issizlikIsveren;
        var toplamMaliyet = hesap.brut + sskIsveren + issizlikIsveren;
        var toplamNet = hesap.net + hesap.agi;

        row.querySelector('[data-k="sskIsci"]').textContent = hcTL(hesap.sskIsci);
        row.querySelector('[data-k="issizlikIsci"]').textContent = hcTL(hesap.issizlikIsci);
        row.querySelector('[data-k="gelirVergisi"]').textContent = hcTL(hesap.gelirVergisi);
        row.querySelector('[data-k="damgaVergisi"]').textContent = hcTL(hesap.damgaVergisi);
        row.querySelector('[data-k="kumulatif"]').textContent = hcTL(kumulatif);
        row.querySelector('[data-k="net"]').textContent = hcTL(hesap.net);
        row.querySelector('[data-k="agi"]').textContent = hcTL(hesap.agi);
        row.querySelector('[data-k="gvIstisna"]').textContent = hcTL(hesap.gvIstisna);
        row.querySelector('[data-k="damgaIstisna"]').textContent = hcTL(hesap.damgaIstisna);
        row.querySelector('[data-k="toplamNet"]').textContent = hcTL(toplamNet);
        row.querySelector('[data-k="sskIsveren"]').textContent = maliyetGoster ? hcTL(sskIsveren) : '-';
        row.querySelector('[data-k="issizlikIsveren"]').textContent = maliyetGoster ? hcTL(issizlikIsveren) : '-';
        row.querySelector('[data-k="toplamMaliyet"]').textContent = maliyetGoster ? hcTL(toplamMaliyet) : '-';

        input.value = hcRound2(tur === 'brutten' ? hesap.brut : hesap.net);

        toplam.brut += hesap.brut;
        toplam.sskIsci += hesap.sskIsci;
        toplam.issizlikIsci += hesap.issizlikIsci;
        toplam.gelirVergisi += hesap.gelirVergisi;
        toplam.damgaVergisi += hesap.damgaVergisi;
        toplam.net += hesap.net;
        toplam.agi += hesap.agi;
        toplam.gvIstisna += hesap.gvIstisna;
        toplam.damgaIstisna += hesap.damgaIstisna;
        toplam.toplamNet += toplamNet;
        toplam.sskIsveren += sskIsveren;
        toplam.issizlikIsveren += issizlikIsveren;
        toplam.toplamMaliyet += toplamMaliyet;
    }

    document.getElementById('hc-maas-input-col').textContent = tur === 'brutten' ? 'Brüt' : 'Net';
    document.getElementById('hc-maas-baslik').textContent = tur === 'brutten' ? 'Brütten Nete Maaş Hesabı' : 'Netten Brüte Maaş Hesabı';

    var tfoot = document.getElementById('hc-maas-tfoot');
    tfoot.innerHTML = '<tr>' +
        '<th>TOPLAM</th>' +
        '<th>' + hcTL(toplam.brut) + '</th>' +
        '<th>' + hcTL(toplam.sskIsci) + '</th>' +
        '<th>' + hcTL(toplam.issizlikIsci) + '</th>' +
        '<th>' + hcTL(toplam.gelirVergisi) + '</th>' +
        '<th>' + hcTL(toplam.damgaVergisi) + '</th>' +
        '<th>' + hcTL(kumulatif) + '</th>' +
        '<th>' + hcTL(toplam.net) + '</th>' +
        '<th>' + hcTL(toplam.agi) + '</th>' +
        '<th>' + hcTL(toplam.gvIstisna) + '</th>' +
        '<th>' + hcTL(toplam.damgaIstisna) + '</th>' +
        '<th>' + hcTL(toplam.toplamNet) + '</th>' +
        '<th class="hc-maas-employer-col">' + (maliyetGoster ? hcTL(toplam.sskIsveren) : '-') + '</th>' +
        '<th class="hc-maas-employer-col">' + (maliyetGoster ? hcTL(toplam.issizlikIsveren) : '-') + '</th>' +
        '<th class="hc-maas-employer-col">' + (maliyetGoster ? hcTL(toplam.toplamMaliyet) : '-') + '</th>' +
    '</tr>';

    var employerCols = document.querySelectorAll('#hc-maas-hesaplama-2026 .hc-maas-employer-col');
    for (var c = 0; c < employerCols.length; c++) {
        employerCols[c].style.display = maliyetGoster ? '' : 'none';
    }

    document.getElementById('hc-maas-result').classList.add('visible');
}

(function() {
    hcOlusturTablo();
})();
