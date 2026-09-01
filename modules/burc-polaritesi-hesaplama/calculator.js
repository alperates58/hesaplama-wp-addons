function hcBpSyncDateToSign() {
    const dStr = document.getElementById('hc-bp-date').value;
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
            document.getElementById('hc-bp-sign').value = s.key;
            break;
        }
    }
}

function hcBurcPolariteHesapla() {
    const sign = document.getElementById('hc-bp-sign').value;

    const data = {
        koc: { name: "Koç", icon: "♈", pol: "Eril (Yang / Pozitif)", elem: "Ateş", pYang: 98, pYin: 45, pAction: 95, pReceptive: 50 },
        boga: { name: "Boğa", icon: "♉", pol: "Dişil (Yin / Negatif)", elem: "Toprak", pYang: 45, pYin: 96, pAction: 55, pReceptive: 95 },
        ikizler: { name: "İkizler", icon: "♊", pol: "Eril (Yang / Pozitif)", elem: "Hava", pYang: 92, pYin: 50, pAction: 90, pReceptive: 55 },
        yengec: { name: "Yengeç", icon: "♋", pol: "Dişil (Yin / Negatif)", elem: "Su", pYang: 50, pYin: 98, pAction: 60, pReceptive: 98 },
        aslan: { name: "Aslan", icon: "♌", pol: "Eril (Yang / Pozitif)", elem: "Ateş", pYang: 96, pYin: 40, pAction: 98, pReceptive: 45 },
        basak: { name: "Başak", icon: "♍", pol: "Dişil (Yin / Negatif)", elem: "Toprak", pYang: 55, pYin: 92, pAction: 65, pReceptive: 90 },
        terazi: { name: "Terazi", icon: "♎", pol: "Eril (Yang / Pozitif)", elem: "Hava", pYang: 90, pYin: 55, pAction: 85, pReceptive: 65 },
        akrep: { name: "Akrep", icon: "♏", pol: "Dişil (Yin / Negatif)", elem: "Su", pYang: 60, pYin: 98, pAction: 70, pReceptive: 98 },
        yay: { name: "Yay", icon: "♐", pol: "Eril (Yang / Pozitif)", elem: "Ateş", pYang: 95, pYin: 45, pAction: 95, pReceptive: 50 },
        oglak: { name: "Oğlak", icon: "♑", pol: "Dişil (Yin / Negatif)", elem: "Toprak", pYang: 65, pYin: 92, pAction: 75, pReceptive: 90 },
        kova: { name: "Kova", icon: "♒", pol: "Eril (Yang / Pozitif)", elem: "Hava", pYang: 92, pYin: 50, pAction: 90, pReceptive: 55 },
        balik: { name: "Balık", icon: "♓", pol: "Dişil (Yin / Negatif)", elem: "Su", pYang: 40, pYin: 98, pAction: 45, pReceptive: 98 }
    };

    const s = data[sign] || data.koc;
    let title = `${s.icon} ${s.name} — ${s.pol}`;
    let desc = "";

    if (s.pol.includes("Eril")) {
        desc = `
            <p><strong>Eril (Yang / Dışa Dönük) Polarite:</strong> Ateş ve Hava burçları bu polaritededir. Enerjiniz dış dünyaya doğru yayılır; etken, başlatıcı, talepkar ve ifade odaklısınızdır.</p>
            <p><strong>Karakter Dinamiği:</strong> Hayatın öznesi olmayı seversiniz. Düşüncelerinizi doğrudan söyler, aksiyon alır ve ortamın atmosferini belirlersiniz. Hızlı karar verir, sosyal etkileşimden enerji toplarsınız.</p>
        `;
    } else {
        desc = `
            <p><strong>Dişil (Yin / İçe Dönük) Polarite:</strong> Toprak ve Su burçları bu polaritededir. Enerjiniz içe doğru akar; alıcı, koruyucu, besleyici ve derin bir manyetik çekim merkezisinizdir.</p>
            <p><strong>Karakter Dinamiği:</strong> Olayları derinlemesine gözlemler, sindirir ve en doğru zamanda stratejik hamle yaparsınız. Sezgileriniz ve dayanıklılığınız sarsılmazdır. Şeyleri sabırla büyütme ve kalıcı kılma ustasısınızdır.</p>
        `;
    }

    const heroHtml = `
        <div class="hc-bp-hero-card">
            <div class="hc-bp-hero-badge">☯️ Enerji Polaritesi</div>
            <div class="hc-bp-hero-title">${title}</div>
            <p class="hc-bp-hero-sub">Element: <strong>${s.elem}</strong> | Polarite enerjinin evrenle nasıl alışveriş yaptığını tanımlar.</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-bp-dim-card">
            <div class="hc-bp-dim-head"><span>🔥 Eril / Yang (Dışa Dönük Yayılım)</span><span>%${s.pYang}</span></div>
            <div class="hc-bp-dim-bar"><div class="hc-bp-dim-fill" style="width: ${s.pYang}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-bp-dim-card">
            <div class="hc-bp-dim-head"><span>💧 Dişil / Yin (Manyetik Alıcılık)</span><span>%${s.pYin}</span></div>
            <div class="hc-bp-dim-bar"><div class="hc-bp-dim-fill" style="width: ${s.pYin}%; background: #3b82f6;"></div></div>
        </div>
        <div class="hc-bp-dim-card">
            <div class="hc-bp-dim-head"><span>⚡ Hızlı Eylem & Liderlik İradesi</span><span>%${s.pAction}</span></div>
            <div class="hc-bp-dim-bar"><div class="hc-bp-dim-fill" style="width: ${s.pAction}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-bp-dim-card">
            <div class="hc-bp-dim-head"><span>🌱 Sezgisel Derinlik & Koruyucu Sabır</span><span>%${s.pReceptive}</span></div>
            <div class="hc-bp-dim-bar"><div class="hc-bp-dim-fill" style="width: ${s.pReceptive}%; background: #10b981;"></div></div>
        </div>
    `;

    document.getElementById('hc-bp-hero').innerHTML = heroHtml;
    document.getElementById('hc-bp-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-bp-desc').innerHTML = desc;

    document.getElementById('hc-bp-result').classList.add('visible');
    document.getElementById('hc-bp-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

