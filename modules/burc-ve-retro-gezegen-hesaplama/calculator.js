function hcRxSetTab(mode) {
    document.querySelectorAll('.hc-rx-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.hc-rx-pane').forEach(p => p.classList.remove('active'));

    if (mode === 'auto') {
        document.querySelectorAll('.hc-rx-tab')[0].classList.add('active');
        document.getElementById('hc-rx-pane-auto').classList.add('active');
    } else {
        document.querySelectorAll('.hc-rx-tab')[1].classList.add('active');
        document.getElementById('hc-rx-pane-manual').classList.add('active');
    }
}

const retroMeanings = {
    merkur: "Zihinsel derinlik, içe dönük düşünme ve geçmiş yaşam tecrübelerini sezgisel olarak hatırlama. Başkalarının göremediği detayları fark edersiniz.",
    venus: "Sevgi ve ilişkilerde derinlik arayışı. Yüzeysel flörtler yerine ruhsal bağlar kurma arzusu. Sanat ve estetikte özgün bir tarz.",
    mars: "İçselleştirilmiş güç ve irade. Öfkeyi doğrudan dışa vurmak yerine stratejik bir sabırla biriktirme ve zamanı geldiğinde patlatma.",
    jupiter: "Doğuştan gelen içsel ahlak ve felsefe anlayışı. Dış otoritelerden ziyade kendi içsel vicdan pusulasına güvenme.",
    saturn: "Karmik sorumluluk bilinci. Erken yaşlarda hissedilen ağırlık, olgunlukla birlikte sarsılmaz bir bilgeliğe ve ustalığa dönüşür.",
    uranus: "Gizli dahi potansiyeli. Toplumsal normları içeriden sorgulayan radikal bir özgürlük ve yenilikçilik arzusu.",
    neptun: "Mistik ve psişik duyarlılık. Rüyalar, semboller ve sanatsal ilham kanallarının son derece aktif olması.",
    pluton: "Derin psikolojik dönüşüm gücü. Krizleri sessizce içselleştirip küllerinden daha güçlü doğma yeteneği."
};

