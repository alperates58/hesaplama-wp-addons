function hcUnitEkonomiHesapla() {
    var fiyat = parseFloat(document.getElementById('hc-ue-fiyat').value) || 0;
    var cogs = parseFloat(document.getElementById('hc-ue-cogs').value) || 0;
    var cac = parseFloat(document.getElementById('hc-ue-cac').value) || 0;

    if (fiyat <= 0) {
        alert('Lütfen birim satış fiyatını giriniz.');
        return;
    }

    var birimBrutKar = fiyat - cogs;
    var brutKarMarji = (birimBrutKar / fiyat) * 100;
    var katkiPayi = birimBrutKar - cac;
    var netKarMarji = (katkiPayi / fiyat) * 100;

    document.getElementById('hc-ue-res-brut-kar').innerText = birimBrutKar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-ue-res-brut-marj').innerText = '%' + brutKarMarji.toFixed(2);
    
    var katkiEl = document.getElementById('hc-ue-res-katki');
    katkiEl.innerText = (katkiPayi >= 0 ? '+' : '') + katkiPayi.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    katkiEl.style.color = katkiPayi >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    var netMarjEl = document.getElementById('hc-ue-res-net-marj');
    netMarjEl.innerText = '%' + netKarMarji.toFixed(2);
    netMarjEl.style.color = netKarMarji >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-ue-result').classList.add('visible');
}