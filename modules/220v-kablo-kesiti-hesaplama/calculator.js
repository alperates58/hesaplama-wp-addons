function hc220VKabloKesitiHesapla() {
    const guc = parseFloat(document.getElementById('hc-220v-guc').value);
    const mesafe = parseFloat(document.getElementById('hc-220v-mesafe').value);
    const kayipYuzde = parseFloat(document.getElementById('hc-220v-kayip').value);

    if (!guc || !mesafe) {
        alert('Lütfen güç ve mesafe bilgilerini giriniz.');
        return;
    }

    const U = 220;
    const K = 56; // Bakır iletkenlik katsayısı
    
    // Akım hesabı: I = P / (U * cosPhi) -> cosPhi genelde 0.8 veya 1 alınır. Standart hesapta 1 alınabilir.
    const akim = guc / U;

    // Gerilim Düşümü Formülü (Monofaze): %e = (100 * 2 * L * P) / (K * S * U^2)
    // Buradan S'yi çekersek: S = (2 * L * P) / (K * (%e/100) * U^2)
    const e_oran = kayipYuzde / 100;
    const kesit = (2 * mesafe * guc) / (K * e_oran * Math.pow(U, 2));

    // Standart kablo kesitleri
    const standartKesitler = [0.75, 1, 1.5, 2.5, 4, 6, 10, 16, 25, 35, 50, 70, 95, 120, 150];
    let onerilenKesit = standartKesitler.find(s => s >= kesit);
    
    // Akım taşıma kapasitesi kontrolü (Basitleştirilmiş: 2.5mm2 ~ 16A-20A vb.)
    // Eğer akım taşıma kapasitesi yetmiyorsa kesiti büyüt
    if (akim > 16 && onerilenKesit < 2.5) onerilenKesit = 2.5;
    if (akim > 25 && onerilenKesit < 4) onerilenKesit = 4;
    if (akim > 35 && onerilenKesit < 6) onerilenKesit = 6;
    if (akim > 50 && onerilenKesit < 10) onerilenKesit = 10;

    if (!onerilenKesit) {
        onerilenKesit = Math.ceil(kesit);
    }

    const sonucDiv = document.getElementById('hc-220v-result');
    document.getElementById('hc-220v-res-section').innerText = onerilenKesit.toLocaleString('tr-TR') + ' mm²';
    document.getElementById('hc-220v-res-current').innerText = akim.toFixed(2).toLocaleString('tr-TR') + ' A';
    
    const noteDiv = document.getElementById('hc-220v-res-note');
    noteDiv.innerText = `Hesaplanan teorik kesit: ${kesit.toFixed(3).toLocaleString('tr-TR')} mm². Hem gerilim düşümü (%${kayipYuzde}) hem de standart akım taşıma limitleri göz önüne alınmıştır.`;

    sonucDiv.classList.add('visible');
}
