function hcVenusUyumHesapla() {
    const d1Str = document.getElementById('hc-vu-d1').value;
    const d2Str = document.getElementById('hc-vu-d2').value;

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

    function calcVenus(dStr) {
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

        // Venus
        const N = norm(76.6799 + 2.46590e-5 * dVal);
        const inc = 3.3946 + 2.75e-8 * dVal;
        const w = norm(54.8910 + 1.38374e-5 * dVal);
        const a = 0.723332;
        const ecc = 0.006773 - 1.302e-9 * dVal;
        const M_p = norm(48.0052 + 1.6021302244 * dVal);
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

    const v1 = calcVenus(d1Str);
    const v2 = calcVenus(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(v1 / 30) % 12;
    const idx2 = Math.floor(v2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sAffection = 0, sFlirt = 0, sSensual = 0, sHarmony = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Venüs - Venüs Kavuşumu (Aynı Aşk Dili)";
        sAffection = 98; sFlirt = 90; sSensual = 95; sHarmony = 95;
        overallScore = 95;
        desc = `İkinizin de Venüs'ü <strong>${b1}</strong> burcunda! Aşkı deneyimleme, ilgi gösterme ve sevilme arzunuz tıpatıp aynı. Birbirinize jest yaparken neyin mutlu edeceğini çok iyi bilirsiniz. Birlikteyken kendinizi çok değerli ve anlaşıldığını hissedersiniz.`;
    } else if (distance === 4) {
        patternName = `Venüs Üçgen Açısı (${e1} - ${e1} Rezonansı)`;
        sAffection = 95; sFlirt = 92; sSensual = 92; sHarmony = 96;
        overallScore = 94;
        desc = `Venüsleriniz aynı elementte (<strong>${e1}</strong>) kusursuz üçgen açı yapıyor. Sevgi diliniz, estetik zevkleriniz ve romantik arzularınız tamamen uyum içindedir. İlişkide zorlama olmadan çok tatlı, huzurlu ve büyüleyici bir aşk akışı yaşarsınız.`;
    } else if (distance === 2) {
        patternName = `Venüs Sekstil Açısı (${e1} - ${e2} Dansı)`;
        sAffection = 90; sFlirt = 96; sSensual = 88; sHarmony = 92;
        overallScore = 91;
        desc = `Venüsleriniz birbirini besleyen 60° sekstil konumda. Birbirinize olan ilginiz asla monotonlaşmaz. Sürekli yeni flört oyunları, romantik sürprizler ve tatlı sohbetlerle aşkınızı taze tutarsınız.`;
    } else if (distance === 6) {
        patternName = "Venüs Karşıtlığı (Büyük Manyetik Aşk Çekimi)";
        sAffection = 88; sFlirt = 85; sSensual = 98; sHarmony = 86;
        overallScore = 88;
        desc = `Venüsleriniz zodyakta tam karşı karşıyadır. Birbirinizin sevgi tarzı zıt kutuplar gibi çalışır; bu da inanılmaz bir büyülenme ve tutku yaratır. Birlikteyken aşkın her iki yüzünü de keşfedersiniz.`;
    } else if (distance === 3) {
        patternName = "Venüs Kare Açısı (Heyecan Verici Romantik Çatışma)";
        sAffection = 72; sFlirt = 85; sSensual = 82; sHarmony = 70;
        overallScore = 76;
        desc = `Venüsleriniz kare açı yapıyor. Aşkta ilgi gösterme tarzlarınız farklı olabilir; biri ilgi ve yakınlık beklerken diğeri özgürlük isteyebilir. Bu gerilim doğru yönetildiğinde aşkı sürekli dinamik tutan bir kıvılcıma dönüşür.`;
    } else {
        patternName = "Farklı Elementler & Karmik Sevgi Bağı";
        sAffection = 75; sFlirt = 74; sSensual = 76; sHarmony = 75;
        overallScore = 75;
        desc = `Venüsleriniz farklı burçlardadır. Birbirinizin sevgi dilini öğrenmek ve değer verdiklerine saygı göstermek ilişkiyi çok daha zengin ve olgun bir seviyeye taşıyacaktır.`;
    }

    const heroHtml = `
        <div class="hc-vu-hero-card">
            <div class="hc-vu-hero-badge">${patternName}</div>
            <div class="hc-vu-hero-title">%${overallScore} Romantik Uyum Skoru</div>
            <p class="hc-vu-hero-sub">1. Kişi Venüs: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Venüs: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-vu-dim-card">
            <div class="hc-vu-dim-head"><span>💖 Şefkat & Değer Verme</span><span>%${sAffection}</span></div>
            <div class="hc-vu-dim-bar"><div class="hc-vu-dim-fill" style="width: ${sAffection}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-vu-dim-card">
            <div class="hc-vu-dim-head"><span>💬 Flört & Romantik İletişim</span><span>%${sFlirt}</span></div>
            <div class="hc-vu-dim-bar"><div class="hc-vu-dim-fill" style="width: ${sFlirt}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-vu-dim-card">
            <div class="hc-vu-dim-head"><span>✨ Estetik & Duygusal Çekim</span><span>%${sSensual}</span></div>
            <div class="hc-vu-dim-bar"><div class="hc-vu-dim-fill" style="width: ${sSensual}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-vu-dim-card">
            <div class="hc-vu-dim-head"><span>🕊️ İlişki Huzuru & Denge</span><span>%${sHarmony}</span></div>
            <div class="hc-vu-dim-bar"><div class="hc-vu-dim-fill" style="width: ${sHarmony}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-vu-hero').innerHTML = heroHtml;
    document.getElementById('hc-vu-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-vu-desc').innerHTML = desc;

    document.getElementById('hc-vu-result').classList.add('visible');
    document.getElementById('hc-vu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

