var HC_MAAS_2026 = {
    sgkIsci: 0.14,
    issizlikIsci: 0.01,
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

function hcFmt(n) {
    return hcRound2(n).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

function hcGelirVergisiHesapla(kumulatifOncesi, matrahAy) {
    var kalan = matrahAy;
    var altSinir = kumulatifOncesi;
    var vergi = 0;

    for (var i = 0; i < HC_MAAS_2026.gvTarife.length; i++) {
        if (kalan <= 0) break;

        var dilim = HC_MAAS_2026.gvTarife[i];
        var buDilimBosluk = Math.max(0, dilim.sinir - altSinir);
        var buDilimMiktar = Math.min(kalan, buDilimBosluk);

        vergi += buDilimMiktar * dilim.oran;
        kalan -= buDilimMiktar;
        altSinir += buDilimMiktar;
    }

    return vergi;
}

function hcBruttenNete2026(brut, kumulatif, istisnaUygula) {
    var sgkIsci = brut * HC_MAAS_2026.sgkIsci;
    var issizlikIsci = brut * HC_MAAS_2026.issizlikIsci;
    var gvMatrah = brut - sgkIsci - issizlikIsci;

    var gelirVergisi = hcGelirVergisiHesapla(kumulatif, gvMatrah);
    var damgaVergisi = brut * HC_MAAS_2026.damga;

    var gvIstisna = 0;
    var damgaIstisna = 0;

    if (istisnaUygula) {
        gvIstisna = (HC_MAAS_2026.asgariBrut * (1 - HC_MAAS_2026.sgkIsci - HC_MAAS_2026.issizlikIsci)) * 0.15;
        damgaIstisna = HC_MAAS_2026.asgariBrut * HC_MAAS_2026.damga;
    }

    var odenecekGV = Math.max(0, gelirVergisi - gvIstisna);
    var odenecekDamga = Math.max(0, damgaVergisi - damgaIstisna);

    var net = brut - sgkIsci - issizlikIsci - odenecekGV - odenecekDamga;

    return {
        brut: brut,
        net: net,
        sgkIsci: sgkIsci,
        issizlikIsci: issizlikIsci,
        gvMatrah: gvMatrah,
        gelirVergisi: gelirVergisi,
        odenecekGV: odenecekGV,
        damgaVergisi: damgaVergisi,
        odenecekDamga: odenecekDamga,
        gvIstisna: gvIstisna,
        damgaIstisna: damgaIstisna,
        kumulatifSonrasi: kumulatif + gvMatrah
    };
}

function hcNettenBrute2026(hedefNet, kumulatif, istisnaUygula) {
    var alt = hedefNet;
    var ust = hedefNet * 2;
    var sonuc = null;

    for (var genislet = 0; genislet < 20; genislet++) {
        var test = hcBruttenNete2026(ust, kumulatif, istisnaUygula);
        if (test.net >= hedefNet) break;
        ust *= 1.5;
    }

    for (var i = 0; i < 50; i++) {
        var mid = (alt + ust) / 2;
        var hesap = hcBruttenNete2026(mid, kumulatif, istisnaUygula);

        if (hesap.net > hedefNet) {
            ust = mid;
            sonuc = hesap;
        } else {
            alt = mid;
        }
    }

    if (!sonuc) {
        sonuc = hcBruttenNete2026(ust, kumulatif, istisnaUygula);
    }

    return sonuc;
}

function hcDetaySatiri(label, value) {
    return '<div class="hc-maas-hesaplama-2026-item"><span>' + label + '</span><strong>' + hcFmt(value) + ' TL</strong></div>';
}

function hcMaasHesapla2026() {
    var tur = document.getElementById('hc-maas-hesap-tur').value;
    var tutar = parseFloat(document.getElementById('hc-maas-tutar').value);
    var kumulatif = parseFloat(document.getElementById('hc-maas-kumulatif').value) || 0;
    var istisna = document.getElementById('hc-maas-istisna').checked;

    if (!tutar || tutar <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    if (kumulatif < 0) {
        alert('Kümülatif vergi matrahı negatif olamaz.');
        return;
    }

    var sonuc = tur === 'brutten'
        ? hcBruttenNete2026(tutar, kumulatif, istisna)
        : hcNettenBrute2026(tutar, kumulatif, istisna);

    var anaMetin = tur === 'brutten'
        ? 'Net Ücret: ' + hcFmt(sonuc.net) + ' TL'
        : 'Brüt Ücret: ' + hcFmt(sonuc.brut) + ' TL';

    var detay = '';
    detay += hcDetaySatiri('Brüt Ücret', sonuc.brut);
    detay += hcDetaySatiri('Net Ücret', sonuc.net);
    detay += hcDetaySatiri('SGK İşçi Primi (%14)', sonuc.sgkIsci);
    detay += hcDetaySatiri('İşsizlik İşçi Primi (%1)', sonuc.issizlikIsci);
    detay += hcDetaySatiri('Gelir Vergisi Matrahı', sonuc.gvMatrah);
    detay += hcDetaySatiri('Hesaplanan Gelir Vergisi', sonuc.gelirVergisi);
    detay += hcDetaySatiri('Gelir Vergisi İstisnası', sonuc.gvIstisna);
    detay += hcDetaySatiri('Ödenecek Gelir Vergisi', sonuc.odenecekGV);
    detay += hcDetaySatiri('Hesaplanan Damga Vergisi', sonuc.damgaVergisi);
    detay += hcDetaySatiri('Damga Vergisi İstisnası', sonuc.damgaIstisna);
    detay += hcDetaySatiri('Ödenecek Damga Vergisi', sonuc.odenecekDamga);
    detay += hcDetaySatiri('Yeni Kümülatif GV Matrahı', sonuc.kumulatifSonrasi);

    document.getElementById('hc-maas-ana-sonuc').textContent = anaMetin;
    document.getElementById('hc-maas-detay').innerHTML = detay;
    document.getElementById('hc-maas-result').classList.add('visible');
}
