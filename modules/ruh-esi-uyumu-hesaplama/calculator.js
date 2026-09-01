function hcRuhEsiUyumHesapla() {
    const d1Str = document.getElementById('hc-re-d1').value;
    const d2Str = document.getElementById('hc-re-d2').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen her iki kişinin de doğum tarihlerini girin.");
        return;
    }

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    function getJD(Y, M, D, hour = 12) {
        let yCalc = Y, mCalc = M;
        if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
        const A = Math.floor(yCalc / 100);
        const B = 2 - A + Math.floor(A / 4);
        return Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (hour / 24);
    }

    function calcPositions(dStr) {
        const parts = dStr.split('-').map(Number);
        const jdVal = getJD(parts[0], parts[1], parts[2]);
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;

        // Sun
        const L0_e = norm(280.46646 + 36000.76983 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
        const sun = norm(L0_e + C_e);

        // Moon
        const L_m = norm(218.3165 + 481267.8813 * TVal);
        const M_m = norm(134.9634 + 477198.8676 * TVal);
        const D_m = norm(297.8502 + 445267.1115 * TVal);
        const moon = norm(L_m + 6.289 * Math.sin(M_m * rad) - 1.274 * Math.sin((M_m - 2 * D_m) * rad) + 0.658 * Math.sin(2 * D_m * rad));

        // Venus
        const L0_v = norm(181.9798 + 58517.8156 * TVal);
        const M_v = norm(50.4161 + 58517.4956 * TVal);
        const C_v = 0.7758 * Math.sin(M_v * rad);
        const venus = norm(L0_v + C_v);

        // North Node (Kuzey Ay Düğümü)
        const node = norm(125.04452 - 1934.136261 * TVal);

        return { sun, moon, venus, node };
    }

    const p1 = calcPositions(d1Str);
    const p2 = calcPositions(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    function getAngleDiff(a, b) {
        let d = Math.abs(a - b) % 360;
        return d > 180 ? 360 - d : d;
    }

    // Soulmate scoring factors:
    // 1. Sun-Moon synergy
    const sunMoonDiff1 = getAngleDiff(p1.sun, p2.moon);
    const sunMoonDiff2 = getAngleDiff(p2.sun, p1.moon);
    let sTelepathy = 85;
    if (sunMoonDiff1 < 10 || sunMoonDiff2 < 10 || (sunMoonDiff1 > 115 && sunMoonDiff1 < 125) || (sunMoonDiff2 > 115 && sunMoonDiff2 < 125)) {
        sTelepathy = 98;
    } else if (sunMoonDiff1 < 65 || sunMoonDiff2 < 65) {
        sTelepathy = 92;
    }

    // 2. Node karmic link
    const nodeDiff1 = getAngleDiff(p1.node, p2.sun);
    const nodeDiff2 = getAngleDiff(p2.node, p1.sun);
    const nodeMoonDiff = getAngleDiff(p1.node, p2.moon);
    let sKarmic = 86;
    if (nodeDiff1 < 15 || nodeDiff2 < 15 || nodeMoonDiff < 15) {
        sKarmic = 99;
    } else {
        sKarmic = 90;
    }

    // 3. Venus-Neptune / Heart chakra
    const venusDiff = getAngleDiff(p1.venus, p2.venus);
    let sHeart = 88;
    if (venusDiff < 15 || (venusDiff > 110 && venusDiff < 130)) {
        sHeart = 97;
    } else if (venusDiff < 65) {
        sHeart = 93;
    }

    // 4. Spiritual evolution
    let sEvolution = Math.round((sTelepathy + sKarmic + sHeart) / 3);
    const overallScore = Math.round((sTelepathy * 0.3) + (sKarmic * 0.3) + (sHeart * 0.25) + (sEvolution * 0.15));

    const s1Name = signs[Math.floor(p1.sun / 30) % 12];
    const s2Name = signs[Math.floor(p2.sun / 30) % 12];
    const n1Name = signs[Math.floor(p1.node / 30) % 12];
    const n2Name = signs[Math.floor(p2.node / 30) % 12];

    const heroHtml = `
        <div class="hc-re-hero-card">
            <div class="hc-re-hero-badge">Kozmik Rezonans & Çift Ruh İmzası</div>
            <div class="hc-re-hero-title">%${overallScore} Ruh Eşi Rezonans Skoru</div>
            <p class="hc-re-hero-sub">1. Ruh: <strong>${s1Name}</strong> (KAD: ${n1Name}) ⇄ 2. Ruh: <strong>${s2Name}</strong> (KAD: ${n2Name})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-re-dim-card">
            <div class="hc-re-dim-head"><span>🌀 Telepatik & Ruhsal Rezonans</span><span>%${sTelepathy}</span></div>
            <div class="hc-re-dim-bar"><div class="hc-re-dim-fill" style="width: ${sTelepathy}%; background: #a855f7;"></div></div>
        </div>
        <div class="hc-re-dim-card">
            <div class="hc-re-dim-head"><span>🔮 Kadersel Aşinalık & Karmik Çekim</span><span>%${sKarmic}</span></div>
            <div class="hc-re-dim-bar"><div class="hc-re-dim-fill" style="width: ${sKarmic}%; background: #6366f1;"></div></div>
        </div>
        <div class="hc-re-dim-card">
            <div class="hc-re-dim-head"><span>💖 Koşulsuz Sevgi & Kalp Çakrası Bağı</span><span>%${sHeart}</span></div>
            <div class="hc-re-dim-bar"><div class="hc-re-dim-fill" style="width: ${sHeart}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-re-dim-card">
            <div class="hc-re-dim-head"><span>🧭 Birlikte Ruhsal Evrim & Yaşam Amacı</span><span>%${sEvolution}</span></div>
            <div class="hc-re-dim-bar"><div class="hc-re-dim-fill" style="width: ${sEvolution}%; background: #10b981;"></div></div>
        </div>
    `;

    let report = `
        <p><strong>Kadersel Ruh Eşi Göstergesi:</strong> Haritanızdaki Güneş-Ay ve Ay Düğümleri etkileşimi, birbirinizi ilk gördüğünüz andan itibaren derin bir 'eve dönmüşlük' ve 'kökten tanışıklık' hissettiğinizi doğrular. Birbirinizin varlığı kalbinizdeki eksik parçayı tamamlar.</p>
        <p><strong>Ruhsal Evrim Misyonunuz:</strong> Siz sadece dünyevi bir ilişki yaşamak için değil, birbirinizin en yüksek potansiyelini uyandırmak ve karşılıklı tekamül etmek için bir araya geldiniz. Birbirinizin en derin savunmasızlıklarını sevgiyle şifalandıracaksınız.</p>
        <p><strong>Spiritüel Tavsiye:</strong> Zihinle veya egoyla değil; sezgileriniz ve kalbinizle konuşun. Ruhlar arasındaki gerçek bağ asla kaybolmaz.</p>
    `;

    document.getElementById('hc-re-hero').innerHTML = heroHtml;
    document.getElementById('hc-re-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-re-desc').innerHTML = report;

    document.getElementById('hc-re-result').classList.add('visible');
    document.getElementById('hc-re-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

