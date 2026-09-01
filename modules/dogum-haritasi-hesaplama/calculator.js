function hcDogumHaritasiHesapla() {
    const dStr = document.getElementById('hc-chart-date').value;
    const tStr = document.getElementById('hc-chart-time').value;
    const citySelect = document.getElementById('hc-chart-city');

    if (!dStr || !tStr) {
        alert('Lütfen doğum tarihi ve saatini eksiksiz girin.');
        return;
    }

    const loc = (citySelect.value || "41.0052,28.9769").split(',').map(Number);
    const lat = loc[0];
    const lon = loc[1];

    const parts = dStr.split('-').map(Number);
    const timeParts = tStr.split(':').map(Number);
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

        // Earth Helio
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

        // Chiron
        const chiLon = solvePlanet(60.0, 1.0e-5, 6.93, 1.0e-8, 339.6, 1.0e-5, 13.7, 0.38, 0, 100.0, 0.0195);

        // Ascendant & MC
        const GMST0 = norm(280.46061837 + 360.98564736629 * (jdVal - 2451545.0));
        const RAMC = norm(GMST0 + lon);
        const eps = 23.4392911 - 0.0130042 * TVal;
        const num = Math.cos(RAMC * rad);
        const den = -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(lat * rad) * Math.sin(eps * rad);
        let ascLon = norm(Math.atan2(num, den) / rad);

        // MC
        let mcLon = norm(Math.atan2(Math.sin(RAMC * rad), Math.cos(RAMC * rad) * Math.cos(eps * rad)) / rad);

        return { sunLon, moonLon, merLon, venLon, marsLon, jupLon, satLon, uraLon, nepLon, pluLon, chiLon, nodeLon, ascLon, mcLon };
    }

    const pos1 = calcEphemeris(JD);
    const pos2 = calcEphemeris(JD + 1);

    function checkRetro(k) {
        let delta = pos2[k] - pos1[k];
        if (delta < -180) delta += 360;
        if (delta > 180) delta -= 360;
        return delta < 0;
    }

    const ascSignIdx = Math.floor(pos1.ascLon / 30) % 12;

    // Part of Fortune = ASC + Moon - Sun (Day) or ASC + Sun - Moon (Night)
    const isDay = norm(pos1.sunLon - pos1.ascLon) < 180;
    let fortuneLon = isDay 
        ? norm(pos1.ascLon + pos1.moonLon - pos1.sunLon)
        : norm(pos1.ascLon + pos1.sunLon - pos1.moonLon);

    const bodies = [
        { key: 'ascLon', name: 'Yükselen (ASC)', symbol: 'ASC', isPlanet: false },
        { key: 'sunLon', name: 'Güneş', symbol: '☉', isPlanet: true },
        { key: 'moonLon', name: 'Ay', symbol: '☽', isPlanet: true },
        { key: 'mcLon', name: 'Tepe Noktası (MC)', symbol: 'MC', isPlanet: false },
        { key: 'merLon', name: 'Merkür', symbol: '☿', isPlanet: true },
        { key: 'venLon', name: 'Venüs', symbol: '♀', isPlanet: true },
        { key: 'marsLon', name: 'Mars', symbol: '♂', isPlanet: true },
        { key: 'jupLon', name: 'Jüpiter', symbol: '♃', isPlanet: true },
        { key: 'satLon', name: 'Satürn', symbol: '♄', isPlanet: true },
        { key: 'uraLon', name: 'Uranüs', symbol: '♅', isPlanet: true },
        { key: 'nepLon', name: 'Neptün', symbol: '♆', isPlanet: true },
        { key: 'pluLon', name: 'Plüton', symbol: '♇', isPlanet: true },
        { key: 'chiLon', name: 'Chiron', symbol: '⚷', isPlanet: true },
        { key: 'nodeLon', name: 'Kuzey Ay Düğümü', symbol: '☊', isPlanet: false }
    ];

    let elementCounts = { "Ateş": 0, "Toprak": 0, "Hava": 0, "Su": 0 };
    let modalityCounts = { "Öncü": 0, "Sabit": 0, "Değişken": 0 };

    let pTableHtml = `
        <table class="hc-natal-table">
            <thead>
                <tr>
                    <th>Gök Cismi</th>
                    <th>Burç</th>
                    <th>Derece</th>
                    <th>Ev</th>
                    <th>Hareket</th>
                </tr>
            </thead>
            <tbody>
    `;

    bodies.forEach(b => {
        const lonVal = pos1[b.key];
        const sIdx = Math.floor(lonVal / 30) % 12;
        const signObj = burclar[sIdx];
        const deg = Math.floor(lonVal % 30);
        const min = Math.floor((lonVal % 1) * 60);
        const houseNum = ((sIdx - ascSignIdx + 12) % 12) + 1;

        const isRet = b.isPlanet && checkRetro(b.key);
        const retroBadge = isRet ? `<span class="hc-chart-retro">℞ Retro</span>` : `<span class="hc-chart-direct">Direkt</span>`;

        elementCounts[signObj.element]++;
        modalityCounts[signObj.modality]++;

        pTableHtml += `
            <tr>
                <td><strong>${b.symbol} ${b.name}</strong></td>
                <td>${signObj.symbol} ${signObj.name}</td>
                <td>${deg}° ${min}'</td>
                <td><strong>${houseNum}. Ev</strong></td>
                <td>${retroBadge}</td>
            </tr>
        `;
    });

    pTableHtml += `</tbody></table>`;

    // 12 Houses
    const houseThemes = [
        "1. Ev: Benlik, Beden, Dış Görünüm & Başlangıçlar",
        "2. Ev: Maddi Kaynaklar, Öz Değer & Gelir Kapıları",
        "3. Ev: İletişim, Kardeşler, Zihin & Yakın Çevre",
        "4. Ev: Yuva, Aile, Kökler, Anne/Baba & İç Huzur",
        "5. Ev: Aşk, Yaratıcılık, Hobiler & Çocuklar",
        "6. Ev: Günlük Yaşam, Çalışma Ortamı & Sağlık",
        "7. Ev: Evlilik, İkili Ortaklıklar & Açık Düşmanlar",
        "8. Ev: Ortak Maddiyat, Dönüşüm, Krizler & Okültizm",
        "9. Ev: Yüksek Eğitim, Felsefe, Uzak Seyahatler & İnanç",
        "10. Ev: Kariyer, Toplumsal Statü, Şöhret & Amaç",
        "11. Ev: Sosyal Çevre, Kolektif Gruplar, Hayaller & Vizyon",
        "12. Ev: Bilinçaltı, Gizli Sırlar, Karmik Arınma & İnziva"
    ];

    let housesHtml = "";
    for (let h = 0; h < 12; h++) {
        const signIdx = (ascSignIdx + h) % 12;
        const signObj = burclar[signIdx];
        housesHtml += `
            <div class="hc-house-card">
                <div class="hc-house-num">${h + 1}. EV</div>
                <div class="hc-house-sign">${signObj.symbol} ${signObj.name}</div>
                <div class="hc-house-ruler">Yönetici: ${signObj.ruler}</div>
                <div class="hc-house-desc">${houseThemes[h]}</div>
            </div>
        `;
    }

    // Aspects
    const aspectTypes = [
        { name: "Kavuşum (Conjunction)", angle: 0, orb: 7, symbol: "☌", nature: "Güçlü Bütünleşme / Çekirdek Enerji" },
        { name: "Sekstil (Sextile)", angle: 60, orb: 5, symbol: "⚹", nature: "Fırsat & Akıcı Uyum" },
        { name: "Kare (Square)", angle: 90, orb: 6, symbol: "□", nature: "Dinamik Gerilim & Eyleme Zorlayan Güç" },
        { name: "Üçgen (Trine)", angle: 120, orb: 6, symbol: "△", nature: "Doğal Yetenek & Şanslı Akış" },
        { name: "Karşıt (Opposition)", angle: 180, orb: 6, symbol: "☍", nature: "Farkındalık & Denge Arayışı" }
    ];

    const majorBodies = bodies.slice(0, 12);
    let aspectsFound = [];

    for (let i = 0; i < majorBodies.length; i++) {
        for (let j = i + 1; j < majorBodies.length; j++) {
            const b1 = majorBodies[i];
            const b2 = majorBodies[j];
            const lon1 = pos1[b1.key];
            const lon2 = pos1[b2.key];

            let diff = Math.abs(lon1 - lon2);
            if (diff > 180) diff = 360 - diff;

            aspectTypes.forEach(asp => {
                const orbDiff = Math.abs(diff - asp.angle);
                if (orbDiff <= asp.orb) {
                    aspectsFound.push({
                        b1: `${b1.symbol} ${b1.name}`,
                        b2: `${b2.symbol} ${b2.name}`,
                        aspect: asp.name,
                        symbol: asp.symbol,
                        orb: orbDiff.toFixed(1),
                        nature: asp.nature
                    });
                }
            });
        }
    }

    let aspectsHtml = "";
    if (aspectsFound.length === 0) {
        aspectsHtml = `<p>Majör açı tespit edilmedi.</p>`;
    } else {
        aspectsFound.forEach(a => {
            aspectsHtml += `
                <div class="hc-aspect-item">
                    <span class="hc-aspect-badge">${a.symbol} ${a.aspect}</span>
                    <span class="hc-aspect-pair">${a.b1} ⟷ ${a.b2}</span>
                    <span class="hc-aspect-orb">(Orb: ${a.orb}°)</span>
                    <span class="hc-aspect-note">${a.nature}</span>
                </div>
            `;
        });
    }

    // Big Three Hero Card
    const sunSign = burclar[Math.floor(pos1.sunLon / 30) % 12];
    const moonSign = burclar[Math.floor(pos1.moonLon / 30) % 12];
    const ascSign = burclar[ascSignIdx];

    const heroHtml = `
        <div class="hc-big-three-grid">
            <div class="hc-big-three-card hc-sun-card">
                <div class="hc-bt-role">☉ Güneş Burcu (Kimliğiniz)</div>
                <div class="hc-bt-sign">${sunSign.symbol} ${sunSign.name}</div>
                <div class="hc-bt-deg">${Math.floor(pos1.sunLon % 30)}° ${Math.floor((pos1.sunLon % 1) * 60)}'</div>
            </div>
            <div class="hc-big-three-card hc-moon-card">
                <div class="hc-bt-role">☽ Ay Burcu (Duygularınız)</div>
                <div class="hc-bt-sign">${moonSign.symbol} ${moonSign.name}</div>
                <div class="hc-bt-deg">${Math.floor(pos1.moonLon % 30)}° ${Math.floor((pos1.moonLon % 1) * 60)}'</div>
            </div>
            <div class="hc-big-three-card hc-asc-card">
                <div class="hc-bt-role">ASC Yükselen (Dış Dünyanız)</div>
                <div class="hc-bt-sign">${ascSign.symbol} ${ascSign.name}</div>
                <div class="hc-bt-deg">${Math.floor(pos1.ascLon % 30)}° ${Math.floor((pos1.ascLon % 1) * 60)}'</div>
            </div>
        </div>

        <div class="hc-balance-bar-row">
            <div class="hc-balance-group">
                <div class="hc-balance-title">Element Dağılımı:</div>
                <div class="hc-balance-chips">
                    <span class="hc-chip hc-f">🔥 Ateş: ${elementCounts['Ateş']}</span>
                    <span class="hc-chip hc-e">🌍 Toprak: ${elementCounts['Toprak']}</span>
                    <span class="hc-chip hc-a">💨 Hava: ${elementCounts['Hava']}</span>
                    <span class="hc-chip hc-w">💧 Su: ${elementCounts['Su']}</span>
                </div>
            </div>
            <div class="hc-balance-group">
                <div class="hc-balance-title">Nitelik Dağılımı:</div>
                <div class="hc-balance-chips">
                    <span class="hc-chip">⚡ Öncü: ${modalityCounts['Öncü']}</span>
                    <span class="hc-chip">💎 Sabit: ${modalityCounts['Sabit']}</span>
                    <span class="hc-chip">🌊 Değişken: ${modalityCounts['Değişken']}</span>
                </div>
            </div>
        </div>
    `;

    const summaryHtml = `
        <h4>🌟 Doğum Haritası Genel Sentezi</h4>
        <p>Doğum haritanız, <strong>${ascSign.name}</strong> yükselen ile dünyaya adım attığınızı, hayat amacınızı <strong>${sunSign.name}</strong> burcunun ışıltısıyla gerçekleştireceğinizi ve duygusal güvenliği <strong>${moonSign.name}</strong> burcunun derinliklerinde bulduğunuzu gösterir.</p>
        <p>Güneşiniz haritanızın <strong>${((Math.floor(pos1.sunLon / 30) - ascSignIdx + 12) % 12) + 1}. evinde</strong> parlamakta, bu alanda büyük bir yaşam tutkusu ve farkındalık yaratmaktadır. 12 evin yönetici gezegenleri ve majör açılar hayatınızdaki kilit yeteneklerinizi ve sınavlarınızı şekillendirir.</p>
    `;

    document.getElementById('hc-chart-hero').innerHTML = heroHtml;
    document.getElementById('hc-planets-table').innerHTML = pTableHtml;
    document.getElementById('hc-houses-grid').innerHTML = housesHtml;
    document.getElementById('hc-aspects-list').innerHTML = aspectsHtml;
    document.getElementById('hc-chart-summary').innerHTML = summaryHtml;

    document.getElementById('hc-chart-result').classList.add('visible');
    document.getElementById('hc-chart-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

