function hcKriptoSermayeKazanciHesapla() {
    var alis = parseFloat(document.getElementById('hc-skv-alis').value) || 0;
    var satis = parseFloat(document.getElementById('hc-skv-satis').value) || 0;
    var oran = parseFloat(document.getElementById('hc-skv-oran').value) || 0;

    if (alis <= 0 || satis <= 0) {
        alert('Lütfen geçerli alış ve satış tutarları giriniz.');
        return;
    }

    var kazanc = satis - alis;
    var vergi = 0;
    
    if (kazanc > 0) {
        vergi = kazanc * (oran / 100);
    }
    
    var net = kazanc - vergi;

    var kazancEl = document.getElementById('hc-skv-res-kazanc');
    kazancEl.innerText = (kazanc >= 0 ? '+' : '') + kazanc.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    kazancEl.style.color = kazanc >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-skv-res-vergi').innerText = vergi.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var netEl = document.getElementById('hc-skv-res-net');
    netEl.innerText = (net >= 0 ? '+' : '') + net.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    netEl.style.color = net >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-skv-result').classList.add('visible');
}