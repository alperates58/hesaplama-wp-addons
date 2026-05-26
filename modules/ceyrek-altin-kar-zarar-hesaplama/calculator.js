function hcQuarterProfitHesapla() {
    var alisFiyati = parseFloat(document.getElementById('hc-cak-fiyat').value) || 0;
    var adet = parseInt(document.getElementById('hc-cak-adet').value) || 0;

    if (alisFiyati <= 0 || adet <= 0) {
        alert('Lütfen alış fiyatı ve miktarını doğru giriniz.');
        return;
    }

    fetch('https://finans.truncgil.com/today.json')
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var cell = data['ceyrek-altin'];
            if (!cell) {
                alert('Anlık altın fiyat verisi alınamadı.');
                return;
            }

            var anlikSatis = parseFloat(cell['Satış'].replace(/\./g, '').replace(',', '.'));
            var toplamYatirim = alisFiyati * adet;
            var guncelDeger = anlikSatis * adet;
            var netKar = guncelDeger - toplamYatirim;
            var roi = (netKar / toplamYatirim) * 100;

            document.getElementById('hc-cak-res-anlik').innerText = anlikSatis.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            document.getElementById('hc-cak-res-toplam').innerText = toplamYatirim.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            document.getElementById('hc-cak-res-guncel').innerText = guncelDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            
            var netEl = document.getElementById('hc-cak-res-net');
            var roiEl = document.getElementById('hc-cak-res-roi');
            
            netEl.innerText = (netKar >= 0 ? '+' : '') + netKar.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            roiEl.innerText = (netKar >= 0 ? '+' : '') + roi.toFixed(2) + '%';

            var renk = netKar >= 0 ? 'var(--hc-front-green)' : '#ef4444';
            netEl.style.color = renk;
            roiEl.style.color = renk;

            document.getElementById('hc-cak-result').classList.add('visible');
        })
        .catch(function() {
            alert('Altın fiyatı sunucusuna bağlanırken hata oluştu.');
        });
}