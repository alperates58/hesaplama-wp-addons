function hcGonderiErisimTahminiHesapla() {
    var takipci = parseFloat(document.getElementById('hc-get-takipci').value);
    var platform = document.getElementById('hc-get-platform').value;
    var tur = document.getElementById('hc-get-tur').value;
    var etkilesim = document.getElementById('hc-get-etkilesim').value;

    if (!takipci || takipci <= 0) {
        alert('Lütfen geçerli bir takipçi sayısı girin.');
        return;
    }

    // Platform ve tipe göre baz oranlar [min, max]
    var oranlar = {
        instagram: {
            reels: [0.12, 0.28],
            carousel: [0.06, 0.12],
            image: [0.04, 0.08],
            text: [0.04, 0.08],
            story: [0.015, 0.035]
        },
        facebook: {
            reels: [0.08, 0.18],
            carousel: [0.03, 0.07],
            image: [0.02, 0.05],
            text: [0.025, 0.06],
            story: [0.01, 0.02]
        },
        linkedin: {
            reels: [0.10, 0.22],
            carousel: [0.08, 0.16],
            image: [0.05, 0.10],
            text: [0.06, 0.14],
            story: [0.01, 0.02]
        },
        twitter: {
            reels: [0.08, 0.18],
            carousel: [0.04, 0.09],
            image: [0.04, 0.08],
            text: [0.05, 0.12],
            story: [0.01, 0.02]
        }
    };

    var base = oranlar[platform][tur];
    
    // Etkileşim çarpanı
    var carpan = 1.0;
    if (etkilesim === 'dusuk') carpan = 0.6;
    else if (etkilesim === 'yuksek') carpan = 1.6;
    else if (etkilesim === 'viral') carpan = 3.2;

    var minErisim = takipci * base[0] * carpan;
    var maxErisim = takipci * base[1] * carpan;
    var ortalamaErisim = (minErisim + maxErisim) / 2;
    var ortalamaOran = (ortalamaErisim / takipci) * 100;

    var fmtSayi = function(val) {
        return Math.round(val).toLocaleString('tr-TR');
    };

    document.getElementById('hc-get-res-aralik').textContent = fmtSayi(minErisim) + ' - ' + fmtSayi(maxErisim);
    document.getElementById('hc-get-res-ortalama').textContent = fmtSayi(ortalamaErisim) + ' hesap';
    document.getElementById('hc-get-res-oran').textContent = '%' + ortalamaOran.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });

    var tavsiye = '';
    if (tur === 'reels') {
        tavsiye = 'Mükemmel! Video / Reels formatları şu an algoritma tarafından en çok desteklenen içerik türüdür.';
    } else if (tur === 'story') {
        tavsiye = 'Hikayeler genelde sadece en aktif takipçilerinize ulaşır. Erişim için Reels veya Carousel deneyin.';
    } else {
        tavsiye = 'Erişimi artırmak için gönderinizi Hikayelerde paylaşın ve yorumlarda soru sorarak etkileşimi tetikleyin.';
    }

    document.getElementById('hc-get-res-tavsiye').textContent = tavsiye;
    document.getElementById('hc-gonderi-erisim-tahmini-result').classList.add('visible');
}
