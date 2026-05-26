function hcGarantiKapsamiHesapla() {
    var teslimStr = document.getElementById('hc-gks-teslim').value;
    var yil = parseInt(document.getElementById('hc-gks-yil').value) || 2;
    var servisGun = parseInt(document.getElementById('hc-gks-servis').value) || 0;

    if (!teslimStr) {
        alert('Lütfen teslim tarihini seçiniz.');
        return;
    }

    var teslim = new Date(teslimStr);
    
    // Orijinal bitiş
    var orjBitis = new Date(teslim);
    orjBitis.setFullYear(teslim.getFullYear() + yil);

    // Serviste geçen süre garanti süresini durdurur ve uzatır
    var guncelBitis = new Date(orjBitis);
    guncelBitis.setDate(orjBitis.getDate() + servisGun);

    var bugun = new Date();
    bugun.setHours(0,0,0,0);
    var diffTime = guncelBitis - bugun;
    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    var durumBox = document.getElementById('hc-gks-durum-box');
    var options = { year: 'numeric', month: 'long', day: 'numeric' };

    if (diffDays < 0) {
        durumBox.innerText = 'GARANTİ KAPSAMI DIŞI (Süre Doldu)';
        durumBox.style.background = '#fef2f2';
        durumBox.style.border = '1px solid #fca5a5';
        durumBox.style.color = '#991b1b';
    } else {
        durumBox.innerText = 'GARANTİ DEVAM EDİYOR';
        durumBox.style.background = '#f0fdf4';
        durumBox.style.border = '1px solid #bbf7d0';
        durumBox.style.color = '#166534';
    }

    document.getElementById('hc-gks-res-orj').innerText = orjBitis.toLocaleDateString('tr-TR', options);
    document.getElementById('hc-gks-res-servis-gun').innerText = '+' + servisGun + ' Gün';
    document.getElementById('hc-gks-res-guncel').innerText = guncelBitis.toLocaleDateString('tr-TR', options);
    document.getElementById('hc-gks-res-kalan').innerText = diffDays < 0 ? 'Süre Doldu' : diffDays + ' Gün Kaldı';

    document.getElementById('hc-gks-result').classList.add('visible');
}