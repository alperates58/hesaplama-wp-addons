function hcCinElementUyumuHesapla() {
    const d1Str = document.getElementById('hc-ceu-date1').value;
    const d2Str = document.getElementById('hc-ceu-date2').value;

    if (!d1Str || !d2Str) {
        alert('Lütfen her iki doğum tarihini de girin.');
        return;
    }

    const elements = ["Ahşap", "Ateş", "Toprak", "Metal", "Su"];
    const elemIcons = ["🌳", "🔥", "⛰️", "⚔️", "💧"];

    function getElementInfo(dStr) {
        const parts = dStr.split('-').map(Number);
        let y = parts[0], m = parts[1], d = parts[2];
        if (m === 1 || (m === 2 && d < 4)) y -= 1;

        const lastDigit = y % 10;
        let idx = 0;
        if (lastDigit === 4 || lastDigit === 5) idx = 0; // Ahşap
        else if (lastDigit === 6 || lastDigit === 7) idx = 1; // Ateş
        else if (lastDigit === 8 || lastDigit === 9) idx = 2; // Toprak
        else if (lastDigit === 0 || lastDigit === 1) idx = 3; // Metal
        else idx = 4; // Su

        const polarity = (lastDigit % 2 === 0) ? "Yang (+)" : "Yin (-)";
        return { name: elements[idx], icon: elemIcons[idx], idx: idx, polarity: polarity };
    }

    const e1 = getElementInfo(d1Str);
    const e2 = getElementInfo(d2Str);

    // Sheng cycle: idx -> (idx + 1) % 5
    // Ke cycle: idx -> (idx + 2) % 5
    let score = 75;
    let sSheng = 75, sKe = 75, sYinYang = (e1.polarity !== e2.polarity ? 95 : 85), sFlow = 80;
    let title = "";
    let desc = "";

    if (e1.idx === e2.idx) {
        score = 88;
        sSheng = 85; sKe = 90; sFlow = 90;
        title = `Çifte Element Rezonansı (${e1.name} & ${e2.name})`;
        desc = `İkiniz de <strong>${e1.name}</strong> elementine sahipsiniz! Aynı doğal frekansta titreşirsiniz. Birbirinizin tepkilerini ve yaşam tarzını çok iyi anlarsınız. Rekabetten kaçınıp ortak hedeflere odaklandığınızda sarsılmaz bir güç olursunuz.`;
    } else if ((e1.idx + 1) % 5 === e2.idx) {
        score = 98;
        sSheng = 100; sKe = 95; sFlow = 98;
        title = `Sheng Döngüsü (1. Kişi 2. Kişiyi Besliyor)`;
        desc = `<strong>${e1.name}</strong> elementi, <strong>${e2.name}</strong> elementini üretir ve besler (Sheng döngüsü). 1. partnerin enerjisi, 2. partnere ilham, güç ve bereket kazandırır. Harika bir karşılıklı cömertlik ve uyum vardır.`;
    } else if ((e2.idx + 1) % 5 === e1.idx) {
        score = 98;
        sSheng = 100; sKe = 95; sFlow = 98;
        title = `Sheng Döngüsü (2. Kişi 1. Kişiyi Besliyor)`;
        desc = `<strong>${e2.name}</strong> elementi, <strong>${e1.name}</strong> elementini besler ve güçlendirir. Çok cömert, destekleyici ve bereketli bir ortaklıktır. Birbirinizin hayatını sürekli büyütürsünüz.`;
    } else if ((e1.idx + 2) % 5 === e2.idx) {
        score = 65;
        sSheng = 60; sKe = 60; sFlow = 70;
        title = "Ke Döngüsü (Kontrol ve Şekillendirme)";
        desc = `<strong>${e1.name}</strong> elementi, <strong>${e2.name}</strong> elementini kontrol eder/sınırlar (Ke döngüsü). Bu dinamik bir usta-çırak ilişkisi gibi şekillendirici olabilir; karşılıklı anlayışla dengelendiğinde ilişkiye büyük bir disiplin ve olgunluk katar.`;
    } else if ((e2.idx + 2) % 5 === e1.idx) {
        score = 65;
        sSheng = 60; sKe = 60; sFlow = 70;
        title = "Ke Döngüsü (Denge ve Disiplin Sınavı)";
        desc = `<strong>${e2.name}</strong> elementi, <strong>${e1.name}</strong> elementini dengeler ve sınırlar. Sabırlı ve açık iletişimle yaklaşıldığında birbirinizin aşırılıklarını törpüleyen bilge bir birliktelik doğar.`;
    } else {
        score = 80;
        sSheng = 80; sKe = 80; sFlow = 82;
        title = "Nötr & Bağımsız Element Etkileşimi";
        desc = `Elementleriniz arasında doğrudan bir baskı veya tüketim döngüsü yoktur. İlişkinizi kendi karşılıklı sevgi ve çabanızla özgürce inşa edersiniz.`;
    }

    const heroHtml = `
        <div class="hc-cbe-hero-card">
            <div class="hc-cbe-hero-badge">${title}</div>
            <div class="hc-cbe-hero-title">%${score} Wu Xing Elementel Uyum</div>
            <p class="hc-cbe-hero-sub">1. Kişi: <strong>${e1.icon} ${e1.name}</strong> (${e1.polarity}) ⇄ 2. Kişi: <strong>${e2.icon} ${e2.name}</strong> (${e2.polarity})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-cbe-dim-card">
            <div class="hc-cbe-dim-head"><span>🌱 Sheng (Üretim & Karşılıklı Besleme)</span><span>%${sSheng}</span></div>
            <div class="hc-cbe-dim-bar"><div class="hc-cbe-dim-fill" style="width: ${sSheng}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-cbe-dim-card">
            <div class="hc-cbe-dim-head"><span>⚖️ Ke (Kontrol & Denge Mekanizması)</span><span>%${sKe}</span></div>
            <div class="hc-cbe-dim-bar"><div class="hc-cbe-dim-fill" style="width: ${sKe}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-cbe-dim-card">
            <div class="hc-cbe-dim-head"><span>☯️ Yin - Yang Polarite Uyumu</span><span>%${sYinYang}</span></div>
            <div class="hc-cbe-dim-bar"><div class="hc-cbe-dim-fill" style="width: ${sYinYang}%; background: #8b5cf6;"></div></div>
        </div>
        <div class="hc-cbe-dim-card">
            <div class="hc-cbe-dim-head"><span>💫 Enerji Akışı & Ruhsal Bereket</span><span>%${sFlow}</span></div>
            <div class="hc-cbe-dim-bar"><div class="hc-cbe-dim-fill" style="width: ${sFlow}%; background: #0ea5e9;"></div></div>
        </div>
    `;

    document.getElementById('hc-cbe-hero').innerHTML = heroHtml;
    document.getElementById('hc-cbe-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-ceu-content').innerHTML = desc;

    document.getElementById('hc-cin-element-uyum-result').classList.add('visible');
    document.getElementById('hc-cin-element-uyum-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

