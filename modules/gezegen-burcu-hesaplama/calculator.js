function hcGezegenBurcuHesapla() {
    const birthDate = document.getElementById('hc-ps-birth').value;
    const birthTime = document.getElementById('hc-ps-time').value;
    const cityVal = document.getElementById('hc-ps-city').value;

    if (!birthDate) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const coords = (cityVal || "41.0082,28.9784").split(',').map(Number);
    const lat = coords[0];
    const lon = coords[1];

    const parts = birthDate.split('-').map(Number);
    const timeParts = (birthTime || '12:00').split(':').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = timeParts[0] + (timeParts[1] || 0) / 60;

    let tzOffset = 3;
    if (Y < 2016 || (Y === 2016 && M < 9)) {
        if (M > 3 && M < 10) tzOffset = 3;
        else if (M === 3 && D >= 25) tzOffset = 3;
        else if (M === 10 && D < 25) tzOffset = 3;
        else tzOffset = 2;
    }

    let ut = hour - tzOffset;
    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (ut / 24);

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    const burclar = [
        { name: "Koç", element: "Ateş", modality: "Öncü", symbol: "♈", ruler: "Mars" },
        { name: "Boğa", element: "Toprak", modality: "Sabit", symbol: "♉", ruler: "Venüs" },
        { name: "İkizler", element: "Hava", modality: "Değişken", symbol: "♊", ruler: "Merkür" },
        { name: "Yengeç", element: "Su", modality: "Öncü", symbol: "♋", ruler: "Ay" },
        { name: "Aslan", element: "Ateş", modality: "Sabit", symbol: "♌", ruler: "Güneş" },
        { name: "Başak", element: "Toprak", modality: "Değişken", symbol: "♍", ruler: "Merkür" },
        { name: "Terazi", element: "Hava", modality: "Öncü", symbol: "♎", ruler: "Venüs" },
        { name: "Akrep", element: "Su", modality: "Sabit", symbol: "♏", ruler: "Mars / Plüton" },
        { name: "Yay", element: "Ateş", modality: "Değişken", symbol: "♐", ruler: "Jüpiter" },
        { name: "Oğlak", element: "Toprak", modality: "Öncü", symbol: "♑", ruler: "Satürn" },
        { name: "Kova", element: "Hava", modality: "Sabit", symbol: "♒", ruler: "Satürn / Uranüs" },
        { name: "Balık", element: "Su", modality: "Değişken", symbol: "♓", ruler: "Jüpiter / Neptün" }
    ];

    function calcEphemeris(jdVal) {
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
        const F_m = norm(93.2720950 + 483202.0175233 * TVal);
        const moonLon = norm(L_m + 6.288774 * Math.sin(M_m * rad) + 1.274027 * Math.sin((2 * D_m - M_m) * rad) + 0.658314 * Math.sin(2 * D_m * rad) + 0.213618 * Math.sin(2 * M_m * rad) - 0.185116 * Math.sin(M_e * rad) - 0.114332 * Math.sin(2 * F_m * rad));

        // Node
        let nodeLon = norm(125.04452 - 1934.136261 * TVal + 0.0020708 * TVal * TVal);

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

        const merLon = solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368);
        const venLon = solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244);
        const marsLon = solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766);
        const jupLon = solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001);
        const satLon = solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282);
        const uraLon = solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806);
        const nepLon = solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147);
        const pluLon = solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396);

        // Ascendant
        const GMST0 = norm(280.46061837 + 360.98564736629 * (jdVal - 2451545.0));
        const RAMC = norm(GMST0 + lon);
        const eps = 23.4392911 - 0.0130042 * TVal;
        const num = Math.cos(RAMC * rad);
        const den = -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad);
        let ascLon = norm(Math.atan2(num, den) / rad);

        return { sunLon, moonLon, merLon, venLon, marsLon, jupLon, satLon, uraLon, nepLon, pluLon, nodeLon, ascLon };
    }

    const pos1 = calcEphemeris(JD);
    const pos2 = calcEphemeris(JD + 1);

    function checkRetro(k) {
        let delta = pos2[k] - pos1[k];
        if (delta < -180) delta += 360;
        if (delta > 180) delta -= 360;
        return delta < 0;
    }

    const planetList = [
        { key: "sunLon", name: "Güneş", symbol: "☉", desc: "Öz Benlik, Yaşam Amacı ve Bilinç", isPlanet: true },
        { key: "moonLon", name: "Ay", symbol: "☽", desc: "Duygusal Dünya, İçgüdüler ve Bilinçaltı", isPlanet: true },
        { key: "ascLon", name: "Yükselen (ASC)", symbol: "ASC", desc: "Dış Maske, Yaşam Tarzı ve İlk İzlenim", isPlanet: false },
        { key: "merLon", name: "Merkür", symbol: "☿", desc: "Zihin, İletişim ve Mantık", isPlanet: true },
        { key: "venLon", name: "Venüs", symbol: "♀", desc: "Aşk, Sevgi Dili, Estetik ve Değerler", isPlanet: true },
        { key: "marsLon", name: "Mars", symbol: "♂", desc: "Eylem Gücü, Tutku ve Mücadele", isPlanet: true },
        { key: "jupLon", name: "Jüpiter", symbol: "♃", desc: "Şans, Bolluk ve Ruhsal Bilgelik", isPlanet: true },
        { key: "satLon", name: "Satürn", symbol: "♄", desc: "Karmik Dersler, Disiplin ve Olgunlaşma", isPlanet: true },
        { key: "uraLon", name: "Uranüs", symbol: "♅", desc: "Devrim, Deha ve Özgürleşme", isPlanet: true },
        { key: "nepLon", name: "Neptün", symbol: "♆", desc: "İlham, Sezgi ve Mistik Hayal Gücü", isPlanet: true },
        { key: "pluLon", name: "Plüton", symbol: "♇", desc: "Güç, Dönüşüm ve Ruhsal Simya", isPlanet: true },
        { key: "nodeLon", name: "Kuzey Ay Düğümü", symbol: "☊", desc: "Kadersel Yaşam Amacı ve Tekamül", isPlanet: false }
    ];

    let elementCount = { "Ateş": 0, "Toprak": 0, "Hava": 0, "Su": 0 };
    let modalityCount = { "Öncü": 0, "Sabit": 0, "Değişken": 0 };

    let gridHtml = "";

    planetList.forEach(p => {
        const lonVal = pos1[p.key];
        const signIdx = Math.floor(lonVal / 30) % 12;
        const signObj = burclar[signIdx];
        const deg = Math.floor(lonVal % 30);
        const min = Math.floor((lonVal % 1) * 60);

        const isRet = p.isPlanet && checkRetro(p.key);
        const retroBadge = isRet ? `<span class="hc-ps-retro">℞ Retro</span>` : "";

        elementCount[signObj.element]++;
        modalityCount[signObj.modality]++;

        gridHtml += `
            <div class="hc-ps-item-card">
                <div class="hc-ps-item-header">
                    <div class="hc-ps-planet-title">
                        <span class="hc-ps-symbol">${p.symbol}</span>
                        <span class="hc-ps-name">${p.name}</span>
                    </div>
                    ${retroBadge}
                </div>
                <div class="hc-ps-sign-name">${signObj.symbol} ${signObj.name} Burcunda</div>
                <div class="hc-ps-deg">${deg}° ${min}' (${signObj.element} • ${signObj.modality})</div>
                <div class="hc-ps-desc">${p.desc}</div>
            </div>
        `;
    });

    const balanceHtml = `
        <div class="hc-ps-balance-header">
            <h4>🌌 Doğum Haritası Element ve Nitelik Dağılımı</h4>
        </div>
        <div class="hc-ps-stat-row">
            <div class="hc-ps-stat-col">
                <div class="hc-ps-stat-title">Element Dengesi</div>
                <div class="hc-ps-pills">
                    <span class="hc-pill hc-fire">🔥 Ateş: ${elementCount['Ateş']}</span>
                    <span class="hc-pill hc-earth">🌍 Toprak: ${elementCount['Toprak']}</span>
                    <span class="hc-pill hc-air">💨 Hava: ${elementCount['Hava']}</span>
                    <span class="hc-pill hc-water">💧 Su: ${elementCount['Su']}</span>
                </div>
            </div>
            <div class="hc-ps-stat-col">
                <div class="hc-ps-stat-title">Nitelik Dengesi</div>
                <div class="hc-ps-pills">
                    <span class="hc-pill hc-cardinal">⚡ Öncü: ${modalityCount['Öncü']}</span>
                    <span class="hc-pill hc-fixed">💎 Sabit: ${modalityCount['Sabit']}</span>
                    <span class="hc-pill hc-mutable">🌊 Değişken: ${modalityCount['Değişken']}</span>
                </div>
            </div>
        </div>
    `;

    document.getElementById('hc-ps-balance-card').innerHTML = balanceHtml;
    document.getElementById('hc-ps-grid').innerHTML = gridHtml;
    document.getElementById('hc-planet-signs-result').classList.add('visible');
    document.getElementById('hc-planet-signs-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

