function hcKidemTazminatiHesapla() {
    // Girişleri al
    const girisTarihiStr = document.getElementById('hc-giris').value;
    const cikisTarihiStr = document.getElementById('hc-cikis').value;
    const maas = parseFloat(document.getElementById('hc-maas').value) || 0;
    const ekOdeme = parseFloat(document.getElementById('hc-ek-odeme').value) || 0;

    // Validasyon
    if (!girisTarihiStr || !cikisTarihiStr || maas <= 0) {
        alert('Lütfen tüm zorunlu alanları doldurun.');
        return;
    }

    const girisTarihi = new Date(girisTarihiStr);
    const cikisTarihi = new Date(cikisTarihiStr);

    if (cikisTarihi <= girisTarihi) {
        alert('Çıkış tarihi giriş tarihinden sonra olmalıdır.');
        return;
    }

    // 1 yıl kontrolü (Kıdem tazminatı için en az 1 yıl çalışılmış olmalı)
    const diffTime = Math.abs(cikisTarihi - girisTarihi);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 365) {
        alert('Kıdem tazminatına hak kazanmak için en az 1 yıl çalışmış olmanız gerekmektedir.');
        return;
    }

    // 2026 Parametreleri
    const KIDEM_TAVANI = 64948.77;
    const DAMGA_VERGISI_ORANI = 0.00759;

    // Çalışma Süresi Hesaplama (Yıl, Ay, Gün)
    let years = cikisTarihi.getFullYear() - girisTarihi.getFullYear();
    let months = cikisTarihi.getMonth() - girisTarihi.getMonth();
    let days = cikisTarihi.getDate() - girisTarihi.getDate();

    if (days < 0) {
        months--;
        days += new Date(cikisTarihi.getFullYear(), cikisTarihi.getMonth(), 0).getDate();
    }
    if (months < 0) {
        years--;
        months += 12;
    }

    // Toplam çalışma süresi metni
    document.getElementById('hc-res-sure').innerText = `${years} Yıl, ${months} Ay, ${days} Gün`;

    // Hesaba Esas Brüt Ücret (Tavan kontrolü)
    const toplamBrut = maas + ekOdeme;
    const esasBrut = Math.min(toplamBrut, KIDEM_TAVANI);
    document.getElementById('hc-res-esas-brut').innerText = esasBrut.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    // Brüt Tazminat Hesaplama
    // (Yıl * Esas Brüt) + (Ay/12 * Esas Brüt) + (Gün/365 * Esas Brüt)
    const brutTazminat = (years * esasBrut) + (months / 12 * esasBrut) + (days / 365 * esasBrut);
    
    // Kesintiler
    const damgaVergisi = brutTazminat * DAMGA_VERGISI_ORANI;
    const netTazminat = brutTazminat - damgaVergisi;

    // Sonuçları Yazdır
    document.getElementById('hc-res-brut').innerText = brutTazminat.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-damga').innerText = damgaVergisi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-net').innerText = netTazminat.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    // Görünür yap
    const resultDiv = document.getElementById('hc-kidem-tazminati-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
