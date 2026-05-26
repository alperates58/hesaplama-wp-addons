function hcAliskanlikHesapla() {
    var zorluk = parseFloat(document.getElementById('hc-aoh-zorluk').value) || 0;
    var motivasyon = parseFloat(document.getElementById('hc-aoh-motivasyon').value) || 5;
    var destek = parseFloat(document.getElementById('hc-aoh-destek').value) || 5;
    var tekrar = parseFloat(document.getElementById('hc-aoh-tekrar').value) || 0;

    // Bilimsel ortalama 66 gündür.
    var bazGun = 66;

    // Motivasyon etkisi (yüksek motivasyon süreyi kısaltabilir veya sabitleyecektir)
    var motMod = (10 - motivasyon) * 2;
    // Çevresel destek etkisi
    var destMod = (10 - destek) * 2;

    var gun = bazGun + zorluk + tekrar + motMod + destMod;
    if (gun < 18) gun = 18; // En az 18 gün (Lally araştırması minimum)

    // Başarı olasılığı formülü
    var sans = (motivasyon * 6) + (destek * 4) - (tekrar * 0.5);
    sans = Math.min(99, Math.max(10, sans));

    var tavsiye = 'İlk 22 gün direnç evresidir. Bu evrede zinciri kırmamaya özen gösterin.';
    if (gun > 80) {
        tavsiye = 'Alışkanlığınız oldukça zor veya seyrek. Adımları küçülterek başlamayı (Örn: Günde 1 saat spor yerine 10 dakika ile başlamak) deneyebilirsiniz.';
    }

    document.getElementById('hc-aoh-res-gun').innerText = Math.round(gun) + ' Gün';
    document.getElementById('hc-aoh-res-sans').innerText = '%' + Math.round(sans);
    document.getElementById('hc-aoh-res-tavsiye').innerText = tavsiye;

    document.getElementById('hc-aoh-result').classList.add('visible');
}