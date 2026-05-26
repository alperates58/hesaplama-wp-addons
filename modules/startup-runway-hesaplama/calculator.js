function hcStartupRunwayHesapla() {
    var nakit = parseFloat(document.getElementById('hc-srw-nakit').value) || 0;
    var gelir = parseFloat(document.getElementById('hc-srw-gelir').value) || 0;
    var gider = parseFloat(document.getElementById('hc-srw-gider').value) || 0;

    if (nakit <= 0 || gider <= 0) {
        alert('Lütfen kasadaki nakit ve aylık gider tutarlarını giriniz.');
        return;
    }

    var netBurn = gider - gelir;

    if (netBurn <= 0) {
        document.getElementById('hc-srw-res-burn').innerText = 'Pozitif Nakit Akışı';
        document.getElementById('hc-srw-res-burn').style.color = 'var(--hc-front-green)';
        document.getElementById('hc-srw-res-runway').innerText = 'Sonsuz (Karlı Girişim)';
        document.getElementById('hc-srw-res-gunluk').innerText = '0.00';
        document.getElementById('hc-srw-result').classList.add('visible');
        return;
    }

    var runway = nakit / netBurn;
    var gunlukBurn = netBurn / 30;

    document.getElementById('hc-srw-res-burn').innerText = netBurn.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-srw-res-burn').style.color = 'var(--hc-front-red)';
    
    var runwayEl = document.getElementById('hc-srw-res-runway');
    runwayEl.innerText = runway.toFixed(1) + ' Ay (' + Math.round(runway * 30) + ' Gün)';
    runwayEl.style.color = runway >= 12 ? 'var(--hc-front-green)' : (runway >= 6 ? 'var(--hc-front-blue-dark)' : 'var(--hc-front-red)');

    document.getElementById('hc-srw-res-gunluk').innerText = gunlukBurn.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-srw-result').classList.add('visible');
}