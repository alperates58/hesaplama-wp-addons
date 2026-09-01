function hcSySetTab(mode) {
    document.querySelectorAll('.hc-sy-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.hc-sy-pane').forEach(p => p.classList.remove('active'));

    if (mode === 'auto') {
        document.querySelectorAll('.hc-sy-tab')[0].classList.add('active');
        document.getElementById('hc-sy-pane-auto').classList.add('active');
    } else {
        document.querySelectorAll('.hc-sy-tab')[1].classList.add('active');
        document.getElementById('hc-sy-pane-manual').classList.add('active');
    }
}

const fixedStarsCatalog = [
    { name: "Regulus (Kuzeyin Kraliyet Yıldızı)", sign: "basak", deg: 0.05, orb: 1.5, theme: "Kraliyet, Zafer, Liderlik & İntikamdan Kaçınma", desc: "Astrolojinin en şerefli 4 Kraliyet Yıldızından biri. Büyük bir liderlik, saygınlık ve güç vadeder. Başarı intikam duygularından arınıldığında ömür boyu kalıcı olur." },
    { name: "Aldebaran (Doğunun Kraliyet Yıldızı)", sign: "ikizler", deg: 9.85, orb: 1.5, theme: "Dürüstlük, Askeri/Ticari Zafer & Onur", desc: "Doğunun Gözcüsü. Büyük zenginlik ve şan getirir. Tek kuralı vardır: Dürüstlükten ve ahlaktan asla taviz verilmemelidir." },
    { name: "Antares (Batının Kraliyet Yıldızı)", sign: "yay", deg: 9.80, orb: 1.5, theme: "Tutku, Stratejik Güç & Dönüşüm", desc: "Batının Gözcüsü, Akrebin Kalbi. Savaşçı bir azim ve cesaret bahşeder. Aşırılıklardan ve öfkeden kaçınıldığında rakipsiz kılar." },
    { name: "Fomalhaut (Güneyin Kraliyet Yıldızı)", sign: "balik", deg: 3.90, orb: 1.5, theme: "İdealizm, Sanat, Karizma & Maneviyat", desc: "Güneyin Gözcüsü. Saf niyetle ve ideallerle yapılan her işte olağanüstü bir sanatsal ve ruhsal şöhret verir." },
    { name: "Sirius (Göklerin En Parlak Yıldızı)", sign: "yengec", deg: 14.15, orb: 1.5, theme: "Kutsal Koruma, Deha & Yüksek Onur", desc: "İlahi koruma ve sıradan olanı olağanüstüye çevirme gücü. Bireyin adını tarihe yazdırmasını sağlayacak parlaklık verir." },
    { name: "Spica (Başak Takımyıldızı İncisi)", sign: "terazi", deg: 23.90, orb: 1.5, theme: "Bolluk, Zarafet, Bilim & Sanat Şansı", desc: "Astrolojinin en talihli ve koruyucu sabit yıldızlarından biridir. Doğuştan gelen yeteneklerin ödüllendirilmesini sağlar." },
    { name: "Arcturus (Kuzey Muhafızı)", sign: "terazi", deg: 24.25, orb: 1.5, theme: "Yeni Yollar Açma, Zenginlik & Keşif", desc: "Öncü adımlar atma ve keşiflerle gelen kalıcı servet ve itibar vadeder." },
    { name: "Algol (Gorgon Medusa)", sign: "boga", deg: 26.20, orb: 1.5, theme: "Ham Dişil Güç, Tutku & Kriz Dönüşümü", desc: "Astrolojinin en yoğun enerjili yıldızı. Duygusal kontrol ve zihinsel sakinlikle kullanıldığında yenilmez bir koruyucu kalkana dönüşür." },
    { name: "Pleiades / Alcyone (Yedi Kız Kardeş)", sign: "ikizler", deg: 0.05, orb: 1.2, theme: "Mistik Sezgiler, Sanatsal Vizyon & Derinlik", desc: "Evrensel sırları anlama, üçüncü göz keskinliği ve güçlü sanatsal yaratıcılık verir." },
    { name: "Rigel (Avcı Orion'un Sol Ayağı)", sign: "ikizler", deg: 16.90, orb: 1.5, theme: "Eğitim, Bilgi Yayma, Zenginlik & Başarı", desc: "Öğretme, icat etme ve bilgiyi pratik kazanca dönüştürme gücü bahşeder." },
    { name: "Betelgeuse (Orion'un Sağ Omzu)", sign: "ikizler", deg: 28.80, orb: 1.5, theme: "Askeri/Finansal Şan, Liderlik & Şans", desc: "Büyük başarılar, talih ve saygı uyandıran bir otorite kazandırır." },
    { name: "Vega (Lir Takımyıldızı Şahikası)", sign: "oglak", deg: 15.35, orb: 1.5, theme: "Müzik, Sanat, Karizma & Hipnotik Çekim", desc: "Sanatta, siyasette veya toplum önünde büyüleyici bir çekim gücü ve zarafet verir." },
    { name: "Altair (Uçan Kartal)", sign: "kova", deg: 1.80, orb: 1.5, theme: "Cesaret, Özgürlük, Yüksek İrade & Hırs", desc: "Korkusuzca hedeflere uçma ve bağımsız bir lider olma azmi aşılar." }
];

