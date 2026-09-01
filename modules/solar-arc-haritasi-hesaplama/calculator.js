function hcSolarArcHesapla() {
    const bStr = document.getElementById('hc-sa-birth').value;
    const tYear = parseInt(document.getElementById('hc-sa-year').value);

    if (!bStr || !tYear) {
        alert('Lütfen doğum tarihinizi ve hedef yılı girin.');
        return;
    }

    const bParts = bStr.split('-').map(Number);
    let bY = bParts[0], bM = bParts[1], bD = bParts[2];
    const age = tYear - bY;

    if (age < 0) {
        alert("Hedef yıl doğum yılından küçük olamaz.");
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
            plu: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396)
        };
    }

    const jdNatal = getJD(bY, bM, bD, 12);
    const jdProgSun = jdNatal + age;

    const natalSun = getSunLon(jdNatal);
    const progSun = getSunLon(jdProgSun);

    let solarArc = progSun - natalSun;
    if (solarArc < 0) solarArc += 360;

    const natalPlanets = calcAllPlanets(jdNatal);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    const planetDefs = [
        { key: "sun", name: "Güneş", symbol: "☉" },
        { key: "moon", name: "Ay", symbol: "☽" },
        { key: "mer", name: "Merkür", symbol: "☿" },
        { key: "ven", name: "Venüs", symbol: "♀" },
        { key: "mar", name: "Mars", symbol: "♂" },
        { key: "jup", name: "Jüpiter", symbol: "♃" },
        { key: "sat", name: "Satürn", symbol: "♄" },
        { key: "ura", name: "Uranüs", symbol: "♅" },
        { key: "nep", name: "Neptün", symbol: "♆" },
        { key: "plu", name: "Plüton", symbol: "♇" }
    ];

    // Directed positions
    const directedPlanets = {};
    planetDefs.forEach(p => {
        directedPlanets[p.key] = norm(natalPlanets[p.key] + solarArc);
    });

    // Detect Solar Arc turning points (Hard aspects: 0°, 90°, 180°, and soft 60°, 120° with orb <= 1.0°)
    const aspectDefs = [
        { name: "Kavuşum (0°)", angle: 0, orb: 1.0, theme: "Büyük Hayat Olayı / Yeni Kimlik ve Yol Ayrımı", color: "#6366f1" },
        { name: "Kare (90°)", angle: 90, orb: 1.0, theme: "Radikal Karar & Mecburi Atılım Dönemi", color: "#ef4444" },
        { name: "Karşıt (180°)", angle: 180, orb: 1.0, theme: "İlişkilerde & Yaşamda Büyük Yüzleşme", color: "#f59e0b" },
        { name: "Üçgen (120°)", angle: 120, orb: 1.0, theme: "Büyük Başarı & Akıcı Fırsat Kapısı", color: "#10b981" },
        { name: "Sekstil (60°)", angle: 60, orb: 0.8, theme: "Yeni Bir Başlangıç Fırsatı", color: "#0ea5e9" }
    ];

    let saAspects = [];
    planetDefs.forEach(dp => {
        planetDefs.forEach(np => {
            const dLon = directedPlanets[dp.key];
            const nLon = natalPlanets[np.key];

            let diff = Math.abs(dLon - nLon);
            if (diff > 180) diff = 360 - diff;

            aspectDefs.forEach(asp => {
                const orbDiff = Math.abs(diff - asp.angle);
                if (orbDiff <= asp.orb) {
                    saAspects.push({
                        dName: `SA ${dp.symbol} ${dp.name}`,
                        nName: `Natal ${np.symbol} ${np.name}`,
                        aspect: asp.name,
                        orb: orbDiff.toFixed(2),
                        theme: asp.theme,
                        color: asp.color
                    });
                }
            });
        });
    });

    const heroHtml = `
        <div class="hc-sa-hero-card">
            <div class="hc-sa-hero-badge">${tYear} Yılı (${age} Yaş Solar Arc)</div>
            <div class="hc-sa-hero-title">Güneş Yayı Değeri: <strong>${solarArc.toFixed(2)}°</strong></div>
            <p class="hc-sa-hero-sub">Tüm natal gezegenleriniz hayatınız boyunca her yıl yaklaşık 1° ilerleyerek doğum haritanızla güçlü temaslar kurar.</p>
        </div>
    `;

    let aspectsHtml = "";
    if (saAspects.length === 0) {
        aspectsHtml = `<p style="color:#64748b; font-size:13px;">${tYear} yılında ±1.0° orb aralığında majör bir Solar Arc dönüm noktası açısı bulunmuyor. Bu yıl yöneltilmiş gezegenler sakin bir geçiş evresindedir.</p>`;
    } else {
        saAspects.forEach(a => {
            aspectsHtml += `
                <div class="hc-sa-aspect-card" style="border-left: 4px solid ${a.color}">
                    <div class="hc-sa-aspect-top">
                        <span class="hc-sa-badge" style="background:${a.color}; color:#fff;">${a.aspect}</span>
                        <span class="hc-sa-pair">${a.dName} ➜ ${a.nName}</span>
                        <span class="hc-sa-orb">(Orb: ${a.orb}°)</span>
                    </div>
                    <div class="hc-sa-theme">⚡ ${a.theme}</div>
                </div>
            `;
        });
    }

    let tableHtml = `
        <table class="hc-sa-table">
            <thead>
                <tr>
                    <th>Gezegen</th>
                    <th>Natal Konum</th>
                    <th>Solar Arc (${tYear}) Konumu</th>
                </tr>
            </thead>
            <tbody>
    `;

    planetDefs.forEach(p => {
        const nLon = natalPlanets[p.key];
        const dLon = directedPlanets[p.key];

        const nSIdx = Math.floor(nLon / 30) % 12;
        const dSIdx = Math.floor(dLon / 30) % 12;

        tableHtml += `
            <tr>
                <td><strong>${p.symbol} ${p.name}</strong></td>
                <td>${symbols[nSIdx]} ${burclar[nSIdx]} (${Math.floor(nLon % 30)}° ${Math.floor((nLon % 1) * 60)}')</td>
                <td><strong style="color:#4f46e5;">${symbols[dSIdx]} ${burclar[dSIdx]} (${Math.floor(dLon % 30)}° ${Math.floor((dLon % 1) * 60)}')</strong></td>
            </tr>
        `;
    });
    tableHtml += `</tbody></table>`;

    document.getElementById('hc-sa-hero').innerHTML = heroHtml;
    document.getElementById('hc-sa-aspects-list').innerHTML = aspectsHtml;
    document.getElementById('hc-sa-table-container').innerHTML = tableHtml;

    document.getElementById('hc-solar-arc-result').classList.add('visible');
    document.getElementById('hc-solar-arc-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

