function hcKironUyumHesapla() {
    const d1Str = document.getElementById('hc-ki-d1').value;
    const d2Str = document.getElementById('hc-ki-d2').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen her iki kişinin de doğum tarihlerini girin.");
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

    function calcChiron(dStr) {
        const dParts = dStr.split('-').map(Number);
        const jdVal = getJD(dParts[0], dParts[1], dParts[2]);
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

        // Chiron orbital elements
        const N = norm(339.6 + 0.001 * (dVal / 365.25));
        const inc = 6.93;
        const w = norm(339.6 + 0.005 * (dVal / 365.25));
        const a = 13.7;
        const ecc = 0.383;
        const M_p = norm(72.8 + 0.01943 * dVal);
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

    const c1 = calcChiron(d1Str);
    const c2 = calcChiron(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(c1 / 30) % 12;
    const idx2 = Math.floor(c2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sEmpathy = 0, sVulnerable = 0, sTransform = 0, sAccept = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Kiron - Kiron Kavuşumu (Ortak Ruhsal Yaranın Şifalanması)";
        sEmpathy = 98; sVulnerable = 96; sTransform = 95; sAccept = 98;
        overallScore = 97;
        desc = `İkinizin de Kiron'u <strong>${b1}</strong> burcunda! Ruhsal hassasiyetleriniz ve geçmiş kırgınlıklarınız birbirine ayna tutar. Birbirinizin en hassas, kimseye göstermediği kırılgan yanlarını anında hisseder ve yargılamadan sarıp sarmalarsınız. Bu ilişki her ikiniz için de hayatınızın en büyük ruhsal arınma ve iyileşme limanıdır.`;
    } else if (distance === 4) {
        patternName = `Kiron Üçgen Açısı (${e1} - ${e1} Şifa Rezonansı)`;
        sEmpathy = 96; sVulnerable = 94; sTransform = 95; sAccept = 95;
        overallScore = 95;
        desc = `Kironlarınız aynı elementte (<strong>${e1}</strong>) harika bir üçgen oluşturuyor. Birbirinize olan şefkatiniz ve koşulsuz anlayışınız çok yüksektir. Birlikteyken kendinizi tamamen güvende hisseder, maskelerinizi rahatça indirebilirsiniz.`;
    } else if (distance === 2) {
        patternName = `Kiron Sekstil Açısı (${e1} - ${e2} Şefkat Bağı)`;
        sEmpathy = 92; sVulnerable = 90; sTransform = 92; sAccept = 90;
        overallScore = 91;
        desc = `Kironlarınız sekstil açı yapıyor. Birbirinizin geçmiş tecrübelerine derin saygı duyar, duygusal yaraları şefkat ve nezaketle iyileştirirsiniz.`;
    } else if (distance === 6) {
        patternName = "Kiron Karşıtlığı (Ayna Etkisi ve Karşılıklı İyileşme)";
        sEmpathy = 86; sVulnerable = 84; sTransform = 90; sAccept = 85;
        overallScore = 86;
        desc = `Kironlarınız karşı karşıyadır. Birbirinizin bastırdığı hassasiyetleri tetikleyebilirsiniz; ancak bu durum her ikinizin de kendi içindeki şifacıyı uyandırması için eşsiz bir fırsattır.`;
    } else if (distance === 3) {
        patternName = "Kiron Kare Açısı (Duygusal Kırılganlık Sınavı)";
        sEmpathy = 72; sVulnerable = 70; sTransform = 78; sAccept = 72;
        overallScore = 73;
        desc = `Kironlarınız kare açı yapıyor. Bazen farkında olmadan birbirinizin hassas damarlarına basabilirsiniz. Şefkati elden bırakmayıp açıkça konuştuğunuzda bu bağ büyük bir sevgi derinliği kazanır.`;
    } else {
        patternName = "Farklı Elementler & Bireysel Şifa Yolu";
        sEmpathy = 78; sVulnerable = 76; sTransform = 77; sAccept = 76;
        overallScore = 77;
        desc = `Kironlarınız farklı burçlardadır. Birbirinizin içsel dünyasını keşfetmek ve hassasiyetlerine saygı göstermek ilişkiyi çok daha anlamlı kılacaktır.`;
    }

    const heroHtml = `
        <div class="hc-ki-hero-card">
            <div class="hc-ki-hero-badge">${patternName}</div>
            <div class="hc-ki-hero-title">%${overallScore} Ruhsal Şifa ve Empati Skoru</div>
            <p class="hc-ki-hero-sub">1. Kişi Kiron: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Kiron: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-ki-dim-card">
            <div class="hc-ki-dim-head"><span>🌿 Duygusal Şifa & Derin Empati</span><span>%${sEmpathy}</span></div>
            <div class="hc-ki-dim-bar"><div class="hc-ki-dim-fill" style="width: ${sEmpathy}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-ki-dim-card">
            <div class="hc-ki-dim-head"><span>🤍 Kırılganlık Paylaşımı & Güven</span><span>%${sVulnerable}</span></div>
            <div class="hc-ki-dim-bar"><div class="hc-ki-dim-fill" style="width: ${sVulnerable}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-ki-dim-card">
            <div class="hc-ki-dim-head"><span>✨ Yaranın Güce Dönüşümü</span><span>%${sTransform}</span></div>
            <div class="hc-ki-dim-bar"><div class="hc-ki-dim-fill" style="width: ${sTransform}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-ki-dim-card">
            <div class="hc-ki-dim-head"><span>🕊️ Koşulsuz Kabul & Şefkat</span><span>%${sAccept}</span></div>
            <div class="hc-ki-dim-bar"><div class="hc-ki-dim-fill" style="width: ${sAccept}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-ki-hero').innerHTML = heroHtml;
    document.getElementById('hc-ki-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-ki-desc').innerHTML = desc;

    document.getElementById('hc-ki-result').classList.add('visible');
    document.getElementById('hc-ki-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
