function hcSrSyncDateToSign() {
    const dStr = document.getElementById('hc-sr-date').value;
    if (!dStr) return;
    const parts = dStr.split('-').map(Number);
    const m = parts[1], d = parts[2];

    const signDates = [
        { key: "oglak", start: [1, 1], end: [1, 19] },
        { key: "kova", start: [1, 20], end: [2, 18] },
        { key: "balik", start: [2, 19], end: [3, 20] },
        { key: "koc", start: [3, 21], end: [4, 19] },
        { key: "boga", start: [4, 20], end: [5, 20] },
        { key: "ikizler", start: [5, 21], end: [6, 20] },
        { key: "yengec", start: [6, 21], end: [7, 22] },
        { key: "aslan", start: [7, 23], end: [8, 22] },
        { key: "basak", start: [8, 23], end: [9, 22] },
        { key: "terazi", start: [9, 23], end: [10, 22] },
        { key: "akrep", start: [10, 23], end: [11, 21] },
        { key: "yay", start: [11, 22], end: [12, 21] },
        { key: "oglak", start: [12, 22], end: [12, 31] }
    ];

    for (let s of signDates) {
        if ((m === s.start[0] && d >= s.start[1]) && (m === s.end[0] && d <= s.end[1])) {
            document.getElementById('hc-sr-sign').value = s.key;
            break;
        }
    }
}

