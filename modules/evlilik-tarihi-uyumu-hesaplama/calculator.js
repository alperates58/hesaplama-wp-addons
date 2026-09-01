function hcEvlilikTarihiUyumuHesapla() {
    const wDateStr = document.getElementById('hc-wedding-date').value;
    const p1Birth = document.getElementById('hc-w-p1-birth').value;
    const p2Birth = document.getElementById('hc-w-p2-birth').value;

    if (!wDateStr || !p1Birth || !p2Birth) {
        alert("Lütfen tüm tarihleri eksiksiz doldurun.");
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

    const wParts = wDateStr.split('-').map(Number);
    const jdVal = getJD(wParts[0], wParts[1], wParts[2]);
    const dVal = jdVal - 2451543.5;
    const TVal = dVal / 36525;

    // Sun & Moon on wedding day
    const L0_e = norm(280.46646 + 36000.76983 * TVal);
    const M_e = norm(357.52911 + 35999.05029 * TVal);
    const C_e = (1.914602 - 0.004817 * TVal) * Math.sin(M_e * rad) + (0.019993 - 0.000101 * TVal) * Math.sin(2 * M_e * rad);
    const sunLon = norm(L0_e + C_e);

    const L_m = norm(218.3165 + 481267.8813 * TVal);
    const M_m = norm(134.9634 + 477198.8676 * TVal);
    const D_m = norm(297.8502 + 445267.1115 * TVal);
    const moonLon = norm(L_m + 6.289 * Math.sin(M_m * rad) - 1.274 * Math.sin((M_m - 2 * D_m) * rad) + 0.658 * Math.sin(2 * D_m * rad));

    // Phase difference: 0 = new moon, 90 = first quarter, 180 = full moon, 270 = last quarter
    const phaseAngle = norm(moonLon - sunLon);
    let phaseName = "";
    let sMoon = 85;
    if (phaseAngle >= 15 && phaseAngle <= 165) {
        phaseName = "Büyüyen Ay Fazı (Hilal / İlk Dördün - En Uğurlu Başlangıç Fazı)";
        sMoon = 98;
    } else if (phaseAngle > 165 && phaseAngle <= 195) {
        phaseName = "Dolunay Fazı (Yoğun Duygular & Kutlama Işığı)";
        sMoon = 92;
    } else if (phaseAngle > 195 && phaseAngle <= 345) {
        phaseName = "Küçülen Ay Fazı (Olgunlaşma & Sadeleşme)";
        sMoon = 80;
    } else {
        phaseName = "Yeniay Fazı (Tohum Ekme & Yeni Bir Hayat Başlangıcı)";
        sMoon = 88;
    }

    // Venus & Mercury speed / retrograde estimation
    // Venus
    const L0_v = norm(181.9798 + 58517.8156 * TVal);
    const M_v = norm(50.4161 + 58517.4956 * TVal);
    const C_v = 0.7758 * Math.sin(M_v * rad);
    const vLon = norm(L0_v + C_v);
    const isVenusRetro = Math.abs(norm(vLon - sunLon)) < 15 && (vLon > sunLon); // near inferior conjunction

    // Numerology of wedding date
    const getNum = (d) => {
        let s = d.replace(/-/g, '');
        let sum = s.split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        while (sum > 9) sum = sum.toString().split('').reduce((a, b) => parseInt(a) + parseInt(b), 0);
        return sum;
    };
    const wNum = getNum(wDateStr);
    let sNumerology = 85;
    if (wNum === 6) sNumerology = 99; // 6 is Venus / harmony / family
    else if (wNum === 2 || wNum === 9 || wNum === 3) sNumerology = 94;
    else if (wNum === 1 || wNum === 8) sNumerology = 88;
    else sNumerology = 80;

    let sVenus = isVenusRetro ? 60 : 95;
    let sMercury = 90;

    const overallScore = Math.round((sVenus * 0.35) + (sMoon * 0.3) + (sNumerology * 0.2) + (sMercury * 0.15));

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const moonSign = signs[Math.floor(moonLon / 30) % 12];
    const sunSign = signs[Math.floor(sunLon / 30) % 12];

    const heroHtml = `
        <div class="hc-wt-hero-card">
            <div class="hc-wt-hero-badge">Eleksiyon Astrolojisi & Kozmik Zamanlama</div>
            <div class="hc-wt-hero-title">%${overallScore} Evlilik Tarihi Bereket Skoru</div>
            <p class="hc-wt-hero-sub">Güneş: <strong>${sunSign}</strong> ⇄ Düğün Günü Ay: <strong>${moonSign}</strong> (${phaseName})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-wt-dim-card">
            <div class="hc-wt-dim-head"><span>💖 Venüs Aşkı & Romantizm Akışı</span><span>%${sVenus}</span></div>
            <div class="hc-wt-dim-bar"><div class="hc-wt-dim-fill" style="width: ${sVenus}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-wt-dim-card">
            <div class="hc-wt-dim-head"><span>🌙 Ay Fazı & Yuva Bereketi</span><span>%${sMoon}</span></div>
            <div class="hc-wt-dim-bar"><div class="hc-wt-dim-fill" style="width: ${sMoon}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-wt-dim-card">
            <div class="hc-wt-dim-head"><span>🔢 Numerolojik Evlilik Titreşimi (Sayı: ${wNum})</span><span>%${sNumerology}</span></div>
            <div class="hc-wt-dim-bar"><div class="hc-wt-dim-fill" style="width: ${sNumerology}%; background: #8b5cf6;"></div></div>
        </div>
        <div class="hc-wt-dim-card">
            <div class="hc-wt-dim-head"><span>📜 İmzalar, İletişim & Merkür Akışı</span><span>%${sMercury}</span></div>
            <div class="hc-wt-dim-bar"><div class="hc-wt-dim-fill" style="width: ${sMercury}%; background: #0ea5e9;"></div></div>
        </div>
    `;

    let reportHtml = `
        <p><strong>Düğün Günü Gökyüzü Yerleşimi:</strong> Seçilen tarihte Ay <strong>${moonSign}</strong> burcunda seyahat ediyor. Ay'ın ${phaseName.toLowerCase()} bulunması, kurulan yeni yuvanın bereketini ve büyüme enerjisini destekleyen çok olumlu bir göstergedir.</p>
        <p><strong>Numerolojik Evlilik Sayısı (${wNum}):</strong> Bu tarihin numerolojik toplamı <strong>${wNum}</strong> enerjisini taşır. ${wNum === 6 ? "6 sayısı doğrudan evlilik, sevgi, yuva ve koruyucu aile enerjisini simgeler; evlilik için en şanslı sayıdır." : wNum === 2 ? "2 sayısı ortaklık, şefkat ve karşılıklı anlayış titreşimi sunar." : "Bu sayı ilişkinize özgün bir dinamizm ve hayat yolunda ortak başarı katacaktır."}</p>
        <p><strong>Kozmik Tavsiye:</strong> Nikah ve kutlama anında sevgiye, şükrana ve birbirinize odaklanarak bu yüksek frekansı ömür boyu kalbinizde mühürleyin.</p>
    `;

    document.getElementById('hc-wt-hero').innerHTML = heroHtml;
    document.getElementById('hc-wt-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-wedding-analysis').innerHTML = reportHtml;

    document.getElementById('hc-evlilik-tarihi-uyumu-result').classList.add('visible');
    document.getElementById('hc-evlilik-tarihi-uyumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

