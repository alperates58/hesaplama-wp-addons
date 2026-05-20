function hcAylikVeriKullanimiHesapla() {
    var web = parseFloat(document.getElementById('hc-avk-web').value) || 0;
    var sosyal = parseFloat(document.getElementById('hc-avk-sosyal').value) || 0;
    var muzik = parseFloat(document.getElementById('hc-avk-muzik').value) || 0;
    var sd = parseFloat(document.getElementById('hc-avk-video-sd').value) || 0;
    var hd = parseFloat(document.getElementById('hc-avk-video-hd').value) || 0;
    var uhd = parseFloat(document.getElementById('hc-avk-video-uhd').value) || 0;
    var oyun = parseFloat(document.getElementById('hc-avk-oyun').value) || 0;
    var indir = parseFloat(document.getElementById('hc-avk-indir').value) || 0;

    var sumHours = web + sosyal + muzik + sd + hd + uhd + oyun;
    if (sumHours > 24) {
        alert('Günlük toplam aktivite süresi 24 saati aşamaz.');
        return;
    }
    if (web < 0 || sosyal < 0 || muzik < 0 || sd < 0 || hd < 0 || uhd < 0 || oyun < 0 || indir < 0) {
        alert('Lütfen negatif değerler girmeyin.');
        return;
    }

    // Saatte harcanan ortalama veri (MB cinsinden)
    var webMb = 100;
    var sosyalMb = 500;
    var muzikMb = 120;
    var sdMb = 700;
    var hdMb = 2500;
    var uhdMb = 7000;
    var oyunMb = 150;

    var gunlukMb = (web * webMb) + (sosyal * sosyalMb) + (muzik * muzikMb) + (sd * sdMb) + (hd * hdMb) + (uhd * uhdMb) + (oyun * oyunMb);
    var gunlukGb = gunlukMb / 1024;
    var aylikGb = (gunlukGb * 30) + indir;

    var fmtSayi = function(val, dec, birim) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec }) + ' ' + birim;
    };

    var gunlukText = gunlukGb >= 1 ? fmtSayi(gunlukGb, 2, 'GB') : fmtSayi(gunlukMb, 0, 'MB');
    
    document.getElementById('hc-avk-res-gunluk').textContent = gunlukText;
    document.getElementById('hc-avk-res-aylik').textContent = fmtSayi(aylikGb, 1, 'GB');

    var tavsiye = '';
    if (aylikGb <= 15) {
        tavsiye = 'Hafif Kullanıcı: 15-20 GB kotalı mobil veri veya en temel ev internet paketleri sizin için fazlasıyla yeterli olacaktır.';
    } else if (aylikGb > 15 && aylikGb <= 100) {
        tavsiye = 'Orta Seviye Kullanıcı: Mobil kullanım için 50-100 GB arası paketler veya kotalı/kotasız standart ev interneti uygundur.';
    } else if (aylikGb > 100 && aylikGb <= 300) {
        tavsiye = 'Yoğun Kullanıcı: Kesinlikle sınırsız (kotasız) ev interneti kullanmalısınız. Hücresel veri (mobil) için yüksek kotalı tarifeleri tercih edin.';
    } else {
        tavsiye = 'Aşırı Yoğun Kullanıcı: Çok yüksek veri tüketimi. Sınırsız, yüksek hızlı fiber ev interneti şarttır. Mobil veride limitsiz paketleri değerlendirebilirsiniz.';
    }

    document.getElementById('hc-avk-res-tavsiye').textContent = tavsiye;
    document.getElementById('hc-data-usage-result').classList.add('visible');
}
