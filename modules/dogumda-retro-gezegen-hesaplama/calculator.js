function hcDogumdaRetroHesapla() {
    const birthDate = document.getElementById('hc-br-birth').value;
    const birthTime = document.getElementById('hc-br-time').value;

    if (!birthDate) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const parts = birthDate.split('-').map(Number);
    const timeParts = (birthTime || '12:00').split(':').map(Number);
    let Y = parts[0], M = parts[1], D = parts[2];
    let hour = timeParts[0] + (timeParts[1] || 0) / 60;

    let yCalc = Y, mCalc = M;
    if (mCalc <= 2) { yCalc -= 1; mCalc += 12; }
    const A = Math.floor(yCalc / 100);
    const B = 2 - A + Math.floor(A / 4);
    const JD = Math.floor(365.25 * (yCalc + 4716)) + Math.floor(30.6001 * (mCalc + 1)) + D + B - 1524.5 + (hour / 24);

    const rad = Math.PI / 180;
    function norm(deg) {
        deg = deg % 360;
        return deg < 0 ? deg + 360 : deg;
    }

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const symbols = ["♈", "♉", "♊", "♋", "♌", "♍", "♎", "♏", "♐", "♑", "♒", "♓"];

    function getEphemeris(jdVal) {
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

        function solvePlanet(N0, N1, i0, i1, w0, w1, a0, e0, e1, M0, M1) {
            const N = norm(N0 + N1 * dVal);
            const inc = i0 + i1 * dVal;
            const w = norm(w0 + w1 * dVal);
            const a = a0;
            const ecc = e0 + e1 * dVal;
            const M_p = norm(M0 + M1 * dVal);
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

        return {
            mer: solvePlanet(48.3313, 3.24587e-5, 7.0047, 5.00e-8, 29.1241, 1.01444e-5, 0.387098, 0.205635, 5.59e-10, 168.6562, 4.0923344368),
            ven: solvePlanet(76.6799, 2.46590e-5, 3.3946, 2.75e-8, 54.8910, 1.38374e-5, 0.723332, 0.006773, -1.302e-9, 48.0052, 1.6021302244),
            mar: solvePlanet(49.5574, 2.11081e-5, 1.8497, -1.78e-8, 286.5016, 2.92961e-5, 1.523688, 0.093405, 2.516e-9, 18.6021, 0.5240207766),
            jup: solvePlanet(100.4542, 2.76854e-5, 1.3030, -1.557e-7, 273.8777, 1.64505e-5, 5.202561, 0.048498, 4.469e-9, 19.8950, 0.0830853001),
            sat: solvePlanet(113.6634, 2.38980e-5, 2.4886, -1.081e-7, 339.3939, 2.97661e-5, 9.55475, 0.055546, -9.499e-9, 316.9670, 0.0334442282),
            ura: solvePlanet(74.0005, 1.3978e-5, 0.7733, 1.9e-8, 96.6612, 3.0565e-5, 19.18171, 0.047318, 7.45e-9, 142.5905, 0.011725806),
            nep: solvePlanet(131.7806, 3.0173e-5, 1.7700, -2.55e-7, 272.8461, -6.027e-6, 30.05826, 0.008606, 2.15e-9, 260.2471, 0.005995147),
            plu: solvePlanet(110.3034, 3.79e-5, 17.14175, 3.0e-8, 113.7632, 2.0e-5, 39.4816867, 0.24880766, 0, 14.868, 0.00396)
        };
    }

    const pos1 = getEphemeris(JD);
    const pos2 = getEphemeris(JD + 1);

    const planetMeta = {
        mer: { name: 'Merkür', symbol: '☿', karmic: 'Geçmiş yaşamlarda düşüncelerini ifade edememe veya sözlerini yanlış kullanma tecrübesi. Bu hayatta derin felsefi zihin, kendine has özgün düşünce yapısı ve içsel analitik deha sağlar.' },
        ven: { name: 'Venüs', symbol: '♀', karmic: 'Geçmişte ilişkilerde incinme, hak ettiği değeri görememe veya aşkı feda etme karması. Bu hayatta aşırı seçici bir sevgi dili, sanatsal derinlik ve dış onaydan bağımsız öz saygı inşa etme görevi verir.' },
        mar: { name: 'Mars', symbol: '♂', karmic: 'Geçmişte kontrolsüz öfke, şiddet veya aksine pasif kalma travması. Bu yaşamda öfkeyi bastırmadan dönüştürme, stratejik sabır ve içsel yıkılmaz bir irade geliştirme görevi verir.' },
        jup: { name: 'Jüpiter', symbol: '♃', karmic: 'Geçmişte inançları sorgulama, fanatizmden kaçınma veya ruhsal öğretmenlik deneyimi. Dışsal dini ritüeller yerine kendi iç ahlakını ve evrensel bilgeliğini rehber edinmeyi sağlar.' },
        sat: { name: 'Satürn', symbol: '♄', karmic: 'Büyük karmik sorumluluk, otoriteyle sınavlar ve geciken başarılar. Çok genç yaşta olgunlaşma, mükemmeliyetçi iç ses ve zamanla kalıcı, sarsılmaz bir usta olma potansiyeli taşır.' },
        ura: { name: 'Uranüs', symbol: '♅', karmic: 'Geleneksel topluma uyum sağlamakta zorlanan asi ruh. Bireysel dehanızı ve özgürlüğünüzü içeriden keşfederek sıradışı icatlar ve fikirler üretme gücü verir.' },
        nep: { name: 'Neptün', symbol: '♆', karmic: 'Ruhsal illüzyonlar, kurban-kurtarıcı rolleri ve aşırı hassasiyet karması. Dünyanın yalanlarına kanmayan, güçlü bir sezgisel radar ve mistik şifacılık kazandırır.' },
        plu: { name: 'Plüton', symbol: '♇', karmic: 'Güç savaşları, kontrol takıntısı ve derin travmalarla yüzleşme. Kendi gölgeleriyle yüzleşen, krizleri güce çeviren muazzam bir psikolojik simyacı gücü verir.' }
    };

    let retroKeys = [];
    let gridHtml = "";

    Object.keys(planetMeta).forEach(k => {
        let delta = pos2[k] - pos1[k];
        if (delta < -180) delta += 360;
        if (delta > 180) delta -= 360;
        const isRetro = delta < 0;

        if (isRetro) retroKeys.push(k);

        const lonVal = pos1[k];
        const sIdx = Math.floor(lonVal / 30) % 12;
        const deg = Math.floor(lonVal % 30);
        const min = Math.floor((lonVal % 1) * 60);

        const stateBadge = isRetro 
            ? `<span class="hc-br-badge hc-br-retro">℞ Retro (Geri)</span>` 
            : `<span class="hc-br-badge hc-br-direct"> Direkt (İleri)</span>`;

        gridHtml += `
            <div class="hc-br-card ${isRetro ? 'is-retro' : ''}">
                <div class="hc-br-card-header">
                    <span class="hc-br-card-title">${planetMeta[k].symbol} ${planetMeta[k].name}</span>
                    ${stateBadge}
                </div>
                <div class="hc-br-card-sign">${symbols[sIdx]} ${burclar[sIdx]} (${deg}° ${min}')</div>
            </div>
        `;
    });

    let summaryTitle = "";
    let summaryDesc = "";
    if (retroKeys.length === 0) {
        summaryTitle = "0 Retro Gezegen — Saf Dışa Dönük Eylem";
        summaryDesc = "Doğum haritanızda hiçbir gezegen geri harekette değil! Enerjinizi doğrudan dış dünyaya yansıtır, kararlarınızı hızlı alır ve geçmiş karmik engellere takılmadan ileriye doğru akarsınız.";
    } else if (retroKeys.length <= 2) {
        summaryTitle = `${retroKeys.length} Retro Gezegen — Dengeli Karmik Odak`;
        summaryDesc = `Haritanızda ${retroKeys.length} adet retro gezegen bulunuyor. Bu gezegenlerin temsil ettiği alanlarda derin bir içsel zenginliğe, özgün düşünceye ve sindirerek öğrenilen özel yeteneklere sahipsiniz.`;
    } else if (retroKeys.length <= 4) {
        summaryTitle = `${retroKeys.length} Retro Gezegen — Yoğun İçe Dönük Bilgelik`;
        summaryDesc = `Haritanızda ${retroKeys.length} adet retro gezegen var. Dış dünyanın standart kalıplarını kolayca kabul etmez, her konuyu kendi vicdan ve akıl filtrenizden geçirirsiniz. Eski bir ruhun derin tefekkür yapısına sahipsiniz.`;
    } else {
        summaryTitle = `${retroKeys.length} Retro Gezegen — Yüksek Karmik Uyanış & Dönüşüm`;
        summaryDesc = `Haritanızda ${retroKeys.length} adet retro gezegen bulunuyor! Bu nadir tablo, bu yaşama çok sayıda karmik dersi tamamlamak ve derin bir içsel dönüşüm yaşamak için geldiğinizi gösterir.`;
    }

    let summaryCardHtml = `
        <div class="hc-br-count-badge">${retroKeys.length} Adet Retro Gezegen</div>
        <div class="hc-br-summary-title">${summaryTitle}</div>
        <div class="hc-br-summary-desc">${summaryDesc}</div>
    `;

    let detailsHtml = "";
    if (retroKeys.length === 0) {
        detailsHtml = `<p class="hc-br-no-retro">Haritanızda retro gezegen bulunmadığı için karmik gecikmeler yerine doğrudan dışsal eylem kanallarınız açıktır.</p>`;
    } else {
        retroKeys.forEach(k => {
            detailsHtml += `
                <div class="hc-br-detail-box">
                    <div class="hc-br-detail-title">${planetMeta[k].symbol} ${planetMeta[k].name} Retro Analizi</div>
                    <div class="hc-br-detail-text">${planetMeta[k].karmic}</div>
                </div>
            `;
        });
    }

    document.getElementById('hc-br-summary').innerHTML = summaryCardHtml;
    document.getElementById('hc-br-grid').innerHTML = gridHtml;
    document.getElementById('hc-br-details').innerHTML = detailsHtml;

    document.getElementById('hc-birth-retro-result').classList.add('visible');
    document.getElementById('hc-birth-retro-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

