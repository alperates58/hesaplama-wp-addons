function hcProgresHaritaHesapla() {
    const bStr = document.getElementById('hc-prog-birth').value;
    const tYear = parseInt(document.getElementById('hc-prog-year').value);

    if (!bStr || !tYear) {
        alert('Lütfen doğum tarihini ve hedef yılı girin.');
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

    function calcPlanets(jdVal) {
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
            sat: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282)
        };
    }

    const jdNatal = getJD(bY, bM, bD, 12);
    // Secondary progression: 1 day = 1 year (age days added to birth JD)
    const jdProg = jdNatal + age;

    const natal = calcPlanets(jdNatal);
    const prog = calcPlanets(jdProg);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    // Progressed Lunar Phase
    let phaseAngle = norm(prog.moon - prog.sun);
    let progPhaseName = "";
    let progPhaseDesc = "";

    if (phaseAngle < 45) {
        progPhaseName = "🌑 Progres Yeniay Fazı (0° - 45°)";
        progPhaseDesc = "Hayatınızda yepyeni bir 30 yıllık tohum ekme döngüsü başladı. Geçmişi geride bırakıp yeni hedeflere cesaretle başlama zamanı.";
    } else if (phaseAngle < 90) {
        progPhaseName = "🌒 Progres Hilal Fazı (45° - 90°)";
        progPhaseDesc = "Ekilen tohumlar filizlenmeye başladı. Yeni projeleri ve yaşam yönünü inşa etmek için çaba harcama dönemi.";
    } else if (phaseAngle < 135) {
        progPhaseName = "🌓 Progres İlk Dördün Fazı (90° - 135°)";
        progPhaseDesc = "Eyleme geçme ve engelleri aşma dönemi. Hayatınızda yönünüzü netleştiren önemli kararlar alıyorsunuz.";
    } else if (phaseAngle < 180) {
        progPhaseName = "🌔 Progres Büyüyen Ay Fazı (135° - 180°)";
        progPhaseDesc = "Büyük hedeflere doğru ustalaşma ve ayrıntıları mükemmelleştirme süreci. Başarıya çok yakınsınız.";
    } else if (phaseAngle < 225) {
        progPhaseName = "🌕 Progres Dolunay Fazı (180° - 225°)";
        progPhaseDesc = "30 yıllık döngünün zirvesi, hasat ve tam aydınlanma dönemi. Emeklerinizin karşılığını topluyorsunuz.";
    } else if (phaseAngle < 270) {
        progPhaseName = "🌖 Progres Küçülen Ay / Yayılma Fazı (225° - 270°)";
        progPhaseDesc = "Bilgeliği ve kazanımları başkalarıyla paylaşma, topluma rehberlik etme dönemi.";
    } else if (phaseAngle < 315) {
        progPhaseName = "🌗 Progres Son Dördün Fazı (270° - 315°)";
        progPhaseDesc = "İçsel muhasebe, gereksiz yükleri bırakma ve ruhsal arınma dönemi.";
    } else {
        progPhaseName = "🌘 Progres Balzamik / Karanlık Ay Fazı (315° - 360°)";
        progPhaseDesc = "Eski 30 yıllık döngünün kapanışı, dinlenme, kabulleniş ve yeni bir döneme ruhsal hazırlık süreci.";
    }

    const progMoonSignIdx = Math.floor(prog.moon / 30) % 12;
    const natalMoonSignIdx = Math.floor(natal.moon / 30) % 12;
    const progSunSignIdx = Math.floor(prog.sun / 30) % 12;
    const natalSunSignIdx = Math.floor(natal.sun / 30) % 12;

    const heroHtml = `
        <div class="hc-prog-hero-card">
            <div class="hc-prog-hero-badge">${tYear} Yılı (${age} Yaş İlerletimi)</div>
            <div class="hc-prog-hero-title">İkincil İlerletim Özeti</div>
            <div class="hc-prog-hero-grid">
                <div class="hc-prog-mini-card">
                    <span class="hc-prog-mini-label">☉ Progres Güneş</span>
                    <span class="hc-prog-mini-val">${symbols[progSunSignIdx]} ${burclar[progSunSignIdx]} (${Math.floor(prog.sun % 30)}°)</span>
                    ${progSunSignIdx !== natalSunSignIdx ? '<span class="hc-prog-ing">✨ Burç Değiştirdi!</span>' : ''}
                </div>
                <div class="hc-prog-mini-card">
                    <span class="hc-prog-mini-label">☽ Progres Ay (2.5 Yıllık Tema)</span>
                    <span class="hc-prog-mini-val">${symbols[progMoonSignIdx]} ${burclar[progMoonSignIdx]} (${Math.floor(prog.moon % 30)}°)</span>
                    ${progMoonSignIdx !== natalMoonSignIdx ? '<span class="hc-prog-ing">🌙 Yeni Duygusal Dönem</span>' : ''}
                </div>
            </div>
        </div>
    `;

    const moonBoxHtml = `
        <div class="hc-prog-phase-title">${progPhaseName}</div>
        <div class="hc-prog-phase-desc">${progPhaseDesc}</div>
        <p class="hc-prog-moon-note"><strong>Progres Ay ${burclar[progMoonSignIdx]} Burcunda:</strong> Ruhunuz şu anda ${burclar[progMoonSignIdx]} burcunun temalarına (duygusal odak, yeni ilgi alanları ve ruhsal ihtiyaçlar) odaklanmış durumdadır. Bu enerji yaklaşık 2.5 yıl boyunca etkilidir.</p>
    `;

    const planetDefs = [
        { key: "sun", name: "Güneş", symbol: "☉" },
        { key: "moon", name: "Ay", symbol: "☽" },
        { key: "mer", name: "Merkür", symbol: "☿" },
        { key: "ven", name: "Venüs", symbol: "♀" },
        { key: "mar", name: "Mars", symbol: "♂" },
        { key: "jup", name: "Jüpiter", symbol: "♃" },
        { key: "sat", name: "Satürn", symbol: "♄" }
    ];

    let tableHtml = `
        <table class="hc-prog-table">
            <thead>
                <tr>
                    <th>Gezegen</th>
                    <th>Natal (Doğum) Konumu</th>
                    <th>Progres (${tYear}) Konumu</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
    `;

    planetDefs.forEach(p => {
        const nLon = natal[p.key];
        const pLon = prog[p.key];

        const nSIdx = Math.floor(nLon / 30) % 12;
        const pSIdx = Math.floor(pLon / 30) % 12;

        const isIngress = nSIdx !== pSIdx;
        const statusText = isIngress 
            ? `<span class="hc-prog-ing-badge">Burç Geçişi Yapıldı</span>` 
            : `<span class="hc-prog-same">Aynı Burçta İlerliyor</span>`;

        tableHtml += `
            <tr class="${isIngress ? 'hc-tr-highlight' : ''}">
                <td><strong>${p.symbol} ${p.name}</strong></td>
                <td>${symbols[nSIdx]} ${burclar[nSIdx]} (${Math.floor(nLon % 30)}° ${Math.floor((nLon % 1) * 60)}')</td>
                <td><strong style="color:#4f46e5;">${symbols[pSIdx]} ${burclar[pSIdx]} (${Math.floor(pLon % 30)}° ${Math.floor((pLon % 1) * 60)}')</strong></td>
                <td>${statusText}</td>
            </tr>
        `;
    });
    tableHtml += `</tbody></table>`;

    document.getElementById('hc-prog-hero').innerHTML = heroHtml;
    document.getElementById('hc-prog-moon-box').innerHTML = moonBoxHtml;
    document.getElementById('hc-prog-table-container').innerHTML = tableHtml;

    document.getElementById('hc-progres-harita-result').classList.add('visible');
    document.getElementById('hc-progres-harita-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

