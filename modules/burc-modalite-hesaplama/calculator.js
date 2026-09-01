function hcBmSyncDateToSign() {
    const dStr = document.getElementById('hc-bm-date').value;
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
            document.getElementById('hc-bm-sign').value = s.key;
            break;
        }
    }
}

function hcBurcModaliteHesapla() {
    const sign = document.getElementById('hc-bm-sign').value;

    const modalities = {
        koc: { name: "Koç", icon: "♈", mod: "Öncü (Kardinal)", pLead: 95, pPersist: 65, pAdapt: 70, color: "#ef4444" },
        boga: { name: "Boğa", icon: "♉", mod: "Sabit (Fixed)", pLead: 65, pPersist: 98, pAdapt: 50, color: "#10b981" },
        ikizler: { name: "İkizler", icon: "♊", mod: "Değişken (Mutable)", pLead: 60, pPersist: 55, pAdapt: 98, color: "#f59e0b" },
        yengec: { name: "Yengeç", icon: "♋", mod: "Öncü (Kardinal)", pLead: 92, pPersist: 75, pAdapt: 65, color: "#38bdf8" },
        aslan: { name: "Aslan", icon: "♌", mod: "Sabit (Fixed)", pLead: 85, pPersist: 95, pAdapt: 55, color: "#f97316" },
        basak: { name: "Başak", icon: "♍", mod: "Değişken (Mutable)", pLead: 65, pPersist: 75, pAdapt: 95, color: "#84cc16" },
        terazi: { name: "Terazi", icon: "♎", mod: "Öncü (Kardinal)", pLead: 90, pPersist: 60, pAdapt: 80, color: "#ec4899" },
        akrep: { name: "Akrep", icon: "♏", mod: "Sabit (Fixed)", pLead: 80, pPersist: 98, pAdapt: 60, color: "#7f1d1d" },
        yay: { name: "Yay", icon: "♐", mod: "Değişken (Mutable)", pLead: 75, pPersist: 50, pAdapt: 96, color: "#8b5cf6" },
        oglak: { name: "Oğlak", icon: "♑", mod: "Öncü (Kardinal)", pLead: 98, pPersist: 85, pAdapt: 60, color: "#475569" },
        kova: { name: "Kova", icon: "♒", mod: "Sabit (Fixed)", pLead: 75, pPersist: 95, pAdapt: 65, color: "#0ea5e9" },
        balik: { name: "Balık", icon: "♓", mod: "Değişken (Mutable)", pLead: 50, pPersist: 55, pAdapt: 98, color: "#06b6d4" }
    };

    const s = modalities[sign] || modalities.koc;
    let title = `${s.icon} ${s.name} — ${s.mod} Nitelik`;
    let desc = "";

    if (s.mod.includes("Öncü")) {
        desc = `
            <p><strong>Öncü (Kardinal) Modalite Dinamiği:</strong> Siz mevsimleri başlatan, ilk adımı atan ve yön veren 'Başlatıcı' enerjisiniz. Harekete geçmek ve yeni projeler üretmek sizin doğanızda vardır.</p>
            <p><strong>Eylem Tarzınız:</strong> Beklemek size göre değildir. Fikirleri hızla eyleme döker, liderlik eder ve etrafınızdakileri peşinizden sürüklersiniz. Rutinleşen süreçlerde motivasyonunuzu korumak ve işleri tamamlayacak ekipler kurmak başarınızı katlar.</p>
        `;
    } else if (s.mod.includes("Sabit")) {
        desc = `
            <p><strong>Sabit (Fixed) Modalite Dinamiği:</strong> Siz mevsimin en güçlü, en kararlı dönemisiniz. 'İnşa Eden, Koruyan ve Sürdüren' sarsılmaz bir iradeye sahipsiniz.</p>
            <p><strong>Eylem Tarzınız:</strong> Başladığınız hiçbir işi yarıda bırakmazsınız. Derin bir odaklanma, güvenilirlik ve yüksek dayanıklılık sunarsınız. İnatçılık tuzağına düşmeden değişen koşullara esneklikle uyum sağladığınızda yenilmez olursunuz.</p>
        `;
    } else {
        desc = `
            <p><strong>Değişken (Mutable) Modalite Dinamiği:</strong> Siz bir mevsimden diğerine geçişi sağlayan 'Köprü, Dönüştürücü ve Uyarlayıcı' zekasınız.</p>
            <p><strong>Eylem Tarzınız:</strong> Değişen her türlü şarta anında adapte olursunuz. Kriz anlarında pratik B planları üretir, çok yönlü iletişim kurar ve sistemleri esnetirsiniz. Dağılmadan ana hedefinize odaklandığınızda olağanüstü başarılar yakalarsınız.</p>
        `;
    }

    const heroHtml = `
        <div class="hc-bm-hero-card">
            <div class="hc-bm-hero-badge">⚡ Astrolojik Modalite</div>
            <div class="hc-bm-hero-title">${title}</div>
            <p class="hc-bm-hero-sub">Modalite (Nitelik), yaşamda hedeflerinize nasıl ulaştığınızı ve enerjinizi nasıl yönettiğinizi belirler.</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-bm-dim-card">
            <div class="hc-bm-dim-head"><span>🚀 Başlatma & Girişimcilik Gücü (Öncü)</span><span>%${s.pLead}</span></div>
            <div class="hc-bm-dim-bar"><div class="hc-bm-dim-fill" style="width: ${s.pLead}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-bm-dim-card">
            <div class="hc-bm-dim-head"><span>🏛️ Sabır, Sadakat & Sürdürülebilirlik (Sabit)</span><span>%${s.pPersist}</span></div>
            <div class="hc-bm-dim-bar"><div class="hc-bm-dim-fill" style="width: ${s.pPersist}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-bm-dim-card">
            <div class="hc-bm-dim-head"><span>🔄 Esneklik, Kriz Yönetimi & Uyum (Değişken)</span><span>%${s.pAdapt}</span></div>
            <div class="hc-bm-dim-bar"><div class="hc-bm-dim-fill" style="width: ${s.pAdapt}%; background: #0ea5e9;"></div></div>
        </div>
    `;

    document.getElementById('hc-bm-hero').innerHTML = heroHtml;
    document.getElementById('hc-bm-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-bm-desc').innerHTML = desc;

    document.getElementById('hc-bm-result').classList.add('visible');
    document.getElementById('hc-bm-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

