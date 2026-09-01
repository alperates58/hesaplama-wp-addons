function hcCinBurcuHesapla() {
    const dateStr = document.getElementById('hc-cin-date').value;
    const timeStr = document.getElementById('hc-cin-time').value || '12:00';

    if (!dateStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const d = new Date(dateStr);
    let year = d.getFullYear();
    const month = d.getMonth() + 1;
    const day = d.getDate();

    // Çin Yeni Yılı Kesiti (Güneşsel Li Chun / Ay Yeni Yılı genelde 4 Şubat civarı)
    if (month < 2 || (month === 2 && day < 4)) {
        year -= 1;
    }

    const animals = [
        { name: "Fare", emoji: "🐀", fixedElem: "Su", polarity: "Yang", luckyNums: "2, 3", luckyColors: "Mavi, Altın", trine: "Ejderha, Maymun", clash: "At", desc: "Zeki, pratik, krizleri anında fırsata çeviren ve sosyal zekası çok yüksek bir lider." },
        { name: "Öküz", emoji: "🐂", fixedElem: "Toprak", polarity: "Yin", luckyNums: "1, 4", luckyColors: "Beyaz, Yeşil", trine: "Yılan, Horoz", clash: "Keçi", desc: "Sarsılmaz sabır, disiplin, güvenilirlik ve hedefine emin adımlarla ulaşan azim." },
        { name: "Kaplan", emoji: "🐅", fixedElem: "Ağaç", polarity: "Yang", luckyNums: "1, 3, 4", luckyColors: "Mavi, Turuncu", trine: "At, Köpek", clash: "Maymun", desc: "Cesur, karizmatik, risk almaktan çekinmeyen ve bağımsızlığına düşkün öncü ruh." },
        { name: "Tavşan", emoji: "🐇", fixedElem: "Ağaç", polarity: "Yin", luckyNums: "3, 4, 6", luckyColors: "Pembe, Kırmızı", trine: "Keçi, Domuz", clash: "Horoz", desc: "Zarif, barışçıl, estetik duygusu gelişmiş, sezgisel ve diplomatik bir bilge." },
        { name: "Ejderha", emoji: "🐉", fixedElem: "Toprak", polarity: "Yang", luckyNums: "1, 6, 7", luckyColors: "Altın, Gümüş", trine: "Fare, Maymun", clash: "Köpek", desc: "Kudretli, vizyoner, şans enerjisi yüksek ve kitleleri peşinden sürükleyen görkemli lider." },
        { name: "Yılan", emoji: "🐍", fixedElem: "Ateş", polarity: "Yin", luckyNums: "2, 8, 9", luckyColors: "Siyah, Kırmızı", trine: "Öküz, Horoz", clash: "Domuz", desc: "Derin sezgiler, gizem, stratejik akıl ve finansal konularda usta gözlemcilik." },
        { name: "At", emoji: "🐎", fixedElem: "Ateş", polarity: "Yang", luckyNums: "2, 3, 7", luckyColors: "Sarı, Yeşil", trine: "Kaplan, Köpek", clash: "Fare", desc: "Özgür ruhlu, dinamik, durdurulamaz enerjiye sahip ve seyahat tutkunu gezgin." },
        { name: "Keçi", emoji: "🐐", fixedElem: "Toprak", polarity: "Yin", luckyNums: "2, 7", luckyColors: "Mor, Kahverengi", trine: "Tavşan, Domuz", clash: "Öküz", desc: "Sanatçı ruhlu, merhametli, nazik ve güzelliği hayatın merkezine koyan şifacı." },
        { name: "Maymun", emoji: "🐒", fixedElem: "Metal", polarity: "Yang", luckyNums: "4, 9", luckyColors: "Beyaz, Mavi", trine: "Fare, Ejderha", clash: "Kaplan", desc: "Kıvrak zekalı, yenilikçi, meraklı ve en zor problemleri oyuna çeviren dahi." },
        { name: "Horoz", emoji: "🐓", fixedElem: "Metal", polarity: "Yin", luckyNums: "5, 7, 8", luckyColors: "Altın, Sarı", trine: "Öküz, Yılan", clash: "Tavşan", desc: "Düzenli, titiz, dürüst, sözünün eri ve girdikleri ortamda parlayan vizyoner." },
        { name: "Köpek", emoji: "🐕", fixedElem: "Toprak", polarity: "Yang", luckyNums: "3, 4, 9", luckyColors: "Yeşil, Kırmızı", trine: "Kaplan, At", clash: "Ejderha", desc: "Sadık, adalet savaşçısı, samimi ve sevdiklerini canı pahasına koruyan güven timsali." },
        { name: "Domuz", emoji: "🐖", fixedElem: "Su", polarity: "Yin", luckyNums: "2, 5, 8", luckyColors: "Sarı, Gri", trine: "Tavşan, Keçi", clash: "Yılan", desc: "Cömert, hoşgörülü, hayatın tadını çıkaran ve bereket enerjisini kendine çeken ruh." }
    ];

    // 10 Göksel Kök (Heavenly Stems) -> 5 Element + Polarite
    const elements10 = [
        { elem: "Metal", polarity: "Yang", color: "#64748b" },
        { elem: "Metal", polarity: "Yin", color: "#94a3b8" },
        { elem: "Su", polarity: "Yang", color: "#0284c7" },
        { elem: "Su", polarity: "Yin", color: "#38bdf8" },
        { elem: "Ağaç", polarity: "Yang", color: "#16a34a" },
        { elem: "Ağaç", polarity: "Yin", color: "#4ade80" },
        { elem: "Ateş", polarity: "Yang", color: "#dc2626" },
        { elem: "Ateş", polarity: "Yin", color: "#f87171" },
        { elem: "Toprak", polarity: "Yang", color: "#d97706" },
        { elem: "Toprak", polarity: "Yin", color: "#fbbf24" }
    ];

    // Yıl Hayvanı & Elementi
    const yearAnimalIndex = (year - 4) % 12;
    const yAnimal = animals[yearAnimalIndex < 0 ? yearAnimalIndex + 12 : yearAnimalIndex];
    const yStem = elements10[Math.abs(year % 10)];

    // Ay Hayvanı (Month Branch)
    const monthAnimals = [
        animals[1], animals[2], animals[3], animals[4],
        animals[5], animals[6], animals[7], animals[8],
        animals[9], animals[10], animals[11], animals[0]
    ];
    const mAnimal = monthAnimals[(month - 1) % 12];

    // Saat Hayvanı (Hour Branch)
    const [hStr] = timeStr.split(':');
    const hour = parseInt(hStr, 10);
    let hourAnimalIndex = 0;
    if (hour >= 23 || hour < 1) hourAnimalIndex = 0; // Fare
    else if (hour < 3) hourAnimalIndex = 1; // Öküz
    else if (hour < 5) hourAnimalIndex = 2; // Kaplan
    else if (hour < 7) hourAnimalIndex = 3; // Tavşan
    else if (hour < 9) hourAnimalIndex = 4; // Ejderha
    else if (hour < 11) hourAnimalIndex = 5; // Yılan
    else if (hour < 13) hourAnimalIndex = 6; // At
    else if (hour < 15) hourAnimalIndex = 7; // Keçi
    else if (hour < 17) hourAnimalIndex = 8; // Maymun
    else if (hour < 19) hourAnimalIndex = 9; // Horoz
    else if (hour < 21) hourAnimalIndex = 10; // Köpek
    else hourAnimalIndex = 11; // Domuz
    const hAnimal = animals[hourAnimalIndex];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">🇨🇳 Çin Astrolojisi Haritanız (${year})</div>
            <div class="hc-num-title">${yAnimal.emoji} ${yStem.polarity} ${yStem.elem} ${yAnimal.name}</div>
            <p class="hc-num-sub">Sabit Elementi: <strong>${yAnimal.fixedElem}</strong> | Kutup: <strong>${yAnimal.polarity}</strong></p>
        </div>
    `;

    const pillarsHtml = `
        <div class="hc-pillar-card">
            <div class="hc-pil-tag">📅 Yıl Sütunu (Sosyal / Atalar)</div>
            <div class="hc-pil-val">${yAnimal.emoji} ${yStem.elem} ${yAnimal.name}</div>
            <p class="hc-pil-sub">Dış dünyadaki ilk algınız ve kuşaksal şansınız.</p>
        </div>

        <div class="hc-pillar-card">
            <div class="hc-pil-tag">🏢 Ay Sütunu (Kariyer / Ebeveynler)</div>
            <div class="hc-pil-val">${mAnimal.emoji} ${mAnimal.name}</div>
            <p class="hc-pil-sub">Mesleki hırslarınız ve iş hayatındaki tarzınız.</p>
        </div>

        <div class="hc-pillar-card">
            <div class="hc-pil-tag">⏳ Saat Sütunu (Gizli Benlik / Çocuklar)</div>
            <div class="hc-pil-val">${hAnimal.emoji} ${hAnimal.name}</div>
            <p class="hc-pil-sub">İç dünyanız, saklı yetenekleriniz ve yaşlılık evresi.</p>
        </div>
    `;

    const elemBarsHtml = `
        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>🌲 Ağaç (Büyüme, Yaratıcılık)</span> <strong>%25</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: 25%; background: #16a34a;"></div></div>
        </div>
        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>🔥 Ateş (Tutku, Liderlik)</span> <strong>%20</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: 20%; background: #dc2626;"></div></div>
        </div>
        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>⛰️ Toprak (İstikrar, Besleyicilik)</span> <strong>%30</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: 30%; background: #d97706;"></div></div>
        </div>
        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>⚔️ Metal (Disiplin, Adalet)</span> <strong>%15</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: 15%; background: #64748b;"></div></div>
        </div>
        <div class="hc-bar-row">
            <div class="hc-bar-label"><span>🌊 Su (Sezgi, Bilgelik)</span> <strong>%10</strong></div>
            <div class="hc-bar-track"><div class="hc-bar-fill" style="width: 10%; background: #0284c7;"></div></div>
        </div>
    `;

    const descHtml = `
        <p><strong>${yAnimal.name} Burcunun Yaşam Enerjisi:</strong> ${yAnimal.desc}</p>
        <p><strong>Uyumlu Burçlar (Trine):</strong> ${yAnimal.trine} burçlarıyla doğal ve mükemmel bir uyum yakalarsınız. <strong>Zıt Burcunuz (Clash):</strong> ${yAnimal.clash} burcuyla ilişkilerinizde karşılıklı sabır ve esneklik gerekir.</p>
        <p><strong>Şans Kodları:</strong> Şanslı Sayılar: <strong>${yAnimal.luckyNums}</strong> | Şanslı Renkler: <strong>${yAnimal.luckyColors}</strong>.</p>
    `;

    document.getElementById('hc-cin-hero').innerHTML = heroHtml;
    document.getElementById('hc-cin-pillars').innerHTML = pillarsHtml;
    document.getElementById('hc-cin-elements').innerHTML = elemBarsHtml;
    document.getElementById('hc-cin-desc').innerHTML = descHtml;

    document.getElementById('hc-cin-result').classList.add('visible');
    document.getElementById('hc-cin-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

