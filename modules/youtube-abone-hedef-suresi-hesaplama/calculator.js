function hcYoutubeAboneHedefSuresiHesapla() {
    var mevcut = parseFloat(document.getElementById('hc-yt-mevcut').value);
    var hedef = parseFloat(document.getElementById('hc-yt-hedef').value);
    var artis = parseFloat(document.getElementById('hc-yt-artis').value);

    if (!mevcut || mevcut <= 0) {
        alert('Lütfen geçerli bir mevcut abone sayısı girin.');
        return;
    }

    if (!hedef || hedef <= 0) {
        alert('Lütfen geçerli bir hedeflenen abone sayısı girin.');
        return;
    }

    if (hedef <= mevcut) {
        alert('Hedeflenen abone sayısı, mevcut abone sayısından büyük olmalıdır.');
        return;
    }

    if (!artis || artis <= 0) {
        alert('Lütfen son 30 gün içinde kazanılan abone sayısını sıfırdan büyük girin.');
        return;
    }

    var kalanAbone = hedef - mevcut;
    var gunlukHiz = artis / 30;
    var kalanGun = kalanAbone / gunlukHiz;
    var aylikArtisOrani = (artis / mevcut) * 100;

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR', { maximumFractionDigits: 1 });
    };

    var fmtPara = function(val) {
        return val.toLocaleString('tr-TR');
    };

    document.getElementById('hc-yt-res-kalan').textContent = fmtPara(kalanAbone) + ' abone';
    document.getElementById('hc-yt-res-gunluk').textContent = fmtSayi(gunlukHiz) + ' abone/gün';
    document.getElementById('hc-yt-res-oran').textContent = '%' + fmtSayi(aylikArtisOrani);

    var sureStr = '';
    var kalanYil = Math.floor(kalanGun / 365);
    var kalanAy = Math.floor((kalanGun % 365) / 30);
    var kalanGunKalan = Math.ceil(kalanGun % 30);

    if (kalanYil > 0) {
        sureStr += kalanYil + ' yıl ';
    }
    if (kalanAy > 0) {
        sureStr += kalanAy + ' ay ';
    }
    if (kalanGunKalan > 0 || sureStr === '') {
        sureStr += kalanGunKalan + ' gün';
    }

    document.getElementById('hc-yt-res-sure').textContent = sureStr.trim();

    document.getElementById('hc-youtube-abone-hedef-result').classList.add('visible');
}
