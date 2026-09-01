function hcAskDtUyumHesapla() {
    const d1Str = document.getElementById('hc-adt-date1').value;
    const d2Str = document.getElementById('hc-adt-date2').value;

    if (!d1Str || !d2Str) {
        alert('Lütfen her iki tarihi de giriniz.');
        return;
    }

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    function getJD(Y, M, D, hour = 12) {
        let yCalc = Y, mCalc = M;
        if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
        const A = Math.floor(yCalc / 100);
        const B = 2 - A + Math.floor(A / 4);
        return Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (hour / 24);
    }

    function calcAstro(dStr) {
        const parts = dStr.split('-').map(Number);
        const jdVal = getJD(parts[0], parts[1], parts[2]);
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;

        // Sun
        const L0_e = norm(280.46646 + 36000.76983 * TVal);
        const M_e = norm(357.52911 + 35999.05029 * TVal);
        const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
        const sun = norm(L0_e + C_e);

        // Moon
        const L_m = norm(218.3165 + 481267.8813 * TVal);
        const M_m = norm(134.9634 + 477198.8676 * TVal);
        const D_m = norm(297.8502 + 445267.1115 * TVal);
        const moon = norm(L_m + 6.289 * Math.sin(M_m * rad) - 1.274 * Math.sin((M_m - 2 * D_m) * rad) + 0.658 * Math.sin(2 * D_m * rad));

        // Venus
        const L0_v = norm(181.9798 + 58517.8156 * TVal);
        const M_v = norm(50.4161 + 58517.4956 * TVal);
        const C_v = 0.7758 * Math.sin(M_v * rad);
        const venus = norm(L0_v + C_v);

        // Life Path
        let s = dStr.replace(/-/g, '');
        let sum = s.split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        while (sum > 9 && sum !== 11 && sum !== 22 && sum !== 33) {
            sum = sum.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        }

        return { sun, moon, venus, lifePath: sum };
    }

    const p1 = calcAstro(d1Str);
    const p2 = calcAstro(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    function getAngleDiff(a, b) {
        let d = Math.abs(a - b) % 360;
        return d > 180 ? 360 - d : d;
    }

    // 1. Venus romance score
    const vDiff = getAngleDiff(p1.venus, p2.venus);
    let sRomance = (vDiff < 15 || (vDiff > 110 && vDiff < 130)) ? 97 : (vDiff < 65 ? 91 : 78);

    // 2. Sun passion score
    const sDiff = getAngleDiff(p1.sun, p2.sun);
    let sPassion = (sDiff < 15 || (sDiff > 110 && sDiff < 130)) ? 96 : ((sDiff > 170 && sDiff < 190) ? 92 : 82);

    // 3. Moon emotional security
    const mDiff = getAngleDiff(p1.moon, p2.moon);
    let sSecurity = (mDiff < 15 || (mDiff > 110 && mDiff < 130)) ? 95 : (mDiff < 65 ? 90 : 79);

    // 4. Numerology life path match
    let sNumerology = (p1.lifePath === p2.lifePath || Math.abs(p1.lifePath - p2.lifePath) === 2 || Math.abs(p1.lifePath - p2.lifePath) === 4) ? 95 : 84;

    const overallScore = Math.round((sRomance * 0.3) + (sPassion * 0.3) + (sSecurity * 0.25) + (sNumerology * 0.15));

    const s1Name = signs[Math.floor(p1.sun / 30) % 12];
    const s2Name = signs[Math.floor(p2.sun / 30) % 12];
    const v1Name = signs[Math.floor(p1.venus / 30) % 12];
    const v2Name = signs[Math.floor(p2.venus / 30) % 12];

    const heroHtml = `
        <div class="hc-adt-hero-card">
            <div class="hc-adt-hero-badge">Yıldız Haritası & Numerolojik Aşk Uyum</div>
            <div class="hc-adt-hero-title">%${overallScore} Genel Aşk Uyumu Skoru</div>
            <p class="hc-adt-hero-sub">1. Kişi: <strong>${s1Name}</strong> (Venüs: ${v1Name} / Yaşam Yolu: ${p1.lifePath}) ⇄ 2. Kişi: <strong>${s2Name}</strong> (Venüs: ${v2Name} / Yaşam Yolu: ${p2.lifePath})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-adt-dim-card">
            <div class="hc-adt-dim-head"><span>💖 Kalp, Romantizm & Sevgi Dili (Venüs)</span><span>%${sRomance}</span></div>
            <div class="hc-adt-dim-bar"><div class="hc-adt-dim-fill" style="width: ${sRomance}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-adt-dim-card">
            <div class="hc-adt-dim-head"><span>🔥 Tutku, Çekim & Ortak Vizyon (Güneş)</span><span>%${sPassion}</span></div>
            <div class="hc-adt-dim-bar"><div class="hc-adt-dim-fill" style="width: ${sPassion}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-adt-dim-card">
            <div class="hc-adt-dim-head"><span>🌙 Duygusal Güven & Yuva Bağı (Ay)</span><span>%${sSecurity}</span></div>
            <div class="hc-adt-dim-bar"><div class="hc-adt-dim-fill" style="width: ${sSecurity}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-adt-dim-card">
            <div class="hc-adt-dim-head"><span>🔢 Numerolojik Yaşam Yolu Bağı</span><span>%${sNumerology}</span></div>
            <div class="hc-adt-dim-bar"><div class="hc-adt-dim-fill" style="width: ${sNumerology}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    let reportHtml = `
        <p><strong>Astrolojik Aşk Sentezi:</strong> 1. partnerin Güneş'i <strong>${s1Name}</strong>, 2. partnerin Güneş'i <strong>${s2Name}</strong> burcundadır. Venüs yerleşimleriniz birbirinize sevginizi nasıl sunduğunuzu belirler ve aranızda çok sıcak, doğal bir romantik akış olduğunu gösterir.</p>
        <p><strong>Numerolojik Yaşam Yolu Uyumu:</strong> 1. partnerin Yaşam Yolu sayısı <strong>${p1.lifePath}</strong>, 2. partnerin sayısı <strong>${p2.lifePath}</strong> olarak hesaplanmıştır. Bu iki sayının kombinasyonu, hayat amaçlarınızda birbirinize destek olacağınızı ve zorlukları birlikte aşacağınızı gösterir.</p>
        <p><strong>İpucu:</strong> Aşkı canlı tutmanın anahtarı birbirinizi keşfetmeye devam etmek ve her gün takdir duygusunu hissettirmektir.</p>
    `;

    document.getElementById('hc-adt-hero').innerHTML = heroHtml;
    document.getElementById('hc-adt-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-adt-desc').innerHTML = reportHtml;

    document.getElementById('hc-adt-result').classList.add('visible');
    document.getElementById('hc-adt-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

