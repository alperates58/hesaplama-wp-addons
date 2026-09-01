function hcCinUyumuHesapla() {
    const b1 = document.getElementById('hc-cin-sel1').value;
    const b2 = document.getElementById('hc-cin-sel2').value;

    const animals = ["Fare", "Öküz", "Kaplan", "Tavşan", "Ejderha", "Yılan", "At", "Keçi", "Maymun", "Horoz", "Köpek", "Domuz"];
    const animalIcons = ["🐀", "🐂", "🐅", "🐇", "🐉", "🐍", "🐎", "🐐", "🐒", "🐓", "🐕", "🐖"];

    const idx1 = animals.indexOf(b1);
    const idx2 = animals.indexOf(b2);

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

    let isTriad = triads.some(t => t.includes(idx1) && t.includes(idx2));
    let isSecretFriend = secretFriends.some(f => (f[0] === idx1 && f[1] === idx2) || (f[1] === idx1 && f[0] === idx2));
    let isClash = Math.abs(idx1 - idx2) === 6;

    let score = 75;
    let sSanHe = 75, sLiuHe = 75, sEnergy = 80, sLongTerm = 78;
    let title = "";
    let desc = "";

    if (isSecretFriend) {
        score = 99;
        sSanHe = 98; sLiuHe = 100; sEnergy = 96; sLongTerm = 99;
        title = "Liu He (Gizli Dost / En Yüksek Kadersel Uyum)";
        desc = `<strong>${b1}</strong> ve <strong>${b2}</strong> Çin Astrolojisinde birbirinin 'Gizli Dostu' (Liu He) olarak adlandırılır. Karşılıklı sarsılmaz bir güven, derin bir sevgi ve sonsuz sadakat vardır. Birlikteyken hem maddi hem manevi büyük bir berekete ulaşırsınız.`;
    } else if (isTriad) {
        score = 96;
        sSanHe = 100; sLiuHe = 94; sEnergy = 95; sLongTerm = 96;
        title = "San He (Kozmik Üçlü Uyum / Altın Müttefikler)";
        desc = `<strong>${b1}</strong> ve <strong>${b2}</strong> zodyakın aynı mizaç ve yaşam tarzı grubundadır (San He). Birbirinizin hedeflerini, düşüncelerini ve tepkilerini zahmetsizce anlar ve her zaman tam destek verirsiniz.`;
    } else if (idx1 === idx2) {
        score = 88;
        sSanHe = 85; sLiuHe = 85; sEnergy = 88; sLongTerm = 86;
        title = `Aynı Zodyak Hayvanı (${b1} & ${b2})`;
        desc = `İkiniz de <strong>${b1}</strong> burcusunuz! Karakterleriniz ve tepkileriniz birbirine ayna tutar. İnatlaşmak yerine anlayışla yaklaştığınızda çok güçlü ve dayanıklı bir ortaklık kurarsınız.`;
    } else if (isClash) {
        score = 62;
        sSanHe = 60; sLiuHe = 55; sEnergy = 70; sLongTerm = 60;
        title = "Chong (Zıt Kutuplar / Büyüten Zıtlık)";
        desc = `<strong>${b1}</strong> ve <strong>${b2}</strong> Çin zodyakında birbirinin tam karşısındadır. Birbirinizi hem çok çekici bulur hem de zaman zaman mizaç çatışması yaşayabilirsiniz. Sabır ve saygıyla birbirinizi tamamlayacak eşsiz bir olgunluğa erişebilirsiniz.`;
    } else {
        score = 80;
        sSanHe = 80; sLiuHe = 80; sEnergy = 82; sLongTerm = 80;
        title = "Dengeli ve Tamamlayıcı Doğu Uyumu";
        desc = `<strong>${b1}</strong> ve <strong>${b2}</strong> dengeli ve barışçıl bir ilişki yürütür. Birbirinizin sınırlarına saygı duyduğunuzda çok huzurlu ve uzun ömürlü bir bağ oluşturursunuz.`;
    }

    const heroHtml = `
        <div class="hc-ca-hero-card">
            <div class="hc-ca-hero-badge">${title}</div>
            <div class="hc-ca-hero-title">%${score} Çin Astrolojisi Uyumu</div>
            <p class="hc-ca-hero-sub">1. Kişi: <strong>${animalIcons[idx1]} ${b1}</strong> ⇄ 2. Kişi: <strong>${animalIcons[idx2]} ${b2}</strong></p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-ca-dim-card">
            <div class="hc-ca-dim-head"><span>🔺 San He (Mizaç & Üçlü Uyum)</span><span>%${sSanHe}</span></div>
            <div class="hc-ca-dim-bar"><div class="hc-ca-dim-fill" style="width: ${sSanHe}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-ca-dim-card">
            <div class="hc-ca-dim-head"><span>💖 Liu He (Kadersel Gizli Çekim)</span><span>%${sLiuHe}</span></div>
            <div class="hc-ca-dim-bar"><div class="hc-ca-dim-fill" style="width: ${sLiuHe}%; background: #ec4899;"></div></div>
        </div>
        <div class="hc-ca-dim-card">
            <div class="hc-ca-dim-head"><span>☯️ Günlük İletişim & Enerji Dengesi</span><span>%${sEnergy}</span></div>
            <div class="hc-ca-dim-bar"><div class="hc-ca-dim-fill" style="width: ${sEnergy}%; background: #8b5cf6;"></div></div>
        </div>
        <div class="hc-ca-dim-card">
            <div class="hc-ca-dim-head"><span>🏛️ Uzun Vadeli Birliktelik & Bereket</span><span>%${sLongTerm}</span></div>
            <div class="hc-ca-dim-bar"><div class="hc-ca-dim-fill" style="width: ${sLongTerm}%; background: #10b981;"></div></div>
        </div>
    `;

    document.getElementById('hc-ca-hero').innerHTML = heroHtml;
    document.getElementById('hc-ca-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-cin-u-desc').innerHTML = desc;

    document.getElementById('hc-cin-u-result').classList.add('visible');
    document.getElementById('hc-cin-u-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

