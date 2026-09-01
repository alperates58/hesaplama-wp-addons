function hcLunarReturnHesapla() {
    const bStr = document.getElementById('hc-lr-birth').value;
    const targetMonthStr = document.getElementById('hc-lr-month').value; // YYYY-MM

    if (!bStr || !targetMonthStr) {
        alert('Lütfen doğum tarihinizi ve hedef ayı seçin.');
        return;
    }

    const bParts = bStr.split('-').map(Number);
    let bY = bParts[0], bM = bParts[1], bD = bParts[2];

    const [tYear, tMonth] = targetMonthStr.split('-').map(Number);

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

    function getMoonLon(jdVal) {
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;
        const L_m = norm(218.3164477 + 481267.88123421 * TVal);
        const D_m = norm(297.8501921 + 445267.1114034 * TVal);
        const M_m = norm(134.9633964 + 477198.8675055 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const F_m = norm(93.2720950 + 483202.0175233 * TVal);
        return norm(L_m + 6.288774 * Math.sin(M_m * rad) + 1.274027 * Math.sin((2 * D_m - M_m) * rad) + 0.658314 * Math.sin(2 * D_m * rad) + 0.213618 * Math.sin(2 * M_m * rad) - 0.185116 * Math.sin(M_e * rad) - 0.114332 * Math.sin(2 * F_m * rad));
    }

    function calcAllPlanets(jdVal) {
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;

        // Earth
        const L0_e = norm(280.46646 + 36000.76983 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
        const sunLon = norm(L0_e + C_e);
        const e_e = 0.016708634 - 0.000042037 * TVal;
        const R_e = 1.000001018 * (1 - e_e * e_e) / (1 + e_e * Math.cos((M_e + C_e) * rad));
        const Xe = R_e * Math.cos(sunLon * rad);
        const Ye = R_e * Math.sin(sunLon * rad);

        const moonLon = getMoonLon(jdVal);

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

        return {
            sun: sunLon,
            moon: moonLon,
            mer: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368),
            ven: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244),
            mar: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766),
            jup: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001),
            sat: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282)
        };
    }

    const jdNatal = getJD(bY, bM, bD, 12);
    const natalMoonLon = getMoonLon(jdNatal);

    // Find closest return in target month (Moon moves ~13.2 deg/day)
    let approxJD = getJD(tYear, tMonth, 15, 12);
    let bestJD = approxJD;
    let minDiff = 999;

    for (let day = 1; day <= 30; day++) {
        let testJD = getJD(tYear, tMonth, day, 12);
        let diff = Math.abs(getMoonLon(testJD) - natalMoonLon);
        if (diff > 180) diff = 360 - diff;
        if (diff < minDiff) {
            minDiff = diff;
            bestJD = testJD;
        }
    }

    // Refine bestJD
    for (let iter = 0; iter < 8; iter++) {
        let curMoon = getMoonLon(bestJD);
        let diff = curMoon - natalMoonLon;
        if (diff > 180) diff -= 360;
        if (diff < -180) diff += 360;
        bestJD -= (diff / 13.176);
    }

    const lrPlanets = calcAllPlanets(bestJD);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    const lrMoonSignIdx = Math.floor(lrPlanets.moon / 30) % 12;
    const lrSunSignIdx = Math.floor(lrPlanets.sun / 30) % 12;

    const heroHtml = `
        <div class="hc-lr-hero-card">
            <div class="hc-lr-hero-badge">${tYear} - ${tMonth.toString().padStart(2, '0')} Ay Dönüşü</div>
            <div class="hc-lr-hero-title">${symbols[lrMoonSignIdx]} ${burclar[lrMoonSignIdx]} Lunar Return Döngüsü</div>
            <div class="hc-lr-hero-grid">
                <div class="hc-lr-mini-card">
                    <span class="hc-lr-mini-label">☽ Ay Dönüş Konumu</span>
                    <span class="hc-lr-mini-val">${symbols[lrMoonSignIdx]} ${burclar[lrMoonSignIdx]} (${Math.floor(lrPlanets.moon % 30)}°)</span>
                    <span class="hc-lr-mini-sub">Natal Ay Derecenizle Tam Hizalanma</span>
                </div>
                <div class="hc-lr-mini-card">
                    <span class="hc-lr-mini-label">☉ Döngü Güneşi</span>
                    <span class="hc-lr-mini-val">${symbols[lrSunSignIdx]} ${burclar[lrSunSignIdx]} (${Math.floor(lrPlanets.sun % 30)}°)</span>
                    <span class="hc-lr-mini-sub">28 Günlük Bilinç Odağı</span>
                </div>
            </div>
        </div>
    `;

    const planetDefs = [
        { key: "moon", name: "Dönüş Ayı", symbol: "☽" },
        { key: "sun", name: "Güneş", symbol: "☉" },
        { key: "mer", name: "Merkür", symbol: "☿" },
        { key: "ven", name: "Venüs", symbol: "♀" },
        { key: "mar", name: "Mars", symbol: "♂" },
        { key: "jup", name: "Jüpiter", symbol: "♃" },
        { key: "sat", name: "Satürn", symbol: "♄" }
    ];

    let tableHtml = `
        <table class="hc-lr-table">
            <thead>
                <tr>
                    <th>Gezegen</th>
                    <th>Lunar Return Burcu</th>
                    <th>Derece & Dakika</th>
                </tr>
            </thead>
            <tbody>
    `;

    planetDefs.forEach(p => {
        const lonVal = lrPlanets[p.key];
        const sIdx = Math.floor(lonVal / 30) % 12;
        const deg = Math.floor(lonVal % 30);
        const min = Math.floor((lonVal % 1) * 60);

        tableHtml += `
            <tr>
                <td><strong>${p.symbol} ${p.name}</strong></td>
                <td>${symbols[sIdx]} ${burclar[sIdx]}</td>
                <td>${deg}° ${min}'</td>
            </tr>
        `;
    });
    tableHtml += `</tbody></table>`;

    const detailsHtml = `
        <div class="hc-lr-pred-card">
            <h4>🌊 Önümüzdeki 28 Günün Duygusal Yol Haritası</h4>
            <p>Ay'ın öz burcunuza ve doğum derecenize dönmesi, ruhsal bir 'yenilenme ve sıfırlanma' anıdır. Bu 28 gün boyunca <strong>${burclar[lrMoonSignIdx]}</strong> burcunun ihtiyaçları (güvenlik, aidiyet ve beslenme alanları) yaşamınızda en belirleyici etken olacaktır.</p>
            <p><strong>${burclar[Math.floor(lrPlanets.ven / 30) % 12]}</strong> burcundaki Venüs ikili ilişkilerde aradığınız huzuru şekillendirirken, <strong>${burclar[Math.floor(lrPlanets.mar / 30) % 12]}</strong> burcundaki Mars bu ay içsel gerilim veya motivasyon yaşadığınız alanları simgeler.</p>
        </div>
    `;

    document.getElementById('hc-lr-hero').innerHTML = heroHtml;
    document.getElementById('hc-lr-table-container').innerHTML = tableHtml;
    document.getElementById('hc-lr-details').innerHTML = detailsHtml;

    document.getElementById('hc-lunar-return-result').classList.add('visible');
    document.getElementById('hc-lunar-return-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

