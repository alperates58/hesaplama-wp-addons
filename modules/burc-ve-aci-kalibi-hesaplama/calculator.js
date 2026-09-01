function hcAkSetTab(mode) {
    document.querySelectorAll('.hc-ak-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.hc-ak-pane').forEach(p => p.classList.remove('active'));

    if (mode === 'auto') {
        document.querySelectorAll('.hc-ak-tab')[0].classList.add('active');
        document.getElementById('hc-ak-pane-auto').classList.add('active');
    } else {
        document.querySelectorAll('.hc-ak-tab')[1].classList.add('active');
        document.getElementById('hc-ak-pane-manual').classList.add('active');
    }
}

function hcAciKalipOtomatikHesapla() {
    const dStr = document.getElementById('hc-ak-date').value;
    const tStr = document.getElementById('hc-ak-time').value || '12:00';

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
        mercury: { N: 48.3313 + 0.0000324587 * d, i: 7.0047 + 0.00000005 * d, w: 77.4564 + 0.0000155447 * d, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { N: 76.6799 + 0.000024659 * d, i: 3.3946 + 0.0000000275 * d, w: 131.5721 + 0.000004085 * d, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { N: 49.5574 + 0.000021108 * d, i: 1.8497 - 0.0000000178 * d, w: 336.0408 + 0.00001228 * d, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { N: 100.4542 + 0.0000276854 * d, i: 1.3030 - 0.0000000155 * d, w: 273.8777 + 0.0000164505 * d, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { N: 113.6634 + 0.000023981 * d, i: 2.4886 - 0.0000001081 * d, w: 339.3939 + 0.0000297661 * d, a: 9.55475, e: 0.055546 - 0.00000000949 * d, M0: 316.9670, M1: 0.033444228 },
        uranus: { N: 74.0005, i: 0.7733, w: 96.6612, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { N: 131.7806, i: 1.7700, w: 272.8461, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto: { N: 110.3034, i: 17.1417, w: 113.7632, a: 39.48168, e: 0.248807, M0: 14.882, M1: 0.00396 }
    };

    const pE = getHeliocentric(planetsData.earth, d);
    const sunLon = norm(Math.atan2(-pE.y, -pE.x) / rad);

    // Moon
    const L = norm(218.316 + 13.176396 * d);
    const Mm = norm(134.963 + 13.064993 * d);
    const moonLon = norm(L + 6.289 * Math.sin(Mm * rad));

    const planets = [
        { name: "Güneş", icon: "☀️", lon: sunLon },
        { name: "Ay", icon: "🌙", lon: moonLon }
    ];

    const trNames = { mercury: "Merkür", venus: "Venüs", mars: "Mars", jupiter: "Jüpiter", saturn: "Satürn", uranus: "Uranüs", neptune: "Neptün", pluto: "Plüton" };
    const trIcons = { mercury: "☿️", venus: "♀️", mars: "♂️", jupiter: "♃", saturn: "♄", uranus: "♅", neptune: "♆", pluto: "♇" };

    for (let k in planetsData) {
        if (k === 'earth') continue;
        const pP = getHeliocentric(planetsData[k], d);
        const lonG = norm(Math.atan2(pP.y - pE.y, pP.x - pE.x) / rad);
        planets.push({ name: trNames[k], icon: trIcons[k], lon: lonG });
    }

    // Check angle difference
    function angleDiff(a, b) {
        let df = Math.abs(a - b) % 360;
        return df > 180 ? 360 - df : df;
    }

    function isAspect(a, b, target, orb) {
        return Math.abs(angleDiff(a, b) - target) <= orb;
    }

    const detectedPatterns = [];

    // 1. Stellium: 3 or more planets within 12 degrees of each other or in same 30-deg sign
    const signBuckets = Array(12).fill(0).map(() => []);
    planets.forEach(p => {
        const sIdx = Math.floor(p.lon / 30);
        signBuckets[sIdx].push(p);
    });

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    signBuckets.forEach((bucket, idx) => {
        if (bucket.length >= 3) {
            detectedPatterns.push({
                type: "Stelyum (Stellium)",
                icon: "🌟",
                badge: `${signs[idx]} Burcunda`,
                planets: bucket.map(p => p.icon + " " + p.name).join(", "),
                desc: `Haritanızda <strong>${signs[idx]}</strong> burcunda ${bucket.length} gezegenlik güçlü bir odaklanma enerjisi var. Bu yaşam alanında inanılmaz bir uzmanlık, çekim ve deha potansiyeli taşırsınız.`
            });
        }
    });

    // 2. Grand Trine (3 planets with 120° trines, orb 7°)
    const n = planets.length;
    for (let i = 0; i < n; i++) {
        for (let j = i + 1; j < n; j++) {
            for (let k = j + 1; k < n; k++) {
                let p1 = planets[i], p2 = planets[j], p3 = planets[k];
                if (isAspect(p1.lon, p2.lon, 120, 7) && isAspect(p2.lon, p3.lon, 120, 7) && isAspect(p1.lon, p3.lon, 120, 7)) {
                    detectedPatterns.push({
                        type: "Büyük Üçgen (Grand Trine)",
                        icon: "🔺",
                        badge: "Kozmik Akış & Doğal Yetenek",
                        planets: `${p1.icon} ${p1.name} — ${p2.icon} ${p2.name} — ${p3.icon} ${p3.name}`,
                        desc: `Haritanızda eşsiz bir <strong>Büyük Üçgen</strong> geometrisi oluşmuş! Doğuştan gelen zahmetsiz bir yetenek, yüksek şans ve yaratıcı akışa sahipsiniz.`
                    });
                }
            }
        }
    }

    // 3. T-Square (2 planets 180° opposition, both 90° square to a 3rd apex planet, orb 7°)
    for (let i = 0; i < n; i++) {
        for (let j = i + 1; j < n; j++) {
            let p1 = planets[i], p2 = planets[j];
            if (isAspect(p1.lon, p2.lon, 180, 7)) {
                for (let k = 0; k < n; k++) {
                    if (k === i || k === j) continue;
                    let pApex = planets[k];
                    if (isAspect(p1.lon, pApex.lon, 90, 7) && isAspect(p2.lon, pApex.lon, 90, 7)) {
                        detectedPatterns.push({
                            type: "T-Kare (T-Square)",
                            icon: "⚡",
                            badge: "Büyük Dinamizm & Zafer Motoru",
                            planets: `Zıtlık: ${p1.icon} ${p1.name} ☍ ${p2.icon} ${p2.name} | Apex (Çıkış): 🎯 ${pApex.icon} ${pApex.name}`,
                            desc: `Haritanızda enerjiyi başarıya dönüştüren bir <strong>T-Kare</strong> bulunuyor! <strong>${pApex.name}</strong> gezegeni hayatınızın krizleri şahesere dönüştüren anahtar lokomotifidir.`
                        });
                    }
                }
            }
        }
    }

    // 4. Yod (Finger of God: 2 planets 60° sextile, both 150° quincunx to apex, orb 4°)
    for (let i = 0; i < n; i++) {
        for (let j = i + 1; j < n; j++) {
            let p1 = planets[i], p2 = planets[j];
            if (isAspect(p1.lon, p2.lon, 60, 5)) {
                for (let k = 0; k < n; k++) {
                    if (k === i || k === j) continue;
                    let pApex = planets[k];
                    if (isAspect(p1.lon, pApex.lon, 150, 4) && isAspect(p2.lon, pApex.lon, 150, 4)) {
                        detectedPatterns.push({
                            type: "Yod (Tanrı'nın Parmağı)",
                            icon: "☝️",
                            badge: "Kadersel Misyon & Sezgisellik",
                            planets: `Taban: ${p1.icon} ${p1.name} ⚹ ${p2.icon} ${p2.name} | Apex: 🎯 ${pApex.icon} ${pApex.name}`,
                            desc: `Haritanızda çok nadir rastlanan kadersel <strong>Yod (Tanrı'nın Parmağı)</strong> kalıbı var. <strong>${pApex.name}</strong> gezegeni ruhsal uyanışınızı ve özel yaşam görevinizi temsil eder.`
                        });
                    }
                }
            }
        }
    }

    // Fallback if none found
    if (detectedPatterns.length === 0) {
        detectedPatterns.push({
            type: "Dengeli Açı Dağılımı (Bireysel Dinamik)",
            icon: "🌌",
            badge: "Özgür Akış",
            planets: "Baskın tek bir kapalı kalıp yerine dengeli gezegen etkileşimleri",
            desc: "Haritanız tek bir katı açı kalıbına sıkışmak yerine, bağımsız açılarla dengeli bir esneklik sunuyor. Hayatınızın farklı alanlarını birbirine bağlamak sizin için daha kolay ve bağımsız gerçekleşir."
        });
    }

    renderAkResults(detectedPatterns, "Haritanızdaki Geometrik Kalıplar Başarıyla Çıkarıldı");
}

function hcAciKalipManuelHesapla() {
    const type = document.getElementById('hc-ak-type').value;
    const element = document.getElementById('hc-ak-element').value;

    const data = {
        tkare: { name: "T-Kare (T-Square)", icon: "⚡", badge: "Mücadele, Hırs ve Büyük Zafer", desc: "İki gezegenin zıtlığı ve üçüncü bir odak (apex) gezegene kare yapmasıyla oluşur. Haritanın en güçlü çalışma motorudur. Hayat sizi zorladıkça içsel bir dev uyanır ve apex gezegeni üzerinden muazzam başarılara imza atarsınız." },
        buyukucgen: { name: "Büyük Üçgen (Grand Trine)", icon: "🔺", badge: "Doğal Yetenek & Şans Akışı", desc: "Aynı elementteki 3 burcun 120 derecelik açılarla birbirine bağlanmasıdır. Zahmetsiz şans, çekicilik ve sanatsal/zihinsel yetenek verir. Konfor alanına hapsolmamak için bilinçli eylem gerekir." },
        buyukkare: { name: "Büyük Kare (Grand Cross)", icon: "⬛", badge: "Dört Köşeli Kadersel Direnç", desc: "Dört gezegenin birbiriyle kare ve zıt açılar oluşturmasıdır. Çok büyük sorumluluklar ve güçlü bir irade inşa eder. Kişi hayatın tüm fırtınalarına karşı çelik gibi dayanıklıdır." },
        yod: { name: "Yod (Tanrı'nın Parmağı)", icon: "☝️", badge: "Kadersel Görev & Spiritüel Misyon", desc: "İki sekstil gezegenin tek bir apex gezegene 150 derecelik açıyla odaklanmasıdır. Kişinin hayatında beklenmedik kadersel virajlar, sezgisel uyanışlar ve ilahi bir yönlendirme hissi vardır." },
        mistikdortgen: { name: "Mistik Dörtgen (Mystic Rectangle)", icon: "💎", badge: "Kriz Yönetimi & Kusursuz Denge", desc: "İki zıt açının sekstil ve üçgenlerle birbirine bağlanmasıdır. Zıtlıkları sentezleme, pratik zeka ve krizleri fırsata çevirme yeteneği sunar." },
        ucurtma: { name: "Uçurtma (Kite)", icon: "🪁", badge: "Şansın Eyleme Dönüşmesi", desc: "Büyük Üçgen'in tepesine eklenen bir dördüncü gezegenin zıtlık oluşturmasıyla doğar. Büyük Üçgen'in pasif şansını somut başarıya ve görünür başarılara dönüştürür." },
        stelyum: { name: "Stelyum (Stellium Kümelenmesi)", icon: "🌟", badge: "Tek Bir Alanda Yoğunlaşan Deha", desc: "Aynı burç veya evde 3 ya da daha fazla gezegenin toplanmasıdır. Bireyin bütün enerjisini ve dehasını o yaşam alanına odaklamasını sağlar." }
    };

    const item = data[type] || data.tkare;
    const patterns = [{
        type: item.name,
        icon: item.icon,
        badge: item.badge,
        planets: `Baskın Element / Mod: ${element.toUpperCase()}`,
        desc: item.desc
    }];

    renderAkResults(patterns, `${item.name} Kapsamlı Analizi`);
}

function renderAkResults(patterns, title) {
    let heroHtml = `
        <div class="hc-ak-hero-card">
            <div class="hc-ak-hero-badge">📐 Astrolojik Geometri</div>
            <div class="hc-ak-hero-title">${title}</div>
            <p class="hc-ak-hero-sub">${patterns.length} adet belirgin açı konfigürasyonu incelendi</p>
        </div>
    `;

    let listHtml = "";
    let descHtml = "";

    patterns.forEach((p, idx) => {
        listHtml += `
            <div class="hc-ak-card">
                <div class="hc-ak-head">
                    <span class="hc-ak-icon">${p.icon}</span>
                    <div class="hc-ak-info">
                        <div class="hc-ak-title">${p.type}</div>
                        <div class="hc-ak-sub">${p.planets}</div>
                    </div>
                    <span class="hc-ak-tag">${p.badge}</span>
                </div>
            </div>
        `;

        descHtml += `
            <div class="hc-ak-desc-box">
                <h5>${p.icon} ${p.type} — ${p.badge}</h5>
                <p>${p.desc}</p>
            </div>
        `;
    });

    document.getElementById('hc-ak-hero').innerHTML = heroHtml;
    document.getElementById('hc-ak-list').innerHTML = listHtml;
    document.getElementById('hc-ak-desc').innerHTML = descHtml;

    document.getElementById('hc-ak-result').classList.add('visible');
    document.getElementById('hc-ak-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

