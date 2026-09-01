function hcCinAskUyumuHesapla() {
    const d1Str = document.getElementById('hc-cluy-date1').value;
    const d2Str = document.getElementById('hc-cluy-date2').value;

    if (!d1Str || !d2Str) {
        alert('Lütfen her iki doğum tarihini de seçin.');
        return;
    }

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    const animalIcons = ["🐀", "🐂", "🐅", "🐇", "🐉", "🐍", "🐎", "🐐", "🐒", "🐓", "🐕", "🐖"];
    const elements = ["Ahşap", "Ateş", "Toprak", "Metal", "Su"];

    function getAnimal(dStr) {
        const parts = dStr.split('-').map(Number);
        let y = parts[0], m = parts[1], d = parts[2];
        if (m === 1 || (m === 2 && d < 4)) y -= 1;

        const idx = (y - 4) % 12;
        const normIdx = idx < 0 ? idx + 12 : idx;

        const lastDigit = y % 10;
        let elemIdx = 0;
        if (lastDigit === 4 || lastDigit === 5) elemIdx = 0;
        else if (lastDigit === 6 || lastDigit === 7) elemIdx = 1;
        else if (lastDigit === 8 || lastDigit === 9) elemIdx = 2;
        else if (lastDigit === 0 || lastDigit === 1) elemIdx = 3;
        else elemIdx = 4;

        return {
            name: animals[normIdx],
            icon: animalIcons[normIdx],
            index: normIdx,
            element: elements[elemIdx]
        };
    }

    const b1 = getAnimal(d1Str);
    const b2 = getAnimal(d2Str);

    const triads = [
        [0, 4, 8],  // Fare, Ejderha, Maymun
        [1, 5, 9],  // Öküz, Yılan, Horoz
        [2, 6, 10], // Kaplan, At, Köpek
        [3, 7, 11]  // Tavşan, Keçi, Domuz
    ];

    const secretFriends = [
        [0, 1],   // Fare - Öküz
        [2, 11],  // Kaplan - Domuz
        [3, 10],  // Tavşan - Köpek
        [4, 9],   // Ejderha - Horoz
        [5, 8],   // Yılan - Maymun
        [6, 7]    // At - Keçi
    ];

    let isTriad = triads.some(t => t.includes(b1.index) && t.includes(b2.index));
    let isSecretFriend = secretFriends.some(f => (f[0] === b1.index && f[1] === b2.index) || (f[1] === b1.index && f[0] === b2.index));
    let isClash = Math.abs(b1.index - b2.index) === 6;

    let score = 75;
    let sRomance = 75, sLoyalty = 75, sWealth = 75, sHarmony = 75;
    let title = "";
    let desc = "";

    if (isSecretFriend) {
        score = 99;
        sRomance = 98; sLoyalty = 100; sWealth = 96; sHarmony = 98;
        title = "Liu He (Gizli Ruh Eşi Aşkı)";
        desc = `<strong>${b1.name}</strong> ve <strong>${b2.name}</strong> Çin Astrolojisinde birbirine en derin aşk ve sadakatle bağlı olan Liu He çiftidir. Birbirinizin kalbini kelimesiz hisseder, birlikte bolluk, zenginlik ve sonsuz huzur inşa edersiniz.`;
    } else if (isTriad) {
        score = 96;
        sRomance = 95; sLoyalty = 96; sWealth = 98; sHarmony = 94;
        title = "San He (Kozmik Aşk Üçgeni)";
        desc = `<strong>${b1.name}</strong> ve <strong>${b2.name}</strong> zodyakın aynı aşk ve mizaç frekansındadır. Romantik diyaloglarınız çok akıcı, eğlenceli ve tutkuludur. Birlikteyken kendinizi çok şanslı hissedersiniz.`;
    } else if (b1.index === b2.index) {
        score = 88;
        sRomance = 86; sLoyalty = 90; sWealth = 88; sHarmony = 86;
        title = `Aynı Zodyak Hayvanı Aşkı (${b1.name} & ${b2.name})`;
        desc = `İkiniz de <strong>${b1.name}</strong> burcusunuz. Birbirinizin romantik beklentilerini çok iyi bilirsiniz. Aşkınız derin ve karşılıklı anlayışla doludur.`;
    } else if (isClash) {
        score = 62;
        sRomance = 70; sLoyalty = 65; sWealth = 60; sHarmony = 55;
        title = "Zıt Kutupların Manyetik Aşkı (Chong)";
        desc = `<strong>${b1.name}</strong> ve <strong>${b2.name}</strong> zodyakta birbirinin tam karşısındadır. Büyük bir çekim ve tutku olsa da zaman zaman inatlaşmalar yaşanabilir. Karşılıklı hoşgörüyle bu ilişki eşsiz bir olgunluğa evrilir.`;
    } else {
        score = 82;
        sRomance = 82; sLoyalty = 84; sWealth = 80; sHarmony = 82;
        title = "Uyumlu ve Dengeli Doğu Aşkı";
        desc = `<strong>${b1.name}</strong> ve <strong>${b2.name}</strong> aşkta birbirini tamamlayan güzel bir dengeye sahiptir. Birbirinizin özgürlüğüne saygı duyarak aşkı her gün taze tutabilirsiniz.`;
    }

    const heroHtml = `
        <div class="hc-cla-hero-card">
            <div class="hc-cla-hero-badge">${title}</div>
            <div class="hc-cla-hero-title">%${score} Çin Astrolojisi Aşk Skoru</div>
            <p class="hc-cla-hero-sub">1. Kişi: <strong>${b1.icon} ${b1.name}</strong> (${b1.element}) ⇄ 2. Kişi: <strong>${b2.icon} ${b2.name}</strong> (${b2.element})</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-cla-dim-card">
            <div class="hc-cla-dim-head"><span>💖 Romantik Çekim & Flört</span><span>%${sRomance}</span></div>
            <div class="hc-cla-dim-bar"><div class="hc-cla-dim-fill" style="width: ${sRomance}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-cla-dim-card">
            <div class="hc-cla-dim-head"><span>💍 Sadakat & Evlilik Temeli</span><span>%${sLoyalty}</span></div>
            <div class="hc-cla-dim-bar"><div class="hc-cla-dim-fill" style="width: ${sLoyalty}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-cla-dim-card">
            <div class="hc-cla-dim-head"><span>💰 Birlikte Zenginleşme & Bereket</span><span>%${sWealth}</span></div>
            <div class="hc-cla-dim-bar"><div class="hc-cla-dim-fill" style="width: ${sWealth}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-cla-dim-card">
            <div class="hc-cla-dim-head"><span>🕊️ Huzur & Karşılıklı Hoşgörü</span><span>%${sHarmony}</span></div>
            <div class="hc-cla-dim-bar"><div class="hc-cla-dim-fill" style="width: ${sHarmony}%; background: #8b5cf6;"></div></div>
        </div>
    `;

    document.getElementById('hc-cla-hero').innerHTML = heroHtml;
    document.getElementById('hc-cla-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-cluy-content').innerHTML = desc;

    document.getElementById('hc-cin-love-uyum-result').classList.add('visible');
    document.getElementById('hc-cin-love-uyum-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

