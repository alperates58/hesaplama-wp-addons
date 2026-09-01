function hc13BurcHesapla() {
    const dStr = document.getElementById('hc-13b-date').value;

    if (!dStr) {
        alert('Lütfen doğum tarihinizi seçin.');
        return;
    }

    const parts = dStr.split('-').map(Number);
    const m = parts[1], d = parts[2];

    // Klasik 12 Burç
    let classicSign = "Oğlak", classicIcon = "♑";
    if ((m == 3 && d >= 21) || (m == 4 && d <= 19)) { classicSign = "Koç"; classicIcon = "♈"; }
    else if ((m == 4 && d >= 20) || (m == 5 && d <= 20)) { classicSign = "Boğa"; classicIcon = "♉"; }
    else if ((m == 5 && d >= 21) || (m == 6 && d <= 20)) { classicSign = "İkizler"; classicIcon = "♊"; }
    else if ((m == 6 && d >= 21) || (m == 7 && d <= 22)) { classicSign = "Yengeç"; classicIcon = "♋"; }
    else if ((m == 7 && d >= 23) || (m == 8 && d <= 22)) { classicSign = "Aslan"; classicIcon = "♌"; }
    else if ((m == 8 && d >= 23) || (m == 9 && d <= 22)) { classicSign = "Başak"; classicIcon = "♍"; }
    else if ((m == 9 && d >= 23) || (m == 10 && d <= 22)) { classicSign = "Terazi"; classicIcon = "♎"; }
    else if ((m == 10 && d >= 23) || (m == 11 && d <= 21)) { classicSign = "Akrep"; classicIcon = "♏"; }
    else if ((m == 11 && d >= 22) || (m == 12 && d <= 21)) { classicSign = "Yay"; classicIcon = "♐"; }
    else if ((m == 12 && d >= 22) || (m == 1 && d <= 19)) { classicSign = "Oğlak"; classicIcon = "♑"; }
    else if ((m == 1 && d >= 20) || (m == 2 && d <= 18)) { classicSign = "Kova"; classicIcon = "♒"; }
    else { classicSign = "Balık"; classicIcon = "♓"; }

    // 13 Burç (IAU Astronomik Takımyıldız Sınırları)
    const consts = [
        { name: "Oğlak (Capricornus)", icon: "♑", start: [1, 20], end: [2, 16], days: "28 Gün", desc: "Disiplinli, sorumluluk sahibi ve gerçekçi kış enerjisi." },
        { name: "Kova (Aquarius)", icon: "♒", start: [2, 16], end: [3, 11], days: "24 Gün", desc: "Yenilikçi, özgür ruhlu ve kolektif zeka odaklı." },
        { name: "Balık (Pisces)", icon: "♓", start: [3, 11], end: [4, 18], days: "38 Gün", desc: "Sonsuz empati, sanatsal ilham ve derin mistik sezgiler." },
        { name: "Koç (Aries)", icon: "♈", start: [4, 18], end: [5, 13], days: "25 Gün", desc: "Saf eylem, cesaret ve engelleri aşma iradesi." },
        { name: "Boğa (Taurus)", icon: "♉", start: [5, 13], end: [6, 21], days: "39 Gün", desc: "Doğanın en verimli, sağlam ve estetik haz dönemi." },
        { name: "İkizler (Gemini)", icon: "♊", start: [6, 21], end: [7, 20], days: "29 Gün", desc: "Zihinsel çeviklik, hızlı öğrenme ve güçlü iletişim." },
        { name: "Yengeç (Cancer)", icon: "♋", start: [7, 20], end: [8, 10], days: "21 Gün", desc: "Derin aile bağları, koruyuculuk ve duygusal zeka." },
        { name: "Aslan (Leo)", icon: "♌", start: [8, 10], end: [9, 16], days: "37 Gün", desc: "Parlayan yaratıcılık, liderlik ve sahne karizması." },
        { name: "Başak (Virgo)", icon: "♍", start: [9, 16], end: [10, 30], days: "44 Gün", desc: "Zodyak'ın en geniş takımyıldızı; analiz, şifa ve kusursuz düzen." },
        { name: "Terazi (Libra)", icon: "♎", start: [10, 30], end: [11, 23], days: "24 Gün", desc: "Evrensel adalet, diplomasi, zarafet ve denge arayışı." },
        { name: "Akrep (Scorpius)", icon: "♏", start: [11, 23], end: [11, 29], days: "6 Gün", desc: "En dar takımyıldız koridoru; son derece konsantre tutku ve stratejik güç." },
        { name: "Yılan (Ophiuchus - 13. Burç)", icon: "⛎", start: [11, 29], end: [12, 17], days: "18 Gün", desc: "Geleneksel astrolojide saklanan 13. burç! Şifacılık, evrensel sırlar, karizma ve simya gücü." },
        { name: "Yay (Sagittarius)", icon: "♐", start: [12, 17], end: [1, 20], days: "34 Gün", desc: "Büyük felsefi vizyon, keşif aşkı ve sınırları aşan bilgelik." }
    ];

    let astronSign = consts[0];
    for (let c of consts) {
        if (c.start[0] === c.end[0]) {
            if (m === c.start[0] && d >= c.start[1] && d < c.end[1]) { astronSign = c; break; }
        } else if (c.start[0] > c.end[0]) { // Yıl geçişi (Aralık-Ocak)
            if ((m === c.start[0] && d >= c.start[1]) || (m === c.end[0] && d < c.end[1])) { astronSign = c; break; }
        } else {
            if ((m === c.start[0] && d >= c.start[1]) || (m === c.end[0] && d < c.end[1])) { astronSign = c; break; }
        }
    }

    const heroHtml = `
        <div class="hc-13b-hero-card">
            <div class="hc-13b-hero-badge">🌌 IAU Astronomik Takımyıldız Hizalanması</div>
            <div class="hc-13b-hero-title">${astronSign.icon} ${astronSign.name}</div>
            <p class="hc-13b-hero-sub">${astronSign.desc} (Güneş bu takımyıldızda <strong>${astronSign.days}</strong> kalır)</p>
        </div>
    `;

    const compareHtml = `
        <div class="hc-13b-compare-card">
            <div class="hc-13b-box">
                <span class="hc-13b-box-label">Geleneksel 12 Burç</span>
                <strong>${classicIcon} ${classicSign}</strong>
                <small>Eşit 30° Mevsimsel Dilim</small>
            </div>
            <div class="hc-13b-box-arrow">➔</div>
            <div class="hc-13b-box hc-13b-active">
                <span class="hc-13b-box-label">Gerçek 13 Takımyıldız</span>
                <strong>${astronSign.icon} ${astronSign.name.split(' ')[0]}</strong>
                <small>Gerçek Gökyüzü Sınırları</small>
            </div>
        </div>
    `;

    const descHtml = `
        <p><strong>13. Burç Ophiuchus (Yılan Burcu) Nedir?</strong> Güneş her yıl 29 Kasım - 17 Aralık tarihleri arasında gökyüzünde <strong>Ophiuchus (Yılancı)</strong> takımyıldızının sınırlarından geçer. Antik Babilliler takvimi 12 aya bölmek için bu 13. takımyıldızı sistemin dışında bırakmıştır.</p>
        <p><strong>Neden Tarihler Farklı?</strong> Klasik astroloji gökyüzünü yapay olarak 30'ar derecelik 12 eşit parçaya böler. Ancak gerçekte takımyıldızların boyutları farklıdır (örneğin Başak 44 gün sürerken Akrep sadece 6 gün sürer). 13 burç sistemi, Güneş'in gökyüzündeki gerçek fiziksel geçiş zamanlarını yansıtır.</p>
    `;

    document.getElementById('hc-13b-hero').innerHTML = heroHtml;
    document.getElementById('hc-13b-compare').innerHTML = compareHtml;
    document.getElementById('hc-13b-desc').innerHTML = descHtml;

    document.getElementById('hc-on-uc-burc-result').classList.add('visible');
    document.getElementById('hc-on-uc-burc-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

