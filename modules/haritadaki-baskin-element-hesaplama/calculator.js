function hcBaskinElementHesapla() {
    const bStr = document.getElementById('hc-be-birth').value;
    const tStr = document.getElementById('hc-be-time').value;
    const cVal = document.getElementById('hc-be-city').value;

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

        return [
            { name: "Güneş", weight: 3, lon: sunLon },
            { name: "Ay", weight: 3, lon: moonLon },
            { name: "Yükselen", weight: 3, lon: ascLon },
            { name: "Merkür", weight: 2, lon: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368) },
            { name: "Venüs", weight: 2, lon: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244) },
            { name: "Mars", weight: 2, lon: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766) },
            { name: "Jüpiter", weight: 1.5, lon: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001) },
            { name: "Satürn", weight: 1.5, lon: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282) },
            { name: "Uranüs", weight: 1, lon: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806) },
            { name: "Neptün", weight: 1, lon: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147) },
            { name: "Plüton", weight: 1, lon: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396) }
        ];
    }

    const jdVal = getJD(Y, M, D, hour);
    const bodies = calcAllPlanets(jdVal);

    const elemWeights = { "Ateş": 0, "Toprak": 0, "Hava": 0, "Su": 0 };
    const elemNames = ["Ateş", "Toprak", "Hava", "Su"];

    bodies.forEach(b => {
        const sIdx = Math.floor(b.lon / 30) % 12;
        const elem = elemNames[sIdx % 4];
        elemWeights[elem] += b.weight;
    });

    const totalWeight = Object.values(elemWeights).reduce((a, b) => a + b, 0);

    let elemData = Object.keys(elemWeights).map(e => ({
        name: e,
        score: elemWeights[e],
        pct: Math.round((elemWeights[e] / totalWeight) * 100)
    })).sort((a, b) => b.score - a.score);

    const dominantElem = elemData[0];
    const weakestElem = elemData[elemData.length - 1];

    const elementArchetypes = {
        "Ateş": {
            title: "🔥 Ateş Mizacı (Kolorik / Tutkulu)",
            desc: "Cesur, enerjik, coşkulu ve harekete geçmeye hazır bir doğaya sahipsiniz. İlhamınızla etrafınızı aydınlatır, risk almaktan korkmazsınız.",
            advice: "Zaman zaman sabırlı olmayı ve detayları gözden kaçırmamayı öğrenmelisiniz."
        },
        "Toprak": {
            title: "🌱 Toprak Mizacı (Melankolik / Pratik)",
            desc: "Gerçekçi, sağlam, sabırlı ve üretken bir karaktere sahipsiniz. Hayatta elle tutulur, kalıcı ve güvenilir olanı inşa edersiniz.",
            advice: "Aşırı garantici olmaktan kaçınıp değişime ve yeni fikirlere biraz daha esneklik gösterebilirsiniz."
        },
        "Hava": {
            title: "💨 Hava Mizacı (Sangvinik / Sosyal & Entelektüel)",
            desc: "Zeki, meraklı, iletişim odaklı ve tarafsız bir düşünce yapınız var. Bilgiyi işleme, paylaşma ve sosyal ağlar kurmada ustasınız.",
            advice: "Fikirlerin havada kalmaması için onları eyleme ve somut pratik sonuçlara dönüştürmeye odaklanın."
        },
        "Su": {
            title: "🌊 Su Mizacı (Flegmatik / Sezgisel & Empatik)",
            desc: "Derin sezgiler, güçlü empati, duygusal zeka ve manevi kavrayış sizin ana gücünüzdür. İnsanların ruhunu okuyabilirsiniz.",
            advice: "Başkalarının duygusal yüklerini üzerinize almamak için sağlıklı psikolojik sınırlar çizin."
        }
    };

    const heroHtml = `
        <div class="hc-be-hero-card">
            <div class="hc-be-hero-badge">Baskın Mizaç (%${dominantElem.pct})</div>
            <div class="hc-be-hero-title">${elementArchetypes[dominantElem.name].title}</div>
            <p class="hc-be-hero-sub">${elementArchetypes[dominantElem.name].desc}</p>
        </div>
    `;

    const elemColors = { "Ateş": "#ef4444", "Toprak": "#84cc16", "Hava": "#0ea5e9", "Su": "#6366f1" };

    let barsHtml = "";
    elemData.forEach(item => {
        barsHtml += `
            <div class="hc-be-bar-card">
                <div class="hc-be-bar-header">
                    <span class="hc-be-ename">${item.name} Elementi</span>
                    <span class="hc-be-epct">%${item.pct}</span>
                </div>
                <div class="hc-be-bar-track">
                    <div class="hc-be-bar-fill" style="width: ${item.pct}%; background: ${elemColors[item.name]};"></div>
                </div>
            </div>
        `;
    });

    let descHtml = `
        <p><strong>Mizaç Dengesi:</strong> Haritanızda en yoğun çalışan enerji <strong>${dominantElem.name}</strong> elementidir. ${elementArchetypes[dominantElem.name].advice}</p>
        <p><strong>Eksik / Zayıf Element:</strong> Haritanızdaki en düşük element <strong>${weakestElem.name} (%${weakestElem.pct})</strong> olarak görünmektedir. ${weakestElem.name} enerjisini dengelemek için bilinçli olarak bu elementin temsil ettiği aktivitelere (örneğin ${weakestElem.name === 'Su' ? 'sanat, meditasyon, doğa' : weakestElem.name === 'Toprak' ? 'bütçe planlama, spor, düzen' : weakestElem.name === 'Ateş' ? 'spor, cesaret gerektiren hobiler' : 'okuma, sosyalleşme'}) vakit ayırabilirsiniz.</p>
    `;

    document.getElementById('hc-be-hero').innerHTML = heroHtml;
    document.getElementById('hc-be-bars').innerHTML = barsHtml;
    document.getElementById('hc-be-desc').innerHTML = descHtml;

    document.getElementById('hc-be-result').classList.add('visible');
    document.getElementById('hc-be-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
