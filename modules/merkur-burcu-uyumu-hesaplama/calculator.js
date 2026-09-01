function hcMerkurUyumHesapla() {
    const d1Str = document.getElementById('hc-mer-d1').value;
    const d2Str = document.getElementById('hc-mer-d2').value;

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

    function calcMercury(dStr) {
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

        // Mercury
        const N = norm(48.3313 + 3.24587e-5 * dVal);
        const inc = 7.0047 + 5.00e-8 * dVal;
        const w = norm(29.1241 + 1.01444e-5 * dVal);
        const a = 0.387098;
        const ecc = 0.205635 + 5.59e-10 * dVal;
        const M_p = norm(168.6562 + 4.0923344368 * dVal);
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

    const m1 = calcMercury(d1Str);
    const m2 = calcMercury(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(m1 / 30) % 12;
    const idx2 = Math.floor(m2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sFlow = 0, sDecisions = 0, sHumor = 0, sClarity = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Merkür - Merkür Kavuşumu (Aynı Zihinsel Frekans)";
        sFlow = 98; sDecisions = 95; sHumor = 96; sClarity = 95;
        overallScore = 96;
        desc = `İkinizin de Merkür'ü <strong>${b1}</strong> burcunda! Birbirinizin cümlelerini tamamlar, daha lafı ağzınızdan çıkmadan ne demek istediğinizi anlarsınız. Saatlerce sohbet etmekten asla sıkılmazsınız. Ortak kararları yıldırım hızıyla ve tam mutabakatla alırsınız.`;
    } else if (distance === 4) {
        patternName = `Merkür Üçgen Açısı (${e1} - ${e1} Rezonansı)`;
        sFlow = 95; sDecisions = 94; sHumor = 95; sClarity = 96;
        overallScore = 95;
        desc = `Merkürleriniz aynı elementte (<strong>${e1}</strong>) muhteşem bir üçgen açı oluşturuyor. Konuşurken fikirleriniz birbirine ilham verir ve zihinsel olarak inanılmaz bir beslenme sağlarsınız. Aranızda asla iletişim kopukluğu yaşanmaz.`;
    } else if (distance === 2) {
        patternName = `Merkür Sekstil Açısı (${e1} - ${e2} Dansı)`;
        sFlow = 92; sDecisions = 90; sHumor = 94; sClarity = 92;
        overallScore = 92;
        desc = `Merkürleriniz sekstil açı yapıyor. Zekice espriler, eğlenceli tartışmalar ve yapıcı fikir alışverişleri ilişkinizin omurgasını oluşturur. Birbirinize yeni bakış açıları kazandırırsınız.`;
    } else if (distance === 6) {
        patternName = "Merkür Karşıtlığı (Ufuk Açıcı Zihinsel Karşılaşma)";
        sFlow = 84; sDecisions = 80; sHumor = 85; sClarity = 85;
        overallScore = 84;
        desc = `Merkürleriniz karşı karşıyadır. Bir konuya tamamen farklı pencerelerden bakarsınız; bu durum ilk başta tartışma yaratsa da birlikte düşünüldüğünde büyük resmi eksiksiz görmenizi sağlar.`;
    } else if (distance === 3) {
        patternName = "Merkür Kare Açısı (Fikir Çatışması & Beyin Fırtınası)";
        sFlow = 72; sDecisions = 70; sHumor = 76; sClarity = 72;
        overallScore = 73;
        desc = `Merkürleriniz kare açı yapıyor. İletişim tarzlarınız ve düşünme hızlarınız farklıdır; biri detaylara odaklanırken diğeri büyük hedeflere yönelebilir. Birbirinizi sabırla dinlediğinizde harika bir denge kurabilirsiniz.`;
    } else {
        patternName = "Farklı Elementler & Zihinsel Zenginleşme";
        sFlow = 78; sDecisions = 76; sHumor = 78; sClarity = 77;
        overallScore = 77;
        desc = `Merkürleriniz farklı burçlardadır. Birbirinizin düşünce tarzını tanımak, ilişkinize zenginlik ve olgunluk katacaktır.`;
    }

    const heroHtml = `
        <div class="hc-mer-hero-card">
            <div class="hc-mer-hero-badge">${patternName}</div>
            <div class="hc-mer-hero-title">%${overallScore} Zihinsel Uyum Skoru</div>
            <p class="hc-mer-hero-sub">1. Kişi Merkür: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Merkür: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-mer-dim-card">
            <div class="hc-mer-dim-head"><span>💬 Sohbet Akışı & Anlaşılma</span><span>%${sFlow}</span></div>
            <div class="hc-mer-dim-bar"><div class="hc-mer-dim-fill" style="width: ${sFlow}%; background: #0ea5e9;"></div></div>
        </div>
        <div class="hc-mer-dim-card">
            <div class="hc-mer-dim-head"><span>🎯 Fikir Birliği & Karar Alma</span><span>%${sDecisions}</span></div>
            <div class="hc-mer-dim-bar"><div class="hc-mer-dim-fill" style="width: ${sDecisions}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-mer-dim-card">
            <div class="hc-mer-dim-head"><span>😄 Mizah, Neşe & Flört</span><span>%${sHumor}</span></div>
            <div class="hc-mer-dim-bar"><div class="hc-mer-dim-fill" style="width: ${sHumor}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-mer-dim-card">
            <div class="hc-mer-dim-head"><span>🕊️ Çatışma Çözme & Açıklık</span><span>%${sClarity}</span></div>
            <div class="hc-mer-dim-bar"><div class="hc-mer-dim-fill" style="width: ${sClarity}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-mer-hero').innerHTML = heroHtml;
    document.getElementById('hc-mer-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-mu-desc').innerHTML = desc;

    document.getElementById('hc-mu-result').classList.add('visible');
    document.getElementById('hc-mu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
