function hcYtCpmParaBirimiDegisti() {
    var pb = document.getElementById('hc-ytc-para-birimi').value;
    var dolarGr = document.getElementById('hc-ytc-dolar-gr');
    var cpmInput = document.getElementById('hc-ytc-cpm');

    if (pb === 'USD') {
        dolarGr.style.display = 'block';
        if (cpmInput.value === '50.00') {
            cpmInput.value = '4.00'; // Default USD CPM
        }
        fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
            .then(function(res) { return res.json(); })
            .then(function(veri) {
                if (veri && veri.result === 'success' && veri.conversion_rate) {
                    document.getElementById('hc-ytc-dolar').value = parseFloat(veri.conversion_rate).toFixed(2);
                }
            })
            .catch(function() {
                document.getElementById('hc-ytc-dolar').value = '36.00';
            });
    } else {
        dolarGr.style.display = 'none';
        if (cpmInput.value === '4.00') {
            cpmInput.value = '50.00'; // Default TRY CPM
        }
    }
}

function hcYoutubeCpmGelirHesapla() {
    var izlenme = parseFloat(document.getElementById('hc-ytc-izlenme').value);
    var reklamOrani = parseFloat(document.getElementById('hc-ytc-reklam-orani').value) / 100;
    var pb = document.getElementById('hc-ytc-para-birimi').value;
    var cpm = parseFloat(document.getElementById('hc-ytc-cpm').value);
    var dolar = parseFloat(document.getElementById('hc-ytc-dolar').value) || 36.00;

    if (!izlenme || izlenme <= 0) {
        alert('Lütfen geçerli bir toplam izlenme sayısı girin.');
        return;
    }
    if (isNaN(reklamOrani) || reklamOrani < 0 || reklamOrani > 1) {
        alert('Lütfen geçerli bir reklam gösterim oranı (%) girin.');
        return;
    }
    if (!cpm || cpm <= 0) {
        alert('Lütfen geçerli bir CPM değeri girin.');
        return;
    }

    var reklamGosterimleri = izlenme * reklamOrani;
    var brutGelir = (reklamGosterimleri * cpm) / 1000;
    var kesinti = brutGelir * 0.45;
    var netGelir = brutGelir * 0.55;

    var fmtSayi = function(val) {
        return Math.round(val).toLocaleString('tr-TR');
    };

    var fmtKazanc = function(val, birim) {
        var formatted = val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        if (birim === 'USD') {
            var tryVal = val * dolar;
            var tryFormatted = tryVal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            return '$' + formatted + ' (' + tryFormatted + ' ₺)';
        }
        return formatted + ' ₺';
    };

    document.getElementById('hc-ytc-res-gosterim').textContent = fmtSayi(reklamGosterimleri) + ' gösterim';
    document.getElementById('hc-ytc-res-brut').textContent = fmtKazanc(brutGelir, pb);
    document.getElementById('hc-ytc-res-kesinti').textContent = fmtKazanc(kesinti, pb);
    document.getElementById('hc-ytc-res-net').textContent = fmtKazanc(netGelir, pb);

    document.getElementById('hc-youtube-cpm-gelir-result').classList.add('visible');
}
