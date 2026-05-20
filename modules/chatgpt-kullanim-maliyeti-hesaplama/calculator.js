(function() {
    fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
        .then(function(res) { return res.json(); })
        .then(function(veri) {
            if (veri && veri.result === 'success' && veri.conversion_rate) {
                var el = document.getElementById('hc-cg-dolar');
                if (el) el.value = parseFloat(veri.conversion_rate).toFixed(2);
            }
        })
        .catch(function() {
            // fallback stays 36.00
        });
})();

function hcCgTurDegisti() {
    var tur = document.getElementById('hc-cg-tur').value;
    var plusDiv = document.getElementById('hc-cg-plus-options');
    var apiDiv = document.getElementById('hc-cg-api-options');

    if (tur === 'plus') {
        plusDiv.style.display = 'block';
        apiDiv.style.display = 'none';
    } else {
        plusDiv.style.display = 'none';
        apiDiv.style.display = 'block';
    }
}

function hcChatgptKullanimMaliyetiHesapla() {
    var tur = document.getElementById('hc-cg-tur').value;
    var dolar = parseFloat(document.getElementById('hc-cg-dolar').value) || 36.00;

    var aylikUsd = 0;
    var soruMaliyetiRow = document.getElementById('hc-cg-res-soru-maliyeti-row');

    if (tur === 'plus') {
        var abonelik = parseFloat(document.getElementById('hc-cg-plus-fiyat').value);
        var kdv = parseFloat(document.getElementById('hc-cg-kdv').value) || 0;

        if (isNaN(abonelik) || abonelik <= 0 || kdv < 0) {
            alert('Lütfen geçerli abonelik ücreti ve KDV girin.');
            return;
        }

        aylikUsd = abonelik * (1 + kdv / 100);
        soruMaliyetiRow.style.display = 'none';
    } else {
        var model = document.getElementById('hc-cg-model').value;
        var soru = parseFloat(document.getElementById('hc-cg-soru').value);
        var kelimeIn = parseFloat(document.getElementById('hc-cg-kelime-in').value);
        var kelimeOut = parseFloat(document.getElementById('hc-cg-kelime-out').value);

        if (isNaN(soru) || soru <= 0 || isNaN(kelimeIn) || kelimeIn <= 0 || isNaN(kelimeOut) || kelimeOut <= 0) {
            alert('Lütfen soru ve ortalama kelime alanlarını doldurun.');
            return;
        }

        // Türkçe kelime token çarpanı ortalama 1.8'dir
        var tokenIn = kelimeIn * 1.8;
        var tokenOut = kelimeOut * 1.8;

        var fiyatlar = {
            'gpt-4o': { input: 2.50, output: 10.00 },
            'gpt-4o-mini': { input: 0.15, output: 0.60 }
        };

        var mFiyat = fiyatlar[model];
        var singleInMaliyet = (tokenIn * mFiyat.input) / 1000000;
        var singleOutMaliyet = (tokenOut * mFiyat.output) / 1000000;
        var singleToplamMaliyet = singleInMaliyet + singleOutMaliyet;

        aylikUsd = singleToplamMaliyet * soru * 30;

        var fmtSoruMaliyeti = '$' + singleToplamMaliyet.toLocaleString('tr-TR', { minimumFractionDigits: 5, maximumFractionDigits: 5 }) + 
            ' (' + (singleToplamMaliyet * dolar).toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 }) + ' ₺)';
        document.getElementById('hc-cg-res-soru-maliyeti').textContent = fmtSoruMaliyeti;
        soruMaliyetiRow.style.display = 'table-row';
    }

    var aylikTry = aylikUsd * dolar;
    var yillikTry = aylikTry * 12;

    var fmtPara = function(val, simge) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ' + simge;
    };

    document.getElementById('hc-cg-res-usd').textContent = '$' + aylikUsd.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    document.getElementById('hc-cg-res-try').textContent = fmtPara(aylikTry, '₺');
    document.getElementById('hc-cg-res-yillik').textContent = fmtPara(yillikTry, '₺');

    document.getElementById('hc-chatgpt-kullanim-maliyeti-result').classList.add('visible');
}