function hcRetroOtomatikHesapla() {
    const dStr = document.getElementById('hc-rx-date').value;
    const tStr = document.getElementById('hc-rx-time').value || '12:00';

    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    function getHeliocentric(p, d) {
        if (!p.a) return { x: 0, y: 0, z: 0 };
        let { N, i, w, a, e, M0, M1 } = p;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for (let j = 0; j < 3; j++) E = E - (E - (180 / Math.PI) * e * Math.sin(E * rad) - M) / (1 - e * Math.cos(E * rad));
        let xv = a * (Math.cos(E * rad) - e);
        let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + w);
        let x = r * (Math.cos(N * rad) * Math.cos(lonecl * rad) - Math.sin(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let y = r * (Math.sin(N * rad) * Math.cos(lonecl * rad) + Math.cos(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(i * rad);
        return { x, y, z };
    }

    const planetsData = {
        earth: { N: 0, i: 0, w: 102.9404, a: 1.00000011, e: 0.01671022, M0: 357.5291, M1: 0.98560028 },
        mercury: { key: "merkur", name: "Merkür", icon: "☿️", threshold: 0.05, N: 48.3313, i: 7.0047, w: 77.4564, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { key: "venus", name: "Venüs", icon: "♀️", threshold: 0.04, N: 76.6799, i: 3.3946, w: 131.5721, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { key: "mars", name: "Mars", icon: "♂️", threshold: 0.03, N: 49.5574, i: 1.8497, w: 336.0408, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { key: "jupiter", name: "Jüpiter", icon: "♃", threshold: 0.015, N: 100.4542, i: 1.3030, w: 273.8777, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { key: "saturn", name: "Satürn", icon: "♄", threshold: 0.01, N: 113.6634, i: 2.4886, w: 339.3939, a: 9.55475, e: 0.055546, M0: 316.9670, M1: 0.033444228 },
        uranus: { key: "uranus", name: "Uranüs", icon: "♅", threshold: 0.008, N: 74.0005, i: 0.7733, w: 96.6612, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { key: "neptun", name: "Neptün", icon: "♆", threshold: 0.005, N: 131.7806, i: 1.7700, w: 272.8461, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto: { key: "pluton", name: "Plüton", icon: "♇", threshold: 0.004, N: 110.3034, i: 17.1417, w: 113.7632, a: 39.48168, e: 0.248807, M0: 14.882, M1: 0.00396 }
    };

    function getGeocentricLon(key, dVal) {
        const pE = getHeliocentric(planetsData.earth, dVal);
        const pP = getHeliocentric(planetsData[key], dVal);
        return norm(Math.atan2(pP.y - pE.y, pP.x - pE.x) / rad);
    }

    const dCenter = jd - 2451545.0;
    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];

    const results = [];
    let retroCount = 0;

    for (let k in planetsData) {
        if (k === 'earth') continue;
        const p = planetsData[k];
        const lonCenter = getGeocentricLon(k, dCenter);
        const lonPrev = getGeocentricLon(k, dCenter - 0.5);
        const lonNext = getGeocentricLon(k, dCenter + 0.5);

        let speed = lonNext - lonPrev;
        if (speed > 180) speed -= 360;
        if (speed < -180) speed += 360;

        const isRetro = speed < -p.threshold;
        if (isRetro) retroCount++;

        const sIdx = Math.floor(lonCenter / 30);
        const degInSign = (lonCenter % 30).toFixed(1);

        results.push({
            key: p.key,
            name: p.name,
            icon: p.icon,
            sign: signs[sIdx],
            deg: degInSign,
            speed: speed.toFixed(3),
            isRetro: isRetro,
            meaning: retroMeanings[p.key] || ""
        });
    }

    renderRxResults(results, retroCount);
}

function hcRetroManuelHesapla() {
    const planetKey = document.getElementById('hc-rx-planet').value;
    const signKey = document.getElementById('hc-rx-sign').value;

    const planetNames = {
        merkur: { name: "Merkür", icon: "☿️" }, venus: { name: "Venüs", icon: "♀️" },
        mars: { name: "Mars", icon: "♂️" }, jupiter: { name: "Jüpiter", icon: "♃" },
        saturn: { name: "Satürn", icon: "♄" }, uranus: { name: "Uranüs", icon: "♅" },
        neptun: { name: "Neptün", icon: "♆" }, pluton: { name: "Plüton", icon: "♇" }
    };

    const signNames = {
        koc: "Koç", boga: "Boğa", ikizler: "İkizler", yengec: "Yengeç", aslan: "Aslan", basak: "Başak",
        terazi: "Terazi", akrep: "Akrep", yay: "Yay", oglak: "Oğlak", kova: "Kova", balik: "Balık"
    };

    const p = planetNames[planetKey] || planetNames.merkur;
    const sName = signNames[signKey] || "Koç";

    const singleItem = [{
        key: planetKey,
        name: p.name,
        icon: p.icon,
        sign: sName,
        deg: "15.0",
        speed: "-0.050",
        isRetro: true,
        meaning: retroMeanings[planetKey] || ""
    }];

    renderRxResults(singleItem, 1, `Manuel Retro İncelemesi: ${p.icon} ${p.name} (Rx) ${sName} Burcunda`);
}

function renderRxResults(results, retroCount, customTitle) {
    let heroTitle = customTitle || (retroCount > 0 ? `Doğumunuzda ${retroCount} Adet Retrograde (Rx) Gezegen Var` : "Doğumunuzda Retro Gezegen Yok (Tüm Gezegenler Direkt)");
    let heroBadge = retroCount > 0 ? "℞ Karmik Derinleşme" : "➡️ Doğrudan Eylem Enerjisi";

    let heroHtml = `
        <div class="hc-rx-hero-card">
            <div class="hc-rx-hero-badge">${heroBadge}</div>
            <div class="hc-rx-hero-title">${heroTitle}</div>
            <p class="hc-rx-hero-sub">Retro gezegenler enerjiyi dışa vurmak yerine içselleştirerek eşsiz bir sezgi ve bilgelik inşa eder.</p>
        </div>
    `;

    let listHtml = "";
    let descHtml = "";

    results.forEach(r => {
        listHtml += `
            <div class="hc-rx-item ${r.isRetro ? 'hc-rx-highlight' : ''}">
                <div class="hc-rx-head">
                    <span class="hc-rx-icon">${r.icon}</span>
                    <div class="hc-rx-info">
                        <strong>${r.name}</strong> — ${r.sign} (${r.deg}°)
                        <div class="hc-rx-speed">Hız: ${r.speed}°/gün (${r.isRetro ? 'Geri Hareket' : 'İleri Hareket'})</div>
                    </div>
                    <span class="hc-rx-badge" style="background: ${r.isRetro ? '#e11d48' : '#10b981'}; color: #fff;">${r.isRetro ? 'Retro (Rx)' : 'Direkt'}</span>
                </div>
            </div>
        `;

        if (r.isRetro) {
            descHtml += `
                <div class="hc-rx-desc-box">
                    <h5>℞ ${r.name} Retrograde (Rx) Anlamı</h5>
                    <p>${r.meaning}</p>
                </div>
            `;
        }
    });

    if (!descHtml) {
        descHtml = `<p>Doğum haritanızda geri giden gezegen bulunmaması, enerjilerinizi dış dünyaya çok rahat ve doğrudan aktarabildiğinizi gösterir. Kararlarınızı hızlı alır ve eyleme geçmekte tereddüt etmezsiniz.</p>`;
    }

    document.getElementById('hc-rx-hero').innerHTML = heroHtml;
    document.getElementById('hc-rx-list').innerHTML = listHtml;
    document.getElementById('hc-rx-desc').innerHTML = descHtml;

    document.getElementById('hc-rx-result').classList.add('visible');
    document.getElementById('hc-rx-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
