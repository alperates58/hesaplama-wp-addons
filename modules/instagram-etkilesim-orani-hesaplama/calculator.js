function hcInstagramEtkilesimOraniHesapla() {
    var takipci = parseFloat(document.getElementById('hc-ig-takipci').value);
    var erisim = parseFloat(document.getElementById('hc-ig-erisim').value);
    var begeni = parseFloat(document.getElementById('hc-ig-begeni').value) || 0;
    var yorum = parseFloat(document.getElementById('hc-ig-yorum').value) || 0;
    var kaydetme = parseFloat(document.getElementById('hc-ig-kaydetme').value) || 0;
    var paylasim = parseFloat(document.getElementById('hc-ig-paylasim').value) || 0;

    if (!takipci || takipci <= 0) {
        alert('Lütfen geçerli bir takipçi sayısı girin.');
        return;
    }

    if (begeni < 0 || yorum < 0 || kaydetme < 0 || paylasim < 0) {
        alert('Etkileşim sayıları negatif olamaz.');
        return;
    }

    var toplamEtkilesim = begeni + yorum + kaydetme + paylasim;
    var takipciOran = (toplamEtkilesim / takipci) * 100;

    var fmtOran = function(val) {
        return '%' + val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    };

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR');
    };

    document.getElementById('hc-ig-res-takipci-oran').textContent = fmtOran(takipciOran);
    document.getElementById('hc-ig-res-toplam').textContent = fmtSayi(toplamEtkilesim);

    var erisimRow = document.getElementById('hc-ig-erisim-row');
    if (!isNaN(erisim) && erisim > 0) {
        var erisimOran = (toplamEtkilesim / erisim) * 100;
        document.getElementById('hc-ig-res-erisim-oran').textContent = fmtOran(erisimOran);
        erisimRow.style.display = 'table-row';
    } else {
        erisimRow.style.display = 'none';
    }

    var durum = '';
    var renk = '';
    if (takipciOran < 1) {
        durum = 'Düşük (Sektör ortalamasının altında)';
        renk = 'var(--hc-front-red)';
    } else if (takipciOran >= 1 && takipciOran < 3.5) {
        durum = 'Ortalama / İyi (Sektör standardı)';
        renk = 'var(--hc-front-text)';
    } else if (takipciOran >= 3.5 && takipciOran < 6) {
        durum = 'Yüksek (Güçlü etkileşim)';
        renk = 'var(--hc-front-green)';
    } else {
        durum = 'Mükemmel (Çok güçlü topluluk bağı)';
        renk = 'var(--hc-front-green)';
    }

    var durumEl = document.getElementById('hc-ig-res-durum');
    durumEl.textContent = durum;
    durumEl.style.color = renk;

    document.getElementById('hc-instagram-etkilesim-result').classList.add('visible');
}
