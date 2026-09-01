function hcSaturnUyumHesapla() {
    const d1Str = document.getElementById('hc-sat-d1').value;
    const d2Str = document.getElementById('hc-sat-d2').value;

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

    function calcSaturn(dStr) {
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

        // Saturn
        const N = norm(113.6634 + 2.38980e-5 * dVal);
        const inc = 2.4886 - 1.081e-7 * dVal;
        const w = norm(339.3939 + 2.97661e-5 * dVal);
        const a = 9.55475;
        const ecc = 0.055546 - 9.499e-9 * dVal;
        const M_p = norm(316.9670 + 0.0334442282 * dVal);
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

    const s1 = calcSaturn(d1Str);
    const s2 = calcSaturn(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(s1 / 30) % 12;
    const idx2 = Math.floor(s2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sLoyalty = 0, sDuty = 0, sEndurance = 0, sKarma = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Satürn - Satürn Kavuşumu (Aynı Yaşam Disiplini & Karmik Çapa)";
        sLoyalty = 98; sDuty = 96; sEndurance = 95; sKarma = 98;
        overallScore = 97;
        desc = `İkinizin de Satürn'ü <strong>${b1}</strong> burcunda! Sorumluluk, evlilik ciddiyeti ve hayata karşı duruşunuz tam bir uyum içindedir. Karşılaştığınız zorluklar sizi ayırmak yerine birbirinize sımsıkı kenetler. Yıllar geçtikçe derinleşen, çelik gibi sarsılmaz bir sadakat ve güven bağı kurarsınız.`;
    } else if (distance === 4) {
        patternName = `Satürn Üçgen Açısı (${e1} - ${e1} Rezonansı)`;
        sLoyalty = 96; sDuty = 94; sEndurance = 95; sKarma = 95;
        overallScore = 95;
        desc = `Satürnleriniz aynı elementte (<strong>${e1}</strong>) sağlam bir üçgen açı oluşturuyor. Birbirinize verdiğiniz sözleri tutmakta asla zorlanmazsınız. Doğal bir saygı, görev bilinci ve uzun vadeli aile temeli kurarsınız.`;
    } else if (distance === 2) {
        patternName = `Satürn Sekstil Açısı (${e1} - ${e2} Dansı)`;
        sLoyalty = 92; sDuty = 90; sEndurance = 92; sKarma = 90;
        overallScore = 91;
        desc = `Satürnleriniz sekstil açı yapıyor. Hayatın getirdiği sorumlulukları paylaşırken birbirinizi yormaz, karşılıklı iş birliğiyle krizleri kolayca çözersiniz.`;
    } else if (distance === 6) {
        patternName = "Satürn Karşıtlığı (Karmik Sınav ve Denge Arayışı)";
        sLoyalty = 85; sDuty = 80; sEndurance = 86; sKarma = 88;
        overallScore = 85;
        desc = `Satürnleriniz karşı karşıyadır. Kurallar ve sorumluluklar konusunda farklı yöntemleriniz olsa da, orta noktada buluştuğunuzda birbirinizin eksik yanlarını mükemmel şekilde tamamlarsınız.`;
    } else if (distance === 3) {
        patternName = "Satürn Kare Açısı (Sorumluluk ve Otorite Çatışması)";
        sLoyalty = 74; sDuty = 72; sEndurance = 76; sKarma = 80;
        overallScore = 75;
        desc = `Satürnleriniz kare açı yapıyor. İlişkide zaman zaman birbirinize karşı katı olma veya baskı hissetme riski olabilir. Birbirinize esneklik tanıdığınızda bu bağ çok büyük bir sabır okuluna dönüşür.`;
    } else {
        patternName = "Farklı Elementler & Karmik Olgunlaşma";
        sLoyalty = 78; sDuty = 76; sEndurance = 77; sKarma = 78;
        overallScore = 77;
        desc = `Satürnleriniz farklı burçlardadır. Birbirinizin sınırlarına ve olgunlaşma sürecine saygı göstermek ilişkiyi çok daha dayanıklı kılacaktır.`;
    }

    const heroHtml = `
        <div class="hc-sat-hero-card">
            <div class="hc-sat-hero-badge">${patternName}</div>
            <div class="hc-sat-hero-title">%${overallScore} Kalıcılık ve Sadakat Skoru</div>
            <p class="hc-sat-hero-sub">1. Kişi Satürn: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Satürn: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-sat-dim-card">
            <div class="hc-sat-dim-head"><span>🛡️ Sadakat & Sarsılmaz Güven</span><span>%${sLoyalty}</span></div>
            <div class="hc-sat-dim-bar"><div class="hc-sat-dim-fill" style="width: ${sLoyalty}%; background: #475569;"></div></div>
        </div>
        <div class="hc-sat-dim-card">
            <div class="hc-sat-dim-head"><span>📋 Sorumluluk & Görev Paylaşımı</span><span>%${sDuty}</span></div>
            <div class="hc-sat-dim-bar"><div class="hc-sat-dim-fill" style="width: ${sDuty}%; background: #0284c7;"></div></div>
        </div>
        <div class="hc-sat-dim-card">
            <div class="hc-sat-dim-head"><span>⏳ Kriz Dayanıklılığı & Sabır</span><span>%${sEndurance}</span></div>
            <div class="hc-sat-dim-bar"><div class="hc-sat-dim-fill" style="width: ${sEndurance}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-sat-dim-card">
            <div class="hc-sat-dim-head"><span>🔗 Karmik Bağ & Evlilik Harcı</span><span>%${sKarma}</span></div>
            <div class="hc-sat-dim-bar"><div class="hc-sat-dim-fill" style="width: ${sKarma}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-sat-hero').innerHTML = heroHtml;
    document.getElementById('hc-sat-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-su-desc').innerHTML = desc;

    document.getElementById('hc-su-result').classList.add('visible');
    document.getElementById('hc-su-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
