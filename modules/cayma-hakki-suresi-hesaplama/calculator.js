function hcCaymaHakkiHesapla() {
    var teslimStr = document.getElementById('hc-chs-teslim').value;
    var bilgi = document.getElementById('hc-chs-bilgi').value;

    if (!teslimStr) {
        alert('Lütfen teslim veya satın alma tarihini seçiniz.');
        return;
    }

    var teslim = new Date(teslimStr);
    
    // Temel cayma süresi 14 gündür (TKHK m.48)
    // Eğer satıcı cayma hakkı konusunda bilgilendirmezse, tüketici cayma hakkını kullanmak için 14 günlük süreye ek olarak 1 yıllık ek süre kazanır.
    var limitDays = 14;
    if (bilgi === 'hayir') {
        limitDays = 14 + 365;
    }

    var sonTarih = new Date(teslim);
    sonTarih.setDate(teslim.getDate() + limitDays);

    var bugun = new Date();
    bugun.setHours(0,0,0,0);
    var diffTime = sonTarih - bugun;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var durumBox = document.getElementById('hc-chs-durum-box');
    var options = { year: 'numeric', month: 'long', day: 'numeric' };

    if (diffDays < 0) {
        durumBox.innerText = 'CAYMA SÜRESİ DOLMUŞTUR';
        durumBox.style.background = '#fef2f2';
        durumBox.style.border = '1px solid #fca5a5';
        durumBox.style.color = '#991b1b';
    } else {
        durumBox.innerText = 'CAYMA HAKKINIZ DEVAM EDİYOR';
        durumBox.style.background = '#f0fdf4';
        durumBox.style.border = '1px solid #bbf7d0';
        durumBox.style.color = '#166534';
    }

    document.getElementById('hc-chs-res-sure').innerText = limitDays + ' Gün' + (bilgi === 'hayir' ? ' (Bilgilendirme yapılmadığı için 1 yıl uzatılmıştır)' : '');
    document.getElementById('hc-chs-res-son-gun').innerText = sonTarih.toLocaleDateString('tr-TR', options);
    document.getElementById('hc-chs-res-kalan').innerText = diffDays < 0 ? 'Süre Doldu' : diffDays + ' Gün Kaldı';

    document.getElementById('hc-chs-result').classList.add('visible');
}