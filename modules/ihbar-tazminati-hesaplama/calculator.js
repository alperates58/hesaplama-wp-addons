function hcIhbarTazminatiHesapla() {
    // Girişleri al
    const girisTarihiStr = document.getElementById('hc-giris').value;
    const cikisTarihiStr = document.getElementById('hc-cikis').value;
    const maas = parseFloat(document.getElementById('hc-maas').value) || 0;
    const vergiOrani = parseFloat(document.getElementById('hc-vergi-dilimi').value);

    // Validasyon
    if (!girisTarihiStr || !cikisTarihiStr || maas <= 0) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const girisTarihi = new Date(girisTarihiStr);
    const cikisTarihi = new Date(cikisTarihiStr);

    if (cikisTarihi <= girisTarihi) {
        alert('Çıkış tarihi giriş tarihinden sonra olmalıdır.');
        return;
    }

    // Çalışma süresini ay olarak hesapla
    const diffTime = Math.abs(cikisTarihi - girisTarihi);
    const diffMonths = diffTime / (1000 * 60 * 60 * 24 * 30.44);

    // İhbar Süresini Belirle
    let ihbarGun = 0;
    let ihbarHafta = 0;

    if (diffMonths < 6) {
        ihbarHafta = 2;
        ihbarGun = 14;
    } else if (diffMonths >= 6 && diffMonths < 18) { // 6 ay - 1.5 yıl
        ihbarHafta = 4;
        ihbarGun = 28;
    } else if (diffMonths >= 18 && diffMonths < 36) { // 1.5 yıl - 3 yıl
        ihbarHafta = 6;
        ihbarGun = 42;
    } else { // 3 yıl ve üzeri
        ihbarHafta = 8;
        ihbarGun = 56;
    }

    // Hesaplama
    const gunlukBrut = maas / 30;
    const brutIhbar = gunlukBrut * ihbarGun;

    // Kesintiler
    const DAMGA_VERGISI_ORANI = 0.00759;
    const gelirVergisi = brutIhbar * vergiOrani;
    const damgaVergisi = brutIhbar * DAMGA_VERGISI_ORANI;
    const netIhbar = brutIhbar - gelirVergisi - damgaVergisi;

    // Sonuçları Yazdır
    document.getElementById('hc-res-sure').innerText = `${ihbarHafta} Hafta (${ihbarGun} Gün)`;
    document.getElementById('hc-res-brut').innerText = brutIhbar.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-vergi').innerText = gelirVergisi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-damga').innerText = damgaVergisi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-net').innerText = netIhbar.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    // Görünür yap
    const resultDiv = document.getElementById('hc-ihbar-tazminati-result');
    resultDiv.classList.add('visible');
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
