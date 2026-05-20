function hcTakipciArtisHiziHesapla() {
    var baslangic = parseFloat(document.getElementById('hc-tah-baslangic').value);
    var kazanilan = parseFloat(document.getElementById('hc-tah-kazanilan').value) || 0;
    var kaybedilen = parseFloat(document.getElementById('hc-tah-kaybedilen').value) || 0;
    var gun = parseFloat(document.getElementById('hc-tah-gun').value);

    if (!baslangic || baslangic <= 0) {
        alert('Lütfen geçerli bir dönem başı takipçi sayısı girin.');
        return;
    }
    if (kazanilan < 0 || kaybedilen < 0) {
        alert('Takipçi sayıları negatif olamaz.');
        return;
    }
    if (!gun || gun <= 0) {
        alert('Lütfen geçerli bir gün süresi girin.');
        return;
    }

    var netArtis = kazanilan - kaybedilen;
    var gunlukNet = netArtis / gun;
    
    var kayipOrani = 0;
    if (kazanilan > 0) {
        kayipOrani = (kaybedilen / kazanilan) * 100;
    }

    var gunlukHizOran = ((netArtis / baslangic) / gun) * 100;

    var fmtSayi = function(val) {
        return Math.round(val).toLocaleString('tr-TR');
    };

    var fmtOndalik = function(val, dec) {
        var prefix = val >= 0 ? '+' : '';
        return prefix + val.toLocaleString('tr-TR', { minimumFractionDigits: dec, maximumFractionDigits: dec });
    };

    document.getElementById('hc-tah-res-net').textContent = fmtSayi(netArtis) + ' takipçi';
    document.getElementById('hc-tah-res-gunluk').textContent = fmtOndalik(gunlukNet, 1) + ' takipçi/gün';
    document.getElementById('hc-tah-res-kayip').textContent = '%' + kayipOrani.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    document.getElementById('hc-tah-res-hiz').textContent = fmtOndalik(gunlukHizOran, 3) + '%';

    document.getElementById('hc-takipci-artis-result').classList.add('visible');
}
