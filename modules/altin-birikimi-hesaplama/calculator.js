var hcAltinBirikimiFiyatOnbellegi = null;

var hcAltinBirikimiTurleri = [
    { id: 'hc-ab-gram-altin', ad: 'Gram altın', birim: 'g', safGram: 1, ayar: 24 },
    { id: 'hc-ab-bilezik', ad: '22 ayar bilezik', birim: 'g', safGram: 1, ayar: 22 },
    { id: 'hc-ab-ceyrek', ad: 'Çeyrek altın', birim: 'adet', safGram: 1.75, ayar: 22 },
    { id: 'hc-ab-yarim', ad: 'Yarım altın', birim: 'adet', safGram: 3.508, ayar: 22 },
    { id: 'hc-ab-tam', ad: 'Tam altın', birim: 'adet', safGram: 7.016, ayar: 22 },
    { id: 'hc-ab-cumhuriyet', ad: 'Cumhuriyet altını', birim: 'adet', safGram: 7.216, ayar: 24 }
];

function hcAltinBirikimiParaFormatla(tutar) {
    return tutar.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
}

function hcAltinBirikimiSayiFormatla(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', { minimumFractionDigits: basamak, maximumFractionDigits: basamak });
}

function hcAltinBirikimiVeriGetir() {
    if (hcAltinBirikimiFiyatOnbellegi && Date.now() - hcAltinBirikimiFiyatOnbellegi.zaman < 300000) {
        return Promise.resolve(hcAltinBirikimiFiyatOnbellegi);
    }

    var altinUrl = 'https://giavang.now/api/prices?type=XAUUSD';
    var kurUrl = 'https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY';

    return Promise.all([
        fetch(altinUrl).then(function(res) { return res.json(); }),
        fetch(kurUrl).then(function(res) { return res.json(); })
    ]).then(function(sonuclar) {
        var altinVerisi = sonuclar[0];
        var kurVerisi = sonuclar[1];
        var xauUsd = altinVerisi && altinVerisi.success ? parseFloat(altinVerisi.buy || altinVerisi.sell) : 0;
        var usdTry = kurVerisi && kurVerisi.conversion_rate ? parseFloat(kurVerisi.conversion_rate) : 0;

        if (!xauUsd || !usdTry) {
            throw new Error('Piyasa verisi alınamadı.');
        }

        hcAltinBirikimiFiyatOnbellegi = {
            gramTl: (xauUsd / 31.1034768) * usdTry,
            guncelleme: altinVerisi && altinVerisi.timestamp ? new Date(altinVerisi.timestamp * 1000) : new Date(),
            zaman: Date.now()
        };

        return hcAltinBirikimiFiyatOnbellegi;
    });
}

function hcAltinBirikimiKalemHesapla(tur, miktar, gramTl) {
    var safGram = tur.birim === 'g' ? miktar * (tur.ayar / 24) : miktar * tur.safGram;
    var deger = safGram * gramTl;

    return {
        ad: tur.ad,
        miktar: miktar,
        birim: tur.birim,
        safGram: safGram,
        deger: deger
    };
}

function hcAltinBirikimiHesapla() {
    var result = document.getElementById('hc-ab-result');
    var kalemler = [];
    var negatifVar = false;

    hcAltinBirikimiTurleri.forEach(function(tur) {
        var miktar = parseFloat(document.getElementById(tur.id).value) || 0;
        if (miktar < 0) negatifVar = true;
        if (miktar > 0) kalemler.push({ tur: tur, miktar: miktar });
    });

    if (negatifVar) {
        alert('Altın miktarları negatif olamaz.');
        return;
    }

    if (!kalemler.length) {
        alert('Lütfen en az bir altın miktarı girin.');
        return;
    }

    document.getElementById('hc-ab-toplam-gram').textContent = 'Hesaplanıyor...';
    document.getElementById('hc-ab-gram-fiyat').textContent = '';
    document.getElementById('hc-ab-saf-gram').textContent = '';
    document.getElementById('hc-ab-guncelleme').textContent = '';
    document.getElementById('hc-ab-kalemler').innerHTML = '';
    document.getElementById('hc-ab-not').textContent = '';
    result.classList.add('visible');

    hcAltinBirikimiVeriGetir().then(function(veri) {
        var toplamSafGram = 0;
        var toplamDeger = 0;
        var satirlar = '';
        var guncelleme = veri.guncelleme.toLocaleString('tr-TR', {
            timeZone: 'Europe/Istanbul',
            hour12: false
        });

        kalemler.forEach(function(kalem) {
            var hesap = hcAltinBirikimiKalemHesapla(kalem.tur, kalem.miktar, veri.gramTl);
            toplamSafGram += hesap.safGram;
            toplamDeger += hesap.deger;
            satirlar += '<tr>' +
                '<td>' + hesap.ad + ' (' + hcAltinBirikimiSayiFormatla(hesap.miktar, hesap.birim === 'g' ? 2 : 0) + ' ' + hesap.birim + ')</td>' +
                '<td>' + hcAltinBirikimiSayiFormatla(hesap.safGram, 3) + ' g</td>' +
                '<td><strong>' + hcAltinBirikimiParaFormatla(hesap.deger) + '</strong></td>' +
            '</tr>';
        });

        document.getElementById('hc-ab-toplam-gram').textContent = hcAltinBirikimiParaFormatla(toplamDeger);
        document.getElementById('hc-ab-gram-fiyat').textContent = hcAltinBirikimiParaFormatla(veri.gramTl) + ' / g';
        document.getElementById('hc-ab-saf-gram').textContent = hcAltinBirikimiSayiFormatla(toplamSafGram, 3) + ' g';
        document.getElementById('hc-ab-guncelleme').textContent = guncelleme;
        document.getElementById('hc-ab-kalemler').innerHTML = satirlar;
        document.getElementById('hc-ab-not').textContent = 'Sonuçlar 24 ayar saf gram altın karşılığı üzerinden yaklaşık hesaplanır. Alış-satış farkı, işçilik, vergi ve kurum marjı dahil değildir.';
    }).catch(function() {
        document.getElementById('hc-ab-toplam-gram').textContent = 'Veri alınamadı';
        document.getElementById('hc-ab-not').textContent = 'Lütfen bağlantınızı kontrol edip tekrar deneyin.';
    });
}
