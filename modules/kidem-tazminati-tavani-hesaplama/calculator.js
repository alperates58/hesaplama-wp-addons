function hcKidemTavanHesapla() {
    var brutMaaas = parseFloat(document.getElementById('hc-ktt-brut').value) || 0;
    var girisStr = document.getElementById('hc-ktt-giris').value;
    var cikisStr = document.getElementById('hc-ktt-cikis').value;

    if (brutMaaas <= 0 || !girisStr || !cikisStr) {
        alert('Lütfen giydirilmiş brüt maaşınızı ve tarihleri eksiksiz giriniz.');
        return;
    }

    var giris = new Date(girisStr);
    var cikis = new Date(cikisStr);

    var diffTime = cikis - giris;
    var totalDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    if (totalDays < 365) {
        alert('Yasal olarak kıdem tazminatına hak kazanabilmek için aynı iş yerinde en az 1 yıl (365 gün) çalışmış olmanız gerekmektedir.');
        return;
    }

    // Yıllar, aylar ve günler hesabı
    var yDiff = cikis.getFullYear() - giris.getFullYear();
    var mDiff = cikis.getMonth() - giris.getMonth();
    var dDiff = cikis.getDate() - giris.getDate();

    if (dDiff < 0) {
        mDiff--;
        dDiff += 30; // Yaklaşık
    }
    if (mDiff < 0) {
        yDiff--;
        mDiff += 12;
    }

    // Kıdem tavanları (İşten çıkış yılına göre tavan belirlenir)
    // 2026 Ocak-Haziran: 64.948,77 TL
    // 2025 Temmuz-Aralık: 53.919,68 TL
    // 2025 Ocak-Haziran: 46.655,43 TL
    var tavan = 64948.77; // Varsayılan 2026
    
    if (cikis < new Date('2025-01-01')) {
        tavan = 35058.58;
    } else if (cikis >= new Date('2025-01-01') && cikis < new Date('2025-07-01')) {
        tavan = 46655.43;
    } else if (cikis >= new Date('2025-07-01') && cikis < new Date('2026-01-01')) {
        tavan = 53919.68;
    } else {
        tavan = 64948.77; // 2026 başı
    }

    var esasMaaas = Math.min(brutMaaas, tavan);

    var years = totalDays / 365.25;
    var brutTutar = esasMaaas * years;
    
    var damgaVergisi = brutTutar * 0.00759;
    var netTutar = brutTutar - damgaVergisi;

    document.getElementById('hc-ktt-res-sure').innerText = yDiff + ' Yıl ' + mDiff + ' Ay ' + dDiff + ' Gün';
    document.getElementById('hc-ktt-res-tavan').innerText = tavan.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ktt-res-esas').innerText = esasMaaas.toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ktt-res-brut-tutar').innerText = Math.round(brutTutar).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ktt-res-vergi').innerText = '-' + Math.round(damgaVergisi).toLocaleString('tr-TR') + ' ₺';
    document.getElementById('hc-ktt-res-net').innerText = Math.round(netTutar).toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-ktt-result').classList.add('visible');
}