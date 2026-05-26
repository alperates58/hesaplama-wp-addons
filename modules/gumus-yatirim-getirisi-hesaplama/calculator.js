function hcGumusRoiHesapla() {
    var alis = parseFloat(document.getElementById('hc-gyg-alis').value) || 0;
    var miktar = parseFloat(document.getElementById('hc-gyg-miktar').value) || 0;

    if (alis <= 0 || miktar <= 0) {
        alert('Lütfen alış fiyatını ve miktarını doğru giriniz.');
        return;
    }

    fetch('https://finans.truncgil.com/today.json')
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var gumusData = data['gumus'];
            if (!gumusData) {
                alert('Gümüş fiyatı alınamadı.');
                return;
            }

            var anlikSatis = parseFloat(gumusData['Satış'].replace(/\./g, '').replace(',', '.'));
            var toplamMaliyet = alis * miktar;
            var guncelDeger = anlikSatis * miktar;
            var net = guncelDeger - toplamMaliyet;
            var oran = (net / toplamMaliyet) * 100;

            document.getElementById('hc-gyg-res-anlik').innerText = anlikSatis.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            document.getElementById('hc-gyg-res-toplam').innerText = toplamMaliyet.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
            document.getElementById('hc-gyg-res-guncel').innerText = guncelDeger.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';
            
            var netEl = document.getElementById('hc-gyg-res-net');
            netEl.innerText = (net >= 0 ? '+' : '') + net.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺ (%' + oran.toFixed(2) + ')';
            netEl.style.color = net >= 0 ? 'var(--hc-front-green)' : '#ef4444';

            document.getElementById('hc-gyg-result').classList.add('visible');
        })
        .catch(function() {
            alert('Gümüş fiyatı sunucusuna bağlanırken hata oluştu.');
        });
}