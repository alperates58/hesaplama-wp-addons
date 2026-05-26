function hcMusteriKarlilikHesapla() {
    var gelir = parseFloat(document.getElementById('hc-mbk-gelir').value) || 0;
    var saat = parseFloat(document.getElementById('hc-mbk-saat').value) || 0;
    var saatMaliyet = parseFloat(document.getElementById('hc-mbk-saat-maliyet').value) || 0;
    var gider = parseFloat(document.getElementById('hc-mbk-gider').value) || 0;

    if (gelir <= 0) {
        alert('Lütfen kazanılan toplam geliri giriniz.');
        return;
    }

    var eforMaliyeti = saat * saatMaliyet;
    var toplamMaliyet = eforMaliyeti + gider;
    var netKar = gelir - toplamMaliyet;
    var karMarji = (netKar / gelir) * 100;

    document.getElementById('hc-mbk-res-efor').innerText = eforMaliyeti.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-mbk-res-toplam-maliyet').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var netEl = document.getElementById('hc-mbk-res-net');
    netEl.innerText = (netKar >= 0 ? '+' : '') + netKar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    netEl.style.color = netKar >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    var marjEl = document.getElementById('hc-mbk-res-marj');
    marjEl.innerText = '%' + karMarji.toFixed(2);
    marjEl.style.color = karMarji >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-mbk-result').classList.add('visible');
}