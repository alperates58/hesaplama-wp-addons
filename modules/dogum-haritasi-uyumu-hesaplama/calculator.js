function hcDogumHaritasiUyumuHesapla() {
    const d1Str = document.getElementById('hc-p1-birthdate').value;
    const t1Str = document.getElementById('hc-p1-time').value;
    const c1Val = document.getElementById('hc-p1-city').value;

    const d2Str = document.getElementById('hc-p2-birthdate').value;
    const t2Str = document.getElementById('hc-p2-time').value;
    const c2Val = document.getElementById('hc-p2-city').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen her iki kişinin de doğum tarihlerini girin.");
        return;
    }

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    function getJD(Y, M, D, hour) {
        let yCalc = Y, mCalc = M;
        if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
        const A = Math.floor(yCalc / 100);
        const B = 2 - A + Math.floor(A / 4);
        return Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (hour / 24);
    }

    function calcChart(dStr, tStr, cVal) {
        const timeParts = (tStr || "12:00").split(':').map(Number);
        const hour = timeParts[0] + (timeParts[1] / 60);

        const coords = (cVal || "41.0082,28.9784").split(',').map(Number);
        const lat = coords[0];
        const lon = coords[1];

        const dParts = dStr.split('-').map(Number);
        let Y = dParts[0], M = dParts[1], D = dParts[2];

        const jdVal = getJD(Y, M, D, hour);
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;

        // Earth / Sun
        const L0_e = norm(280.46646 + 36000.76983 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
        const sunLon = norm(L0_e + C_e);
        const e_e = 0.016708634 - 0.000042037 * TVal;
        const R_e = 1.000001018 * (1 - e_e * e_e) / (1 + e_e * Math.cos((M_e + C_e) * rad));
        const Xe = R_e * Math.cos(sunLon * rad);
        const Ye = R_e * Math.sin(sunLon * rad);

        // Moon
        const L_m = norm(218.3164477 + 481267.88123421 * TVal);
        const D_m = norm(297.8501921 + 445267.1114034 * TVal);
        const M_m = norm(134.9633964 + 477198.8675055 * TVal);
        const moonLon = norm(L_m + 6.288774 * Math.sin(M_m * rad) + 1.274027 * Math.sin((2 * D_m - M_m) * rad) + 0.658314 * Math.sin(2 * D_m * rad));

        function solvePlanet(N0, N1, i0, i1, w0, w1, a0, e0, e1, M0, M1) {
            const N = norm(N0 + N1 * dVal);
            const inc = i0 + i1 * dVal;
            const w = norm(w0 + w1 * dVal);
            const a = a0;
            const ecc = e0 + e1 * dVal;
            const M_p = norm(M0 + M1 * dVal);
            let E = M_p;
            for (let k = 0; k < 5; k++) {
                E = E - (E - ecc * (180 / Math.PI) * Math.sin(E * rad) - M_p) / (1 - ecc * Math.cos(E * rad));
            }
            const xv = a * (Math.cos(E * rad) - ecc);
            const yv = a * (Math.sqrt(1 - ecc * ecc) * Math.sin(E * rad));
            const v = norm(Math.atan2(yv, xv) / rad);
            const r = Math.sqrt(xv * xv + yv * yv);
            const xh = r * (Math.cos(N * rad) * Math.cos((v + w) * rad) - Math.sin(N * rad) * Math.sin((v + w) * rad) * Math.cos(inc * rad));
            const yh = r * (Math.sin(N * rad) * Math.cos((v + w) * rad) + Math.cos(N * rad) * Math.sin((v + w) * rad) * Math.cos(inc * rad));
            const xg = xh - Xe;
            const yg = yh - Ye;
            return norm(Math.atan2(yg, xg) / rad);
        }

        const GMST0 = norm(280.46061837 + 360.98564736629 * (jdVal - 2451545.0));
        const RAMC = norm(GMST0 + lon);
        const eps = 23.4392911 - 0.0130042 * TVal;
        const num = Math.cos(RAMC * rad);
        const den = -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad);
        let ascLon = norm(Math.atan2(num, den) / rad);

        return {
            sun: sunLon,
            moon: moonLon,
            mercury: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368),
            venus: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244),
            mars: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766),
            jupiter: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001),
            saturn: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282),
            asc: ascLon
        };
    }

    const c1 = calcChart(d1Str, t1Str, c1Val);
    const c2 = calcChart(d2Str, t2Str, c2Val);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    function getSign(lon) {
        const idx = Math.floor(lon / 30) % 12;
        return `${symbols[idx]} ${burclar[idx]}`;
    }

    function checkAspect(lon1, lon2, orbMax = 7) {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;

        const aspects = [
            { name: "Kavuşum (0°)", target: 0, orb: orbMax, nature: "harmonious", score: 95 },
            { name: "Sekstil (60°)", target: 60, orb: 5, nature: "harmonious", score: 85 },
            { name: "Kare (90°)", target: 90, orb: 6, nature: "challenging", score: 45 },
            { name: "Üçgen (120°)", target: 120, orb: 7, nature: "harmonious", score: 95 },
            { name: "Karşıt (180°)", target: 180, orb: 7, nature: "dynamic", score: 65 }
        ];

        for (let asp of aspects) {
            const delta = Math.abs(diff - asp.target);
            if (delta <= asp.orb) {
                return { matched: true, name: asp.name, orb: delta.toFixed(1), nature: asp.nature, score: asp.score };
            }
        }
        return { matched: false, score: 50 };
    }

    // Key Synastry pairs:
    const synPairs = [
        { l1: c1.sun, l2: c2.moon, p1: "1. Kişi Güneş", p2: "2. Kişi Ay", dim: "duygu", title: "Ruhsal & Karakter Uyumu" },
        { l1: c2.sun, l2: c1.moon, p1: "2. Kişi Güneş", p2: "1. Kişi Ay", dim: "duygu", title: "Ruhsal Tamamlayıcılık" },
        { l1: c1.moon, l2: c2.moon, p1: "1. Kişi Ay", p2: "2. Kişi Ay", dim: "duygu", title: "Duygusal Rezonans" },
        { l1: c1.venus, l2: c2.mars, p1: "1. Kişi Venüs", p2: "2. Kişi Mars", dim: "tutku", title: "Aşk & Tutku Çekimi" },
        { l1: c2.venus, l2: c1.mars, p1: "2. Kişi Venüs", p2: "1. Kişi Mars", dim: "tutku", title: "Romantik Çekim" },
        { l1: c1.mercury, l2: c2.mercury, p1: "1. Kişi Merkür", p2: "2. Kişi Merkür", dim: "zihin", title: "Zihinsel & İletişim Uyumu" },
        { l1: c1.sun, l2: c2.jupiter, p1: "1. Kişi Güneş", p2: "2. Kişi Jüpiter", dim: "omur", title: "Bolluk & Neşe Bağı" },
        { l1: c1.sun, l2: c2.saturn, p1: "1. Kişi Güneş", p2: "2. Kişi Satürn", dim: "omur", title: "Kalıcılık & Sorumluluk" }
    ];

    let dimScores = { duygu: [], tutku: [], zihin: [], omur: [] };
    let aspectsHtml = "";

    synPairs.forEach(pair => {
        const asp = checkAspect(pair.l1, pair.l2);
        dimScores[pair.dim].push(asp.score);

        const s1 = getSign(pair.l1);
        const s2 = getSign(pair.l2);

        aspectsHtml += `
            <div class="hc-dhu-aspect-card">
                <div class="hc-dhu-asp-head">
                    <span class="hc-dhu-asp-title"><strong>${pair.title}</strong> (${pair.p1} - ${pair.p2})</span>
                    <span class="hc-dhu-asp-badge ${asp.matched ? 'hc-badge-active' : 'hc-badge-neutral'}">${asp.matched ? asp.name : 'Nötr Etkileşim'}</span>
                </div>
                <div class="hc-dhu-asp-body">
                    <span>${pair.p1}: <strong>${s1}</strong></span> ⇄ <span>${pair.p2}: <strong>${s2}</strong></span>
                </div>
            </div>
        `;
    });

    const avg = arr => Math.round(arr.reduce((a, b) => a + b, 0) / arr.length);

    const sDuygu = avg(dimScores.duygu);
    const sTutku = avg(dimScores.tutku);
    const sZihin = avg(dimScores.zihin);
    const sOmur = avg(dimScores.omur);

    const totalScore = Math.round(sDuygu * 0.35 + sTutku * 0.25 + sZihin * 0.20 + sOmur * 0.20);

    const heroHtml = `
        <div class="hc-dhu-hero-card">
            <div class="hc-dhu-hero-badge">Genel Sinastri Uyum Skoru</div>
            <div class="hc-dhu-hero-title">%${totalScore} Uyum</div>
            <p class="hc-dhu-hero-sub">${totalScore >= 80 ? '🌟 Kozmik Rezonans & Yüksek Ruh Bağı! İlişkinizde hem güçlü çekim hem de derin duygusal anlayış hakim.' : totalScore >= 65 ? '✨ Oldukça Güçlü ve Dengeli Bir Birliktelik! Ufak tefek farklılıklar iletişimi zenginleştiriyor.' : totalScore >= 50 ? '⚖️ Geliştirilebilir ve Öğretici Bir Dinamik! Farklılıkları kabullenmek ilişkiyi büyütür.' : '⚡ Yüksek Dönüştürücü Çekim & Sabır Gerektiren Bağ! Karşılıklı esneklik şart.'}</p>
        </div>
    `;

    const dimListHtml = `
        <div class="hc-dhu-dim-card">
            <div class="hc-dhu-dim-head">
                <span>💖 Duygusal Uyum & Ruhsal Bağ</span>
                <span>%${sDuygu}</span>
            </div>
            <div class="hc-dhu-dim-bar"><div class="hc-dhu-dim-fill" style="width: ${sDuygu}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-dhu-dim-card">
            <div class="hc-dhu-dim-head">
                <span>🔥 Tutku, Romantizm & Cinsel Çekim</span>
                <span>%${sTutku}</span>
            </div>
            <div class="hc-dhu-dim-bar"><div class="hc-dhu-dim-fill" style="width: ${sTutku}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-dhu-dim-card">
            <div class="hc-dhu-dim-head">
                <span>🗣️ İletişim, Zihinsel Anlayış & Sohbet</span>
                <span>%${sZihin}</span>
            </div>
            <div class="hc-dhu-dim-bar"><div class="hc-dhu-dim-fill" style="width: ${sZihin}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-dhu-dim-card">
            <div class="hc-dhu-dim-head">
                <span>🏰 Uzun Vadeli Kararlılık & Gelecek İnşası</span>
                <span>%${sOmur}</span>
            </div>
            <div class="hc-dhu-dim-bar"><div class="hc-dhu-dim-fill" style="width: ${sOmur}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-dhu-hero').innerHTML = heroHtml;
    document.getElementById('hc-dhu-dim-list').innerHTML = dimListHtml;
    document.getElementById('hc-harmony-details').innerHTML = aspectsHtml;

    document.getElementById('hc-dogum-haritasi-uyumu-result').classList.add('visible');
    document.getElementById('hc-dogum-haritasi-uyumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

