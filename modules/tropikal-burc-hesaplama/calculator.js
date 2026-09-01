function hcTropikalBurcHesapla() {
    const birthdate = document.getElementById('hc-tb-birthdate').value;
    const timeStr = document.getElementById('hc-tb-time').value || '12:00';

    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate + 'T' + timeStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451545.0;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    // Güneş Tropikal Boylamı
    const N = 0, i = 0, w = 102.9404 + 0.0000470935 * d, a = 1.00000011, e = 0.01671022 - 0.0000000012 * d, M0 = 357.5291, M1 = 0.98560028;
    let M = norm(M0 + M1 * d);
    let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
    for (let j = 0; j < 3; j++) E = E - (E - (180 / Math.PI) * e * Math.sin(E * rad) - M) / (1 - e * Math.cos(E * rad));
    let xv = a * (Math.cos(E * rad) - e);
    let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
    let v = Math.atan2(yv, xv) / rad;
    let sunTrop = norm(v + w);

    const signs = [
        { name: "Koç", icon: "♈", element: "Ateş", modality: "Öncü", ruler: "Mars ♂️", season: "İlkbahar Ekinoksu Başlangıcı", dekans: ["1. Dekan: Mars (Saf Ateş & Liderlik)", "2. Dekan: Güneş (Aslan Alt Tonu & Karizma)", "3. Dekan: Jüpiter (Yay Alt Tonu & Vizyon)"] },
        { name: "Boğa", icon: "♉", element: "Toprak", modality: "Sabit", ruler: "Venüs ♀️", season: "İlkbaharın Doruk Noktası", dekans: ["1. Dekan: Venüs (Saf Zarafet & Huzur)", "2. Dekan: Merkür (Başak Alt Tonu & Pratik Zeka)", "3. Dekan: Satürn (Oğlak Alt Tonu & Sarsılmaz Güvenlik)"] },
        { name: "İkizler", icon: "♊", element: "Hava", modality: "Değişken", ruler: "Merkür ☿️", season: "Yaza Geçiş Eşiği", dekans: ["1. Dekan: Merkür (Saf Zeka & İletişim)", "2. Dekan: Venüs (Terazi Alt Tonu & Sanatsal Çekim)", "3. Dekan: Uranüs/Satürn (Kova Alt Tonu & Dâhi Fikirler)"] },
        { name: "Yengeç", icon: "♋", element: "Su", modality: "Öncü", ruler: "Ay 🌙", season: "Yaz Gündönümü Başlangıcı", dekans: ["1. Dekan: Ay (Saf Duygusallık & Sezgi)", "2. Dekan: Plüton/Mars (Akrep Alt Tonu & Koruyucu Güç)", "3. Dekan: Neptün/Jüpiter (Balık Alt Tonu & Ruhsal Şifa)"] },
        { name: "Aslan", icon: "♌", element: "Ateş", modality: "Sabit", ruler: "Güneş ☀️", season: "Yazın En Sıcak Zirvesi", dekans: ["1. Dekan: Güneş (Saf Özgüven & Kraliyet Işığı)", "2. Dekan: Jüpiter (Yay Alt Tonu & Cömertlik)", "3. Dekan: Mars (Koç Alt Tonu & Bitmeyen İrade)"] },
        { name: "Başak", icon: "♍", element: "Toprak", modality: "Değişken", ruler: "Merkür ☿️", season: "Sonbahara Hasat Geçişi", dekans: ["1. Dekan: Merkür (Saf Analiz & Ustalık)", "2. Dekan: Satürn (Oğlak Alt Tonu & Kusursuz Disiplin)", "3. Dekan: Venüs (Boğa Alt Tonu & Estetik Verimlilik)"] },
        { name: "Terazi", icon: "♎", element: "Hava", modality: "Öncü", ruler: "Venüs ♀️", season: "Sonbahar Ekinoksu (Gece-Gündüz Dengesi)", dekans: ["1. Dekan: Venüs (Saf Diplomasi & Zarafet)", "2. Dekan: Uranüs/Satürn (Kova Alt Tonu & Hümanizm)", "3. Dekan: Merkür (İkizler Alt Tonu & Parlak Zeka)"] },
        { name: "Akrep", icon: "♏", element: "Su", modality: "Sabit", ruler: "Mars ♂️ / Plüton ♇", season: "Sonbaharın Derinleşmesi", dekans: ["1. Dekan: Plüton/Mars (Saf Dönüşüm & Tutku)", "2. Dekan: Neptün/Jüpiter (Balık Alt Tonu & Mistik Sezgi)", "3. Dekan: Ay (Yengeç Alt Tonu & Sarsılmaz Sadakat)"] },
        { name: "Yay", icon: "♐", element: "Ateş", modality: "Değişken", ruler: "Jüpiter ♃", season: "Kışa Doğru Ruhsal Genişleme", dekans: ["1. Dekan: Jüpiter (Saf İyimserlik & Keşif)", "2. Dekan: Mars (Koç Alt Tonu & Cesur Girişim)", "3. Dekan: Güneş (Aslan Alt Tonu & Lider Vizyon)"] },
        { name: "Oğlak", icon: "♑", element: "Toprak", modality: "Öncü", ruler: "Satürn ♄", season: "Kış Gündönümü (En Uzun Gece)", dekans: ["1. Dekan: Satürn (Saf Otorite & Sabır)", "2. Dekan: Venüs (Boğa Alt Tonu & Maddi Başarı)", "3. Dekan: Merkür (Başak Alt Tonu & Stratejik Yönetim)"] },
        { name: "Kova", icon: "♒", element: "Hava", modality: "Sabit", ruler: "Satürn ♄ / Uranüs ♅", season: "Kışın Zirvesi & Geleceğe Bakış", dekans: ["1. Dekan: Uranüs/Satürn (Saf Özgünlük & Yenilik)", "2. Dekan: Merkür (İkizler Alt Tonu & Kolektif Zeka)", "3. Dekan: Venüs (Terazi Alt Tonu & Toplumsal Adalet)"] },
        { name: "Balık", icon: "♓", element: "Su", modality: "Değişken", ruler: "Jüpiter ♃ / Neptün ♆", season: "Zodyak Çemberinin Tamamlanması & Yeniden Doğuş", dekans: ["1. Dekan: Neptün/Jüpiter (Saf Şefkat & Sanat)", "2. Dekan: Ay (Yengeç Alt Tonu & Güçlü Psişik Alan)", "3. Dekan: Plüton/Mars (Akrep Alt Tonu & Derin Ruhsal İrade)"] }
    ];

    const signIdx = Math.floor(sunTrop / 30);
    const s = signs[signIdx];
    const degInSign = sunTrop % 30;
    const dekanIdx = Math.min(2, Math.floor(degInSign / 10));
    const dekanInfo = s.dekans[dekanIdx];

    const heroHtml = `
        <div class="hc-tb-hero-card">
            <div class="hc-tb-hero-badge">☀️ Tropikal Güneş Konumu: ${sunTrop.toFixed(2)}° Zodyak Boylamı</div>
            <div class="hc-tb-hero-title">${s.icon} ${s.name} (${degInSign.toFixed(2)}°)</div>
            <p class="hc-tb-hero-sub">${dekanInfo}</p>
        </div>
    `;

    const detailsHtml = `
        <div class="hc-tb-item">
            <span class="hc-tb-icon">🔥</span>
            <div class="hc-tb-info">
                <strong>Element & Nitelik</strong>
                <span>${s.element} Elementi / ${s.modality} Nitelik</span>
            </div>
        </div>
        <div class="hc-tb-item">
            <span class="hc-tb-icon">🪐</span>
            <div class="hc-tb-info">
                <strong>Yönetici Gezegen</strong>
                <span>${s.ruler}</span>
            </div>
        </div>
        <div class="hc-tb-item">
            <span class="hc-tb-icon">🌿</span>
            <div class="hc-tb-info">
                <strong>Mevsimsel Döngü</strong>
                <span>${s.season}</span>
            </div>
        </div>
    `;

    const descHtml = `
        <p><strong>Tropikal (Batı) Zodyak Sistemi Nedir?</strong> Tropikal Zodyak, Dünya'nın Güneş etrafındaki mevsimsel yolculuğuna dayanır. 21 Mart Bahar Ekinoksu, doğanın uyanışını temsil eden Koç burcunun 0 derecesi olarak kabul edilir.</p>
        <p><strong>Karakter ve Psikolojik Yapı:</strong> Tropikal burcunuz, bu dünyadaki ego yapınızı, bilinçli hedeflerinizi ve kimliğinizi nasıl dışa vurduğunuzu belirler. ${s.name} burcunun ${dekanIdx + 1}. dekanında doğmuş olmanız, size ${dekanInfo.split('(')[1].replace(')', '')} erdemlerini de katar.</p>
    `;

    document.getElementById('hc-tb-hero').innerHTML = heroHtml;
    document.getElementById('hc-tb-details').innerHTML = detailsHtml;
    document.getElementById('hc-tb-desc').innerHTML = descHtml;

    document.getElementById('hc-tb-result').classList.add('visible');
    document.getElementById('hc-tb-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

