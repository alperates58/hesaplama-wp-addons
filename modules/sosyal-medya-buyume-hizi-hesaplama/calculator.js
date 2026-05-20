function hcSosyalMedyaBuyumeHiziHesapla() {
    var baslangic = parseFloat(document.getElementById('hc-smb-baslangic').value);
    var bitis = parseFloat(document.getElementById('hc-smb-bitis').value);
    var gun = parseFloat(document.getElementById('hc-smb-gun').value);

    if (!baslangic || baslangic <= 0) {
        alert('Lütfen geçerli bir başlangıç takipçi sayısı girin.');
        return;
    }

    if (!bitis || bitis <= 0) {
        alert('Lütfen geçerli bir bitiş takipçi sayısı girin.');
        return;
    }

    if (!gun || gun <= 0) {
        alert('Lütfen geçerli bir gün süresi girin.');
        return;
    }

    var toplamOran = ((bitis - baslangic) / baslangic) * 100;
    
    // Günlük bileşik büyüme hızı r: (bitis/baslangic)^(1/gun) - 1
    var r = Math.pow(bitis / baslangic, 1 / gun) - 1;
    var gunlukOran = r * 100;
    var aylikOran = (Math.pow(1 + r, 30) - 1) * 100;
    var yillikOran = (Math.pow(1 + r, 365) - 1) * 100;
    var tahminBitiş = bitis * Math.pow(1 + r, 365);

    var fmtOran = function(val) {
        var prefix = val >= 0 ? '+' : '';
        return prefix + val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '%';
    };

    var fmtSayi = function(val) {
        return Math.round(val).toLocaleString('tr-TR');
    };

    document.getElementById('hc-smb-res-toplam-oran').textContent = fmtOran(toplamOran);
    document.getElementById('hc-smb-res-gunluk-oran').textContent = fmtOran(gunlukOran);
    document.getElementById('hc-smb-res-aylik-oran').textContent = fmtOran(aylikOran);
    document.getElementById('hc-smb-res-yillik-oran').textContent = fmtOran(yillikOran);
    document.getElementById('hc-smb-res-tahmin').textContent = fmtSayi(tahminBitiş) + ' takipçi';

    document.getElementById('hc-sosyal-medya-buyume-result').classList.add('visible');
}
