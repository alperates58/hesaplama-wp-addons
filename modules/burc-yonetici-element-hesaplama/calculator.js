function hcByeSyncDateToSign() {
    const dStr = document.getElementById('hc-bye-date').value;
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
            document.getElementById('hc-be-sign').value = s.key;
            break;
        }
    }
}

function hcBurcElementHesapla() {
    const sign = document.getElementById('hc-be-sign').value;

    const data = {
        koc: { name: "Koç", icon: "♈", elem: "Ateş", ruler: "Mars ♂️", pFire: 95, pEarth: 40, pAir: 60, pWater: 30 },
        boga: { name: "Boğa", icon: "♉", elem: "Toprak", ruler: "Venüs ♀️", pFire: 30, pEarth: 98, pAir: 45, pWater: 65 },
        ikizler: { name: "İkizler", icon: "♊", elem: "Hava", ruler: "Merkür ☿️", pFire: 60, pEarth: 35, pAir: 96, pWater: 45 },
        yengec: { name: "Yengeç", icon: "♋", elem: "Su", ruler: "Ay 🌙", pFire: 25, pEarth: 70, pAir: 40, pWater: 98 },
        aslan: { name: "Aslan", icon: "♌", elem: "Ateş", ruler: "Güneş ☀️", pFire: 98, pEarth: 45, pAir: 65, pWater: 25 },
        basak: { name: "Başak", icon: "♍", elem: "Toprak", ruler: "Merkür ☿️", pFire: 35, pEarth: 95, pAir: 60, pWater: 50 },
        terazi: { name: "Terazi", icon: "♎", elem: "Hava", ruler: "Venüs ♀️", pFire: 55, pEarth: 45, pAir: 95, pWater: 50 },
        akrep: { name: "Akrep", icon: "♏", elem: "Su", ruler: "Mars ♂️ / Plüton ♇", pFire: 50, pEarth: 65, pAir: 35, pWater: 98 },
        yay: { name: "Yay", icon: "♐", elem: "Ateş", ruler: "Jüpiter ♃", pFire: 96, pEarth: 30, pAir: 70, pWater: 35 },
        oglak: { name: "Oğlak", icon: "♑", elem: "Toprak", ruler: "Satürn ♄", pFire: 45, pEarth: 98, pAir: 40, pWater: 50 },
        kova: { name: "Kova", icon: "♒", elem: "Hava", ruler: "Satürn ♄ / Uranüs ♅", pFire: 60, pEarth: 45, pAir: 98, pWater: 30 },
        balik: { name: "Balık", icon: "♓", elem: "Su", ruler: "Jüpiter ♃ / Neptün ♆", pFire: 30, pEarth: 55, pAir: 45, pWater: 98 }
    };

    const s = data[sign] || data.koc;
    let title = `${s.icon} ${s.name} — ${s.elem} Elementi (Yönetici: ${s.ruler})`;
    let desc = "";

    if (s.elem === "Ateş") {
        desc = `
            <p><strong>Ateş Elementi & Yönetici Gezegen Rezonansı:</strong> Siz hayata coşku, liderlik ve kıvılcım katan bir ruha sahipsiniz. Yönetici gezegeniniz ${s.ruler}, eylemlerinize cesaret ve parlaklık katar.</p>
            <p><strong>Karakter Dinamiği:</strong> Hedeflerinize doğrudan ve tutkuyla ilerlersiniz. Girişimcilik kabiliyetiniz ve karizmanız etrafınızdakilere ilham kaynağı olur.</p>
        `;
    } else if (s.elem === "Toprak") {
        desc = `
            <p><strong>Toprak Elementi & Yönetici Gezegen Rezonansı:</strong> Siz sarsılmaz bir kalitesiniz. Yönetici gezegeniniz ${s.ruler}, size sabır, inşa etme gücü ve güvenilirlik bahşeder.</p>
            <p><strong>Karakter Dinamiği:</strong> Somut projeler üretmek ve güvenli alanlar inşa etmekte benzersiz bir ustalığınız vardır.</p>
        `;
    } else if (s.elem === "Hava") {
        desc = `
            <p><strong>Hava Elementi & Yönetici Gezegen Rezonansı:</strong> Zihinsel vizyon, köprü kurma ve evrensel bilgi ağı sizin alanınızdır. Yönetici gezegeniniz ${s.ruler}, iletişim ve analitik güç verir.</p>
            <p><strong>Karakter Dinamiği:</strong> Objektif düşünce ve stratejik iletişimle en karmaşık problemleri saniyeler içinde çözebilirsiniz.</p>
        `;
    } else {
        desc = `
            <p><strong>Su Elementi & Yönetici Gezegen Rezonansı:</strong> Sezgisel derinlik, ruhsal şifa ve empati gücünün kaynağısınız. Yönetici gezegeniniz ${s.ruler}, psişik algı ve duygusal zeka bahşeder.</p>
            <p><strong>Karakter Dinamiği:</strong> İnsanların söylenmeyen hislerini anlama ve şefkatle dönüştürme konusunda eşsizsinizdir.</p>
        `;
    }

    const heroHtml = `
        <div class="hc-bye-hero-card">
            <div class="hc-bye-hero-badge">✨ Yönetici Element & Gezegen</div>
            <div class="hc-bye-hero-title">${title}</div>
            <p class="hc-bye-hero-sub">Yönetici Gezegen: <strong>${s.ruler}</strong> | Element: <strong>${s.elem}</strong></p>
        </div>
    `;

    const dimHtml = `
        <div class="hc-bye-dim-card">
            <div class="hc-bye-dim-head"><span>🔥 Ateş (Eylem & Tutku)</span><span>%${s.pFire}</span></div>
            <div class="hc-bye-dim-bar"><div class="hc-bye-dim-fill" style="width: ${s.pFire}%; background: #ef4444;"></div></div>
        </div>
        <div class="hc-bye-dim-card">
            <div class="hc-bye-dim-head"><span>🌍 Toprak (Somutluk & Güven)</span><span>%${s.pEarth}</span></div>
            <div class="hc-bye-dim-bar"><div class="hc-bye-dim-fill" style="width: ${s.pEarth}%; background: #10b981;"></div></div>
        </div>
        <div class="hc-bye-dim-card">
            <div class="hc-bye-dim-head"><span>💨 Hava (Zeka & Sosyal İletişim)</span><span>%${s.pAir}</span></div>
            <div class="hc-bye-dim-bar"><div class="hc-bye-dim-fill" style="width: ${s.pAir}%; background: #f59e0b;"></div></div>
        </div>
        <div class="hc-bye-dim-card">
            <div class="hc-bye-dim-head"><span>🌊 Su (Sezgi & Duygusal Derinlik)</span><span>%${s.pWater}</span></div>
            <div class="hc-bye-dim-bar"><div class="hc-bye-dim-fill" style="width: ${s.pWater}%; background: #0ea5e9;"></div></div>
        </div>
    `;

    document.getElementById('hc-bye-hero').innerHTML = heroHtml;
    document.getElementById('hc-bye-dim-grid').innerHTML = dimHtml;
    document.getElementById('hc-be-desc').innerHTML = desc;

    document.getElementById('hc-be-result').classList.add('visible');
    document.getElementById('hc-be-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

