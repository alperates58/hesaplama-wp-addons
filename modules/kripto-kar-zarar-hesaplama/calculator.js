function hcKriptoKarZararHesapla() {
    var alis = parseFloat(document.getElementById('hc-kkz-alis').value) || 0;
    var satis = parseFloat(document.getElementById('hc-kkz-satis').value) || 0;
    var miktar = parseFloat(document.getElementById('hc-kkz-miktar').value) || 0;
    var komisyon = parseFloat(document.getElementById('hc-kkz-komisyon').value) || 0;

    if (alis <= 0 || satis <= 0 || miktar <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    var hamMaliyet = alis * miktar;
    var alisKomisyon = hamMaliyet * (komisyon / 100);
    var toplamMaliyet = hamMaliyet + alisKomisyon;

    var hamGelir = satis * miktar;
    var satisKomisyon = hamGelir * (komisyon / 100);
    var toplamGelir = hamGelir - satisKomisyon;

    var netKarZarar = toplamGelir - toplamMaliyet;
    var roi = (netKarZarar / toplamMaliyet) * 100;

    document.getElementById('hc-kkz-res-maliyet').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-kkz-res-gelir').innerText = toplamGelir.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var kzEl = document.getElementById('hc-kkz-res-karzarar');
    kzEl.innerText = (netKarZarar >= 0 ? '+' : '') + netKarZarar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    kzEl.style.color = netKarZarar >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    var roiEl = document.getElementById('hc-kkz-res-roi');
    roiEl.innerText = (roi >= 0 ? '+' : '') + roi.toFixed(2) + '%';
    roiEl.style.color = roi >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-kkz-result').classList.add('visible');
}