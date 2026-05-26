function hcYillikIzinAlacagiHesapla() {
    var brut = parseFloat(document.getElementById('hc-yia-brut').value) || 0;
    var gun = parseFloat(document.getElementById('hc-yia-gun').value) || 0;

    if (brut <= 0 || gun <= 0) {
        alert('Lütfen brüt maaşınızı ve kullanılmayan izin gün sayısını giriniz.');
        return;
    }

    // Yıllık izin ücreti hesaplanırken günlük ücret, aylık brüt ücretin 30'a bölünmesiyle bulunur
    var gunlukBrut = brut / 30;
    var brutAlacak = gun * gunlukBrut;
    
    // Kesintiler: %14 SGK + %1 İşsizlik + %15 Gelir Vergisi (başlangıç dilimi) + %0.759 Damga Vergisi. Toplam kesinti: %30.76
    var netAlacak = brutAlacak * (1.0 - 0.30759);
    var kesinti = brutAlacak - netAlacak;

    document.getElementById('hc-yia-res-gunluk').innerText = gunlukBrut.toFixed(2).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yia-res-brut').innerText = Math.round(brutAlacak).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yia-res-kesinti').innerText = '-' + Math.round(kesinti).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-yia-res-net').innerText = Math.round(netAlacak).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-yia-result').classList.add('visible');
}