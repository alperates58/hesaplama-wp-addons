function hcElSyncDateToSign() {
    const dStr = document.getElementById('hc-el-date').value;
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
            document.getElementById('hc-element-burc-select').value = s.key;
            break;
        }
    }
}

function hcBurcElementiHesapla() {
    const burc = document.getElementById('hc-element-burc-select').value;

    const data = {
        koc: { name: "Koç", icon: "♈", elem: "Ateş", humor: "Kolerik (Sıcak & Kuru)", pFire: 95, pEarth: 40, pAir: 60, pWater: 30, color: "#ef4444" },
        boga: { name: "Boğa", icon: "♉", elem: "Toprak", humor: "Melankolik (Soğuk & Kuru)", pFire: 30, pEarth: 98, pAir: 45, pWater: 65, color: "#10b981" },
        ikizler: { name: "İkizler", icon: "♊", elem: "Hava", humor: "Sanguin (Sıcak & Nemli)", pFire: 60, pEarth: 35, pAir: 96, pWater: 45, color: "#f59e0b" },
        yengec: { name: "Yengeç", icon: "♋", elem: "Su", humor: "Flegmatik (Soğuk & Nemli)", pFire: 25, pEarth: 70, pAir: 40, pWater: 98, color: "#38bdf8" },
        aslan: { name: "Aslan", icon: "♌", elem: "Ateş", humor: "Kolerik (Sıcak & Kuru)", pFire: 98, pEarth: 45, pAir: 65, pWater: 25, color: "#f97316" },
        basak: { name: "Başak", icon: "♍", elem: "Toprak", humor: "Melankolik (Soğuk & Kuru)", pFire: 35, pEarth: 95, pAir: 60, pWater: 50, color: "#84cc16" },
        terazi: { name: "Terazi", icon: "♎", elem: "Hava", humor: "Sanguin (Sıcak & Nemli)", pFire: 55, pEarth: 45, pAir: 95, pWater: 50, color: "#ec4899" },
        akrep: { name: "Akrep", icon: "♏", elem: "Su", humor: "Flegmatik (Soğuk & Nemli)", pFire: 50, pEarth: 65, pAir: 35, pWater: 98, color: "#7f1d1d" },
        yay: { name: "Yay", icon: "♐", elem: "Ateş", humor: "Kolerik (Sıcak & Kuru)", pFire: 96, pEarth: 30, pAir: 70, pWater: 35, color: "#8b5cf6" },
        oglak: { name: "Oğlak", icon: "♑", elem: "Toprak", humor: "Melankolik (Soğuk & Kuru)", pFire: 45, pEarth: 98, pAir: 40, pWater: 50, color: "#475569" },
        kova: { name: "Kova", icon: "♒", elem: "Hava", humor: "Sanguin (Sıcak & Nemli)", pFire: 60, pEarth: 45, pAir: 98, pWater: 30, color: "#0ea5e9" },
        balik: { name: "Balık", icon: "♓", elem: "Su", humor: "Flegmatik (Soğuk & Nemli)", pFire: 30, pEarth: 55, pAir: 45, pWater: 98, color: "#06b6d4" }
    };

    const s = data[burc] || data.koc;
    let title = `${s.icon} ${s.name} — ${s.elem} Elementi`;
    let desc = "";

    if (s.elem === "Ateş") {
        desc = `
            <p><strong>Ateş Elementi Simyası:</strong> Siz yaşamın saf kıvılcımı, heyecanı ve eylemsel motorusunuz. İçsel motivasyonunuz son derece yüksektir.</p>
            <p><strong>Mizaç (Kolerik):</strong> Sıcak ve Kuru mizaç özellikleri sergilersiniz. Kararlı, cesur, dürüst ve vizyonersinizdir. Gölge yanı acelecilik ve sabırsızlıktır. Dengelemek için doğada toprakla temas etmek ve su kenarında dinlenmek faydalıdır.</p>
        `;
    } else if (s.elem === "Toprak") {
        desc = `
            <p><strong>Toprak Elementi Simyası:</strong> Siz yaşamın somut temeli, güvenilir kalesi ve üretken omurgasısınız. Ayaklarınız yere her zaman sağlam basar.</p>
            <p><strong>Mizaç (Melankolik):</strong> Soğuk ve Kuru mizaç yapısındasınız. Analitik, sabırlı, metodik ve inşa edicisinizdir. Gölge yanı aşırı endişe ve esneyememektir. Dengelemek için sıcak banyolar ve spontane hareket önerilir.</p>
        `;
    } else if (s.elem === "Hava") {
        desc = `
            <p><strong>Hava Elementi Simyası:</strong> Siz zihnin, bilginin, sosyal ağların ve tarafsız mantığın taşıyıcısısınız. İletişim kurmak sizin nefes almanız gibidir.</p>
            <p><strong>Mizaç (Sanguin):</strong> Sıcak ve Nemli mizaç özellikleri gösterirsiniz. Meraklı, dışa dönük, esprili ve köprü kurucusunuzdur. Gölge yanı dikkatin çabuk dağılmasıdır. Dengelemek için odaklanma egzersizleri ve bedensel sporlar faydalıdır.</p>
        `;
    } else {
        desc = `
            <p><strong>Su Elementi Simyası:</strong> Siz sezgilerin, derin empatinin, şifanın ve ruhsal bilgeliğin kaynağısınız. Görünmeyeni hissedersiniz.</p>
            <p><strong>Mizaç (Flegmatik):</strong> Soğuk ve Nemli mizaçtasınız. Duyarlı, koruyucu, sanatsal ve manyetiksinizdir. Gölge yanı duygusal dalgalanmalardır. Dengelemek için net sınırlar koymak ve zihinsel projeler üretmek güçlendirir.</p>
        `;
    }

    const heroHtml = `
        <div class="hc-el-hero-card">
            <div class="hc-el-hero-badge">🔥 Astrolojik Element</div>
            <div class="hc-el-hero-title">${title}</div>
            <p class="hc-el-hero-sub">Antik Mizaç: <strong>${s.humor}</strong> | Element ruhun yapı taşlarını belirler.</p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-el-dim-card">
            <div class="hc-el-dim-head"><span>🔥 Ateş (Eylem & Tutku)</span><span>%${s.pFire}</span></div>
            <div class="hc-el-dim-bar"><div class="hc-el-dim-fill" style="width: ${s.pFire}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-el-dim-card">
            <div class="hc-el-dim-head"><span>🌍 Toprak (Somutluk & Güven)</span><span>%${s.pEarth}</span></div>
            <div class="hc-el-dim-bar"><div class="hc-el-dim-fill" style="width: ${s.pEarth}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-el-dim-card">
            <div class="hc-el-dim-head"><span>💨 Hava (Zeka & Sosyal İletişim)</span><span>%${s.pAir}</span></div>
            <div class="hc-el-dim-bar"><div class="hc-el-dim-fill" style="width: ${s.pAir}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-el-dim-card">
            <div class="hc-el-dim-head"><span>🌊 Su (Sezgi & Duygusal Derinlik)</span><span>%${s.pWater}</span></div>
            <div class="hc-el-dim-bar"><div class="hc-el-dim-fill" style="width: ${s.pWater}%; background: #0ea5e9;"></div></div>
        </div>
    `;

    document.getElementById('hc-el-hero').innerHTML = heroHtml;
    document.getElementById('hc-el-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-element-desc').innerHTML = desc;

    document.getElementById('hc-burc-elementi-result').classList.add('visible');
    document.getElementById('hc-burc-elementi-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

