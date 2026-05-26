function hcKiraArtisYasalSinirHesapla() {
    var kira = parseFloat(document.getElementById('hc-kay-kira').value) || 0;
    var oran = parseFloat(document.getElementById('hc-kay-ay').value) || 0.25;
    
    if (kira <= 0) {
        alert('Lütfen mevcut kira bedelini giriniz.');
        return;
    }

    var artis = kira * oran;
    var yeniKira = kira + artis;

    document.getElementById('hc-kay-res-eski').innerText = kira.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kay-res-oran').innerText = '%' + (oran * 100).toFixed(2);
    document.getElementById('hc-kay-res-artis').innerText = '+' + Math.round(artis).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-kay-res-yeni').innerText = Math.round(yeniKira).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-kay-result').classList.add('visible');
}