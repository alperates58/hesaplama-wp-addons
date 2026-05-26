function hcKriptoYillikVergiHesapla() {
    var kar = parseFloat(document.getElementById('hc-yvy-kar').value) || 0;
    var zarar = parseFloat(document.getElementById('hc-yvy-zarar').value) || 0;
    var muafiyet = parseFloat(document.getElementById('hc-yvy-muafiyet').value) || 0;
    var oran = parseFloat(document.getElementById('hc-yvy-oran').value) || 0;

    var netKazanc = kar - zarar;
    var matrah = 0;
    var vergi = 0;

    if (netKazanc > 0) {
        matrah = netKazanc - muafiyet;
        if (matrah < 0) {
            matrah = 0;
        }
        vergi = matrah * (oran / 100);
    }

    var netKazancEl = document.getElementById('hc-yvy-res-net-kazanc');
    netKazancEl.innerText = (netKazanc >= 0 ? '+' : '') + netKazanc.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    netKazancEl.style.color = netKazanc >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-yvy-res-matrah').innerText = matrah.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-yvy-res-vergi').innerText = vergi.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-yvy-result').classList.add('visible');
}