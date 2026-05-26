function hcPlatinPaladyumHesapla() {
    var metal = document.getElementById('hc-ppd-metal').value;
    var miktar = parseFloat(document.getElementById('hc-ppd-miktar').value) || 0;

    if (miktar <= 0) {
        alert('Lütfen geçerli bir miktar giriniz.');
        return;
    }

    fetch('https://finans.truncgil.com/today.json')
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var metalData = data[metal];
            if (!metalData) {
                alert('Platin veya Paladyum fiyatı anlık olarak alınamadı.');
                return;
            }

            var fiyat = parseFloat(metalData['Satış'].replace(/\./g, '').replace(',', '.'));
            var toplam = fiyat * miktar;

            document.getElementById('hc-ppd-res-fiyat').innerText = fiyat.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            document.getElementById('hc-ppd-res-toplam').innerText = toplam.toLocaleString('tr-TR', {maximumFractionDigits: 0}) + ' ₺';

            document.getElementById('hc-ppd-result').classList.add('visible');
        })
        .catch(function() {
            alert('Fiyat sunucusuna bağlanırken hata oluştu.');
        });
}