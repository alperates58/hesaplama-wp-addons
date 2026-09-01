function hcAsSetTab(mode) {
    document.querySelectorAll('.hc-as-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.hc-as-pane').forEach(p => p.classList.remove('active'));

    if (mode === 'auto') {
        document.querySelectorAll('.hc-as-tab')[0].classList.add('active');
        document.getElementById('hc-as-pane-auto').classList.add('active');
    } else {
        document.querySelectorAll('.hc-as-tab')[1].classList.add('active');
        document.getElementById('hc-as-pane-manual').classList.add('active');
    }
}

const dignityRules = {
    gunes: { dom: ["aslan"], exa: ["koc"], det: ["kova"], fal: ["terazi"] },
    ay: { dom: ["yengec"], exa: ["boga"], det: ["oglak"], fal: ["akrep"] },
    merkur: { dom: ["ikizler", "basak"], exa: ["basak"], det: ["yay", "balik"], fal: ["balik"] },
    venus: { dom: ["boga", "terazi"], exa: ["balik"], det: ["koc", "akrep"], fal: ["basak"] },
    mars: { dom: ["koc", "akrep"], exa: ["oglak"], det: ["terazi", "boga"], fal: ["yengec"] },
    jupiter: { dom: ["yay", "balik"], exa: ["yengec"], det: ["ikizler", "basak"], fal: ["oglak"] },
    saturn: { dom: ["oglak", "kova"], exa: ["terazi"], det: ["yengec", "aslan"], fal: ["koc"] },
    uranus: { dom: ["kova"], exa: ["akrep"], det: ["aslan"], fal: ["boga"] },
    neptun: { dom: ["balik"], exa: ["aslan", "yengec"], det: ["basak"], fal: ["oglak"] },
    pluton: { dom: ["akrep"], exa: ["aslan", "koc"], det: ["boga"], fal: ["kova"] }
};

function getDignityStatus(planetKey, signKey) {
    const r = dignityRules[planetKey] || dignityRules.gunes;
    if (r.dom.includes(signKey)) return { status: "Yönetici (Domicile)", score: 5, color: "#10b981", badge: "Kendi Evinde (+5)" };
    if (r.exa.includes(signKey)) return { status: "Yücelim (Exaltation)", score: 4, color: "#0ea5e9", badge: "Yücelimde (+4)" };
    if (r.det.includes(signKey)) return { status: "Zararda (Detriment)", score: -5, color: "#f59e0b", badge: "Zararda (-5)" };
    if (r.fal.includes(signKey)) return { status: "Düşüşte (Fall)", score: -4, color: "#ef4444", badge: "Düşüşte (-4)" };
    return { status: "Peregrin (Nötr)", score: 0, color: "#64748b", badge: "Peregrin (0)" };
}

