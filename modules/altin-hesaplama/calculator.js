var hcAltinTurleri = {
    'gram-altin': { ad: 'Gram altın', safGram: 1, ayar: 24, miktarBirimi: 'g' },
    '22-ayar-bilezik': { ad: '22 ayar bilezik', safGram: 1, ayar: 22, miktarBirimi: 'g' },
    'ceyrek-altin': { ad: 'Çeyrek altın', safGram: 1.75, ayar: 22, miktarBirimi: 'adet' },
    'yarim-altin': { ad: 'Yarım altın', safGram: 3.508, ayar: 22, miktarBirimi: 'adet' },
    'tam-altin': { ad: 'Tam altın', safGram: 7.016, ayar: 22, miktarBirimi: 'adet' },
    'cumhuriyet-altini': { ad: 'Cumhuriyet altını', safGram: 7.216, ayar: 24, miktarBirimi: 'adet' }
};

var hcAltinFiyatOnbellegi = null;

function hcAltinMiktarEtiketiniGuncelle() {
    var tur = document.getElementById('hc-altin-tur').value;
    var info = hcAltinTurleri[tur];
    var label = document.getElementById('hc-altin-miktar-label');
    var input = document.getElementById('hc-altin-miktar');

    if (!info) return;

    if (info.miktarBirimi === 'g') {
        label.textContent = 'Miktar (g)';
        input.placeholder = 'g';
        input.step = '0.01';
    } else {
        label.textContent = 'Adet';
        input.placeholder = 'adet';
        input.step = '1';
    }
}

function hcAltinParaFormatla(tutar) {
    return tutar.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
}

function hcAltinSayiFormatla(sayi, basamak) {
    return sayi.toLocaleString('tr-TR', { minimumFractionDigits: basamak, maximumFractionDigits: basamak });
}

function hcAltinVeriGetir() {
    if (hcAltinFiyatOnbellegi && Date.now() - hcAltinFiyatOnbellegi.zaman < 300000) {
        return Promise.resolve(hcAltinFiyatOnbellegi);
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

        hcAltinFiyatOnbellegi = {
            safGramTl: (xauUsd / 31.1034768) * usdTry,
            guncelleme: altinVerisi && altinVerisi.timestamp ? new Date(altinVerisi.timestamp * 1000) : new Date(),
            zaman: Date.now()
        };

        return hcAltinFiyatOnbellegi;
    });
}

function hcAltinBirimFiyatHesapla(tur, safGramTl) {
    var info = hcAltinTurleri[tur];

    if (!info) return null;
    if (tur === 'gram-altin') return safGramTl;
    if (tur === '22-ayar-bilezik') return (info.ayar / 24) * safGramTl;

    return info.safGram * safGramTl;
}

function hcAltinHesapla() {
    var tur = document.getElementById('hc-altin-tur').value;
    var miktar = parseFloat(document.getElementById('hc-altin-miktar').value);
    var info = hcAltinTurleri[tur];
    var result = document.getElementById('hc-altin-result');

    if (!info) {
        alert('Lütfen geçerli bir altın türü seçin.');
        return;
    }

    if (!miktar || miktar <= 0) {
        alert('Lütfen geçerli bir miktar girin.');
        return;
    }

    document.getElementById('hc-altin-toplam').textContent = 'Hesaplanıyor...';
    document.getElementById('hc-altin-birim').textContent = '';
    document.getElementById('hc-altin-saf-gram').textContent = '';
    document.getElementById('hc-altin-guncelleme').textContent = '';
    document.getElementById('hc-altin-not').textContent = '';
    result.classList.add('visible');

    hcAltinVeriGetir().then(function(veri) {
        var birimFiyat = hcAltinBirimFiyatHesapla(tur, veri.safGramTl);
        var toplam = birimFiyat * miktar;
        var safGramMiktari = info.miktarBirimi === 'g' ? (info.ayar / 24) * miktar : info.safGram * miktar;
        var guncelleme = veri.guncelleme.toLocaleString('tr-TR', {
            timeZone: 'Europe/Istanbul',
            hour12: false
        });

        document.getElementById('hc-altin-toplam').textContent = hcAltinParaFormatla(toplam);
        document.getElementById('hc-altin-birim').textContent = hcAltinParaFormatla(birimFiyat) + (info.miktarBirimi === 'g' ? ' / g' : ' / adet');
        document.getElementById('hc-altin-saf-gram').textContent = hcAltinSayiFormatla(safGramMiktari, 3) + ' g';
        document.getElementById('hc-altin-guncelleme').textContent = guncelleme;
        document.getElementById('hc-altin-not').textContent = 'Sonuçlar anlık piyasa verisine göre yaklaşık değerdir; alış-satış farkı, işçilik ve kurum marjı dahil değildir.';
    }).catch(function() {
        document.getElementById('hc-altin-toplam').textContent = 'Veri alınamadı';
        document.getElementById('hc-altin-not').textContent = 'Lütfen bağlantınızı kontrol edip tekrar deneyin.';
    });
}

document.addEventListener('DOMContentLoaded', hcAltinMiktarEtiketiniGuncelle);
