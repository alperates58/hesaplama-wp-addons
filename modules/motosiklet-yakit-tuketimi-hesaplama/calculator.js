function hcMotoYakitHesapla() {
    var yol = parseFloat(document.getElementById('hc-myf-yol').value) || 0;
    var yakit = parseFloat(document.getElementById('hc-myf-yakit').value) || 0;
    var fiyat = parseFloat(document.getElementById('hc-myf-fiyat').value) || 0;

    if (yol <= 0 || yakit <= 0) {
        alert('Lütfen yol ve yakıt değerlerini giriniz.');
        return;
    }

    var ortalama = (yakit / yol) * 100;
    var toplamMaliyet = yakit * fiyat;
    var kmMaliyet = toplamMaliyet / yol;

    document.getElementById('hc-myf-res-ort').innerText = ortalama.toFixed(2) + ' L / 100 km';
    document.getElementById('hc-myf-res-km-maliyet').innerText = kmMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺ / km';
    document.getElementById('hc-myf-res-toplam').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + ' ₺';

    document.getElementById('hc-myf-result').classList.add('visible');
}