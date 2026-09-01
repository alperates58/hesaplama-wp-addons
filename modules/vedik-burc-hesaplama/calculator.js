function hcVedikBurcHesapla() {
    const birthdate = document.getElementById('hc-vb-birthdate').value;
    const timeStr = document.getElementById('hc-vb-time').value || '12:00';

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

    // Ay Tropikal Boylamı
    const L = norm(218.316 + 13.176396 * d);
    const Mm = norm(134.963 + 13.064993 * d);
    const moonTrop = norm(L + 6.289 * Math.sin(Mm * rad));

    // Lahiri Ayanamsa
    const ayanamsa = 23.8565 + (d / 365.25) * 0.0139696;
    const sunSidereal = norm(sunTrop - ayanamsa);
    const moonSidereal = norm(moonTrop - ayanamsa);

    const rasis = [
        { name: "Mesha", tr: "Koç", ruler: "Mangal (Mars)", goal: "Dharma (Doğru Eylem & Liderlik)" },
        { name: "Vrishabha", tr: "Boğa", ruler: "Shukra (Venüs)", goal: "Artha (Maddi Güvenlik & Bereket)" },
        { name: "Mithuna", tr: "İkizler", ruler: "Budha (Merkür)", goal: "Kama (İletişim & Arzu)" },
        { name: "Karka", tr: "Yengeç", ruler: "Chandra (Ay)", goal: "Moksha (Duygusal Kurtuluş)" },
        { name: "Simha", tr: "Aslan", ruler: "Surya (Güneş)", goal: "Dharma (Hükümranlık & Asalet)" },
        { name: "Kanya", tr: "Başak", ruler: "Budha (Merkür)", goal: "Artha (Hizmet & Kusursuzluk)" },
        { name: "Tula", tr: "Terazi", ruler: "Shukra (Venüs)", goal: "Kama (Uyum & İlişkiler)" },
        { name: "Vrishchika", tr: "Akrep", ruler: "Mangal / Ketu", goal: "Moksha (Ruhsal Dönüşüm)" },
        { name: "Dhanu", tr: "Yay", ruler: "Guru (Jüpiter)", goal: "Dharma (Yüksek Bilgelik & İnanç)" },
        { name: "Makara", tr: "Oğlak", ruler: "Shani (Satürn)", goal: "Artha (Kalıcı Statü & Başarı)" },
        { name: "Kumbha", tr: "Kova", ruler: "Shani / Rahu", goal: "Kama (Kolektif Vizyon & İnsanlık)" },
        { name: "Meena", tr: "Balık", ruler: "Guru (Jüpiter)", goal: "Moksha (Evrensel Birlik & Aydınlanma)" }
    ];

    const nakshatras = [
        { name: "Ashwini", lord: "Ketu", tr: "Şifacı Süvari", goal: "Dharma" },
        { name: "Bharani", lord: "Venüs", tr: "Dönüşüm & Yaşamın Rahmi", goal: "Artha" },
        { name: "Krittika", lord: "Güneş", tr: "Arındırıcı Kutsal Ateş", goal: "Kama" },
        { name: "Rohini", lord: "Ay", tr: "Bereket & Yaratıcı Cazibe", goal: "Moksha" },
        { name: "Mrigashira", lord: "Mars", tr: "Ruhsal Arayış & Keşif", goal: "Moksha" },
        { name: "Ardra", lord: "Rahu", tr: "Fırtına & Zihinsel Arınma", goal: "Kama" },
        { name: "Punarvasu", lord: "Jüpiter", tr: "Işığın Yeniden Doğuşu", goal: "Artha" },
        { name: "Pushya", lord: "Satürn", tr: "En Hayırlı Besleyici Yıldız", goal: "Dharma" },
        { name: "Ashlesha", lord: "Merkür", tr: "Kundalini & Mistik Zeka", goal: "Dharma" },
        { name: "Magha", lord: "Ketu", tr: "Kraliyet Tahtı & Ataların Gücü", goal: "Artha" },
        { name: "Purva Phalguni", lord: "Venüs", tr: "Şans, Aşk ve Sanat", goal: "Kama" },
        { name: "Uttara Phalguni", lord: "Güneş", tr: "Kalıcı Dostluk ve Yardım", goal: "Moksha" },
        { name: "Hasta", lord: "Ay", tr: "Büyülü Eller & Usta Zanaat", goal: "Moksha" },
        { name: "Chitra", lord: "Mars", tr: "Göz Alıcı Mücevher & Tasarım", goal: "Kama" },
        { name: "Swati", lord: "Rahu", tr: "Bağımsız Özgür Rüzgar", goal: "Artha" },
        { name: "Vishakha", lord: "Jüpiter", tr: "Zafer Kemeri & Odaklanma", goal: "Dharma" },
        { name: "Anuradha", lord: "Satürn", tr: "Kutsal Sadakat & Kalp Birliği", goal: "Dharma" },
        { name: "Jyeshtha", lord: "Merkür", tr: "Kadim Kıdem & Koruyucu Güç", goal: "Artha" },
        { name: "Mula", lord: "Ketu", tr: "Köklerin Keşfi & Galaktik Merkez", goal: "Kama" },
        { name: "Purva Ashadha", lord: "Venüs", tr: "Yenilmez Su & Erken Zafer", goal: "Moksha" },
        { name: "Uttara Ashadha", lord: "Güneş", tr: "Evrensel Nihai Zafer", goal: "Moksha" },
        { name: "Shravana", lord: "Ay", tr: "Evrensel Bilgeliği Dinleme", goal: "Artha" },
        { name: "Dhanishta", lord: "Mars", tr: "İlahi Ritim & Zenginlik Senfonisi", goal: "Dharma" },
        { name: "Shatabhisha", lord: "Rahu", tr: "Yüz Şifacı & Mistik Sırlar", goal: "Dharma" },
        { name: "Purva Bhadrapada", lord: "Jüpiter", tr: "Ruhsal Tutku & İnisiyasyon", goal: "Artha" },
        { name: "Uttara Bhadrapada", lord: "Satürn", tr: "Derin Meditasyon & Bilgelik", goal: "Kama" },
        { name: "Revati", lord: "Merkür", tr: "Güvenli Rehberlik & Aydınlanma", goal: "Moksha" }
    ];

    const sunRasiIdx = Math.floor(sunSidereal / 30);
    const sunRasi = rasis[sunRasiIdx];

    const nakLen = 360 / 27; // 13.333333°
    const moonNakIdx = Math.floor(moonSidereal / nakLen);
    const moonNak = nakshatras[moonNakIdx % 27];
    const nakProg = (moonSidereal % nakLen);
    const pada = Math.floor(nakProg / (nakLen / 4)) + 1;

    const heroHtml = `
        <div class="hc-vb-hero-card">
            <div class="hc-vb-hero-badge">🕉️ Jyotish Surya Rasi & Chandra Nakshatra</div>
            <div class="hc-vb-hero-title">Güneş Rasi: ${sunRasi.name} (${sunRasi.tr}) | Ay Nakshatra: ${moonNak.name}</div>
            <p class="hc-vb-hero-sub">Ay Konağı: ${moonNak.name} (Pada ${pada}) — Yönetici Gezegen: <strong>${moonNak.lord}</strong></p>
        </div>
    `;

    const detailsHtml = `
        <div class="hc-vb-item">
            <span class="hc-vb-icon">☀️</span>
            <div class="hc-vb-info">
                <strong>Surya Rasi (Güneş Burcu)</strong>
                <span>${sunRasi.name} (${sunRasi.tr}) — Yönetici: ${sunRasi.ruler} (${(sunSidereal % 30).toFixed(1)}°)</span>
            </div>
        </div>
        <div class="hc-vb-item">
            <span class="hc-vb-icon">🌙</span>
            <div class="hc-vb-info">
                <strong>Chandra Nakshatra (Ay Konağı)</strong>
                <span>${moonNak.name} (${moonNak.tr}) — Pada ${pada} / 4 — Lord: ${moonNak.lord}</span>
            </div>
        </div>
        <div class="hc-vb-item">
            <span class="hc-vb-icon">🪷</span>
            <div class="hc-vb-info">
                <strong>Purushartha (Ruhsal Yaşam Amacı)</strong>
                <span>${sunRasi.goal} & ${moonNak.goal}</span>
            </div>
        </div>
    `;

    const descHtml = `
        <p><strong>Vedik Astrolojide Nakshatra'nın Önemi:</strong> Batı astrolojisi Güneş burcuna odaklanırken, Vedik astroloji (Jyotish) zihni, bilinçaltını ve kader akışını yöneten <strong>Ay Nakshatrası</strong>'nı merkeze alır.</p>
        <p><strong>Nakshatra Analiziniz (${moonNak.name}):</strong> Ruhunuzun bu enkarnasyondaki ana motivasyonu <strong>${moonNak.tr}</strong> teması üzerinedir. Pada ${pada} yerleşimi, Nakshatranızın içsel çeyreğini ve alt burç titreşimini (Navamsha) belirler.</p>
        <p><strong>2026 Vedik Tavsiyesi:</strong> Yönetici gezegeniniz ${moonNak.lord} ve ${sunRasi.ruler} mantralarını, renklerini ve hayır pratiklerini hayatınıza dahil etmek karmik blokajlarınızı şifalandıracaktır.</p>
    `;

    document.getElementById('hc-vb-hero').innerHTML = heroHtml;
    document.getElementById('hc-vb-details').innerHTML = detailsHtml;
    document.getElementById('hc-vb-desc').innerHTML = descHtml;

    document.getElementById('hc-vb-result').classList.add('visible');
    document.getElementById('hc-vb-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

