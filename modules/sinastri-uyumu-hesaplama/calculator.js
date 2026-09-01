/**
 * Sinastri Uyumu Hesaplama
 */

const HC_Astro_Core = {
    getJulianDate: function(date) {
        return (date.getTime() / 86400000) - (date.getTimezoneOffset() / 1440) + 2440587.5;
    },

    rev: function(x) { return x - Math.floor(x / 360.0) * 360.0; },

    getPlanets: function(date) {
        const d = this.getJulianDate(date) - 2451545.0;
        
        const planets = {};

        // Sun
        let sun_L = this.rev(280.466 + 0.98564736 * d);
        let sun_g = this.rev(357.528 + 0.9856003 * d);
        planets.Sun = this.rev(sun_L + 1.915 * Math.sin(sun_g * Math.PI / 180));

        // Moon
        let moon_L = this.rev(218.316 + 13.176396 * d);
        let moon_M = this.rev(134.963 + 13.064993 * d);
        planets.Moon = this.rev(moon_L + 6.289 * Math.sin(moon_M * Math.PI / 180));

        // Mercury (Mean)
        planets.Mercury = this.rev(252.25 + 4.09233 * d);
        
        // Venus (Mean)
        planets.Venus = this.rev(181.98 + 1.60213 * d);

        // Mars (Mean)
        planets.Mars = this.rev(355.45 + 0.52402 * d);

        // Jupiter (Mean)
        planets.Jupiter = this.rev(34.35 + 0.08308 * d);

        // Saturn (Mean)
        planets.Saturn = this.rev(50.07 + 0.03344 * d);

        return planets;
    },

    getAspect: function(lon1, lon2) {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;

        if (diff < 8) return { name: "Kavuşum", score: 10, type: "harmony" };
        if (Math.abs(diff - 60) < 6) return { name: "Sekstil", score: 8, type: "harmony" };
        if (Math.abs(diff - 90) < 8) return { name: "Kare", score: -5, type: "tension" };
        if (Math.abs(diff - 120) < 8) return { name: "Üçgen", score: 10, type: "harmony" };
        if (Math.abs(diff - 180) < 8) return { name: "Karşıt", score: -2, type: "tension" };
        
        return null;
    }
};

