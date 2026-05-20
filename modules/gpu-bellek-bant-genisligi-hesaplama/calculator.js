function hcGpuBellekBantGenisligiHesapla() {
    var hiz = parseFloat(document.getElementById('hc-gbb-hiz').value);
    var arayuz = parseFloat(document.getElementById('hc-gbb-arayuz').value);

    if (!hiz || hiz <= 0) {
        alert('Lütfen geçerli bir bellek hızı (Gbps) girin.');
        return;
    }

    // Bant Genişliği (GB/s) = (Hız * 10^9 * Arayüz) / (8 * 10^9) = (Hız * Arayüz) / 8
    var bantGenisligi = (hiz * arayuz) / 8;

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB/sn';
    };

    document.getElementById('hc-gbb-res-genislik').textContent = fmtSayi(bantGenisligi);

    var yorum = '';
    var renk = '';
    if (bantGenisligi < 150) {
        yorum = 'Giriş Seviyesi (Ofis, multimedya ve hafif e-spor oyunları için yeterli)';
        renk = 'var(--hc-front-red)';
    } else if (bantGenisligi >= 150 && bantGenisligi < 300) {
        yorum = 'Orta Seviye (1080p çözünürlükte modern oyunlar için ideal standart)';
        renk = 'var(--hc-front-text)';
    } else if (bantGenisligi >= 300 && bantGenisligi < 500) {
        yorum = 'Yüksek Performans (1440p / 2K oyunculuk ve video kurgu işleri için mükemmel)';
        renk = 'var(--hc-front-blue)';
    } else if (bantGenisligi >= 500 && bantGenisligi < 800) {
        yorum = 'Üst Segment (4K oyunculuk, render alma ve yerel yapay zeka modelleri için çok güçlü)';
        renk = 'var(--hc-front-green)';
    } else {
        yorum = 'Ultra Segment / Amiral Gemisi (Ekstrem 4K/8K oyun, ağır 3D işleme ve büyük AI/LLM model yükleri)';
        renk = 'var(--hc-front-green)';
    }

    var yorumEl = document.getElementById('hc-gbb-res-yorum');
    yorumEl.textContent = yorum;
    yorumEl.style.color = renk;

    document.getElementById('hc-gpu-bandwidth-result').classList.add('visible');
}
