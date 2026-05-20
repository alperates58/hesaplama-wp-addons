(function() {
    fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
        .then(function(res) { return res.json(); })
        .then(function(veri) {
            if (veri && veri.result === 'success' && veri.conversion_rate) {
                var el = document.getElementById('hc-ait-dolar');
                if (el) el.value = parseFloat(veri.conversion_rate).toFixed(2);
            }
        })
        .catch(function() {
            // fallback stays 36.00
        });
})();

function hcAiModelDegisti() {
    var model = document.getElementById('hc-ait-model').value;
    var customDiv = document.getElementById('hc-ait-custom-prices');
    if (model === 'custom') {
        customDiv.style.display = 'block';
    } else {
        customDiv.style.display = 'none';
    }
}

function hcAiApiTokenMaliyetiHesapla() {
    var model = document.getElementById('hc-ait-model').value;
    var inTokens = parseFloat(document.getElementById('hc-ait-input-tokens').value);
    var outTokens = parseFloat(document.getElementById('hc-ait-output-tokens').value);
    var requests = parseFloat(document.getElementById('hc-ait-requests').value);
    var dolar = parseFloat(document.getElementById('hc-ait-dolar').value) || 36.00;

    if (isNaN(inTokens) || inTokens < 0 || isNaN(outTokens) || outTokens < 0) {
        alert('Lütfen geçerli token miktarları girin.');
        return;
    }
    if (!requests || requests <= 0) {
        alert('Lütfen geçerli bir aylık istek sayısı girin.');
        return;
    }

    // 1M token başına USD fiyatları
    var fiyatlar = {
        'gpt-4o': { input: 2.50, output: 10.00 },
        'gpt-4o-mini': { input: 0.15, output: 0.60 },
        'claude-3-5-sonnet': { input: 3.00, output: 15.00 },
        'claude-3-haiku': { input: 0.25, output: 1.25 },
        'gemini-1-5-pro': { input: 1.25, output: 5.00 },
        'gemini-1-5-flash': { input: 0.075, output: 0.30 },
        'llama-3-70b': { input: 0.59, output: 0.79 }
    };

    var inputPrice1M = 0;
    var outputPrice1M = 0;

    if (model === 'custom') {
        inputPrice1M = parseFloat(document.getElementById('hc-ait-custom-input').value) || 0;
        outputPrice1M = parseFloat(document.getElementById('hc-ait-custom-output').value) || 0;
    } else {
        inputPrice1M = fiyatlar[model].input;
        outputPrice1M = fiyatlar[model].output;
    }

    var inCostSingle = (inTokens * inputPrice1M) / 1000000;
    var outCostSingle = (outTokens * outputPrice1M) / 1000000;
    var totalCostSingle = inCostSingle + outCostSingle;

    var totalCostMonthlyUsd = totalCostSingle * requests;
    var totalCostMonthlyTry = totalCostMonthlyUsd * dolar;

    var fmtUsd = function(val, dec) {
        return '$' + val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    var fmtTry = function(val, dec) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec }) + ' ₺';
    };

    // İstek başına maliyetlerde yüksek ondalık basamak gösterebiliriz çünkü çok küçük sayılar çıkabilir.
    document.getElementById('hc-ait-res-istek-girdi').textContent = fmtUsd(inCostSingle, 5) + ' (' + fmtTry(inCostSingle * dolar, 5) + ')';
    document.getElementById('hc-ait-res-istek-cikti').textContent = fmtUsd(outCostSingle, 5) + ' (' + fmtTry(outCostSingle * dolar, 5) + ')';
    document.getElementById('hc-ait-res-istek-toplam').textContent = fmtUsd(totalCostSingle, 5) + ' (' + fmtTry(totalCostSingle * dolar, 5) + ')';

    document.getElementById('hc-ait-res-aylik-usd').textContent = fmtUsd(totalCostMonthlyUsd, 2);
    document.getElementById('hc-ait-res-aylik-try').textContent = fmtTry(totalCostMonthlyTry, 2);

    document.getElementById('hc-ai-api-token-maliyeti-result').classList.add('visible');
}
