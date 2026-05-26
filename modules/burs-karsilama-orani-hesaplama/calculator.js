function hcBkoHesapla() {
    var gider = parseFloat(document.getElementById('hc-bko-gider').value) || 0;
    var burs = parseFloat(document.getElementById('hc-bko-burs').value) || 0;
    var ekIs = parseFloat(document.getElementById('hc-bko-is').value) || 0;

    if (gider <= 0) {
        alert('Lütfen aylık gider bilginizi giriniz.');
        return;
    }

    var toplamGelir = burs + ekIs;
    var oran = (toplamGelir / gider) * 100;
    var fark = toplamGelir - gider;

    var farkText = '';
    var renk = 'var(--hc-front-green)';
    if (fark < 0) {
        farkText = Math.abs(fark).toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺ Açık var';
        renk = '#ef4444';
    } else {
        farkText = fark.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺ Bütçe Fazlası var';
    }

    document.getElementById('hc-bko-res-oran').innerText = '%' + oran.toFixed(1);
    document.getElementById('hc-bko-res-oran').style.color = (oran >= 100) ? 'var(--hc-front-green)' : '#eab308';
    document.getElementById('hc-bko-res-gelir').innerText = toplamGelir.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-bko-res-fark').innerText = farkText;
    document.getElementById('hc-bko-res-fark').style.color = renk;

    document.getElementById('hc-bko-result').classList.add('visible');
}