function hcSinastriUyumuHesapla() {
    const d1Str = document.getElementById('hc-s1-birthdate').value;
    const t1Str = document.getElementById('hc-s1-time').value;
    const c1Val = document.getElementById('hc-s1-city').value;

    const d2Str = document.getElementById('hc-s2-birthdate').value;
    const t2Str = document.getElementById('hc-s2-time').value;
    const c2Val = document.getElementById('hc-s2-city').value;

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
            Sun: sunLon,
            Moon: moonLon,
            Mercury: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368),
            Venus: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244),
            Mars: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766),
            Jupiter: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001),
            Saturn: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282),
            Uranus: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806),
            Neptune: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147),
            Pluto: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396),
            ASC: ascLon
        };
    }

    const p1 = calcChart(d1Str, t1Str, c1Val);
    const p2 = calcChart(d2Str, t2Str, c2Val);

    const planetLabels = {
        Sun: "Güneş", Moon: "Ay", Mercury: "Merkür", Venus: "Venüs",
        Mars: "Mars", Jupiter: "Jüpiter", Saturn: "Satürn",
        Uranus: "Uranüs", Neptune: "Neptün", Pluto: "Plüton", ASC: "Yükselen"
    };

    function checkAspect(lon1, lon2) {
        let diff = Math.abs(lon1 - lon2);
        if (diff > 180) diff = 360 - diff;

        if (diff < 7) return { name: "Kavuşum (0°)", score: 95, type: "harmony", text: "Kuvvetli manyetik çekim ve birlik" };
        if (Math.abs(diff - 60) < 5) return { name: "Sekstil (60°)", score: 85, type: "harmony", text: "Fırsat ve tatlı uyum" };
        if (Math.abs(diff - 90) < 6) return { name: "Kare (90°)", score: 40, type: "tension", text: "Geliştirici dinamik gerilim" };
        if (Math.abs(diff - 120) < 7) return { name: "Üçgen (120°)", score: 95, type: "harmony", text: "Kusursuz akış ve doğal anlayış" };
        if (Math.abs(diff - 180) < 7) return { name: "Karşıt (180°)", score: 60, type: "polar", text: "Kutup çekimi ve denge arayışı" };
        return null;
    }

    const testPairs = [
        { p1: 'Sun', p2: 'Moon', pillar: 'duygu', label: "Ruhsal & Karakter Tamamlayıcılığı" },
        { p1: 'Moon', p2: 'Sun', pillar: 'duygu', label: "Duygusal Karşılık" },
        { p1: 'Moon', p2: 'Moon', pillar: 'duygu', label: "Duygusal Rezonans" },
        { p1: 'Venus', p2: 'Mars', pillar: 'tutku', label: "Aşk & Cinsel Tutku" },
        { p1: 'Mars', p2: 'Venus', pillar: 'tutku', label: "Manyetik Çekim" },
        { p1: 'Venus', p2: 'Pluto', pillar: 'tutku', label: "Derin Tutkusal Bağ" },
        { p1: 'Mercury', p2: 'Mercury', pillar: 'zihin', label: "Zihinsel Frekans Uyumu" },
        { p1: 'Mercury', p2: 'Sun', pillar: 'zihin', label: "Fikir Paylaşımı" },
        { p1: 'Sun', p2: 'Saturn', pillar: 'omur', label: "Kalıcılık & Sorumluluk" },
        { p1: 'Sun', p2: 'Jupiter', pillar: 'omur', label: "Bolluk & Neşe" },
        { p1: 'Venus', p2: 'Saturn', pillar: 'omur', label: "Sadakat & Güven" }
    ];

    let pillarScores = { duygu: [], tutku: [], zihin: [], omur: [] };
    let aspectsHtml = "";

    testPairs.forEach(item => {
        const asp = checkAspect(p1[item.p1], p2[item.p2]);
        if (asp) {
            pillarScores[item.pillar].push(asp.score);
            aspectsHtml += `
                <div class="hc-su-aspect-card ${asp.type}">
                    <div class="hc-su-asp-title">
                        <strong>1. Kişi ${planetLabels[item.p1]} — 2. Kişi ${planetLabels[item.p2]}</strong>
                        <span class="hc-su-asp-badge">${asp.name}</span>
                    </div>
                    <p class="hc-su-asp-desc">${item.label}: ${asp.text}</p>
                </div>
            `;
        } else {
            pillarScores[item.pillar].push(60); // Neutral baseline
        }
    });

    const avg = arr => Math.round(arr.reduce((a, b) => a + b, 0) / arr.length);

    const sDuygu = avg(pillarScores.duygu);
    const sTutku = avg(pillarScores.tutku);
    const sZihin = avg(pillarScores.zihin);
    const sOmur = avg(pillarScores.omur);

    const finalScore = Math.round(sDuygu * 0.35 + sTutku * 0.25 + sZihin * 0.20 + sOmur * 0.20);

    const heroHtml = `
        <div class="hc-su-hero-card">
            <div class="hc-su-hero-badge">Sinastri Uyumu</div>
            <div class="hc-su-hero-title">%${finalScore} İlişki Potansiyeli</div>
            <p class="hc-su-hero-sub">${finalScore >= 80 ? '🌟 Yüksek Kozmik Çekim! Ruh eşi rezonansı taşıyan son derece uyumlu bir ilişki.' : finalScore >= 65 ? '✨ Güçlü ve Dengeli Dinamik! Ortak hedeflerde birleşen sağlam bir bağ.' : finalScore >= 50 ? '⚖️ Dengeli ve Öğretici İlişki! Farklılıkları avantaja çevirebilirsiniz.' : '⚡ Yüksek Dönüştürücü Çekim! Sabır ve açık iletişim gerektiren dinamik yapı.'}</p>
        </div>
    `;

    const pillarsHtml = `
        <div class="hc-su-pillar-card">
            <div class="hc-su-phead"><span>💖 Duygusal Uyum</span><span>%${sDuygu}</span></div>
            <div class="hc-su-pbar"><div class="hc-su-pfill" style="width: ${sDuygu}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-su-pillar-card">
            <div class="hc-su-phead"><span>🔥 Tutku & Çekim</span><span>%${sTutku}</span></div>
            <div class="hc-su-pbar"><div class="hc-su-pfill" style="width: ${sTutku}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-su-pillar-card">
            <div class="hc-su-phead"><span>🗣️ İletişim & Zihin</span><span>%${sZihin}</span></div>
            <div class="hc-su-pbar"><div class="hc-su-pfill" style="width: ${sZihin}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-su-pillar-card">
            <div class="hc-su-phead"><span>🏰 Kalıcılık & Güven</span><span>%${sOmur}</span></div>
            <div class="hc-su-pbar"><div class="hc-su-pfill" style="width: ${sOmur}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-su-hero').innerHTML = heroHtml;
    document.getElementById('hc-su-pillars').innerHTML = pillarsHtml;
    document.getElementById('hc-sinastri-aspects').innerHTML = aspectsHtml || "<p>Majör dar açılar tespit edilmedi; genel enerjiler dengeli.</p>";

    document.getElementById('hc-sinastri-uyumu-result').classList.add('visible');
    document.getElementById('hc-sinastri-uyumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

