function hcGezegenselSkorHesapla() {
    const d1Str = document.getElementById('hc-bg-d1').value;
    const t1Str = document.getElementById('hc-bg-t1').value;
    const c1Val = document.getElementById('hc-bg-c1').value;

    const d2Str = document.getElementById('hc-bg-d2').value;
    const t2Str = document.getElementById('hc-bg-t2').value;
    const c2Val = document.getElementById('hc-bg-c2').value;

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

    function calcPerson(dStr, tStr, cVal) {
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

        // Sun
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
            asc: ascLon,
            venus: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244),
            mars: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766),
            mercury: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368)
        };
    }

    const p1 = calcPerson(d1Str, t1Str, c1Val);
    const p2 = calcPerson(d2Str, t2Str, c2Val);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const burcIcons = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    function getSignObj(lon) {
        const idx = Math.floor(lon / 30) % 12;
        return {
            idx: idx,
            name: burclar[idx],
            icon: burcIcons[idx],
            element: elements[idx]
        };
    }

    function calcPairScore(lon1, lon2) {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;

        if (diff < 7) return 96; // Kavuşum
        if (Math.abs(diff - 120) < 7) return 95; // Üçgen
        if (Math.abs(diff - 60) < 5) return 88; // Sekstil
        if (Math.abs(diff - 180) < 7) return 75; // Karşıt
        if (Math.abs(diff - 90) < 6) return 55; // Kare

        const s1 = getSignObj(lon1);
        const s2 = getSignObj(lon2);
        if (s1.element === s2.element) return 90;
        if ((s1.element === 'Ateş' && s2.element === 'Hava') || (s1.element === 'Hava' && s2.element === 'Ateş')) return 88;
        if ((s1.element === 'Toprak' && s2.element === 'Su') || (s1.element === 'Su' && s2.element === 'Toprak')) return 88;
        return 65;
    }

    const sunScore = calcPairScore(p1.sun, p2.sun);
    const moonScore = calcPairScore(p1.moon, p2.moon);
    const ascScore = calcPairScore(p1.asc, p2.asc);
    const loveScore = Math.round((calcPairScore(p1.venus, p2.mars) + calcPairScore(p2.venus, p1.mars)) / 2);
    const talkScore = calcPairScore(p1.mercury, p2.mercury);

    const totalScore = Math.round(sunScore * 0.25 + moonScore * 0.25 + loveScore * 0.25 + ascScore * 0.15 + talkScore * 0.10);

    const s1Sun = getSignObj(p1.sun), s1Moon = getSignObj(p1.moon), s1Asc = getSignObj(p1.asc);
    const s2Sun = getSignObj(p2.sun), s2Moon = getSignObj(p2.moon), s2Asc = getSignObj(p2.asc);

    const heroHtml = `
        <div class="hc-bg-hero-card">
            <div class="hc-bg-hero-badge">Büyük Gezegensel Uyum</div>
            <div class="hc-bg-hero-title">%${totalScore} Genel Uyum Skoru</div>
            <p class="hc-bg-hero-sub">${totalScore >= 85 ? '🌟 Kusursuz Kozmik Rezonans! Güneş, Ay, Yükselen ve Aşk yerleşimleriniz birbirini muazzam biçimde besliyor.' : totalScore >= 70 ? '✨ Güçlü ve Dengeli Birliktelik! Karşılıklı empati ve zengin etkileşimler hakim.' : '⚖️ Öğretici ve Geliştirici Bağ! Farklılıklarınızı zenginliğe dönüştürebilirsiniz.'}</p>
        </div>
    `;

    const planetsHtml = `
        <div class="hc-bg-planet-col">
            <h5>👤 1. Kişi Yerleşimleri</h5>
            <div class="hc-bg-item"><span>☉ Güneş:</span> <strong>${s1Sun.icon} ${s1Sun.name}</strong></div>
            <div class="hc-bg-item"><span>☽ Ay:</span> <strong>${s1Moon.icon} ${s1Moon.name}</strong></div>
            <div class="hc-bg-item"><span>ASC Yükselen:</span> <strong>${s1Asc.icon} ${s1Asc.name}</strong></div>
            <div class="hc-bg-item"><span>♀ Venüs:</span> <strong>${getSignObj(p1.venus).icon} ${getSignObj(p1.venus).name}</strong></div>
            <div class="hc-bg-item"><span>♂ Mars:</span> <strong>${getSignObj(p1.mars).icon} ${getSignObj(p1.mars).name}</strong></div>
        </div>
        <div class="hc-bg-planet-col">
            <h5>❤️ 2. Kişi Yerleşimleri</h5>
            <div class="hc-bg-item"><span>☉ Güneş:</span> <strong>${s2Sun.icon} ${s2Sun.name}</strong></div>
            <div class="hc-bg-item"><span>☽ Ay:</span> <strong>${s2Moon.icon} ${s2Moon.name}</strong></div>
            <div class="hc-bg-item"><span>ASC Yükselen:</span> <strong>${s2Asc.icon} ${s2Asc.name}</strong></div>
            <div class="hc-bg-item"><span>♀ Venüs:</span> <strong>${getSignObj(p2.venus).icon} ${getSignObj(p2.venus).name}</strong></div>
            <div class="hc-bg-item"><span>♂ Mars:</span> <strong>${getSignObj(p2.mars).icon} ${getSignObj(p2.mars).name}</strong></div>
        </div>
    `;

    const layersHtml = `
        <div class="hc-bg-layer-row">
            <div class="hc-bg-layer-head"><span>☀️ Öz Karakter & Hedef Uyumu (Güneş - Güneş)</span><span>%${sunScore}</span></div>
            <div class="hc-bg-layer-bar"><div class="hc-bg-layer-fill" style="width: ${sunScore}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-bg-layer-row">
            <div class="hc-bg-layer-head"><span>🌙 Duygusal Güvenlik & Yuva (Ay - Ay)</span><span>%${moonScore}</span></div>
            <div class="hc-bg-layer-bar"><div class="hc-bg-layer-fill" style="width: ${moonScore}%; background: #3b82f6;"></div></div>
        </div>
        <div class="hc-bg-layer-row">
            <div class="hc-bg-layer-head"><span>🔥 Aşk, Romantizm & Tutku (Venüs - Mars)</span><span>%${loveScore}</span></div>
            <div class="hc-bg-layer-bar"><div class="hc-bg-layer-fill" style="width: ${loveScore}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-bg-layer-row">
            <div class="hc-bg-layer-head"><span>🌅 Dış Dünya & Sosyal Kimlik (Yükselen - Yükselen)</span><span>%${ascScore}</span></div>
            <div class="hc-bg-layer-bar"><div class="hc-bg-layer-fill" style="width: ${ascScore}%; background: #8b5cf6;"></div></div>
        </div>
        <div class="hc-bg-layer-row">
            <div class="hc-bg-layer-head"><span>🗣️ Zihinsel İletişim & Sohbet (Merkür - Merkür)</span><span>%${talkScore}</span></div>
            <div class="hc-bg-layer-bar"><div class="hc-bg-layer-fill" style="width: ${talkScore}%; background: #10b981;"></div></div>
        </div>
    `;

    const descHtml = `
        <p><strong>Güneş Uyumu (%${sunScore}):</strong> Yaşam amaçlarınız ve temel ego kimlikleriniz arasındaki uyum seviyesidir. Birbirinizin hedeflerini ne kadar desteklediğinizi gösterir.</p>
        <p><strong>Ay Uyumu (%${moonScore}):</strong> Duygusal tepkileriniz, alışkanlıklarınız ve aynı çatı altında yaşama konforunuzun göstergesidir.</p>
        <p><strong>Aşk & Tutku Uyumu (%${loveScore}):</strong> Venüs ve Mars'ın karşılıklı dansı, romantik çekimi ve ilişkinin heyecanını sürekli kılar.</p>
    `;

    document.getElementById('hc-bg-hero').innerHTML = heroHtml;
    document.getElementById('hc-bg-planets-comp').innerHTML = planetsHtml;
    document.getElementById('hc-bg-layers').innerHTML = layersHtml;
    document.getElementById('hc-gs-desc').innerHTML = descHtml;

    document.getElementById('hc-gs-result').classList.add('visible');
    document.getElementById('hc-gs-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

