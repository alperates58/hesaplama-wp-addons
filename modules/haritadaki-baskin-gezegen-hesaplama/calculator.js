function hcBaskinGezegenHesapla() {
    const bStr = document.getElementById('hc-bg-birth').value;
    const tStr = document.getElementById('hc-bg-time').value;
    const cVal = document.getElementById('hc-bg-city').value;

    if (!bStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const timeParts = (tStr || "12:00").split(':').map(Number);
    const hour = timeParts[0] + (timeParts[1] / 60);

    const coords = (cVal || "41.0082,28.9784").split(',').map(Number);
    const lat = coords[0];
    const lon = coords[1];

    const dParts = bStr.split('-').map(Number);
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

        return {
            "Güneş": { symbol: "☉", lon: sunLon },
            "Ay": { symbol: "☽", lon: moonLon },
            "Merkür": { symbol: "☿", lon: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368) },
            "Venüs": { symbol: "♀", lon: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244) },
            "Mars": { symbol: "♂", lon: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766) },
            "Jüpiter": { symbol: "♃", lon: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001) },
            "Satürn": { symbol: "♄", lon: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282) },
            "Uranüs": { symbol: "♅", lon: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806) },
            "Neptün": { symbol: "♆", lon: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147) },
            "Plüton": { symbol: "♇", lon: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396) },
            "asc": ascLon
        };
    }

    const jdVal = getJD(Y, M, D, hour);
    const planets = calcAllPlanets(jdVal);

    const signRulers = [
        "Mars",     // 0 Koc
        "Venüs",    // 1 Boga
        "Merkür",   // 2 Ikizler
        "Ay",       // 3 Yengec
        "Güneş",    // 4 Aslan
        "Merkür",   // 5 Basak
        "Venüs",    // 6 Terazi
        "Plüton",   // 7 Akrep
        "Jüpiter",  // 8 Yay
        "Satürn",   // 9 Oglak
        "Uranüs",   // 10 Kova
        "Neptün"    // 11 Balik
    ];

    const domiciles = {
        "Güneş": [4], "Ay": [3], "Merkür": [2, 5], "Venüs": [1, 6], "Mars": [0, 7],
        "Jüpiter": [8, 11], "Satürn": [9, 10], "Uranüs": [10], "Neptün": [11], "Plüton": [7]
    };

    const exaltations = {
        "Güneş": 0, "Ay": 1, "Merkür": 5, "Venüs": 11, "Mars": 9,
        "Jüpiter": 3, "Satürn": 6, "Uranüs": 7, "Neptün": 4, "Plüton": 8
    };

    let planetScores = {
        "Güneş": 5, "Ay": 5, "Merkür": 4, "Venüs": 4, "Mars": 4,
        "Jüpiter": 4, "Satürn": 4, "Uranüs": 3, "Neptün": 3, "Plüton": 3
    };

    const ascSignIdx = Math.floor(planets.asc / 30) % 12;
    const sunSignIdx = Math.floor(planets["Güneş"].lon / 30) % 12;
    const moonSignIdx = Math.floor(planets["Ay"].lon / 30) % 12;

    // Chart Ruler (ASC Ruler) +6
    const chartRuler = signRulers[ascSignIdx];
    planetScores[chartRuler] += 6;

    // Sun Ruler +4, Moon Ruler +4
    planetScores[signRulers[sunSignIdx]] += 4;
    planetScores[signRulers[moonSignIdx]] += 4;

    // Dispositor count & Dignities
    for (let pName in domiciles) {
        const pLon = planets[pName].lon;
        const sIdx = Math.floor(pLon / 30) % 12;

        // Dispositor of this planet gets +2
        planetScores[signRulers[sIdx]] += 2;

        // Domicile +5
        if (domiciles[pName].includes(sIdx)) {
            planetScores[pName] += 5;
        }
        // Exaltation +4
        if (exaltations[pName] === sIdx) {
            planetScores[pName] += 4;
        }

        // Angular house (1, 4, 7, 10) +4
        const houseNum = ((sIdx - ascSignIdx + 12) % 12) + 1;
        if ([1, 4, 7, 10].includes(houseNum)) {
            planetScores[pName] += 4;
        }
    }

    let totalScore = 0;
    for (let p in planetScores) totalScore += planetScores[p];

    let sortedScores = Object.keys(planetScores).map(k => ({
        name: k,
        symbol: planets[k].symbol,
        score: planetScores[k],
        pct: ((planetScores[k] / totalScore) * 100).toFixed(1)
    })).sort((a, b) => b.score - a.score);

    const dominant = sortedScores[0];

    const planetDesc = {
        "Güneş": "Siz doğuştan bir lider ve ışıksınız. Parlamak, ilham vermek ve özgün yaratıcılığınızı sergilemek ana motivasyonunuzdur.",
        "Ay": "Duygusal zekanız, sezgileriniz ve koruyucu ruhunuz haritanızın merkezindedir. İnsanların duygusal ihtiyaçlarını anında hissedersiniz.",
        "Merkür": "Zihniniz, iletişim gücünüz ve hızlı analiz yeteneğiniz hayatınızın ana motorudur. Bilgiyi işleme ve aktarmada üstünsünüz.",
        "Venüs": "Aşk, estetik, uyum ve değer yaratma arzusu sizin ana frekansınızdır. Güzelliği ve diplomasiyi hayata taşırsınız.",
        "Mars": "Cesaret, mücadele azmi ve öncülük enerjiniz haritanızı yönetiyor. Harekete geçmek ve kazanmak için yaşarsınız.",
        "Jüpiter": "Büyük vizyon, felsefe, şans ve bilgelik arayışı sizin ana pusulanızdır. Ufukları genişletmekte ustasınız.",
        "Satürn": "Disiplin, sağlamlık, sorumluluk ve ustalık haritanızın temel direğidir. Sabırla kalıcı başarılar inşa edersiniz.",
        "Uranüs": "Özgünlük, yenilikçilik ve ezber bozan deha sizin ana gücünüzdür. Geleceği şekillendiren vizyona sahipsiniz.",
        "Neptün": "Yüksek hayal gücü, maneviyat, empati ve ilham sizin ruhsal dünyanızı yönetir. Evrensel sevgiye bağlısınız.",
        "Plüton": "Derin dönüşüm, psikolojik güç ve küllerinden doğma kudreti sizin en büyük donanımınızdır. Krizleri güce çevirirsiniz."
    };

    const heroHtml = `
        <div class="hc-bg-hero-card">
            <div class="hc-bg-hero-badge">Harita Kaptanı (Dominant Gezegen)</div>
            <div class="hc-bg-hero-title">${dominant.symbol} ${dominant.name} (%${dominant.pct})</div>
            <p class="hc-bg-hero-sub">${planetDesc[dominant.name]}</p>
        </div>
    `;

    let barsHtml = "";
    sortedScores.forEach(item => {
        barsHtml += `
            <div class="hc-bg-bar-row">
                <div class="hc-bg-bar-header">
                    <span class="hc-bg-pname">${item.symbol} ${item.name}</span>
                    <span class="hc-bg-ppct">%${item.pct} (${item.score} Puan)</span>
                </div>
                <div class="hc-bg-bar-track">
                    <div class="hc-bg-bar-fill" style="width: ${Math.min(100, item.pct * 4)}%;"></div>
                </div>
            </div>
        `;
    });

    const descHtml = `
        <p>Doğum haritanızdaki en yüksek ağırlığa ve etkiye sahip yönetici güç <strong>${dominant.symbol} ${dominant.name}</strong> gezegenidir.</p>
        <p><strong>Arketip Etkisi:</strong> ${planetDesc[dominant.name]}</p>
        <p><strong>Yükselen Yöneticisi:</strong> Haritanızın Yükselen burcunun yöneticisi <strong>${chartRuler}</strong> gezegenidir ve yaşam vitrininizi yönlendirir.</p>
    `;

    document.getElementById('hc-bg-hero').innerHTML = heroHtml;
    document.getElementById('hc-bg-bars').innerHTML = barsHtml;
    document.getElementById('hc-bg-desc').innerHTML = descHtml;

    document.getElementById('hc-bg-result').classList.add('visible');
    document.getElementById('hc-bg-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