function hcAsaletOtomatikHesapla() {
    const dStr = document.getElementById('hc-as-date').value;
    const tStr = document.getElementById('hc-as-time').value || '12:00';

    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451545.0;
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
        earth: { N: 0, i: 0, w: 102.9404 + 0.0000470935 * d, a: 1.00000011, e: 0.01671022 - 0.0000000012 * d, M0: 357.5291, M1: 0.98560028 },
        mercury: { key: "merkur", name: "Merkür", icon: "☿️", N: 48.3313, i: 7.0047, w: 77.4564, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { key: "venus", name: "Venüs", icon: "♀️", N: 76.6799, i: 3.3946, w: 131.5721, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { key: "mars", name: "Mars", icon: "♂️", N: 49.5574, i: 1.8497, w: 336.0408, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { key: "jupiter", name: "Jüpiter", icon: "♃", N: 100.4542, i: 1.3030, w: 273.8777, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { key: "saturn", name: "Satürn", icon: "♄", N: 113.6634, i: 2.4886, w: 339.3939, a: 9.55475, e: 0.055546, M0: 316.9670, M1: 0.033444228 },
        uranus: { key: "uranus", name: "Uranüs", icon: "♅", N: 74.0005, i: 0.7733, w: 96.6612, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { key: "neptun", name: "Neptün", icon: "♆", N: 131.7806, i: 1.7700, w: 272.8461, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto: { key: "pluton", name: "Plüton", icon: "♇", N: 110.3034, i: 17.1417, w: 113.7632, a: 39.48168, e: 0.248807, M0: 14.882, M1: 0.00396 }
    };

    const pE = getHeliocentric(planetsData.earth, d);
    const sunLon = norm(Math.atan2(-pE.y, -pE.x) / rad);

    const L = norm(218.316 + 13.176396 * d);
    const Mm = norm(134.963 + 13.064993 * d);
    const moonLon = norm(L + 6.289 * Math.sin(Mm * rad));

    const list = [
        { key: "gunes", name: "Güneş", icon: "☀️", lon: sunLon },
        { key: "ay", name: "Ay", icon: "🌙", lon: moonLon }
    ];

    for (let k in planetsData) {
        if (k === 'earth') continue;
        const pP = getHeliocentric(planetsData[k], d);
        const lonG = norm(Math.atan2(pP.y - pE.y, pP.x - pE.x) / rad);
        list.push({ key: planetsData[k].key, name: planetsData[k].name, icon: planetsData[k].icon, lon: lonG });
    }

    const signKeys = ["koc", "boga", "ikizler", "yengec", "aslan", "basak", "terazi", "akrep", "yay", "oglak", "kova", "balik"];
    const signNames = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];

    let totalScore = 0;
    const evaluated = list.map(item => {
        const sIdx = Math.floor(item.lon / 30);
        const signKey = signKeys[sIdx];
        const signName = signNames[sIdx];
        const degInSign = (item.lon % 30).toFixed(1);
        const dig = getDignityStatus(item.key, signKey);
        totalScore += dig.score;

        return {
            ...item,
            signName: signName,
            deg: degInSign,
            ...dig
        };
    });

    renderAsResults(evaluated, totalScore);
}

function hcAsaletManuelHesapla() {
    const planetKey = document.getElementById('hc-as-planet').value;
    const signKey = document.getElementById('hc-as-sign').value;

    const planetNames = {
        gunes: { name: "Güneş", icon: "☀️" }, ay: { name: "Ay", icon: "🌙" },
        merkur: { name: "Merkür", icon: "☿️" }, venus: { name: "Venüs", icon: "♀️" },
        mars: { name: "Mars", icon: "♂️" }, jupiter: { name: "Jüpiter", icon: "♃" },
        saturn: { name: "Satürn", icon: "♄" }, uranus: { name: "Uranüs", icon: "♅" },
        neptun: { name: "Neptün", icon: "♆" }, pluton: { name: "Plüton", icon: "♇" }
    };

    const signNames = {
        koc: "Koç", boga: "Boğa", ikizler: "İkizler", yengec: "Yengeç", aslan: "Aslan", basak: "Başak",
        terazi: "Terazi", akrep: "Akrep", yay: "Yay", oglak: "Oğlak", kova: "Kova", balik: "Balık"
    };

    const p = planetNames[planetKey] || planetNames.gunes;
    const sName = signNames[signKey] || "Koç";
    const dig = getDignityStatus(planetKey, signKey);

    const singleItem = [{
        name: p.name,
        icon: p.icon,
        signName: sName,
        deg: "15.0",
        ...dig
    }];

    renderAsResults(singleItem, dig.score, `Manuel Asalet Analizi: ${p.icon} ${p.name} ${sName} Burcunda`);
}

function renderAsResults(list, totalScore, customTitle) {
    let heroTitle = customTitle || `Toplam Harita Asalet Skoru: ${totalScore > 0 ? '+' : ''}${totalScore} Puan`;
    let heroBadge = totalScore >= 10 ? "👑 Çok Yüksek Asalet & Şans" : (totalScore >= 0 ? "⚖️ Dengeli & Uyumlu Güç" : "🛡️ Olgunlaştırıcı Karmik Sınavlar");

    let heroHtml = `
        <div class="hc-as-hero-card">
            <div class="hc-as-hero-badge">${heroBadge}</div>
            <div class="hc-as-hero-title">${heroTitle}</div>
            <p class="hc-as-hero-sub">Klasik astrolojide yöneticilik ve yücelim güç kazandırırken, zarar ve düşüş disiplin ve derinleşme gerektirir.</p>
        </div>
    `;

    let listHtml = "";
    list.forEach(item => {
        listHtml += `
            <div class="hc-as-item">
                <div class="hc-as-head">
                    <span class="hc-as-icon">${item.icon}</span>
                    <div class="hc-as-info">
                        <strong>${item.name}</strong> — ${item.signName} (${item.deg}°)
                        <div class="hc-as-status">${item.status}</div>
                    </div>
                    <span class="hc-as-badge" style="background: ${item.color}; color: #fff;">${item.badge}</span>
                </div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Yönetici (Domicile - +5):</strong> Gezegen kendi tahtındadır; enerjisini en saf, engelsiz ve bereketli şekilde hayatınıza aktarır.</p>
        <p><strong>Yücelim (Exaltation - +4):</strong> Gezegen onur konuğu gibidir; yeteneklerini parlatır ve şans getirir.</p>
        <p><strong>Zararda (Detriment - -5):</strong> Gezegen yabancı bir ortamda hisseder; hedeflerine ulaşmak için alternatif ve özgün yollar geliştirmek zorunda kalır.</p>
        <p><strong>Düşüşte (Fall - -4):</strong> Gezegenin enerjisi içe döner; derin bir psikolojik farkındalık ve sabırla şifalandırıldığında büyük bir bilgelik kaynağına dönüşür.</p>
    `;

    document.getElementById('hc-as-hero').innerHTML = heroHtml;
    document.getElementById('hc-as-list').innerHTML = listHtml;
    document.getElementById('hc-as-desc').innerHTML = descHtml;

    document.getElementById('hc-as-result').classList.add('visible');
    document.getElementById('hc-as-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

