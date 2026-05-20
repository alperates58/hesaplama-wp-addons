(function() {
    fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
        .then(function(res) { return res.json(); })
        .then(function(veri) {
            if (veri && veri.result === 'success' && veri.conversion_rate) {
                var el = document.getElementById('hc-aigm-dolar');
                if (el) el.value = parseFloat(veri.conversion_rate).toFixed(2);
            }
        })
        .catch(function() {
            // fallback stays 36.00
        });
})();

function hcAigmModelDegisti() {
    var model = document.getElementById('hc-aigm-model').value;
    var customDiv = document.getElementById('hc-aigm-custom-price-gr');
    if (model === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
    }
}

function hcAiGoruntuUretimMaliyetiHesapla() {
    var model = document.getElementById('hc-aigm-model').value;
    var adet = parseFloat(document.getElementById('hc-aigm-adet').value);
    var dolar = parseFloat(document.getElementById('hc-aigm-dolar').value) || 36.00;

    if (isNaN(adet) || adet <= 0) {
        alert('Lütfen geçerli bir görsel üretim adedi girin.');
        return;
    }

    var fiyatlar = {
        'dalle3-hd': 0.08,
        'dalle3-std': 0.04,
        'dalle2': 0.018,
        'sdxl': 0.003,
        'sd15': 0.0015
    };

    var tekMaliyetUsd = 0;
    if (model === 'custom') {
        tekMaliyetUsd = parseFloat(document.getElementById('hc-aigm-custom-price').value) || 0.01;
    } else {
        tekMaliyetUsd = fiyatlar[model];
    }

    var tekMaliyetTry = tekMaliyetUsd * dolar;
    var toplamMaliyetUsd = tekMaliyetUsd * adet;
    var toplamMaliyetTry = toplamMaliyetUsd * dolar;

    var fmtUsd = function(val, dec) {
        return '$' + val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    var fmtTry = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec }) + ' ₺';
    };

    // Tek görsel maliyeti küçük olabildiği için ondalık basamakları esnek tutuyoruz
    var singleDec = tekMaliyetUsd < 0.01 ? 4 : 3;

    document.getElementById('hc-aigm-res-tek-usd').textContent = fmtUsd(tekMaliyetUsd, singleDec);
    document.getElementById('hc-aigm-res-tek-try').textContent = fmtTry(tekMaliyetTry, singleDec);

    document.getElementById('hc-aigm-res-toplam-usd').textContent = fmtUsd(toplamMaliyetUsd, 2);
    document.getElementById('hc-aigm-res-toplam-try').textContent = fmtTry(toplamMaliyetTry, 2);

    document.getElementById('hc-ai-goruntu-maliyet-result').classList.add('visible');
}
