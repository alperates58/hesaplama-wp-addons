(function() {
    // Fetch live rate on load
    fetch('https://v6.exchangerate-api.com/v6/ddf43dc83228f324754d8335/pair/USD/TRY')
        .then(function(res) { return res.json(); })
        .then(function(veri) {
            if (veri && veri.result === 'success' && veri.conversion_rate) {
                var el = document.getElementById('hc-twb-dolar');
                if (el) el.value = parseFloat(veri.conversion_rate).toFixed(2);
            }
        })
        .catch(function() {
            // keep default 36.00
        });
})();

function hcTwitchBitGeliriHesapla() {
    var bit = parseFloat(document.getElementById('hc-twb-bit').value);
    var dolar = parseFloat(document.getElementById('hc-twb-dolar').value) || 36.00;

    if (isNaN(bit) || bit < 0) {
        alert('Lütfen geçerli bir Bit miktarı girin.');
        return;
    }

    // 1 Bit = 0.01 USD
    var usdKazanc = bit * 0.01;
    var tryKazanc = usdKazanc * dolar;

    var fmtPara = function(val, simge) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ' + simge;
    };

    document.getElementById('hc-twb-res-usd').textContent = fmtPara(usdKazanc, '$');
    document.getElementById('hc-twb-res-try').textContent = fmtPara(tryKazanc, '₺');

    document.getElementById('hc-twitch-bit-geliri-result').classList.add('visible');
}
