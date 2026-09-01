function hcGezegenDagilimiHesapla() {
    const dStr = document.getElementById('hc-gd-date').value;
    const tStr = document.getElementById('hc-gd-time').value;
    const cVal = document.getElementById('hc-gd-city').value;

    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const timeParts = (tStr || "12:00").split(':').map(Number);
    const hour = timeParts[0] + (timeParts[1] / 60);

    const coords = (cVal || "41.0082,28.9784").split(',').map(Number);
    const lat = coords[0];
    const lon = coords[1];

    const dParts = dStr.split('-').map(Number);
    let Y = dParts[0], M = dParts[1], D = dParts[2];

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

        const GMST0 = norm(280.46061837 + 360.98564736629 * (jdVal - 2451545.0));
        const RAMC = norm(GMST0 + lon);
        const eps = 23.4392911 - 0.0130042 * TVal;
        const num = Math.cos(RAMC * rad);
        const den = -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad);
        let ascLon = norm(Math.atan2(num, den) / rad);

        return [
            { name: "Güneş", symbol: "☉", weight: 3, lon: sunLon },
            { name: "Ay", symbol: "☽", weight: 3, lon: moonLon },
            { name: "Merkür", symbol: "☿", weight: 2, lon: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368) },
            { name: "Venüs", symbol: "♀", weight: 2, lon: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244) },
            { name: "Mars", symbol: "♂", weight: 2, lon: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766) },
            { name: "Jüpiter", symbol: "♃", weight: 1.5, lon: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001) },
            { name: "Satürn", symbol: "♄", weight: 1.5, lon: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282) },
            { name: "Uranüs", symbol: "♅", weight: 1, lon: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806) },
            { name: "Neptün", weight: 1, lon: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147) },
            { name: "Plüton", weight: 1, lon: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396) },
            { name: "asc", lon: ascLon }
        ];
    }

    const jdVal = getJD(Y, M, D, hour);
    const planetsList = calcAllPlanets(jdVal);
    const ascLon = planetsList.find(p => p.name === "asc").lon;
    const bodies = planetsList.filter(p => p.name !== "asc");

    // Whole sign houses calculation
    const ascSignIdx = Math.floor(ascLon / 30) % 12;

    let hemi = {
        east: 0, // Evler 10, 11, 12, 1, 2, 3
        west: 0, // Evler 4, 5, 6, 7, 8, 9
        north: 0, // Evler 1, 2, 3, 4, 5, 6 (Ufuk altı / Gece)
        south: 0  // Evler 7, 8, 9, 10, 11, 12 (Ufuk üstü / Gündüz)
    };

    let quad = {
        q1: 0, // 1, 2, 3 (Bireysel Kimlik)
        q2: 0, // 4, 5, 6 (Kişisel İfade & Uyum)
        q3: 0, // 7, 8, 9 (Sosyal İlişkiler)
        q4: 0  // 10, 11, 12 (Toplumsal Vizyon)
    };

    let totalWeight = 0;

    bodies.forEach(b => {
        const sIdx = Math.floor(b.lon / 30) % 12;
        const house = ((sIdx - ascSignIdx + 12) % 12) + 1; // 1 to 12

        totalWeight += b.weight;

        // East / West
        if ([10, 11, 12, 1, 2, 3].includes(house)) hemi.east += b.weight;
        else hemi.west += b.weight;

        // North / South
        if ([1, 2, 3, 4, 5, 6].includes(house)) hemi.north += b.weight;
        else hemi.south += b.weight;

        // Quadrants
        if ([1, 2, 3].includes(house)) quad.q1 += b.weight;
        else if ([4, 5, 6].includes(house)) quad.q2 += b.weight;
        else if ([7, 8, 9].includes(house)) quad.q3 += b.weight;
        else quad.q4 += b.weight;
    });

    const eastPct = Math.round((hemi.east / totalWeight) * 100);
    const westPct = 100 - eastPct;
    const northPct = Math.round((hemi.north / totalWeight) * 100);
    const southPct = 100 - northPct;

    const q1Pct = Math.round((quad.q1 / totalWeight) * 100);
    const q2Pct = Math.round((quad.q2 / totalWeight) * 100);
    const q3Pct = Math.round((quad.q3 / totalWeight) * 100);
    const q4Pct = 100 - (q1Pct + q2Pct + q3Pct);

    const isEast = eastPct >= westPct;
    const isSouth = southPct >= northPct;

    const heroHtml = `
        <div class="hc-gd-hero-card">
            <div class="hc-gd-hero-badge">Baskın Yönelim</div>
            <div class="hc-gd-hero-title">${isEast ? 'Doğu (Özerk)' : 'Batı (İlişki Odaklı)'} & ${isSouth ? 'Güney (Dışa Dönük)' : 'Kuzey (İçe Dönük)'}</div>
            <p class="hc-gd-hero-sub">${isEast ? 'Kendi kararlarınızı kendiniz alma ve inisiyatif kullanma gücünüz çok yüksek.' : 'İlişkiler, ortaklıklar ve başkalarıyla işbirliği hayatınızın merkezinde.'} ${isSouth ? 'Kariyer, sosyal tanınma ve dış dünyada görünürlük ana motivasyonunuz.' : 'İçsel huzur, aile, mahremiyet ve kişisel kökler sizin için en değerli hazinedir.'}</p>
        </div>
    `;

    const hemiBarsHtml = `
        <div class="hc-gd-hemi-box">
            <div class="hc-gd-hemi-header">
                <span>Doğu (Özerklik / İnisiyatif): %${eastPct}</span>
                <span>Batı (İşbirliği / Uyum): %${westPct}</span>
            </div>
            <div class="hc-gd-split-bar">
                <div class="hc-gd-split-left" style="width: ${eastPct}%;"></div>
                <div class="hc-gd-split-right" style="width: ${westPct}%;"></div>
            </div>
        </div>
        <div class="hc-gd-hemi-box">
            <div class="hc-gd-hemi-header">
                <span>Güney (Dış Dünya / Kariyer): %${southPct}</span>
                <span>Kuzey (İç Dünya / Mahremiyet): %${northPct}</span>
            </div>
            <div class="hc-gd-split-bar">
                <div class="hc-gd-split-left hc-south-color" style="width: ${southPct}%;"></div>
                <div class="hc-gd-split-right hc-north-color" style="width: ${northPct}%;"></div>
            </div>
        </div>
    `;

    const quadHtml = `
        <div class="hc-gd-quad-card">
            <div class="hc-gd-qtitle">1. Çeyrek (1-3. Evler)</div>
            <div class="hc-gd-qpct">%${q1Pct}</div>
            <p class="hc-gd-qdesc">Bireysel kimlik, kişisel motivasyon ve özfarkındalık.</p>
        </div>
        <div class="hc-gd-quad-card">
            <div class="hc-gd-qtitle">2. Çeyrek (4-6. Evler)</div>
            <div class="hc-gd-qpct">%${q2Pct}</div>
            <p class="hc-gd-qdesc">Kişisel ifade, içsel uyum, kökler ve günlük verimlilik.</p>
        </div>
        <div class="hc-gd-quad-card">
            <div class="hc-gd-qtitle">3. Çeyrek (7-9. Evler)</div>
            <div class="hc-gd-qpct">%${q3Pct}</div>
            <p class="hc-gd-qdesc">Sosyal etkileşim, ikili ilişkiler ve yüksek vizyon/felsefe.</p>
        </div>
        <div class="hc-gd-quad-card">
            <div class="hc-gd-qtitle">4. Çeyrek (10-12. Evler)</div>
            <div class="hc-gd-qpct">%${q4Pct}</div>
            <p class="hc-gd-qdesc">Kariyer, toplumsal etki, kolektif hizmet ve evrensellik.</p>
        </div>
    `;

    const descHtml = `
        <p><strong>Yarımküre Dengesi:</strong> Gezegenlerinizin Doğu/Batı ve Kuzey/Güney eksenlerindeki dağılımı, hayat enerjinizi nereye aktardığınızı belirler.</p>
        <p><strong>${isEast ? 'Doğu Yarımküresi Baskınlığı' : 'Batı Yarımküresi Baskınlığı'}:</strong> ${isEast ? 'Kendi kaderinizin kaptanısınız. Başkalarının onayını beklemeden harekete geçersiniz.' : 'Başkalarının hayatındaki rolünüz büyüktür. İkili ilişkiler, ortaklıklar ve takım çalışmalarıyla büyürsünüz.'}</p>
        <p><strong>${isSouth ? 'Güney (Tepe) Yarımküresi Baskınlığı' : 'Kuzey (Dip) Yarımküresi Baskınlığı'}:</strong> ${isSouth ? 'Gezegenleriniz ufkun üzerinde toplanmıştır. Toplum önünde tanınmak, liderlik etmek ve hedeflerinizi somutlaştırmak istersiniz.' : 'Gezegenleriniz ufkun altındadır. İçsel dünyanız çok zengindir; mahremiyet, güven ve duygusal kökler her şeyin önündedir.'}</p>
    `;

    document.getElementById('hc-gd-hero').innerHTML = heroHtml;
    document.getElementById('hc-gd-hemi-bars').innerHTML = hemiBarsHtml;
    document.getElementById('hc-gd-quad-grid').innerHTML = quadHtml;
    document.getElementById('hc-gd-desc').innerHTML = descHtml;

    document.getElementById('hc-gezegen-dagilimi-result').classList.add('visible');
    document.getElementById('hc-gezegen-dagilimi-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

