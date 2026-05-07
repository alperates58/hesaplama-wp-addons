function hcYillikIzinUcretiHesapla() {
    // Giriş değerlerini al
    const maas = parseFloat(document.getElementById('hc-maas').value);
    const gun = parseFloat(document.getElementById('hc-izin-gunu').value);
    const vergiOrani = parseFloat(document.getElementById('hc-vergi-dilimi').value);

    // Validasyon
    if (isNaN(maas) || isNaN(gun) || maas <= 0 || gun <= 0) {
        alert('Lütfen geçerli bir maaş ve gün sayısı giriniz.');
        return;
    }

    // 2026 Parametreleri
    const SGK_ORANI = 0.15; // %14 SGK + %1 İşsizlik
    const DAMGA_VERGISI_ORANI = 0.00759; // Binde 7,59

    // 1. Brüt İzin Ücreti Hesabı
    // Günlük Brüt = Aylık Brüt / 30
    const gunlukBrut = maas / 30;
    const brutIzinUcreti = gunlukBrut * gun;

    // 2. Kesintiler
    // SGK Kesintisi
    const sgkKesintisi = brutIzinUcreti * SGK_ORANI;

    // Gelir Vergisi Matrahı = Brüt - SGK Kesintileri
    const vergiMatrahi = brutIzinUcreti - sgkKesintisi;
    
    // Gelir Vergisi
    const gelirVergisi = vergiMatrahi * vergiOrani;

    // Damga Vergisi
    const damgaVergisi = brutIzinUcreti * DAMGA_VERGISI_ORANI;

    // 3. Net Ücret
    const netUcret = brutIzinUcreti - sgkKesintisi - gelirVergisi - damgaVergisi;

    // Sonuçları Yazdır
    document.getElementById('hc-res-brut').innerText = brutIzinUcreti.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-sgk').innerText = sgkKesintisi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-vergi').innerText = gelirVergisi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-damga').innerText = damgaVergisi.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-res-net').innerText = netUcret.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    // Görünür yap
    const resultDiv = document.getElementById('hc-yillik-izin-ucreti-result');
    resultDiv.classList.add('visible');
    
    // Smooth scroll to result
    resultDiv.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
