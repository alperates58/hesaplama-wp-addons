function hcPrParaBirimiDegisti() {
    var pb = document.getElementById('hc-pr-para-birimi').value;
    var dolarGr = document.getElementById('hc-pr-dolar-gr');

    var preCpm = document.getElementById('hc-pr-pre-cpm');
    var midCpm = document.getElementById('hc-pr-mid-cpm');
    var postCpm = document.getElementById('hc-pr-post-cpm');

    if (pb === 'USD') {
        dolarGr.style.display = 'block';
        preCpm.value = '18.00';
        midCpm.value = '25.00';
        postCpm.value = '10.00';
        
        fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
            .then(function(res) { return res.json(); })
            .then(function(veri) {
                if (veri && veri.result === 'success' && veri.conversion_rate) {
                    document.getElementById('hc-pr-dolar').value = parseFloat(veri.conversion_rate).toFixed(2);
                }
            })
            .catch(function() {
                document.getElementById('hc-pr-dolar').value = '36.00';
            });
    } else {
        dolarGr.style.display = 'none';
        preCpm.value = '75.00';
        midCpm.value = '100.00';
        postCpm.value = '50.00';
    }
}

function hcPodcastReklamGeliriHesapla() {
    var dinlenme = parseFloat(document.getElementById('hc-pr-dinlenme').value);
    var bolumler = parseFloat(document.getElementById('hc-pr-bolum').value);
    var pb = document.getElementById('hc-pr-para-birimi').value;
    var dolar = parseFloat(document.getElementById('hc-pr-dolar').value) || 36.00;

    var preAdet = parseFloat(document.getElementById('hc-pr-pre-adet').value) || 0;
    var preCpm = parseFloat(document.getElementById('hc-pr-pre-cpm').value) || 0;
    var midAdet = parseFloat(document.getElementById('hc-pr-mid-adet').value) || 0;
    var midCpm = parseFloat(document.getElementById('hc-pr-mid-cpm').value) || 0;
    var postAdet = parseFloat(document.getElementById('hc-pr-post-adet').value) || 0;
    var postCpm = parseFloat(document.getElementById('hc-pr-post-cpm').value) || 0;

    if (!dinlenme || dinlenme <= 0) {
        alert('Lütfen geçerli bir dinlenme sayısı girin.');
        return;
    }
    if (!bolumler || bolumler <= 0) {
        alert('Lütfen geçerli bir bölüm sayısı girin.');
        return;
    }

    var toplamAdet = preAdet + midAdet + postAdet;
    
    // Bölüm başı gelir hesabı
    var preGelir = (dinlenme * preAdet * preCpm) / 1000;
    var midGelir = (dinlenme * midAdet * midCpm) / 1000;
    var postGelir = (dinlenme * postAdet * postCpm) / 1000;

    var bolumGelir = preGelir + midGelir + postGelir;
    var aylikGelir = bolumGelir * bolumler;
    var yillikGelir = aylikGelir * 12;

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR');
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

    document.getElementById('hc-pr-res-gosterim').textContent = fmtSayi(toplamAdet * dinlenme) + ' gösterim';
    document.getElementById('hc-pr-res-bolum').textContent = fmtKazanc(bolumGelir, pb);
    document.getElementById('hc-pr-res-aylik').textContent = fmtKazanc(aylikGelir, pb);
    document.getElementById('hc-pr-res-yillik').textContent = fmtKazanc(yillikGelir, pb);

    document.getElementById('hc-podcast-reklam-result').classList.add('visible');
}
