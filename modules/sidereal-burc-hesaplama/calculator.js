function hcSiderealBurcHesapla() {
    const birthdate = document.getElementById('hc-sb-birthdate').value;
    const timeStr = document.getElementById('hc-sb-time').value || '12:00';

    if (!birthdate) {
        alert('Lütfen doğum tarihinizi giriniz.');
        return;
    }

    const date = new Date(birthdate + 'T' + timeStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451545.0;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    // Güneş Tropikal Boylamı
    const N = 0, i = 0, w = 102.9404 + 0.0000470935 * d, a = 1.00000011, e = 0.01671022 - 0.0000000012 * d, M0 = 357.5291, M1 = 0.98560028;
    let M = norm(M0 + M1 * d);
    let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
    for (let j = 0; j < 3; j++) E = E - (E - (180 / Math.PI) * e * Math.sin(E * rad) - M) / (1 - e * Math.cos(E * rad));
    let xv = a * (Math.cos(E * rad) - e);
    let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
    let v = Math.atan2(yv, xv) / rad;
    let sunTrop = norm(v + w);

    // Ay Tropikal Boylamı
    const L = norm(218.316 + 13.176396 * d);
    const Mm = norm(134.963 + 13.064993 * d);
    const moonTrop = norm(L + 6.289 * Math.sin(Mm * rad));

    // Lahiri Ayanamsa (2000.0 için 23.8565°, yılda ~50.29" = 0.0139696°)
    const ayanamsa = 23.8565 + (d / 365.25) * 0.0139696;

    const sunSidereal = norm(sunTrop - ayanamsa);
    const moonSidereal = norm(moonTrop - ayanamsa);

    const signs = [
        { name: "Koç", icon: "♈" }, { name: "Boğa", icon: "♉" }, { name: "İkizler", icon: "♊" },
        { name: "Yengeç", icon: "♋" }, { name: "Aslan", icon: "♌" }, { name: "Başak", icon: "♍" },
        { name: "Terazi", icon: "♎" }, { name: "Akrep", icon: "♏" }, { name: "Yay", icon: "♐" },
        { name: "Oğlak", icon: "♑" }, { name: "Kova", icon: "♒" }, { name: "Balık", icon: "♓" }
    ];

    const sunTropSign = signs[Math.floor(sunTrop / 30)];
    const sunTropDeg = (sunTrop % 30).toFixed(1);

    const sunSidSign = signs[Math.floor(sunSidereal / 30)];
    const sunSidDeg = (sunSidereal % 30).toFixed(1);

    const moonTropSign = signs[Math.floor(moonTrop / 30)];
    const moonTropDeg = (moonTrop % 30).toFixed(1);

    const moonSidSign = signs[Math.floor(moonSidereal / 30)];
    const moonSidDeg = (moonSidereal % 30).toFixed(1);

    const heroHtml = `
        <div class="hc-sb-hero-card">
            <div class="hc-sb-hero-badge">🌟 Lahiri Ayanamsa Kayması: ${ayanamsa.toFixed(2)}°</div>
            <div class="hc-sb-hero-title">Yıldızıl Güneş Burcunuz: ${sunSidSign.icon} ${sunSidSign.name} (${sunSidDeg}°)</div>
            <p class="hc-sb-hero-sub">Gökyüzündeki gerçek fiziksel takımyıldız hizalanmasına göre burcunuz belirlenmiştir.</p>
        </div>
    `;

    const compareHtml = `
        <div class="hc-sb-card">
            <h5>☀️ Güneş Burcu Karşılaştırması</h5>
            <div class="hc-sb-row">
                <div class="hc-sb-col">
                    <span class="hc-sb-tag">Tropikal (Batı)</span>
                    <strong>${sunTropSign.icon} ${sunTropSign.name}</strong>
                    <span>${sunTropDeg}°</span>
                </div>
                <div class="hc-sb-arrow">➔</div>
                <div class="hc-sb-col hc-sb-active">
                    <span class="hc-sb-tag">Sidereal (Yıldızıl)</span>
                    <strong>${sunSidSign.icon} ${sunSidSign.name}</strong>
                    <span>${sunSidDeg}°</span>
                </div>
            </div>
        </div>

        <div class="hc-sb-card">
            <h5>🌙 Ay Burcu Karşılaştırması</h5>
            <div class="hc-sb-row">
                <div class="hc-sb-col">
                    <span class="hc-sb-tag">Tropikal (Batı)</span>
                    <strong>${moonTropSign.icon} ${moonTropSign.name}</strong>
                    <span>${moonTropDeg}°</span>
                </div>
                <div class="hc-sb-arrow">➔</div>
                <div class="hc-sb-col hc-sb-active">
                    <span class="hc-sb-tag">Sidereal (Yıldızıl)</span>
                    <strong>${moonSidSign.icon} ${moonSidSign.name}</strong>
                    <span>${moonSidDeg}°</span>
                </div>
            </div>
        </div>
    `;

    const descHtml = `
        <p><strong>Tropikal ile Sidereal Arasındaki Fark Nedir?</strong></p>
        <p>• <strong>Batı (Tropikal) Zodyak:</strong> Dünya ile Güneş'in mevsimsel ilişkisini (Ekinokslar) esas alır ve psikolojik/karakteristik yapınızı tanımlar.</p>
        <p>• <strong>Yıldızıl (Sidereal) Zodyak:</strong> Samanyolu galaksisindeki gerçek sabit yıldızların konumunu esas alır. Dünyanın presesyon (yalpalama) hareketi nedeniyle her 72 yılda 1 derece geriye kayar (şu an ~24°).</p>
        <p><strong>Ruhsal Anlamı:</strong> Sidereal burcunuz, ruhunuzun dünyadaki saf kadersel planını, karma derslerini ve spiritüel özünü yansıtır. Eğer burcunuz bir önceki burca kaydıysa, bu o burcun olgunlaştırıcı erdemlerini de hayatınıza entegre etmeniz gerektiği anlamına gelir.</p>
    `;

    document.getElementById('hc-sb-hero').innerHTML = heroHtml;
    document.getElementById('hc-sb-compare').innerHTML = compareHtml;
    document.getElementById('hc-sb-desc').innerHTML = descHtml;

    document.getElementById('hc-sb-result').classList.add('visible');
    document.getElementById('hc-sb-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

