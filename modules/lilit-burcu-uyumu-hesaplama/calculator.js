function hcLilitUyumHesapla() {
    const d1Str = document.getElementById('hc-lil-d1').value;
    const d2Str = document.getElementById('hc-lil-d2').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen her iki kişinin de doğum tarihlerini girin.");
        return;
    }

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

    function calcLilith(dStr) {
        const dParts = dStr.split('-').map(Number);
        const jdVal = getJD(dParts[0], dParts[1], dParts[2]);
        const dVal = jdVal - 2451543.5;
        const TVal = dVal / 36525;

        // Mean Apogee (Lilith) formula: 40.66249 + 11140.40803 * T
        const lilithLon = norm(40.66249 + 11140.40803 * TVal);
        return lilithLon;
    }

    const l1 = calcLilith(d1Str);
    const l2 = calcLilith(d2Str);

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const elements = ["Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su", "Ateş", "Toprak", "Hava", "Su"];

    const idx1 = Math.floor(l1 / 30) % 12;
    const idx2 = Math.floor(l2 / 30) % 12;

    const b1 = signs[idx1], e1 = elements[idx1];
    const b2 = signs[idx2], e2 = elements[idx2];

    let distance = Math.abs(idx1 - idx2);
    if (distance > 6) distance = 12 - distance;

    let overallScore = 0;
    let sMagnetism = 0, sDesire = 0, sTaboo = 0, sPower = 0;
    let patternName = "";
    let desc = "";

    if (distance === 0) {
        patternName = "Lilit - Lilit Kavuşumu (Büyük Manyetik Tutku & Özgürleşme)";
        sMagnetism = 99; sDesire = 98; sTaboo = 96; sPower = 94;
        overallScore = 97;
        desc = `İkinizin de Kara Ay Lilit'i <strong>${b1}</strong> burcunda! Aranızda karşı konulamaz, hipnotik ve derin bir çekim vardır. Toplumdan veya aileden sakladığınız en vahşi, otantik ve bağımsız taraflarınızı birbirinizin yanında korkusuzca yaşarsınız. Bu bağ, her ikinizi de özgürleştiren büyüleyici bir güçtür.`;
    } else if (distance === 4) {
        patternName = `Lilit Üçgen Açısı (${e1} - ${e1} Tutku Rezonansı)`;
        sMagnetism = 95; sDesire = 94; sTaboo = 95; sPower = 92;
        overallScore = 94;
        desc = `Lilitleriniz aynı elementte (<strong>${e1}</strong>) harika bir üçgen oluşturuyor. Arzularınız ve tabulara bakışınız birbirini kınamadan destekler. Birlikteyken çok çekici, özgür ve sıra dışı bir aura yayarsınız.`;
    } else if (distance === 2) {
        patternName = `Lilit Sekstil Açısı (${e1} - ${e2} Çekim Bağı)`;
        sMagnetism = 90; sDesire = 92; sTaboo = 90; sPower = 90;
        overallScore = 91;
        desc = `Lilitleriniz sekstil açı yapıyor. Birbirinizin sınırlarına ve bağımsızlığına saygı duyarken, ilişkinin tutkusunu daima canlı ve merak uyandırıcı tutarsınız.`;
    } else if (distance === 6) {
        patternName = "Lilit Karşıtlığı (Aşırı Yoğun Manyetik Çatışma)";
        sMagnetism = 96; sDesire = 88; sTaboo = 85; sPower = 78;
        overallScore = 87;
        desc = `Lilitleriniz tam karşı karşıyadır. Aranızda nefes kesici bir çekim ve aynı zamanda güç dengesi mücadelesi olabilir. Birbirinizi kontrol etmeye çalışmadığınızda benzersiz bir tutku derinliği yaşarsınız.`;
    } else if (distance === 3) {
        patternName = "Lilit Kare Açısı (Karanlık Arzuların Çatışması)";
        sMagnetism = 82; sDesire = 78; sTaboo = 75; sPower = 70;
        overallScore = 76;
        desc = `Lilitleriniz kare açı yapıyor. Birbirinizin bağımsızlık alanlarına istemeden müdahale edebilirsiniz. Birbirinizin özgürlüğüne alan açtığınızda aranızdaki kıvılcım çok dönüştürücü olur.`;
    } else {
        patternName = "Farklı Elementler & Bireysel Özgürlük";
        sMagnetism = 78; sDesire = 76; sTaboo = 77; sPower = 76;
        overallScore = 77;
        desc = `Lilitleriniz farklı burçlardadır. Birbirinizin içsel sınırlarını ve derin arzularını keşfetmek ilişkiye gizem ve heyecan katar.`;
    }

    const heroHtml = `
        <div class="hc-lil-hero-card">
            <div class="hc-lil-hero-badge">${patternName}</div>
            <div class="hc-lil-hero-title">%${overallScore} Manyetik Tutku Skoru</div>
            <p class="hc-lil-hero-sub">1. Kişi Lilit: <strong>${b1}</strong> (${e1}) ⇄ 2. Kişi Lilit: <strong>${b2}</strong> (${e2})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-lil-dim-card">
            <div class="hc-lil-dim-head"><span>🔮 Hipnotik Manyetizma & Çekim</span><span>%${sMagnetism}</span></div>
            <div class="hc-lil-dim-bar"><div class="hc-lil-dim-fill" style="width: ${sMagnetism}%; background: #a855f7;"></div></div>
        </div>
        <div class="hc-lil-dim-card">
            <div class="hc-lil-dim-head"><span>🔥 Bastırılmış Arzuların Özgürleşmesi</span><span>%${sDesire}</span></div>
            <div class="hc-lil-dim-bar"><div class="hc-lil-dim-fill" style="width: ${sDesire}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-lil-dim-card">
            <div class="hc-lil-dim-head"><span>⚡ Tabuları Yıkma Cesareti</span><span>%${sTaboo}</span></div>
            <div class="hc-lil-dim-bar"><div class="hc-lil-dim-fill" style="width: ${sTaboo}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-lil-dim-card">
            <div class="hc-lil-dim-head"><span>🦅 Bağımsızlık & Güç Dengesi</span><span>%${sPower}</span></div>
            <div class="hc-lil-dim-bar"><div class="hc-lil-dim-fill" style="width: ${sPower}%; background: #3b82f6;"></div></div>
        </div>
    `;

    document.getElementById('hc-lil-hero').innerHTML = heroHtml;
    document.getElementById('hc-lil-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-lu-desc').innerHTML = desc;

    document.getElementById('hc-lu-result').classList.add('visible');
    document.getElementById('hc-lu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
