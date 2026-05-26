function hcGoldCompareHesapla() {
    var miktar = parseFloat(document.getElementById('hc-gak-miktar').value) || 0;
    var kuyumcu = parseFloat(document.getElementById('hc-gak-kuyumcu').value) || 0;
    var banka = parseFloat(document.getElementById('hc-gak-banka').value) || 0;

    if (miktar <= 0) {
        alert('Lütfen geçerli bir gram miktarı giriniz.');
        return;
    }

    fetch('https://finans.truncgil.com/today.json')
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var ga = data['gram-altin'];
            if (!ga) {
                alert('Piyasa altın verisi alınamadı.');
                return;
            }

            var refFiyat = parseFloat(ga['Satış'].replace(/\./g, '').replace(',', '.'));
            
            var kuyumcuTop = kuyumcu > 0 ? kuyumcu * miktar : 0;
            var bankaTop = banka > 0 ? banka * miktar : 0;
            var refTop = refFiyat * miktar;

            var oneri = 'Gerekli fiyat girişlerini yapınız.';
            if (kuyumcuTop > 0 && bankaTop > 0) {
                if (kuyumcuTop < bankaTop) {
                    var kazanc = bankaTop - kuyumcuTop;
                    oneri = 'Fiziki Kuyumcu Alımı (Banka şubesine göre ' + kazanc.toLocaleString('tr-TR', {maximumFractionDigits:0}) + ' ₺ daha karlı)';
                } else {
                    var kazanc = kuyumcuTop - bankaTop;
                    oneri = 'Banka Mobil Şubesi (Kuyumcuya göre ' + kazanc.toLocaleString('tr-TR', {maximumFractionDigits:0}) + ' ₺ daha karlı)';
                }
            }

            document.getElementById('hc-gak-res-ref').innerText = refFiyat.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺ (Toplam: ' + refTop.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺)';
            document.getElementById('hc-gak-res-kuyumcu').innerText = kuyumcuTop > 0 ? kuyumcuTop.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺' : 'Girilmedi';
            document.getElementById('hc-gak-res-banka').innerText = bankaTop > 0 ? bankaTop.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺' : 'Girilmedi';
            document.getElementById('hc-gak-res-oneri').innerText = oneri;

            document.getElementById('hc-gak-result').classList.add('visible');
        })
        .catch(function() {
            alert('Altın fiyatı sunucusuna bağlanırken hata oluştu.');
        });
}