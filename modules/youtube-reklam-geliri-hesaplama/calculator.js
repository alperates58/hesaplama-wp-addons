function hcYtReklamParaBirimiDegisti() {
    var pb = document.getElementById('hc-ytr-para-birimi').value;
    var dolarGr = document.getElementById('hc-ytr-dolar-gr');
    var rpmInput = document.getElementById('hc-ytr-rpm');

    if (pb === 'USD') {
        dolarGr.style.display = 'block';
        if (rpmInput.value === '35.00') {
            rpmInput.value = '2.50'; // Default USD RPM
        }
        // Fetch live exchange rate
        fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
            .then(function(res) { return res.json(); })
            .then(function(veri) {
                if (veri && veri.result === 'success' && veri.conversion_rate) {
                    document.getElementById('hc-ytr-dolar').value = parseFloat(veri.conversion_rate).toFixed(2);
                }
            })
            .catch(function() {
                // Fallback to 36.00
                document.getElementById('hc-ytr-dolar').value = '36.00';
            });
    } else {
        dolarGr.style.display = 'none';
        if (rpmInput.value === '2.50') {
            rpmInput.value = '35.00'; // Default TRY RPM
        }
    }
}

function hcYoutubeReklamGeliriHesapla() {
    var izlenme = parseFloat(document.getElementById('hc-ytr-izlenme').value);
    var pb = document.getElementById('hc-ytr-para-birimi').value;
    var rpm = parseFloat(document.getElementById('hc-ytr-rpm').value);
    var dolar = parseFloat(document.getElementById('hc-ytr-dolar').value) || 36.00;

    if (!izlenme || izlenme <= 0) {
        alert('Lütfen geçerli bir günlük izlenme sayısı girin.');
        return;
    }
    if (!rpm || rpm <= 0) {
        alert('Lütfen geçerli bir RPM değeri girin.');
        return;
    }

    var gunlukKazanc = (izlenme * rpm) / 1000;
    var aylikKazanc = gunlukKazanc * 30;
    var yillikKazanc = gunlukKazanc * 365;

    var fmtKazanc = function(val, birim) {
        var formatted = val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        if (birim === 'USD') {
            var tryVal = val * dolar;
            var tryFormatted = tryVal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            return '$' + formatted + ' (' + tryFormatted + ' ₺)';
        }
        return formatted + ' ₺';
    };

    document.getElementById('hc-ytr-res-gunluk').textContent = fmtKazanc(gunlukKazanc, pb);
    document.getElementById('hc-ytr-res-aylik').textContent = fmtKazanc(aylikKazanc, pb);
    document.getElementById('hc-ytr-res-yillik').textContent = fmtKazanc(yillikKazanc, pb);

    document.getElementById('hc-youtube-reklam-geliri-result').classList.add('visible');
}
