function hcJupiterUyumHesapla() {
    const d1Str = document.getElementById('hc-jup-d1').value;
    const d2Str = document.getElementById('hc-jup-d2').value;

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

    function calcJupiter(dStr) {
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

        // Jupiter
        const N = norm(100.4542 + 2.76854e-5 * dVal);
        const inc = 1.3030 - 1.557e-7 * dVal;
        const w = norm(273.8777 + 1.64505e-5 * dVal);
        const a = 5.20256;
        const ecc = 0.048498 + 4.469e-9 * dVal;
        const M_p = norm(19.8950 + 0.0830853001 * dVal);
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

    const j1 = calcJupiter(d1Str);
    const j2 = calcJupiter(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(j1 / 30) % 12;
    const idx2 = Math.floor(j2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sVision = 0, sAbundance = 0, sTravel = 0, sSpirit = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Jüpiter - Jüpiter Kavuşumu (Aynı Jenerasyonel Şans & Vizyon)";
        sVision = 98; sAbundance = 95; sTravel = 94; sSpirit = 95;
        overallScore = 95;
        desc = `İkinizin de Jüpiter'i <strong>${b1}</strong> burcunda! Yaşam felsefeniz, adalet anlayışınız ve büyüme hedefleriniz tamamen uyum içindedir. Birlikte hayal kurduğunuzda birbirinizi sınırsızca cesaretlendirirsiniz. Maddi ve manevi şansınız birleşerek katlanır.`;
    } else if (distance === 4) {
        patternName = `Jüpiter Üçgen Açısı (${e1} - ${e1} Rezonansı)`;
        sVision = 95; sAbundance = 94; sTravel = 96; sSpirit = 95;
        overallScore = 95;
        desc = `Jüpiterleriniz aynı elementte (<strong>${e1}</strong>) muhteşem bir üçgen oluşturuyor. Birbirinize olan inancınız ve güveniniz sonsuzdur. Birlikte çıktığınız seyahatler, yatırımlar ve ortak hedefler size daima bereket getirir.`;
    } else if (distance === 2) {
        patternName = `Jüpiter Sekstil Açısı (${e1} - ${e2} Dansı)`;
        sVision = 92; sAbundance = 90; sTravel = 92; sSpirit = 90;
        overallScore = 91;
        desc = `Jüpiterleriniz sekstil açı yapıyor. Birlikteyken çok neşeli, cömert ve pozitif bir aura yaratırsınız. Hayatın zorluklarına gülümseyerek meydan okuyabilirsiniz.`;
    } else if (distance === 6) {
        patternName = "Jüpiter Karşıtlığı (Geniş Ufuklar ve Büyük Perspektif)";
        sVision = 86; sAbundance = 84; sTravel = 88; sSpirit = 85;
        overallScore = 86;
        desc = `Jüpiterleriniz karşı karşıyadır. İnançlarınız veya büyüme stratejileriniz farklı olsa da, bu durum birbirinizin ufkunu muazzam derecede genişletir.`;
    } else if (distance === 3) {
        patternName = "Jüpiter Kare Açısı (Aşırı İyimserlik & Risk Eğilimi)";
        sVision = 76; sAbundance = 74; sTravel = 82; sSpirit = 75;
        overallScore = 77;
        desc = `Jüpiterleriniz kare açı yapıyor. Birlikteyken bazen gereğinden fazla harcama yapma veya aşırı iyimser riskler alma eğilimi gösterebilirsiniz. Ayaklarınızı yere basarak hareket ettiğinizde harika bir büyüme yakalarsınız.`;
    } else {
        patternName = "Farklı Elementler & Zengin Hayat Görüşü";
        sVision = 78; sAbundance = 76; sTravel = 77; sSpirit = 76;
        overallScore = 77;
        desc = `Jüpiterleriniz farklı burçlardadır. Birbirinizin değer dünyasını öğrenerek ilişkinize derinlik katabilirsiniz.`;
    }

    const heroHtml = `
        <div class="hc-jup-hero-card">
            <div class="hc-jup-hero-badge">${patternName}</div>
            <div class="hc-jup-hero-title">%${overallScore} Bolluk ve Vizyon Skoru</div>
            <p class="hc-jup-hero-sub">1. Kişi Jüpiter: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Jüpiter: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-jup-dim-card">
            <div class="hc-jup-dim-head"><span>🌟 Vizyon & Hayat Felsefesi</span><span>%${sVision}</span></div>
            <div class="hc-jup-dim-bar"><div class="hc-jup-dim-fill" style="width: ${sVision}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-jup-dim-card">
            <div class="hc-jup-dim-head"><span>💰 Bolluk & Maddi Bereket</span><span>%${sAbundance}</span></div>
            <div class="hc-jup-dim-bar"><div class="hc-jup-dim-fill" style="width: ${sAbundance}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-jup-dim-card">
            <div class="hc-jup-dim-head"><span>✈️ Seyahat, Macera & Keşif</span><span>%${sTravel}</span></div>
            <div class="hc-jup-dim-bar"><div class="hc-jup-dim-fill" style="width: ${sTravel}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-jup-dim-card">
            <div class="hc-jup-dim-head"><span>🕊️ Maneviyat & Ortak İyimserlik</span><span>%${sSpirit}</span></div>
            <div class="hc-jup-dim-bar"><div class="hc-jup-dim-fill" style="width: ${sSpirit}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-jup-hero').innerHTML = heroHtml;
    document.getElementById('hc-jup-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-ju-desc').innerHTML = desc;

    document.getElementById('hc-ju-result').classList.add('visible');
    document.getElementById('hc-ju-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
