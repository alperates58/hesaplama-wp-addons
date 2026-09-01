function hcMarsUyumHesapla() {
    const d1Str = document.getElementById('hc-mu-d1').value;
    const d2Str = document.getElementById('hc-mu-d2').value;

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

    function calcMars(dStr) {
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

        // Mars
        const N = norm(49.5574 + 2.11081e-5 * dVal);
        const inc = 1.8497 - 1.78e-8 * dVal;
        const w = norm(286.5016 + 2.92961e-5 * dVal);
        const a = 1.523688;
        const ecc = 0.093405 + 2.516e-9 * dVal;
        const M_p = norm(18.6021 + 0.5240207766 * dVal);
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

    const m1 = calcMars(d1Str);
    const m2 = calcMars(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(m1 / 30) % 12;
    const idx2 = Math.floor(m2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sPassion = 0, sGoal = 0, sConflict = 0, sDaily = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Mars - Mars Kavuşumu (Aynı Eylem Enerjisi)";
        sPassion = 96; sGoal = 95; sConflict = 80; sDaily = 92;
        overallScore = 91;
        desc = `İkinizin de Mars'ı <strong>${b1}</strong> burcunda! Tutkularınız, motivasyonlarınız ve harekete geçme hızınız tamamen aynı frekanstadır. Birlikte bir hedefe kilitlendiğinizde aşamayacağınız engel yoktur. Kriz anlarında aynı anda parlayabileceğiniz için birbirinize nefes alma payı bırakmanız faydalı olur.`;
    } else if (distance === 4) {
        patternName = `Mars Üçgen Açısı (${e1} - ${e1} Rezonansı)`;
        sPassion = 95; sGoal = 94; sConflict = 92; sDaily = 95;
        overallScore = 94;
        desc = `Marslarınız aynı elementte (<strong>${e1}</strong>) harika bir üçgen açı oluşturuyor. Enerjiniz ve libidinal uyumunuz birbirini zahmetsizce besler. Birlikte spor yapmak, seyahat etmek ve projeler üretmek ilişkiyi inanılmaz dinamik kılar.`;
    } else if (distance === 2) {
        patternName = `Mars Sekstil Açısı (${e1} - ${e2} Dansı)`;
        sPassion = 90; sGoal = 92; sConflict = 90; sDaily = 92;
        overallScore = 91;
        desc = `Marslarınız sekstil açı yapıyor. Biri plan yaparken diğeri harekete geçebilir. Eylem tarzlarınız birbirini mükemmel tamamlar ve çatışmaları çok yapıcı, zekice çözümlere kavuşturursunuz.`;
    } else if (distance === 6) {
        patternName = "Mars Karşıtlığı (Aşırı Yüksek Tutkusal Kıvılcım)";
        sPassion = 98; sGoal = 82; sConflict = 72; sDaily = 80;
        overallScore = 83;
        desc = `Marslarınız tam karşı karşıyadır. Aranızda inanılmaz bir fiziksel çekim ve elektriklenme vardır. Ancak inatlaşma ve güç mücadeleleri yaşanabilir. Bu enerjiyi birbirinize karşı değil, ortak bir hedefe yönelttiğinizde muhteşem bir çift olursunuz.`;
    } else if (distance === 3) {
        patternName = "Mars Kare Açısı (Ateşli ve Rekabetçi Dinamik)";
        sPassion = 88; sGoal = 75; sConflict = 65; sDaily = 74;
        overallScore = 76;
        desc = `Marslarınız kare açı konumunda. Mücadele ve tartışma anlarında tarzlarınız farklılaşabilir. Ancak bu gerilim aynı zamanda yüksek bir tutku ve arzu kaynağıdır. Birbirinize sınır koymadan dinlemeyi öğrenmek bağı güçlendirir.`;
    } else {
        patternName = "Farklı Elementler & Karmik Eylem Uyumu";
        sPassion = 78; sGoal = 76; sConflict = 74; sDaily = 76;
        overallScore = 76;
        desc = `Marslarınız farklı burçlardadır. Biri aceleciyken diğeri temkinli olabilir. Birbirinizin temposuna saygı gösterdiğinizde ilişki çok dengeli bir ritme kavuşur.`;
    }

    const heroHtml = `
        <div class="hc-mu-hero-card">
            <div class="hc-mu-hero-badge">${patternName}</div>
            <div class="hc-mu-hero-title">%${overallScore} Tutku ve Eylem Skoru</div>
            <p class="hc-mu-hero-sub">1. Kişi Mars: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Mars: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-mu-dim-card">
            <div class="hc-mu-dim-head"><span>🔥 Fiziksel Tutku & Çekim</span><span>%${sPassion}</span></div>
            <div class="hc-mu-dim-bar"><div class="hc-mu-dim-fill" style="width: ${sPassion}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-mu-dim-card">
            <div class="hc-mu-dim-head"><span>🎯 Ortak Hedef & Hırs Birliği</span><span>%${sGoal}</span></div>
            <div class="hc-mu-dim-bar"><div class="hc-mu-dim-fill" style="width: ${sGoal}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-mu-dim-card">
            <div class="hc-mu-dim-head"><span>🛡️ Kriz Yönetimi & Uzlaşma</span><span>%${sConflict}</span></div>
            <div class="hc-mu-dim-bar"><div class="hc-mu-dim-fill" style="width: ${sConflict}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-mu-dim-card">
            <div class="hc-mu-dim-head"><span>⚡ Günlük Yaşam Dinamizmi</span><span>%${sDaily}</span></div>
            <div class="hc-mu-dim-bar"><div class="hc-mu-dim-fill" style="width: ${sDaily}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-mu-hero').innerHTML = heroHtml;
    document.getElementById('hc-mu-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-mu-desc').innerHTML = desc;

    document.getElementById('hc-mu-result').classList.add('visible');
    document.getElementById('hc-mu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

