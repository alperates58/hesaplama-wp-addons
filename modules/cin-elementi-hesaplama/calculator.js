function hcCinElemHesapla() {
    const dateStr = document.getElementById('hc-cine-date').value;
    if (!dateStr) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const d = new Date(dateStr);
    let year = d.getFullYear();
    const month = d.getMonth() + 1;
    const day = d.getDate();

    if (month < 2 || (month === 2 && day < 4)) {
        year -= 1;
    }

    const elements10 = [
        { elem: "Metal", polarity: "Yang", symbol: "⚔️", theme: "Adalet, kararlılık, disiplin ve keskin mantık.", feeds: "Su", feedsBy: "Toprak", clashes: "Ateş", color: "Beyaz, Altın, Gümüş", season: "Sonbahar", organ: "Akciğerler" },
        { elem: "Metal", polarity: "Yin", symbol: "🪙", theme: "Zarafet, incelik, estetik ve içsel değer.", feeds: "Su", feedsBy: "Toprak", clashes: "Ateş", color: "Gümüş, Gri", season: "Sonbahar", organ: "Akciğerler" },
        { elem: "Su", polarity: "Yang", symbol: "🌊", theme: "Derin bilgelik, akışkan güç, esneklik ve sezgi.", feeds: "Ağaç", feedsBy: "Metal", clashes: "Toprak", color: "Siyah, Koyu Mavi", season: "Kış", organ: "Böbrekler" },
        { elem: "Su", polarity: "Yin", symbol: "💧", theme: "Huzur, şefkat, duyarlılık ve zihinsel sakinlik.", feeds: "Ağaç", feedsBy: "Metal", clashes: "Toprak", color: "Mavi, Turkuaz", season: "Kış", organ: "Böbrekler" },
        { elem: "Ağaç", polarity: "Yang", symbol: "🌳", theme: "Büyüme, vizyon, liderlik ve sarsılmaz kökler.", feeds: "Ateş", feedsBy: "Su", clashes: "Metal", color: "Yeşil, Zümrüt", season: "İlkbahar", organ: "Karaciğer" },
        { elem: "Ağaç", polarity: "Yin", symbol: "🌿", theme: "Uyum, esneklik, yaratıcılık ve nezaket.", feeds: "Ateş", feedsBy: "Su", clashes: "Metal", color: "Açık Yeşil, Nane", season: "İlkbahar", organ: "Karaciğer" },
        { elem: "Ateş", polarity: "Yang", symbol: "🔥", theme: "Tutku, cesaret, dinamizm ve kitleleri aydınlatan ışık.", feeds: "Toprak", feedsBy: "Ağaç", clashes: "Su", color: "Kırmızı, Turuncu", season: "Yaz", organ: "Kalp" },
        { elem: "Ateş", polarity: "Yin", symbol: "🕯️", theme: "Sıcaklık, ilham, romantizm ve içsel alev.", feeds: "Toprak", feedsBy: "Ağaç", clashes: "Su", color: "Bordo, Pembe", season: "Yaz", organ: "Kalp" },
        { elem: "Toprak", polarity: "Yang", symbol: "⛰️", theme: "Güvenilirlik, istikrar, sabır ve sağlam temel.", feeds: "Metal", feedsBy: "Ateş", clashes: "Ağaç", color: "Kahverengi, Toprak Rengi", season: "Mevsim Geçişleri", organ: "Dalak / Mide" },
        { elem: "Toprak", polarity: "Yin", symbol: "🌾", theme: "Besleyicilik, hoşgörü, üretkenlik ve bereket.", feeds: "Metal", feedsBy: "Ateş", clashes: "Ağaç", color: "Sarı, Bej", season: "Mevsim Geçişleri", organ: "Dalak / Mide" }
    ];

    const lastDigit = Math.abs(year % 10);
    const elemData = elements10[lastDigit];

    const heroHtml = `
        <div class="hc-num-hero-card">
            <div class="hc-num-badge">☯️ Doğum Yılı Elementiniz (${year})</div>
            <div class="hc-num-title">${elemData.symbol} ${elemData.polarity} ${elemData.elem}</div>
            <p class="hc-num-sub">Kozmik Enerji: <strong>${elemData.theme}</strong></p>
        </div>
    `;

    const matrixHtml = `
        <div class="hc-matrix-card" style="border-color: #86efac; background: #f0fdf4;">
            <div class="hc-mat-tag" style="color: #16a34a;">🌱 Sizi Besleyen Element (Generating)</div>
            <div class="hc-mat-val">${elemData.feedsBy} Elementi</div>
            <p class="hc-mat-desc">${elemData.feedsBy} enerjisi size canlılık, şans ve güç katar.</p>
        </div>

        <div class="hc-matrix-card" style="border-color: #93c5fd; background: #eff6ff;">
            <div class="hc-mat-tag" style="color: #2563eb;">✨ Sizin Beslediğiniz Element (Output)</div>
            <div class="hc-mat-val">${elemData.feeds} Elementi</div>
            <p class="hc-mat-desc">${elemData.elem} olarak ${elemData.feeds} elementini besler ve üretirsiniz.</p>
        </div>

        <div class="hc-matrix-card" style="border-color: #fca5a5; background: #fef2f2;">
            <div class="hc-mat-tag" style="color: #dc2626;">⚠️ Zıt / Sınayan Element (Clashing)</div>
            <div class="hc-mat-val">${elemData.clashes} Elementi</div>
            <p class="hc-mat-desc">${elemData.clashes} enerjisiyle karşılaştığınızda sakin ve esnek kalmalısınız.</p>
        </div>
    `;

    const descHtml = `
        <p><strong>${elemData.polarity} ${elemData.elem} Enerjisinin Hayatınıza Etkisi:</strong> Çin felsefesinde Wu Xing (5 Element) sistemi, kişinin doğasını ve kozmik akışını belirler. Siz <strong>${elemData.theme}</strong></p>
        <p><strong>Feng Shui & Sağlık Dengesi:</strong> Uğurlu Renkleriniz: <strong>${elemData.color}</strong> | Bağlantılı Mevsim: <strong>${elemData.season}</strong> | Enerjetik Organ: <strong>${elemData.organ}</strong>.</p>
    `;

    document.getElementById('hc-cine-hero').innerHTML = heroHtml;
    document.getElementById('hc-cine-matrix').innerHTML = matrixHtml;
    document.getElementById('hc-cine-desc').innerHTML = descHtml;

    document.getElementById('hc-cine-result').classList.add('visible');
    document.getElementById('hc-cine-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}
