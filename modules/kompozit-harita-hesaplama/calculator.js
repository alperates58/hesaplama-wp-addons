function hcKompozitHaritaHesapla() {
    const d1Str = document.getElementById('hc-comp-d1').value;
    const t1Str = document.getElementById('hc-comp-t1').value;
    const c1Val = document.getElementById('hc-comp-c1').value;

    const d2Str = document.getElementById('hc-comp-d2').value;
    const t2Str = document.getElementById('hc-comp-t2').value;
    const c2Val = document.getElementById('hc-comp-c2').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen tüm alanları doldurun.");
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

    function calcPlanets(dStr, tStr, cVal) {
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
            "Güneş": { sym: "☉", lon: sunLon, role: "İlişkinin ortak kimliği ve amacı" },
            "Ay": { sym: "☽", lon: moonLon, role: "Duygusal iklim ve yuva hissi" },
            "Merkür": { sym: "☿", lon: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368), role: "Zihinsel iletişim ve diyalog" },
            "Venüs": { sym: "♀", lon: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244), role: "Aşk, sevgi dili ve romantizm" },
            "Mars": { sym: "♂", lon: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766), role: "Tutku, enerji ve ortak eylem" },
            "Jüpiter": { sym: "♃", lon: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001), role: "Büyüme, neşe ve vizyon" },
            "Satürn": { sym: "♄", lon: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282), role: "Sorumluluk ve kalıcılık" },
            "Uranüs": { sym: "♅", lon: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806), role: "Özgünlük ve yenilik" },
            "Neptün": { sym: "♆", lon: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147), role: "Ruhsal bağ ve romantik idealler" },
            "Plüton": { sym: "♇", lon: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396), role: "Dönüşüm ve derin bağ" },
            "Yükselen (ASC)": { sym: "ASC", lon: ascLon, role: "İlişkinin dış dünyaya yansıyan yüzü" }
        };
    }

    const p1 = calcPlanets(d1Str, t1Str, c1Val);
    const p2 = calcPlanets(d2Str, t2Str, c2Val);

    function calcMidpoint(l1, l2) {
        let diff = Math.abs(l1 - l2);
        let mid = (l1 + l2) / 2;
        if (diff > 180) mid = norm(mid + 180);
        return mid;
    }

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burcIcons = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    function getZodiac(lon) {
        const sIdx = Math.floor(lon / 30) % 12;
        const deg = Math.floor(lon % 30);
        const min = Math.floor((lon % 1) * 60);
        return {
            sign: burclar[sIdx],
            icon: burcIcons[sIdx],
            fullStr: `${burcIcons[sIdx]} ${burclar[sIdx]} ${deg}° ${min}'`
        };
    }

    let gridHtml = "";
    const compSunMid = calcMidpoint(p1["Güneş"].lon, p2["Güneş"].lon);
    const compMoonMid = calcMidpoint(p1["Ay"].lon, p2["Ay"].lon);
    const compVenMid = calcMidpoint(p1["Venüs"].lon, p2["Venüs"].lon);
    const compAscMid = calcMidpoint(p1["Yükselen (ASC)"].lon, p2["Yükselen (ASC)"].lon);

    const sunZ = getZodiac(compSunMid);
    const moonZ = getZodiac(compMoonMid);
    const venZ = getZodiac(compVenMid);
    const ascZ = getZodiac(compAscMid);

    Object.keys(p1).forEach(k => {
        const mid = calcMidpoint(p1[k].lon, p2[k].lon);
        const z = getZodiac(mid);
        gridHtml += `
            <div class="hc-comp-card">
                <div class="hc-comp-c-head">
                    <span class="hc-comp-c-sym">${p1[k].sym}</span>
                    <span class="hc-comp-c-name">${k}</span>
                </div>
                <div class="hc-comp-c-val">${z.fullStr}</div>
                <div class="hc-comp-c-role">${p1[k].role}</div>
            </div>
        `;
    });

    const heroHtml = `
        <div class="hc-comp-hero-card">
            <div class="hc-comp-hero-badge">Kompozit İlişki Çekirdeği</div>
            <div class="hc-comp-hero-title">Güneş: ${sunZ.sign} | Ay: ${moonZ.sign}</div>
            <p class="hc-comp-hero-sub">İlişkinizin yükseleni <strong>${ascZ.sign}</strong> ve aşk dili <strong>${venZ.sign}</strong> burcunda birleşiyor. Birlikteyken yarattığınız enerji tamamen bu kompozit yerleşimlere göre şekillenir.</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Kompozit Güneş (${sunZ.sign}):</strong> Bu ilişkinin varoluş amacı ${sunZ.sign} enerjisini deneyimlemektir. Birlikteyken dünya sizi ${sunZ.sign} nitelikleriyle tanır ve ortak hedefleriniz bu eksende ilerler.</p>
        <p><strong>Kompozit Ay (${moonZ.sign}):</strong> İlişkinin duygusal sığınağı ve iç dünyası ${moonZ.sign} burcundadır. Birlikte kendinizi güvende ve duygusal olarak beslenmiş hissetmeniz bu temalara bağlıdır.</p>
        <p><strong>Kompozit Venüs (${venZ.sign}):</strong> Ortak sevgi diliniz, estetik zevkleriniz ve birbirinize değer verme biçiminiz ${venZ.sign} burcunun güzellikleriyle zenginleşir.</p>
    `;

    document.getElementById('hc-comp-hero').innerHTML = heroHtml;
    document.getElementById('hc-comp-list').innerHTML = gridHtml;
    document.getElementById('hc-comp-desc').innerHTML = descHtml;

    document.getElementById('hc-kompozit-harita-result').classList.add('visible');
    document.getElementById('hc-kompozit-harita-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

