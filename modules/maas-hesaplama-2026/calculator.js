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

function hcRound2(n) {
    return Math.round(n * 100) / 100;
}

function hcTL(n) {
    return hcRound2(n).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function hcTLInput(n) {
    return hcRound2(n).toLocaleString('tr-TR', { maximumFractionDigits: 2 });
}

function hcMaasParseTutar(value) {
    if (typeof value !== 'string') return NaN;
    var temiz = value.replace(/\s/g, '').replace(/\./g, '').replace(',', '.');
    return parseFloat(temiz);
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

function hcAsgariUcretIstisna(kumulatifOnce) {
    var matrah = HC_MAAS_2026.asgariBrut * (1 - HC_MAAS_2026.sgkIsci - HC_MAAS_2026.issizlikIsci);

    return {
        gelirVergisi: hcGelirVergisi(kumulatifOnce, matrah),
        damga: HC_MAAS_2026.asgariBrut * HC_MAAS_2026.damga
    };
}

function hcBruttenNete(brut, kumulatif, istisna) {
    var sskIsci = brut * HC_MAAS_2026.sgkIsci;
    var issizlikIsci = brut * HC_MAAS_2026.issizlikIsci;
    var matrah = brut - sskIsci - issizlikIsci;
    var gelirVergisiBrut = hcGelirVergisi(kumulatif, matrah);
    var damgaVergisiBrut = brut * HC_MAAS_2026.damga;
    var istisnaTutar = istisna ? hcAsgariUcretIstisna(kumulatif) : { gelirVergisi: 0, damga: 0 };
    var gvIstisna = Math.min(gelirVergisiBrut, istisnaTutar.gelirVergisi);
    var damgaIstisna = Math.min(damgaVergisiBrut, istisnaTutar.damga);
    var gelirVergisi = Math.max(0, gelirVergisiBrut - gvIstisna);
    var damgaVergisi = Math.max(0, damgaVergisiBrut - damgaIstisna);
    var net = brut - sskIsci - issizlikIsci - gelirVergisi - damgaVergisi;

    return {
        brut: brut,
        net: net,
        sskIsci: sskIsci,
        issizlikIsci: issizlikIsci,
        gelirVergisi: gelirVergisi,
        damgaVergisi: damgaVergisi,
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
    return '<input type="text" inputmode="decimal" class="hc-maas-input" id="hc-maas-ay-' + i + '" data-month-index="' + i + '" autocomplete="off" />';
}

function hcBosDeger() {
    return '<span class="hc-maas-empty">-</span>';
}

function hcOlusturTablo() {
    var tbody = document.getElementById('hc-maas-tbody');
    var tfoot = document.getElementById('hc-maas-tfoot');
    var html = '';

    for (var i = 0; i < HC_MAAS_2026.aylar.length; i++) {
        html += '<tr>' +
            '<th scope="row" class="hc-maas-month">' + HC_MAAS_2026.aylar[i] + '</th>' +
            '<td>' + hcMaasTableRowInput(i) + '</td>' +
            '<td data-k="sskIsci">' + hcBosDeger() + '</td>' +
            '<td data-k="issizlikIsci">' + hcBosDeger() + '</td>' +
            '<td data-k="gelirVergisi">' + hcBosDeger() + '</td>' +
            '<td data-k="damgaVergisi">' + hcBosDeger() + '</td>' +
            '<td data-k="kumulatif">' + hcBosDeger() + '</td>' +
            '<td data-k="net">' + hcBosDeger() + '</td>' +
            '<td data-k="agi">' + hcBosDeger() + '</td>' +
            '<td data-k="gvIstisna">' + hcBosDeger() + '</td>' +
            '<td data-k="damgaIstisna">' + hcBosDeger() + '</td>' +
            '<td data-k="toplamNet">' + hcBosDeger() + '</td>' +
            '<td class="hc-maas-employer-col" data-k="sskIsveren">' + hcBosDeger() + '</td>' +
            '<td class="hc-maas-employer-col" data-k="issizlikIsveren">' + hcBosDeger() + '</td>' +
            '<td class="hc-maas-employer-col" data-k="toplamMaliyet">' + hcBosDeger() + '</td>' +
        '</tr>';
    }

    tbody.innerHTML = html;
    tfoot.innerHTML = hcToplamSatiri();
}

function hcToplamSatiri(toplam, kumulatif, maliyetGoster) {
    toplam = toplam || {};
    var cols = ['brut', 'sskIsci', 'issizlikIsci', 'gelirVergisi', 'damgaVergisi', 'kumulatif', 'net', 'agi', 'gvIstisna', 'damgaIstisna', 'toplamNet'];
    var html = '<tr><th>TOPLAM</th>';

    for (var i = 0; i < cols.length; i++) {
        var key = cols[i];
        var value = key === 'kumulatif' ? kumulatif : toplam[key];
        html += '<th>' + (typeof value === 'number' ? hcTL(value) : '') + '</th>';
    }

    html += '<th class="hc-maas-employer-col">' + (maliyetGoster && typeof toplam.sskIsveren === 'number' ? hcTL(toplam.sskIsveren) : '') + '</th>';
    html += '<th class="hc-maas-employer-col">' + (maliyetGoster && typeof toplam.issizlikIsveren === 'number' ? hcTL(toplam.issizlikIsveren) : '') + '</th>';
    html += '<th class="hc-maas-employer-col">' + (maliyetGoster && typeof toplam.toplamMaliyet === 'number' ? hcTL(toplam.toplamMaliyet) : '') + '</th>';
    html += '</tr>';

    return html;
}

function hcMaasBaslikGuncelle() {
    var tur = document.getElementById('hc-maas-ucret-tipi').value;
    document.getElementById('hc-maas-input-col').textContent = tur === 'brutten' ? 'Brüt' : 'Net';
    document.getElementById('hc-maas-baslik').textContent = tur === 'brutten' ? 'Brütten Nete Maaş Hesabı' : 'Netten Brüte Maaş Hesabı';
}

function hcMaasIsverenKolonlariGuncelle() {
    var maliyetGoster = document.getElementById('hc-maas-maliyet').checked;
    var employerCols = document.querySelectorAll('#hc-maas-hesaplama-2026 .hc-maas-employer-col');

    for (var c = 0; c < employerCols.length; c++) {
        employerCols[c].style.display = maliyetGoster ? '' : 'none';
    }
}

function hcMaasMedeniDurumGuncelle() {
    var medeni = document.getElementById('hc-maas-medeni').value;
    var esi = document.getElementById('hc-maas-esi');

    if (medeni === 'bekar') {
        esi.value = 'evet';
        esi.disabled = true;
        esi.setAttribute('aria-disabled', 'true');
    } else {
        esi.disabled = false;
        esi.removeAttribute('aria-disabled');
    }
}

function hcMaasSonrakiAylariDoldur(input) {
    var index = parseInt(input.getAttribute('data-month-index'), 10);
    var tutar = hcMaasParseTutar(input.value);

    if (isNaN(index) || isNaN(tutar) || tutar <= 0) return;

    input.value = hcTLInput(tutar);

    var inputs = document.querySelectorAll('#hc-maas-hesaplama-2026 .hc-maas-input');
    for (var i = index + 1; i < inputs.length; i++) {
        inputs[i].value = hcTLInput(tutar);
    }
}

function hcMaasInputlariBagla() {
    var inputs = document.querySelectorAll('#hc-maas-hesaplama-2026 .hc-maas-input');

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('change', function() {
            hcMaasSonrakiAylariDoldur(this);
        });
        inputs[i].addEventListener('blur', function() {
            hcMaasSonrakiAylariDoldur(this);
        });
    }
}

function hcMaasBosAylariOncekiyleDoldur() {
    var inputs = document.querySelectorAll('#hc-maas-hesaplama-2026 .hc-maas-input');
    var sonTutar = null;

    for (var i = 0; i < inputs.length; i++) {
        var tutar = hcMaasParseTutar(inputs[i].value);

        if (!isNaN(tutar) && tutar > 0) {
            sonTutar = tutar;
            inputs[i].value = hcTLInput(tutar);
        } else if (sonTutar !== null) {
            inputs[i].value = hcTLInput(sonTutar);
        }
    }
}

function hcMaasTabloHesapla2026() {
    var tur = document.getElementById('hc-maas-ucret-tipi').value;
    var cocuk = parseInt(document.getElementById('hc-maas-cocuk').value, 10);
    var maliyetGoster = document.getElementById('hc-maas-maliyet').checked;
    var indirim5 = document.getElementById('hc-maas-indirim5').checked;
    var indirim2 = document.getElementById('hc-maas-indirim2').checked;
    var istisna = true;

    hcMaasBosAylariOncekiyleDoldur();

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
    var enAzBirTutar = false;

    var toplam = {
        brut: 0,
        sskIsci: 0,
        issizlikIsci: 0,
        gelirVergisi: 0,
        damgaVergisi: 0,
        net: 0,
        agi: 0,
        gvIstisna: 0,
        damgaIstisna: 0,
        toplamNet: 0,
        sskIsveren: 0,
        issizlikIsveren: 0,
        toplamMaliyet: 0
    };

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var input = row.querySelector('.hc-maas-input');
        var girilen = hcMaasParseTutar(input.value);

        if (isNaN(girilen) || girilen <= 0) {
            alert(HC_MAAS_2026.aylar[i] + ' için geçerli bir tutar girin.');
            input.focus();
            return;
        }

        if (tur === 'brutten' && girilen < HC_MAAS_2026.asgariBrut) {
            alert(HC_MAAS_2026.aylar[i] + ' için brüt tutar asgari ücretin altında olamaz.');
            input.focus();
            return;
        }

        enAzBirTutar = true;
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
        row.querySelector('[data-k="sskIsveren"]').textContent = maliyetGoster ? hcTL(sskIsveren) : '';
        row.querySelector('[data-k="issizlikIsveren"]').textContent = maliyetGoster ? hcTL(issizlikIsveren) : '';
        row.querySelector('[data-k="toplamMaliyet"]').textContent = maliyetGoster ? hcTL(toplamMaliyet) : '';

        input.value = hcTLInput(tur === 'brutten' ? hesap.brut : hesap.net);

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

    if (!enAzBirTutar) {
        alert('Lütfen en az bir ay için tutar girin.');
        return;
    }

    hcMaasBaslikGuncelle();
    document.getElementById('hc-maas-tfoot').innerHTML = hcToplamSatiri(toplam, kumulatif, maliyetGoster);
    hcMaasIsverenKolonlariGuncelle();
}

(function() {
    hcOlusturTablo();
    hcMaasBaslikGuncelle();
    hcMaasIsverenKolonlariGuncelle();
    hcMaasMedeniDurumGuncelle();
    hcMaasInputlariBagla();

    document.getElementById('hc-maas-ucret-tipi').addEventListener('change', hcMaasBaslikGuncelle);
    document.getElementById('hc-maas-maliyet').addEventListener('change', hcMaasIsverenKolonlariGuncelle);
    document.getElementById('hc-maas-medeni').addEventListener('change', hcMaasMedeniDurumGuncelle);
})();
