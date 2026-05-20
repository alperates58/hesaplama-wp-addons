function hcTiktokEtkilesimOraniHesapla() {
    var takipci = parseFloat(document.getElementById('hc-tt-takipci').value);
    var izlenme = parseFloat(document.getElementById('hc-tt-izlenme').value);
    var begeni = parseFloat(document.getElementById('hc-tt-begeni').value) || 0;
    var yorum = parseFloat(document.getElementById('hc-tt-yorum').value) || 0;
    var paylasim = parseFloat(document.getElementById('hc-tt-paylasim').value) || 0;

    if (!takipci || takipci <= 0) {
        alert('Lütfen geçerli bir takipçi sayısı girin.');
        return;
    }

    if (!izlenme || izlenme <= 0) {
        alert('Lütfen geçerli bir izlenme sayısı girin.');
        return;
    }

    if (begeni < 0 || yorum < 0 || paylasim < 0) {
        alert('Etkileşim sayıları negatif olamaz.');
        return;
    }

    var toplamEtkilesim = begeni + yorum + paylasim;
    var izlenmeOran = (toplamEtkilesim / izlenme) * 100;
    var takipciOran = (toplamEtkilesim / takipci) * 100;

    var fmtOran = function(val) {
        return '%' + val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    };

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR');
    };

    document.getElementById('hc-tt-res-izlenme-oran').textContent = fmtOran(izlenmeOran);
    document.getElementById('hc-tt-res-takipci-oran').textContent = fmtOran(takipciOran);
    document.getElementById('hc-tt-res-toplam').textContent = fmtSayi(toplamEtkilesim);

    var durum = '';
    var renk = '';
    if (izlenmeOran < 3) {
        durum = 'Düşük (Etkileşimi artırmak için kanca cümleler kullanın)';
        renk = 'var(--hc-front-red)';
    } else if (izlenmeOran >= 3 && izlenmeOran < 8) {
        durum = 'Ortalama / İyi (TikTok standartlarına uygun)';
        renk = 'var(--hc-front-text)';
    } else {
        durum = 'Mükemmel / Çok Yüksek (İçerikleriniz izleyicileri çok iyi tutuyor)';
        renk = 'var(--hc-front-green)';
    }

    var durumEl = document.getElementById('hc-tt-res-durum');
    durumEl.textContent = durum;
    durumEl.style.color = renk;

    document.getElementById('hc-tiktok-etkilesim-result').classList.add('visible');
}
