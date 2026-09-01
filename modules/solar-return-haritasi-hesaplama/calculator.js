function hcSolarReturnHesapla() {
    const bStr = document.getElementById('hc-sr-birth').value;
    const targetYear = parseInt(document.getElementById('hc-sr-year').value);
    const citySelect = document.getElementById('hc-sr-city');

    if (!bStr || !targetYear) {
        alert('Lütfen doğum tarihinizi ve dönüş yılını seçin.');
        return;
    }

    const loc = (citySelect.value || "41.0082,28.9784").split(',').map(Number);
    const lat = loc[0];
    const lon = loc[1];

    const bParts = bStr.split('-').map(Number);
    let bY = bParts[0], bM = bParts[1], bD = bParts[2];

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

    function getSunLon(jdVal) {
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;
        const L0_e = norm(280.46646 + 36000.76983 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
        return norm(L0_e + C_e);
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

        // Ascendant
        const GMST0 = norm(280.46061837 + 360.98564736629 * (jdVal - 2451545.0));
        const RAMC = norm(GMST0 + lon);
        const eps = 23.4392911 - 0.0130042 * TVal;
        const num = Math.cos(RAMC * rad);
        const den = -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad);
        let ascLon = norm(Math.atan2(num, den) / rad);

        return {
            sun: sunLon,
            moon: moonLon,
            mer: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368),
            ven: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244),
            mar: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766),
            jup: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001),
            sat: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282),
            ura: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806),
            nep: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147),
            plu: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396),
            asc: ascLon
        };
    }

    const jdNatal = getJD(bY, bM, bD, 12);
    const natalSunLon = getSunLon(jdNatal);

    // Iterative Solar Return finder in targetYear
    let approxJD = getJD(targetYear, bM, bD, 12);
    let bestJD = approxJD;
    for (let iter = 0; iter < 10; iter++) {
        let curSun = getSunLon(bestJD);
        let diff = curSun - natalSunLon;
        if (diff > 180) diff -= 360;
        if (diff < -180) diff += 360;
        // Sun moves ~0.9856 deg/day
        bestJD -= (diff / 0.9856);
    }

    const srPlanets = calcAllPlanets(bestJD);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    const srSunSignIdx = Math.floor(srPlanets.sun / 30) % 12;
    const srMoonSignIdx = Math.floor(srPlanets.moon / 30) % 12;
    const srAscSignIdx = Math.floor(srPlanets.asc / 30) % 12;

    const heroHtml = `
        <div class="hc-sr-hero-card">
            <div class="hc-sr-hero-badge">${targetYear} Solar Return Döngüsü</div>
            <div class="hc-sr-hero-title">${symbols[srSunSignIdx]} ${burclar[srSunSignIdx]} Güneş Yılı</div>
            <div class="hc-sr-hero-grid">
                <div class="hc-sr-mini-card">
                    <span class="hc-sr-mini-label">☀️ Yıllık Güneş</span>
                    <span class="hc-sr-mini-val">${symbols[srSunSignIdx]} ${burclar[srSunSignIdx]} (${Math.floor(srPlanets.sun % 30)}°)</span>
                    <span class="hc-sr-mini-sub">Doğum Derecenizle Tam Kavuşum</span>
                </div>
                <div class="hc-sr-mini-card">
                    <span class="hc-sr-mini-label">🌅 Yıllık Yükselen (SR ASC)</span>
                    <span class="hc-sr-mini-val">${symbols[srAscSignIdx]} ${burclar[srAscSignIdx]} (${Math.floor(srPlanets.asc % 30)}°)</span>
                    <span class="hc-sr-mini-sub">Yılın Ana Motivasyonu</span>
                </div>
                <div class="hc-sr-mini-card">
                    <span class="hc-sr-mini-label">🌙 Yıllık Ay (SR Moon)</span>
                    <span class="hc-sr-mini-val">${symbols[srMoonSignIdx]} ${burclar[srMoonSignIdx]} (${Math.floor(srPlanets.moon % 30)}°)</span>
                    <span class="hc-sr-mini-sub">Yılın Duygusal Teması</span>
                </div>
            </div>
        </div>
    `;

    const planetDefs = [
        { key: "sun", name: "Güneş", symbol: "☉" },
        { key: "moon", name: "Ay", symbol: "☽" },
        { key: "asc", name: "Yıllık Yükselen (ASC)", symbol: "ASC" },
        { key: "mer", name: "Merkür", symbol: "☿" },
        { key: "ven", name: "Venüs", symbol: "♀" },
        { key: "mar", name: "Mars", symbol: "♂" },
        { key: "jup", name: "Jüpiter", symbol: "♃" },
        { key: "sat", name: "Satürn", symbol: "♄" },
        { key: "ura", name: "Uranüs", symbol: "♅" },
        { key: "nep", name: "Neptün", symbol: "♆" },
        { key: "plu", name: "Plüton", symbol: "♇" }
    ];

    let tableHtml = `
        <table class="hc-sr-table">
            <thead>
                <tr>
                    <th>Gezegen</th>
                    <th>Solar Return Burcu</th>
                    <th>Derece & Dakika</th>
                    <th>Yıllık Anlamı</th>
                </tr>
            </thead>
            <tbody>
    `;

    const planetRoles = {
        sun: "Yıllık hedefler ve canlılık",
        moon: "Ruhsal ihtiyaçlar ve iç huzur",
        asc: "Yılın dışa yansıyan maskesi ve tarzı",
        mer: "Yıllık iletişim, sözleşmeler ve fikirler",
        ven: "Aşk, ilişkiler ve finansal bereket",
        mar: "Mücadele, hırs ve enerji harcanan alan",
        jup: "Büyük şans ve fırsat kapısı",
        sat: "Disiplin ve sorumluluk sınavı",
        ura: "Sürpriz değişimler ve ani uyanışlar",
        nep: "Ruhsal ilham ve hayal gücü",
        plu: "Kökten dönüşüm ve güç kazanımı"
    };

    planetDefs.forEach(p => {
        const lonVal = srPlanets[p.key];
        const sIdx = Math.floor(lonVal / 30) % 12;
        const deg = Math.floor(lonVal % 30);
        const min = Math.floor((lonVal % 1) * 60);

        tableHtml += `
            <tr>
                <td><strong>${p.symbol} ${p.name}</strong></td>
                <td>${symbols[sIdx]} ${burclar[sIdx]}</td>
                <td>${deg}° ${min}'</td>
                <td style="color:#64748b; font-size:12px;">${planetRoles[p.key]}</td>
            </tr>
        `;
    });
    tableHtml += `</tbody></table>`;

    const detailsHtml = `
        <div class="hc-sr-pred-card">
            <h4>🌟 ${targetYear} Yılı Genel Yaşam Sentezi</h4>
            <p>Bu yıl <strong>${burclar[srAscSignIdx]}</strong> Yükselen etkisiyle, hayatınızda daha ${burclar[srAscSignIdx]} temalarını (girişimcilik, sağlamlık, iletişim, yuva veya kariyer) öne çıkaracaksınız.</p>
            <p><strong>Yıllık Ay ${burclar[srMoonSignIdx]} Burcunda:</strong> Yıl boyu duygusal huzuru ve güvenceyi ${burclar[srMoonSignIdx]} burcunun özelliklerinde arayacaksınız. 
            <strong>${burclar[Math.floor(srPlanets.jup / 30) % 12]}</strong> konumundaki Jüpiter ise yıl boyunca en verimli kapılarınızı ve gelişim fırsatlarınızı temsil ediyor.</p>
        </div>
    `;

    document.getElementById('hc-sr-hero').innerHTML = heroHtml;
    document.getElementById('hc-sr-table-container').innerHTML = tableHtml;
    document.getElementById('hc-sr-details').innerHTML = detailsHtml;

    document.getElementById('hc-solar-return-result').classList.add('visible');
    document.getElementById('hc-solar-return-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