function hcBurcSansliRenkHesapla() {
    const sign = document.getElementById('hc-sr-sign').value;

    const data = {
        koc: { name: "Koç", icon: "♈", mainColor: "Ateş Kırmızısı", chakra: "Kök Çakra (Muladhara)", stone: "Yakut, Lal Taşı", palette: [ { label: "Ana Renk", name: "Ateş Kırmızısı", hex: "#dc2626" }, { label: "İkincil Renk", name: "Mercan Turuncusu", hex: "#ea580c" }, { label: "Aura Vurgusu", name: "Safir Beyazı", hex: "#f8fafc" } ], desc: "Mars'ın saf enerjisini yansıtan kırmızı tonları, cesaretinizi ve fiziksel canlılığınızı maksimuma çıkarır." },
        boga: { name: "Boğa", icon: "♉", mainColor: "Zümrüt Yeşili & Pudra", chakra: "Kalp Çakrası (Anahata)", stone: "Zümrüt, Pembe Kuvars", palette: [ { label: "Ana Renk", name: "Zümrüt Yeşili", hex: "#059669" }, { label: "İkincil Renk", name: "Pudra Pembesi", hex: "#f472b6" }, { label: "Aura Vurgusu", name: "Toprak Bakırı", hex: "#b45309" } ], desc: "Venüs'ün estetik ve bolluk frekansını çeker; finansal güvenliği ve kalıcı sevgiyi mıknatıs gibi çeker." },
        ikizler: { name: "İkizler", icon: "♊", mainColor: "Güneş Sarısı", chakra: "Solar Pleksus & Boğaz", stone: "Sitrin, Akik", palette: [ { label: "Ana Renk", name: "Güneş Sarısı", hex: "#eab308" }, { label: "İkincil Renk", name: "Açık Gökyüzü Mavisi", hex: "#38bdf8" }, { label: "Aura Vurgusu", name: "Optik Beyaz", hex: "#f1f5f9" } ], desc: "Merkür'ün zihinsel çevikliğini destekler; yeni fikirler üretirken ve önemli sunumlarda zihni berraklaştırır." },
        yengec: { name: "Yengeç", icon: "♋", mainColor: "Gümüş & İnci Beyazı", chakra: "Üçüncü Göz & Sakral", stone: "Ay Taşı, İnci", palette: [ { label: "Ana Renk", name: "Gümüş Beyazı", hex: "#cbd5e1" }, { label: "İkincil Renk", name: "Deniz Köpüğü Yeşili", hex: "#6ee7b7" }, { label: "Aura Vurgusu", name: "Gece Mavisi", hex: "#1e3a8a" } ], desc: "Ay'ın koruyucu aurasını yansıtır; duygusal şifa ve derin sezgileri koruyan kutsal bir kalkan oluşturur." },
        aslan: { name: "Aslan", icon: "♌", mainColor: "Altın Sarısı & Turuncu", chakra: "Solar Pleksus (Manipura)", stone: "Pirit, Kaplan Gözü", palette: [ { label: "Ana Renk", name: "Saf Altın Sarısı", hex: "#f59e0b" }, { label: "İkincil Renk", name: "Kraliyet Turuncusu", hex: "#f97316" }, { label: "Aura Vurgusu", name: "Güneş Işıltısı", hex: "#fef08a" } ], desc: "Güneş'in eşsiz ışığını yansıtır; girdiği her ortamda liderlik karizmasını ve yaratıcılığı parlatır." },
        basak: { name: "Başak", icon: "♍", mainColor: "Zeytin Yeşili & Toprak", chakra: "Kalp & Kök Çakra", stone: "Yeşim, Dumanlı Kuvars", palette: [ { label: "Ana Renk", name: "Zeytin Yeşili", hex: "#65a30d" }, { label: "İkincil Renk", name: "Sıcak Toprak Kahvesi", hex: "#78350f" }, { label: "Aura Vurgusu", name: "Keten Beji", hex: "#e2e8f0" } ], desc: "Doğanın dingin şifasını ve analitik berraklığı birleştirir; odaklanmayı ve içsel huzuru sağlar." },
        terazi: { name: "Terazi", icon: "♎", mainColor: "Pastel Pembe & Bebek Mavisi", chakra: "Kalp & Boğaz Çakrası", stone: "Pembe Turmalin, Lapis", palette: [ { label: "Ana Renk", name: "Pastel Gül Pembesi", hex: "#ec4899" }, { label: "İkincil Renk", name: "Bebek Mavisi", hex: "#60a5fa" }, { label: "Aura Vurgusu", name: "Şampanya Işıltısı", hex: "#fde68a" } ], desc: "Zarafet, diplomasi ve ikili ilişkilerde kusursuz ahenk sağlar; insanları sakinleştiren bir çekim yayar." },
        akrep: { name: "Akrep", icon: "♏", mainColor: "Derin Bordo & Gece Siyahı", chakra: "Kök & Sakral Çakra", stone: "Obsidyen, Granat", palette: [ { label: "Ana Renk", name: "Derin Bordo", hex: "#881337" }, { label: "İkincil Renk", name: "Gece Siyahı", hex: "#0f172a" }, { label: "Aura Vurgusu", name: "Plütonik Koyu Mor", hex: "#581c87" } ], desc: "Küllerinden doğma gücünü ve stratejik derinliği pekiştirir; manyetik auranızı aşılmaz bir güce dönüştürür." },
        yay: { name: "Yay", icon: "♐", mainColor: "Kraliyet Moru & Çivit", chakra: "Taç & Üçüncü Göz Çakrası", stone: "Ametist, Turkuaz", palette: [ { label: "Ana Renk", name: "Kraliyet Moru", hex: "#7c3aed" }, { label: "İkincil Renk", name: "Çivit Mavisi", hex: "#4338ca" }, { label: "Aura Vurgusu", name: "Turkuaz Mavisi", hex: "#06b6d4" } ], desc: "Jüpiter'in sonsuz bereketini ve vizyoner bilgeliğini auranıza yükler; seyahat ve şans kapılarını aralar." },
        oglak: { name: "Oğlak", icon: "♑", mainColor: "Kömür Grisi & Orman Yeşili", chakra: "Kök Çakra (Muladhara)", stone: "Oniks, Hematit", palette: [ { label: "Ana Renk", name: "Kömür Grisi", hex: "#334155" }, { label: "İkincil Renk", name: "Orman Yeşili", hex: "#14532d" }, { label: "Aura Vurgusu", name: "Gümüşi Çelik", hex: "#94a3b8" } ], desc: "Satürn'ün sarsılmaz otoritesini ve kalıcı başarı disiplinini temsil eder; iş dünyasında saygınlık kazandırır." },
        kova: { name: "Kova", icon: "♒", mainColor: "Elektrik Mavisi & Turkuaz", chakra: "Boğaz & Üçüncü Göz", stone: "Akuamarin, Apatit", palette: [ { label: "Ana Renk", name: "Elektrik Mavisi", hex: "#0284c7" }, { label: "İkincil Renk", name: "Canlı Turkuaz", hex: "#0d9488" }, { label: "Aura Vurgusu", name: "Buz Mavisi", hex: "#e0f2fe" } ], desc: "Uranüs'ün dâhiyane vizyonunu ve bağımsız özgürlük frekansını açığa çıkarır; özgün fikirleri çeker." },
        balik: { name: "Balık", icon: "♓", mainColor: "Deniz Yeşili & Lavanta", chakra: "Taç & Kalp Çakrası", stone: "Ametist, Akuamarin", palette: [ { label: "Ana Renk", name: "Deniz Yeşili", hex: "#0d9488" }, { label: "İkincil Renk", name: "Lavanta Moru", hex: "#a855f7" }, { label: "Aura Vurgusu", name: "Mistik İnci Işıltısı", hex: "#f3e8ff" } ], desc: "Neptün'ün sınırsız ilham ve şifa enerjisini taşır; sanatsal yaratıcılıkta ve ruhsal huzurda zirveye taşır." }
    };

    const s = data[sign] || data.koc;
    let title = `${s.icon} ${s.name} — Şanslı Renginiz: ${s.mainColor}`;

    const heroHtml = `
        <div class="hc-sr-hero-card">
            <div class="hc-sr-hero-badge">🎨 Şanslı Renk & Aura Frekansı</div>
            <div class="hc-sr-hero-title">${title}</div>
            <p class="hc-sr-hero-sub">Çakra Dengesi: <strong>${s.chakra}</strong> | Doğal Taşlar: <strong>${s.stone}</strong></p>
        </div>
    `;

    let paletteHtml = "";
    s.palette.forEach(p => {
        paletteHtml += `
            <div class="hc-sr-swatch-card">
                <div class="hc-sr-swatch" style="background-color: ${p.hex};"></div>
                <div class="hc-sr-swatch-info">
                    <span class="hc-sr-swatch-label">${p.label}</span>
                    <strong>${p.name}</strong>
                    <code>${p.hex}</code>
                </div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Aura ve Enerji Etkisi:</strong> ${s.desc}</p>
        <p><strong>Nasıl Kullanılmalı?</strong> Bu renkleri sadece kıyafet seçimlerinizde değil, çalışma masanızdaki objelerde, telefon duvar kağıdınızda, takılarınızda ve imza attığınız ortamlarda kullanarak enerjinizi bu manyetik frekansa uyumlayabilirsiniz.</p>
    `;

    document.getElementById('hc-sr-hero').innerHTML = heroHtml;
    document.getElementById('hc-sr-palette').innerHTML = paletteHtml;
    document.getElementById('hc-sr-desc').innerHTML = descHtml;

    document.getElementById('hc-sr-result').classList.add('visible');
    document.getElementById('hc-sr-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