function hcSabitYildizOtomatikHesapla() {
    const dStr = document.getElementById('hc-sy-date').value;
    const tStr = document.getElementById('hc-sy-time').value || '12:00';

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
        mercury: { name: "Merkür", icon: "☿️", N: 48.3313, i: 7.0047, w: 77.4564, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { name: "Venüs", icon: "♀️", N: 76.6799, i: 3.3946, w: 131.5721, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { name: "Mars", icon: "♂️", N: 49.5574, i: 1.8497, w: 336.0408, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { name: "Jüpiter", icon: "♃", N: 100.4542, i: 1.3030, w: 273.8777, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { name: "Satürn", icon: "♄", N: 113.6634, i: 2.4886, w: 339.3939, a: 9.55475, e: 0.055546, M0: 316.9670, M1: 0.033444228 },
        uranus: { name: "Uranüs", icon: "♅", N: 74.0005, i: 0.7733, w: 96.6612, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { name: "Neptün", icon: "♆", N: 131.7806, i: 1.7700, w: 272.8461, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto: { name: "Plüton", icon: "♇", N: 110.3034, i: 17.1417, w: 113.7632, a: 39.48168, e: 0.248807, M0: 14.882, M1: 0.00396 }
    };

    const pE = getHeliocentric(planetsData.earth, d);
    const sunLon = norm(Math.atan2(-pE.y, -pE.x) / rad);

    const L = norm(218.316 + 13.176396 * d);
    const Mm = norm(134.963 + 13.064993 * d);
    const moonLon = norm(L + 6.289 * Math.sin(Mm * rad));

    const planets = [
        { name: "Güneş", icon: "☀️", lon: sunLon },
        { name: "Ay", icon: "🌙", lon: moonLon }
    ];

    for (let k in planetsData) {
        if (k === 'earth') continue;
        const pP = getHeliocentric(planetsData[k], d);
        const lonG = norm(Math.atan2(pP.y - pE.y, pP.x - pE.x) / rad);
        planets.push({ name: planetsData[k].name, icon: planetsData[k].icon, lon: lonG });
    }

    const signKeys = ["koc", "boga", "ikizler", "yengec", "aslan", "basak", "terazi", "akrep", "yay", "oglak", "kova", "balik"];
    const signNames = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];

    const detected = [];

    planets.forEach(p => {
        const sIdx = Math.floor(p.lon / 30);
        const signKey = signKeys[sIdx];
        const degInSign = p.lon % 30;

        fixedStarsCatalog.forEach(star => {
            if (star.sign === signKey) {
                const diff = Math.abs(degInSign - star.deg);
                if (diff <= star.orb) {
                    detected.push({
                        planet: p.name,
                        planetIcon: p.icon,
                        planetDeg: degInSign.toFixed(1),
                        signName: signNames[sIdx],
                        starName: star.name,
                        starTheme: star.theme,
                        starDesc: star.desc,
                        orb: diff.toFixed(1)
                    });
                }
            }
        });
    });

    renderSyResults(detected);
}

function hcSabitYildizManuelHesapla() {
    const signKey = document.getElementById('hc-sy-sign').value;
    const deg = parseFloat(document.getElementById('hc-sy-deg').value || 0);

    const signNames = {
        koc: "Koç", boga: "Boğa", ikizler: "İkizler", yengec: "Yengeç", aslan: "Aslan", basak: "Başak",
        terazi: "Terazi", akrep: "Akrep", yay: "Yay", oglak: "Oğlak", kova: "Kova", balik: "Balık"
    };

    const detected = [];
    fixedStarsCatalog.forEach(star => {
        if (star.sign === signKey) {
            const diff = Math.abs(deg - star.deg);
            if (diff <= 2.0) {
                detected.push({
                    planet: "İncelenen Nokta",
                    planetIcon: "📍",
                    planetDeg: deg.toFixed(1),
                    signName: signNames[signKey],
                    starName: star.name,
                    starTheme: star.theme,
                    starDesc: star.desc,
                    orb: diff.toFixed(1)
                });
            }
        }
    });

    renderSyResults(detected, `Manuel İnceleme: ${signNames[signKey]} ${deg}°`);
}

function renderSyResults(detected, customTitle) {
    let heroTitle = customTitle || (detected.length > 0 ? `Haritanızda ${detected.length} Adet Sabit Yıldız Kavuşumu Bulundu!` : "Haritanızda Majör Yıldız Kavuşumu Bulunmuyor");
    let heroBadge = detected.length > 0 ? "✨ Kadersel Işıma" : "🌌 Bireysel Özgür Rota";

    let heroHtml = `
        <div class="hc-sy-hero-card">
            <div class="hc-sy-hero-badge">${heroBadge}</div>
            <div class="hc-sy-hero-title">${heroTitle}</div>
            <p class="hc-sy-hero-sub">Sabit yıldızlar gezegenin etkisini büyüterek kişiye kadersel bir yetenek ve toplumsal görünürlük verir.</p>
        </div>
    `;

    let listHtml = "";
    if (detected.length === 0) {
        listHtml = `<div class="hc-sy-item"><p style="margin: 0; color: #64748b; font-size: 13px;">Seçilen konumda 1.5° orbla majör bir Kraliyet veya Behenian yıldızı kavuşumu bulunmuyor. Haritanız gezegenlerin özgür enerjisiyle çalışmaktadır.</p></div>`;
    } else {
        detected.forEach(item => {
            listHtml += `
                <div class="hc-sy-item">
                    <div class="hc-sy-head">
                        <span class="hc-sy-icon">${item.planetIcon}</span>
                        <div class="hc-sy-info">
                            <strong>${item.planet} ☌ ${item.starName}</strong>
                            <div class="hc-sy-loc">${item.signName} ${item.planetDeg}° (Orb: ${item.orb}°) — <em>${item.starTheme}</em></div>
                        </div>
                        <span class="hc-sy-badge">Kavuşum (☌)</span>
                    </div>
                </div>
            `;
        });
    }

    let descHtml = "";
    if (detected.length > 0) {
        detected.forEach(item => {
            descHtml += `
                <div class="hc-sy-desc-box">
                    <h5>⭐ ${item.starName} (${item.planet} ile Kavuşum)</h5>
                    <p>${item.starDesc}</p>
                </div>
            `;
        });
    } else {
        descHtml = `<p>Sabit yıldız kavuşumları haritada gezegenlerin etkisini 'yıldızlaştırır'. Eğer bir gezegeniniz sabit yıldızla kavuşuyorsa, o alanda sıradan bir hayatınız olmayacaktır; büyük zaferler ve kadersel sınavlar iç içe geçer.</p>`;
    }

    document.getElementById('hc-sy-hero').innerHTML = heroHtml;
    document.getElementById('hc-sy-list').innerHTML = listHtml;
    document.getElementById('hc-sy-desc').innerHTML = descHtml;

    document.getElementById('hc-sy-result').classList.add('visible');
    document.getElementById('hc-sy-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

