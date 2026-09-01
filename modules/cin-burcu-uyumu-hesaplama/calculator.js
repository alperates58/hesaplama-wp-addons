function hcCinBurcuUyumuHesapla() {
    const d1Str = document.getElementById('hc-c1-date').value;
    const d2Str = document.getElementById('hc-c2-date').value;

    if (!d1Str || !d2Str) {
        alert("Lütfen her iki kişinin de doğum tarihlerini girin.");
        return;
    }

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    const animalIcons = ["🐀", "🐂", "🐅", "🐇", "🐉", "🐍", "🐎", "🐐", "🐒", "🐓", "🐕", "🐖"];
    const elements = ["Ahşap", "Ateş", "Toprak", "Metal", "Su"];

    function getChineseAstro(dStr) {
        const parts = dStr.split('-').map(Number);
        let y = parts[0], m = parts[1], d = parts[2];
        // If born before ~Feb 4 (Lichun), belongs to previous Chinese year
        if (m === 1 || (m === 2 && d < 4)) {
            y -= 1;
        }

        const animalIdx = (y - 4) % 12;
        const normAnimalIdx = animalIdx < 0 ? animalIdx + 12 : animalIdx;

        // Heavenly stem element: last digit of year
        const lastDigit = y % 10;
        let elemIdx = 0;
        if (lastDigit === 4 || lastDigit === 5) elemIdx = 0; // Ahşap (Wood)
        else if (lastDigit === 6 || lastDigit === 7) elemIdx = 1; // Ateş (Fire)
        else if (lastDigit === 8 || lastDigit === 9) elemIdx = 2; // Toprak (Earth)
        else if (lastDigit === 0 || lastDigit === 1) elemIdx = 3; // Metal
        else elemIdx = 4; // Su (Water)

        const polarity = (lastDigit % 2 === 0) ? "Yang (+)" : "Yin (-)";

        return {
            year: y,
            animal: animals[normAnimalIdx],
            icon: animalIcons[normAnimalIdx],
            animalIdx: normAnimalIdx,
            element: elements[elemIdx],
            polarity: polarity
        };
    }

    const p1 = getChineseAstro(d1Str);
    const p2 = getChineseAstro(d2Str);

    // San He (Triads)
    const triads = [
        [0, 4, 8],  // Fare, Ejderha, Maymun (Su Triadı)
        [1, 5, 9],  // Öküz, Yılan, Horoz (Metal Triadı)
        [2, 6, 10], // Kaplan, At, Köpek (Ateş Triadı)
        [3, 7, 11]  // Tavşan, Keçi, Domuz (Ahşap Triadı)
    ];

    // Liu He (Six Secret Friends)
    const secretFriends = [
        [0, 1],   // Fare - Öküz
        [2, 11],  // Kaplan - Domuz
        [3, 10],  // Tavşan - Köpek
        [4, 9],   // Ejderha - Horoz
        [5, 8],   // Yılan - Maymun
        [6, 7]    // At - Keçi
    ];

    let isTriad = triads.some(t => t.includes(p1.animalIdx) && t.includes(p2.animalIdx));
    let isSecretFriend = secretFriends.some(f => (f[0] === p1.animalIdx && f[1] === p2.animalIdx) || (f[1] === p1.animalIdx && f[0] === p2.animalIdx));
    let diff = Math.abs(p1.animalIdx - p2.animalIdx);

    let score = 75;
    let sSanHe = 75, sLiuHe = 75, sYinYang = (p1.polarity !== p2.polarity ? 95 : 85), sElement = 80;
    let title = "";
    let desc = "";

    if (isSecretFriend) {
        score = 99;
        sSanHe = 98; sLiuHe = 100; sElement = 95;
        title = "Liu He (Kutsal Altılı / Ruh Eşi Uyum)";
        desc = `<strong>${p1.animal}</strong> ve <strong>${p2.animal}</strong> Çin Astrolojisinde birbirinin 'Gizli Ruh Eşi' (Liu He) olarak kabul edilir! Doğal bir manyetik çekim, derin sevgi ve sarsılmaz bir sadakat vardır. Birlikteyken hem zenginlik hem de sonsuz aile huzuru bulurlar.`;
    } else if (isTriad) {
        score = 96;
        sSanHe = 100; sLiuHe = 94; sElement = 92;
        title = "San He (Kozmik Üçlü Uyum / Altın Üçgen)";
        desc = `<strong>${p1.animal}</strong> ve <strong>${p2.animal}</strong> zodyakın aynı mizaç grubundadır (San He). Hayata aynı pencerelerden bakar, ortak hedeflere zahmetsizce koşarlar. Aralarındaki anlayış kusursuzdur.`;
    } else if (p1.animalIdx === p2.animalIdx) {
        score = 88;
        sSanHe = 85; sLiuHe = 85; sElement = 90;
        title = `Aynı Zodyak Hayvanı (${p1.animal} & ${p2.animal})`;
        desc = `İkiniz de <strong>${p1.animal}</strong> burcusunuz! Birbirinizin güçlü ve zayıf taraflarını çok iyi bilirsiniz. İnatlaşmadığınız sürece birbirinizi en iyi anlayan çift olursunuz.`;
    } else if (diff === 6) {
        score = 62;
        sSanHe = 60; sLiuHe = 55; sElement = 70;
        title = "Chong (Zıt Hayvanlar / Dinamik Zıtlık)";
        desc = `<strong>${p1.animal}</strong> ve <strong>${p2.animal}</strong> Çin çemberinde birbirinin tam zıttıdır (Chong). Güçlü bir çekim olsa da mizaç farkları zaman zaman sabır gerektirir. Karşılıklı saygıyla birbirinizin en büyük öğretmeni olursunuz.`;
    } else {
        score = 82;
        sSanHe = 82; sLiuHe = 80; sElement = 84;
        title = "Dengeli ve Uyumlu Doğu-Batı Sinerjisi";
        desc = `<strong>${p1.animal}</strong> ve <strong>${p2.animal}</strong> dengeli ve tamamlayıcı bir ilişki kurarlar. Birbirinizin sınırlarına ve özgürlüğüne saygı duyduğunuzda çok bereketli bir ortaklık yaşarsınız.`;
    }

    const heroHtml = `
        <div class="hc-cz-hero-card">
            <div class="hc-cz-hero-badge">${title}</div>
            <div class="hc-cz-hero-title">%${score} Çin Zodyak Uyumu</div>
            <p class="hc-cz-hero-sub">1. Kişi: <strong>${p1.icon} ${p1.animal}</strong> (${p1.element} / ${p1.polarity}) ⇄ 2. Kişi: <strong>${p2.icon} ${p2.animal}</strong> (${p2.element} / ${p2.polarity})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-cz-dim-card">
            <div class="hc-cz-dim-head"><span>🔺 San He (Üçlü Uyum & Mizaç Birliği)</span><span>%${sSanHe}</span></div>
            <div class="hc-cz-dim-bar"><div class="hc-cz-dim-fill" style="width: ${sSanHe}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-cz-dim-card">
            <div class="hc-cz-dim-head"><span>💖 Liu He (Kadersel Gizli Dostluk)</span><span>%${sLiuHe}</span></div>
            <div class="hc-cz-dim-bar"><div class="hc-cz-dim-fill" style="width: ${sLiuHe}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-cz-dim-card">
            <div class="hc-cz-dim-head"><span>☯️ Yin - Yang Enerji Dengesi</span><span>%${sYinYang}</span></div>
            <div class="hc-cz-dim-bar"><div class="hc-cz-dim-fill" style="width: ${sYinYang}%; background: #8b5cf6;"></div></div>
        </div>
        <div class="hc-cz-dim-card">
            <div class="hc-cz-dim-head"><span>🌱 Beş Element (Wu Xing) Beslenmesi</span><span>%${sElement}</span></div>
            <div class="hc-cz-dim-bar"><div class="hc-cz-dim-fill" style="width: ${sElement}%; background: #10b981;"></div></div>
        </div>
    `;

    document.getElementById('hc-cz-hero').innerHTML = heroHtml;
    document.getElementById('hc-cz-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-cin-details').innerHTML = desc;

    document.getElementById('hc-cin-burcu-uyumu-result').classList.add('visible');
    document.getElementById('hc-cin-burcu-uyumu-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

