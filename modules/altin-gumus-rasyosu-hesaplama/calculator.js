function hcRasyoHesapla() {
    fetch('https://finans.truncgil.com/today.json')
        .then(function(res) { return res.json(); })
        .then(function(data) {
            var altinData = data['gram-altin'];
            var gumusData = data['gumus'];

            if (!altinData || !gumusData) {
                alert('Altın veya Gümüş fiyat verisi alınamadı.');
                return;
            }

            var altin = parseFloat(altinData['Satış'].replace(/\./g, '').replace(',', '.'));
            var gumus = parseFloat(gumusData['Satış'].replace(/\./g, '').replace(',', '.'));

            var rasyo = altin / gumus;

            var sinyal = '';
            var renk = '#3b82f6';

            if (rasyo >= 80) {
                sinyal = 'Gümüş Aşırı Ucuz (Gümüş Alım Sinyali) - Tarihsel ortalamaya göre gümüş altına kıyasla ucuz kalmıştır.';
                renk = 'var(--hc-front-green)';
            } else if (rasyo <= 60) {
                sinyal = 'Altın Aşırı Ucuz (Altın Alım Sinyali) - Gümüş fiyatı altına kıyasla rasyoda değerli bölgededir.';
                renk = '#ef4444';
            } else {
                sinyal = 'Nötr / Dengeli Aralık (Tarihsel Normlar Dahilinde)';
                renk = '#eab308';
            }

            document.getElementById('hc-agr-res-altin').innerText = altin.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            document.getElementById('hc-agr-res-gumus').innerText = gumus.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
            document.getElementById('hc-agr-res-rasyo').innerText = rasyo.toFixed(2);
            document.getElementById('hc-agr-res-rasyo').style.color = renk;
            document.getElementById('hc-agr-res-sinyal').innerText = sinyal;
            document.getElementById('hc-agr-res-sinyal').style.color = renk;

            document.getElementById('hc-agr-result').classList.add('visible');
        })
        .catch(function() {
            alert('Fiyat sunucusuna bağlanırken hata oluştu.');
        });
}