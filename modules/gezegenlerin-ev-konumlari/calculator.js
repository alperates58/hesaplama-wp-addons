function hcPlanetEvlerHesapla() {
    const dStr = document.getElementById('hc-pe-date').value;
    const tStr = document.getElementById('hc-pe-time').value;
    const loc = document.getElementById('hc-pe-city').value.split(',').map(Number);

    if (!dStr || !tStr) { alert('Lütfen tarih ve saat girin.'); return; }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451545.0;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    // Yükselen (ASC)
    const timeParts = tStr.split(':').map(Number);
    const utHours = timeParts[0] + timeParts[1] / 60 - 3; // TR UTC+3
    let GMST0 = norm(100.4606184 + 0.9856473662862 * d);
    let GMST = norm(GMST0 + utHours * 15);
    let RAMC = norm(GMST + loc[1]);
    let eps = 23.4392911 - 0.0000004 * d;
    let ascRad = Math.atan2(Math.cos(RAMC * rad), -Math.sin(RAMC * rad) * Math.cos(eps * rad) - Math.tan(loc[0] * rad) * Math.sin(eps * rad));
    let ascLong = norm(ascRad / rad);
    let ascSignIdx = Math.floor(ascLong / 30);

    function getHeliocentric(p, d) {
        let M = norm(p.M0 + p.M1 * d);
        let E = M + (180 / Math.PI) * p.e * Math.sin(M * rad) * (1 + p.e * Math.cos(M * rad));
        for (let j = 0; j < 3; j++) E = E - (E - (180 / Math.PI) * p.e * Math.sin(E * rad) - M) / (1 - p.e * Math.cos(E * rad));
        let xv = p.a * (Math.cos(E * rad) - p.e);
        let yv = p.a * (Math.sqrt(1 - p.e * p.e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + p.w);
        let x = r * (Math.cos(p.N * rad) * Math.cos(lonecl * rad) - Math.sin(p.N * rad) * Math.sin(lonecl * rad) * Math.cos(p.i * rad));
        let y = r * (Math.sin(p.N * rad) * Math.cos(lonecl * rad) + Math.cos(p.N * rad) * Math.sin(lonecl * rad) * Math.cos(p.i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(p.i * rad);
        return { x, y, z };
    }

    const planetsData = {
        earth: { N: 0, i: 0, w: 102.9404 + 0.0000470935 * d, a: 1.00000011, e: 0.01671022 - 0.0000000012 * d, M0: 357.5291, M1: 0.98560028 },
        mercury: { N: 48.3313 + 0.0000324587 * d, i: 7.0047, w: 77.4564 + 0.0000155447 * d, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { N: 76.6799 + 0.000024659 * d, i: 3.3946, w: 131.5721 + 0.000004085 * d, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { N: 49.5574 + 0.000021108 * d, i: 1.8497, w: 336.0408 + 0.00001228 * d, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { N: 100.4542 + 0.0000276854 * d, i: 1.3030, w: 273.8777 + 0.0000164505 * d, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { N: 113.6634 + 0.000023981 * d, i: 2.4886, w: 339.3939 + 0.0000297661 * d, a: 9.55475, e: 0.055546, M0: 316.9670, M1: 0.0334442 },
        uranus: { N: 74.0005, i: 0.7733, w: 96.6612, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { N: 131.7806, i: 1.7700, w: 272.8461, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto: { N: 110.3034, i: 17.1417, w: 113.7634, a: 39.48168, e: 0.248807, M0: 14.5353, M1: 0.0039757 }
    };

    const pE = getHeliocentric(planetsData.earth, d);
    const sunLon = norm(Math.atan2(-pE.y, -pE.x) / rad);

    // Ay
    const Lm = norm(218.316 + 13.176396 * d);
    const Mm = norm(134.963 + 13.064993 * d);
    const moonLon = norm(Lm + 6.289 * Math.sin(Mm * rad));

    const planets = [
        { name: "Güneş", icon: "☀️", lon: sunLon, theme: "Öz kimlik, yaşam enerjisi ve ego parıltısı" },
        { name: "Ay", icon: "🌙", lon: moonLon, theme: "Bilinçaltı, duygusal güvenlik ve anne bağı" },
        { name: "Merkür", icon: "☿️", lon: norm(Math.atan2(getHeliocentric(planetsData.mercury, d).y - pE.y, getHeliocentric(planetsData.mercury, d).x - pE.x) / rad), theme: "Zihinsel süreçler, iletişim ve öğrenme" },
        { name: "Venüs", icon: "♀️", lon: norm(Math.atan2(getHeliocentric(planetsData.venus, d).y - pE.y, getHeliocentric(planetsData.venus, d).x - pE.x) / rad), theme: "Aşk, estetik, değerler ve çekim gücü" },
        { name: "Mars", icon: "♂️", lon: norm(Math.atan2(getHeliocentric(planetsData.mars, d).y - pE.y, getHeliocentric(planetsData.mars, d).x - pE.x) / rad), theme: "Eylem, tutku, cesaret ve mücadele azmi" },
        { name: "Jüpiter", icon: "♃", lon: norm(Math.atan2(getHeliocentric(planetsData.jupiter, d).y - pE.y, getHeliocentric(planetsData.jupiter, d).x - pE.x) / rad), theme: "Büyük şans, bolluk, inanç ve genişleme" },
        { name: "Satürn", icon: "♄", lon: norm(Math.atan2(getHeliocentric(planetsData.saturn, d).y - pE.y, getHeliocentric(planetsData.saturn, d).x - pE.x) / rad), theme: "Disiplin, sorumluluk, karmik sınavlar ve ustalık" },
        { name: "Uranüs", icon: "♅", lon: norm(Math.atan2(getHeliocentric(planetsData.uranus, d).y - pE.y, getHeliocentric(planetsData.uranus, d).x - pE.x) / rad), theme: "Aydınlanma, özgürlük ve ani değişimler" },
        { name: "Neptün", icon: "♆", lon: norm(Math.atan2(getHeliocentric(planetsData.neptune, d).y - pE.y, getHeliocentric(planetsData.neptune, d).x - pE.x) / rad), theme: "Ruhsal şifa, sezgiler, ilham ve hayaller" },
        { name: "Plüton", icon: "♇", lon: norm(Math.atan2(getHeliocentric(planetsData.pluto, d).y - pE.y, getHeliocentric(planetsData.pluto, d).x - pE.x) / rad), theme: "Küllerinden doğma, derin güç ve dönüşüm" }
    ];

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const ascSignName = signs[ascSignIdx];

    const evAnlamlari = [
        "1. Ev (Kişilik, Benlik & Dış Görünüş)",
        "2. Ev (Maddi Kaynaklar, Para & Öz Değer)",
        "3. Ev (Zihin, İletişim & Yakın Çevre)",
        "4. Ev (Yuva, Aile & Kökler)",
        "5. Ev (Aşk, Yaratıcılık, Çocuklar & Eğlence)",
        "6. Ev (Günlük Düzen, İş & Sağlık)",
        "7. Ev (Evlilik, Ortaklıklar & İkili İlişkiler)",
        "8. Ev (Dönüşüm, Ortak Paralar & Miras)",
        "9. Ev (Yüksek Eğitim, Yurt Dışı & Felsefe)",
        "10. Ev (Kariyer, Başarı & Toplumsal Statü)",
        "11. Ev (Sosyal Gruplar, Arkadaşlar & Gelecek Hayalleri)",
        "12. Ev (Bilinçaltı, Gizli Güçler & Maneviyat)"
    ];

    const heroHtml = `
        <div class="hc-pe-hero-card">
            <div class="hc-pe-hero-badge">🏛️ Yükselen Burcunuz: ${ascSignName} (${(ascLong % 30).toFixed(1)}°)</div>
            <div class="hc-pe-hero-title">10 Gezegenin Ev Dağılım Haritası</div>
            <p class="hc-pe-hero-sub">Gezegenlerinizin Whole Sign & Eşit Ev yerleşimleri başarı ve dönüşüm alanlarınızı aydınlatır.</p>
        </div>
    `;

    let html = "";
    planets.forEach(p => {
        const pSignIdx = Math.floor(p.lon / 30);
        const pSignName = signs[pSignIdx];
        const pDeg = (p.lon % 30).toFixed(1);
        const houseNum = ((pSignIdx - ascSignIdx + 12) % 12) + 1;
        const houseTheme = evAnlamlari[houseNum - 1];

        html += `
            <div class="hc-pe-item-card">
                <div class="hc-pe-head">
                    <span class="hc-pe-icon">${p.icon}</span>
                    <div class="hc-pe-title">
                        <strong>${p.name}</strong>
                        <span class="hc-pe-sign">${pSignName} (${pDeg}°)</span>
                    </div>
                    <div class="hc-pe-house-badge">${houseNum}. EV</div>
                </div>
                <div class="hc-pe-body">
                    <div class="hc-pe-house-title">${houseTheme}</div>
                    <p class="hc-pe-desc-text"><strong>${p.name} ${houseNum}. Evde:</strong> ${p.theme} enerjiniz bu yaşam alanında en yüksek potansiyeline ulaşır.</p>
                </div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Ev Yerleşimleri Neyi İfade Eder?</strong> Gezegenler aktörler (KİM?), burçlar kostümler (NASIL?), astrolojik evler ise sahnedir (NEREDE?). Örneğin Venüs'ün 10. evde olması, kariyer sahnesinde çekicilik ve sanatla parlayacağınızı gösterir.</p>
    `;

    document.getElementById('hc-pe-hero').innerHTML = heroHtml;
    document.getElementById('hc-pe-list').innerHTML = html;
    document.getElementById('hc-pe-desc').innerHTML = descHtml;

    document.getElementById('hc-pe-result').classList.add('visible');
    document.getElementById('hc-pe-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

