function hcSponsorluIcerikFiyatHesapla() {
    var takipci = parseFloat(document.getElementById('hc-sif-takipci').value);
    var platform = document.getElementById('hc-sif-platform').value;
    var tur = document.getElementById('hc-sif-tur').value;
    var kategori = document.getElementById('hc-sif-kategori').value;
    var etkilesim = parseFloat(document.getElementById('hc-sif-etkilesim').value);

    if (!takipci || takipci <= 0) {
        alert('Lütfen geçerli bir takipçi / abone sayısı girin.');
        return;
    }
    if (isNaN(etkilesim) || etkilesim < 0) {
        alert('Etkileşim oranı negatif olamaz.');
        return;
    }

    // Platform katsayıları (Takipçi başına ₺)
    var platformKat = {
        youtube: 0.15,
        instagram: 0.09,
        tiktok: 0.06,
        blog: 0.05
    };

    // İçerik tipi katsayıları
    var turKat = {
        video: 2.0,
        post: 1.0,
        story: 0.5,
        mention: 0.7
    };

    // Kategori katsayıları
    var kategoriKat = {
        finans: 2.2,
        teknoloji: 1.8,
        egitim: 1.3,
        moda: 1.1,
        eglence: 0.7
    };

    // Etkileşim katsayısı
    var etkilesimKat = 1.0;
    if (etkilesim < 1.0) {
        etkilesimKat = 0.75;
    } else if (etkilesim >= 1.0 && etkilesim < 3.0) {
        etkilesimKat = 1.0;
    } else if (etkilesim >= 3.0 && etkilesim < 6.0) {
        etkilesimKat = 1.3;
    } else {
        etkilesimKat = 1.7;
    }

    var hesaplananOrtalama = takipci * platformKat[platform] * turKat[tur] * kategoriKat[kategori] * etkilesimKat;

    // Minimum taban ücret koruması (mikro influencerlar için)
    var minLimit = 500;
    if (tur === 'video') minLimit = 1500;
    if (tur === 'post') minLimit = 1000;
    if (tur === 'mention') minLimit = 750;

    if (hesaplananOrtalama < minLimit) {
        hesaplananOrtalama = minLimit;
    }

    var tabanFiyat = hesaplananOrtalama * 0.85;
    var tavanFiyat = hesaplananOrtalama * 1.25;

    var fmtPara = function(val) {
        return Math.round(val).toLocaleString('tr-TR') + ' ₺';
    };

    document.getElementById('hc-sif-res-taban').textContent = fmtPara(tabanFiyat);
    document.getElementById('hc-sif-res-ortalama').textContent = fmtPara(hesaplananOrtalama);
    document.getElementById('hc-sif-res-tavan').textContent = fmtPara(tavanFiyat);

    var kalite = '';
    if (etkilesimKat < 1.0) {
        kalite = 'Zayıf (Düşük etkileşim nedeniyle fiyat kırılmıştır)';
    } else if (etkilesimKat === 1.0) {
        kalite = 'Normal (Standart sektör fiyatlandırması)';
    } else if (etkilesimKat === 1.3) {
        kalite = 'Güçlü (Ortalama üstü etkileşim, %30 fiyat primi eklenmiştir)';
    } else {
        kalite = 'Mükemmel (Çok yüksek etkileşim, %70 fiyat primi eklenmiştir)';
    }

    document.getElementById('hc-sif-res-kalite').textContent = kalite;
    document.getElementById('hc-sponsorlu-fiyat-result').classList.add('visible');
}
