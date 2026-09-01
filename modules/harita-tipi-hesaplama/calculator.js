function hcHaritaTipiHesapla() {
    const bStr = document.getElementById('hc-ht-birth').value;
    const tStr = document.getElementById('hc-ht-time').value;

    if (!bStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const timeParts = (tStr || "12:00").split(':').map(Number);
    const hour = timeParts[0] + (timeParts[1] / 60);

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

        return [
            { name: "Güneş", symbol: "☉", lon: sunLon },
            { name: "Ay", symbol: "☽", lon: moonLon },
            { name: "Merkür", symbol: "☿", lon: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368) },
            { name: "Venüs", symbol: "♀", lon: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244) },
            { name: "Mars", symbol: "♂", lon: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766) },
            { name: "Jüpiter", symbol: "♃", lon: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001) },
            { name: "Satürn", symbol: "♄", lon: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282) },
            { name: "Uranüs", symbol: "♅", lon: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806) },
            { name: "Neptün", symbol: "♆", lon: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147) },
            { name: "Plüton", symbol: "♇", lon: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396) }
        ];
    }

    const jdVal = getJD(Y, M, D, hour);
    const planets = calcAllPlanets(jdVal);

    // Sort planet longitudes
    const sortedPlanets = [...planets].sort((a, b) => a.lon - b.lon);

    // Calculate angular gaps between consecutive planets
    let gaps = [];
    for (let i = 0; i < sortedPlanets.length; i++) {
        let nextIdx = (i + 1) % sortedPlanets.length;
        let gapVal = norm(sortedPlanets[nextIdx].lon - sortedPlanets[i].lon);
        gaps.push({
            fromPlanet: sortedPlanets[i],
            toPlanet: sortedPlanets[nextIdx],
            gap: gapVal,
            idx: i
        });
    }

    // Find maximum gap
    gaps.sort((a, b) => b.gap - a.gap);
    const maxGap = gaps[0].gap;
    const secondGap = gaps[1].gap;

    let shapeName = "";
    let shapeDesc = "";
    let shapeStrategy = "";
    let leadingPlanet = null;
    let singletonPlanet = null;

    if (maxGap >= 240) {
        shapeName = "Demet (Bundle) Modeli";
        shapeDesc = "Tüm gezegenler 120°'lik çok dar bir gökyüzü diliminde toplanmıştır.";
        shapeStrategy = "Belirli bir yaşam alanında olağanüstü odaklanma, uzmanlaşma ve derinleşme yeteneği. Başkalarının dikkatini dağıtan şeylere karşı tamamen bağışıksınız; hayatınızı tek bir büyük amaca adayabilirsiniz.";
    } else if (maxGap >= 170 && maxGap < 240) {
        // Check if there is a singleton opposite (Bucket model)
        // Check if removing one planet leaves a gap >= 180 for the remaining 9
        let isBucket = false;
        for (let i = 0; i < sortedPlanets.length; i++) {
            let single = sortedPlanets[i];
            let remaining = sortedPlanets.filter((_, idx) => idx !== i);
            let remGaps = [];
            for (let j = 0; j < remaining.length; j++) {
                let nxt = (j + 1) % remaining.length;
                remGaps.push(norm(remaining[nxt].lon - remaining[j].lon));
            }
            let remMaxGap = Math.max(...remGaps);
            if (remMaxGap >= 170) {
                isBucket = true;
                singletonPlanet = single;
                break;
            }
        }

        if (isBucket && singletonPlanet) {
            shapeName = "Kova (Bucket / Sepet) Modeli";
            shapeDesc = `9 gezegen bir yarımkürede toplanmışken, <strong>${singletonPlanet.symbol} ${singletonPlanet.name}</strong> gezegeni tam karşıda tek başına 'Kova Sapı' (Handle) olarak durmaktadır.`;
            shapeStrategy = `Tüm yaşam enerjinizi, hırslarınızı ve başarı gücünüzü karşıdaki tekil gezegeniniz (${singletonPlanet.name}) üzerinden dış dünyaya aktarırsınız. Bu gezegen sizin hayatınızın en büyük yönlendirici dinamosudur.`;
        } else {
            shapeName = "Çanak (Bowl) Modeli";
            shapeDesc = `Gezegenler haritanın 180°'lik bir yarımküresinde toplanmış, diğer yarısı (${maxGap.toFixed(1)}°) tamamen boştur.`;
            shapeStrategy = "Hayatta 'eksik olanı tamamlama' ve kendine yetme arzusu çok güçlüdür. Boş kalan alandaki temaları partneriniz, projeleriniz ve içsel arayışlarınızla doldurmaya çalışırsınız.";
        }
    } else if (maxGap >= 110 && maxGap < 170) {
        shapeName = "Lokomotif (Locomotive) Modeli";
        // Leading planet is the planet immediately clockwise from the empty 120° space
        leadingPlanet = gaps[0].toPlanet;
        shapeDesc = `Gezegenler ~240°'lik alana yayılmış, geride ~120°'lik (${maxGap.toFixed(1)}°) bir boşluk bırakmıştır. Lokomotif Öncü Gezegeniniz: <strong>${leadingPlanet.symbol} ${leadingPlanet.name}</strong>.`;
        shapeStrategy = `Muazzam bir itici güç, azim ve eylem enerjisine sahipsiniz. Önünüzdeki boşluğu kapatmak için durmaksızın üretir ve hedeflerinize doğru Lokomotifin lokomotifi olan ${leadingPlanet.name} prensibiyle liderlik edersiniz.`;
    } else if (maxGap >= 60 && secondGap >= 60) {
        shapeName = "Tahterevalli / Salıncak (Seesaw) Modeli";
        shapeDesc = "Gezegenler iki karşıt küme halinde toplanmış ve arada belirgin iki boşluk bırakmıştır.";
        shapeStrategy = "Hayatı sürekli karşıtlıklar, dengeler ve zıt kutuplar üzerinden deneyimleme eğilimi. İki farklı konu veya hayat tarzı arasında mükemmel bir köprü ve uzlaşma ustasısınız.";
    } else if (maxGap < 90) {
        shapeName = "Dağılım / Sıçrama (Splash) Modeli";
        shapeDesc = "10 gezegen tüm zodyak dairesine neredeyse eşit aralıklarla serpiştirilmiştir.";
        shapeStrategy = "Evrensel merak, çok yönlülük ve her alanda bilgi sahibi olma yeteneği. Hayatın hiçbir renginden geri kalmak istemezsiniz; zengin bir genel kültür ve geniş sosyal çevreye sahipsiniz.";
    } else {
        shapeName = "Yelpaze (Splay) Modeli";
        shapeDesc = "Gezegenler en az 3 farklı küme ve tripod benzeri güçlü odaklar halinde yerleşmiştir.";
        shapeStrategy = "Kalıplara sığmayan, özgün ve bağımsız bir yaşam tarzı. Hayatınızda birden fazla güçlü ilgi alanı ve kariyer odağını aynı anda başarıyla yönetebilirsiniz.";
    }

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    const heroHtml = `
        <div class="hc-ht-hero-card">
            <div class="hc-ht-hero-badge">Marc Edmund Jones Geometrisi</div>
            <div class="hc-ht-hero-title">${shapeName}</div>
            <p class="hc-ht-hero-sub">${shapeDesc}</p>
        </div>
    `;

    let tableHtml = `
        <table class="hc-ht-table">
            <thead>
                <tr>
                    <th>Gezegen</th>
                    <th>Burç</th>
                    <th>Derece & Dakika</th>
                    <th>Ecliptic Boylam (0-360°)</th>
                </tr>
            </thead>
            <tbody>
    `;

    planets.forEach(p => {
        const sIdx = Math.floor(p.lon / 30) % 12;
        const deg = Math.floor(p.lon % 30);
        const min = Math.floor((p.lon % 1) * 60);

        tableHtml += `
            <tr>
                <td><strong>${p.symbol} ${p.name}</strong></td>
                <td>${symbols[sIdx]} ${burclar[sIdx]}</td>
                <td>${deg}° ${min}'</td>
                <td style="color:#64748b; font-family:monospace;">${p.lon.toFixed(2)}°</td>
            </tr>
        `;
    });
    tableHtml += `</tbody></table>`;

    const descHtml = `
        <div class="hc-ht-strat-box">
            <h4>⚡ Hayat Stratejiniz ve Potansiyeliniz</h4>
            <p>${shapeStrategy}</p>
            <p><strong>Boşluk & Odak Analizi:</strong> Haritanızdaki en büyük boş açı <strong>${maxGap.toFixed(1)}°</strong> genişliğindedir. Astrolojide bu boşluk bir eksiklik değil, yaşamınızda en çok deneyim kazanacağınız ve merak duyacağınız ruhsal dinlenme alanıdır.</p>
        </div>
    `;

    document.getElementById('hc-ht-hero').innerHTML = heroHtml;
    document.getElementById('hc-ht-planets-table').innerHTML = tableHtml;
    document.getElementById('hc-ht-desc').innerHTML = descHtml;

    document.getElementById('hc-ht-result').classList.add('visible');
    document.getElementById('hc-ht-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

