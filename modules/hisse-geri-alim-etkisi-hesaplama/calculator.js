function hcHisseGeriAlimHesapla() {
    var lot = parseFloat(document.getElementById('hc-hga-adet').value) || 0;
    var fiyat = parseFloat(document.getElementById('hc-hga-fiyat').value) || 0;
    var kar = parseFloat(document.getElementById('hc-hga-kar').value) || 0;
    var butce = parseFloat(document.getElementById('hc-hga-butce').value) || 0;

    if (lot <= 0 || fiyat <= 0 || kar <= 0) {
        alert('Lütfen geçerli ödenmiş lot, hisse fiyatı ve net kar giriniz.');
        return;
    }

    var geriAlinanLot = butce / fiyat;
    if (geriAlinanLot >= lot) {
        alert('Geri alım bütçesi şirketin tüm hisselerinin değerinden büyük olamaz.');
        return;
    }

    var yeniLot = lot - geriAlinanLot;

    var eskiEps = kar / lot;
    var yeniEps = kar / yeniLot;

    var artisOrani = ((yeniEps - eskiEps) / eskiEps) * 100;

    document.getElementById('hc-hga-res-lot').innerText = Math.round(geriAlinanLot).toLocaleString('tr-TR') + ' Lot (%' + (geriAlinanLot/lot*100).toFixed(2) + ')';
    document.getElementById('hc-hga-res-eski-eps').innerText = eskiEps.toFixed(2) + ' ₺';
    document.getElementById('hc-hga-res-yeni-eps').innerText = yeniEps.toFixed(2) + ' ₺';
    document.getElementById('hc-hga-res-artis').innerText = '%' + artisOrani.toFixed(2);

    document.getElementById('hc-hga-result').classList.add('visible');
}