function hcStSetTab(mode) {
    document.querySelectorAll('.hc-st-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.hc-st-pane').forEach(p => p.classList.remove('active'));

    if (mode === 'auto') {
        document.querySelectorAll('.hc-st-tab')[0].classList.add('active');
        document.getElementById('hc-st-pane-auto').classList.add('active');
    } else {
        document.querySelectorAll('.hc-st-tab')[1].classList.add('active');
        document.getElementById('hc-st-pane-manual').classList.add('active');
    }
}

function hcStationaryOtomatikHesapla() {
    const dStr = document.getElementById('hc-st-date').value;
    const tStr = document.getElementById('hc-st-time').value || '12:00';

    if (!dStr) {
        alert('Lütfen doğum tarihinizi girin.');
        return;
    }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    function getHeliocentric(p, d) {
        if (!p.a) return { x: 0, y: 0, z: 0 };
        let { N, i, w, a, e, M0, M1 } = p;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for (let j = 0; j < 3; j++) E = E - (E - (180 / Math.PI) * e * Math.sin(E * rad) - M) / (1 - e * Math.cos(E * rad));
        let xv = a * (Math.cos(E * rad) - e);
        let yv = a * (Math.sqrt(1 - e * e) * Math.sin(E * rad));
        let v = Math.atan2(yv, xv) / rad;
        let r = Math.sqrt(xv * xv + yv * yv);
        let lonecl = norm(v + w);
        let x = r * (Math.cos(N * rad) * Math.cos(lonecl * rad) - Math.sin(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let y = r * (Math.sin(N * rad) * Math.cos(lonecl * rad) + Math.cos(N * rad) * Math.sin(lonecl * rad) * Math.cos(i * rad));
        let z = r * Math.sin(lonecl * rad) * Math.sin(i * rad);
        return { x, y, z };
    }

    const planetsData = {
        earth: { N: 0, i: 0, w: 102.9404, a: 1.00000011, e: 0.01671022, M0: 357.5291, M1: 0.98560028 },
        mercury: { name: "Merkür", icon: "☿️", threshold: 0.12, N: 48.3313, i: 7.0047, w: 77.4564, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { name: "Venüs", icon: "♀️", threshold: 0.08, N: 76.6799, i: 3.3946, w: 131.5721, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { name: "Mars", icon: "♂️", threshold: 0.06, N: 49.5574, i: 1.8497, w: 336.0408, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { name: "Jüpiter", icon: "♃", threshold: 0.03, N: 100.4542, i: 1.3030, w: 273.8777, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { name: "Satürn", icon: "♄", threshold: 0.02, N: 113.6634, i: 2.4886, w: 339.3939, a: 9.55475, e: 0.055546, M0: 316.9670, M1: 0.033444228 },
        uranus: { name: "Uranüs", icon: "♅", threshold: 0.015, N: 74.0005, i: 0.7733, w: 96.6612, a: 19.18171, e: 0.047318, M0: 142.5905, M1: 0.0117258 },
        neptune: { name: "Neptün", icon: "♆", threshold: 0.01, N: 131.7806, i: 1.7700, w: 272.8461, a: 30.05826, e: 0.008606, M0: 260.2471, M1: 0.0059951 },
        pluto: { name: "Plüton", icon: "♇", threshold: 0.008, N: 110.3034, i: 17.1417, w: 113.7632, a: 39.48168, e: 0.248807, M0: 14.882, M1: 0.00396 }
    };

    function getGeocentricLon(key, dVal) {
        const pE = getHeliocentric(planetsData.earth, dVal);
        const pP = getHeliocentric(planetsData[key], dVal);
        return norm(Math.atan2(pP.y - pE.y, pP.x - pE.x) / rad);
    }

    const dCenter = jd - 2451545.0;
    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];

    const results = [];
    let stationaryCount = 0;

    for (let k in planetsData) {
        if (k === 'earth') continue;
        const p = planetsData[k];
        const lonCenter = getGeocentricLon(k, dCenter);
        const lonPrev = getGeocentricLon(k, dCenter - 0.5);
        const lonNext = getGeocentricLon(k, dCenter + 0.5);

        let speed = lonNext - lonPrev;
        if (speed > 180) speed -= 360;
        if (speed < -180) speed += 360;

        const isStationary = Math.abs(speed) <= p.threshold;
        const isRetro = speed < -p.threshold;

        let statusText = "Direkt (İleri)";
        let statusBadge = "Direkt";
        let statusColor = "#10b981";

        if (isStationary) {
            stationaryCount++;
            statusText = speed < 0 ? "Durağan Retro (SR)" : "Durağan Direkt (SD)";
            statusBadge = "DURAĞAN (S)";
            statusColor = "#ef4444";
        } else if (isRetro) {
            statusText = "Retrograde (Geri)";
            statusBadge = "Retro (Rx)";
            statusColor = "#f59e0b";
        }

        const signIdx = Math.floor(lonCenter / 30);
        const degInSign = (lonCenter % 30).toFixed(1);

        results.push({
            name: p.name,
            icon: p.icon,
            sign: signs[signIdx],
            deg: degInSign,
            speed: (speed).toFixed(3),
            isStationary: isStationary,
            statusBadge: statusBadge,
            statusText: statusText,
            statusColor: statusColor
        });
    }

    renderStResults(results, stationaryCount);
}

function hcStationaryManuelHesapla() {
    const planetKey = document.getElementById('hc-st-planet').value;
    const signKey = document.getElementById('hc-st-sign').value;

    const planetNames = {
        merkur: { name: "Merkür", icon: "☿️", trait: "Zihinsel Konsantrasyon & Lazer Odak" },
        venus: { name: "Venüs", icon: "♀️", trait: "Kökten Sadakat & Sarsılmaz Estetik" },
        mars: { name: "Mars", icon: "♂️", trait: "Patlamaya Hazır İrade & Saf Güç" },
        jupiter: { name: "Jüpiter", icon: "♃", trait: "Kadersel Bilgelik & Ruhsal Rehberlik" },
        saturn: { name: "Satürn", icon: "♄", trait: "Kalıcı Miras & Çelik Disiplin" },
        uranus: { name: "Uranüs", icon: "♅", trait: "Deha Seviyesinde İlham & İcatçılık" },
        neptun: { name: "Neptün", icon: "♆", trait: "Mistik Şifa & Sınırsız Sezgi" },
        pluton: { name: "Plüton", icon: "♇", trait: "Küllerinden Doğan Karizma & Manyetizma" }
    };

    const signNames = {
        koc: "Koç", boga: "Boğa", ikizler: "İkizler", yengec: "Yengeç", aslan: "Aslan", basak: "Başak",
        terazi: "Terazi", akrep: "Akrep", yay: "Yay", oglak: "Oğlak", kova: "Kova", balik: "Balık"
    };

    const p = planetNames[planetKey] || planetNames.merkur;
    const sName = signNames[signKey] || "Koç";

    const singleResult = [{
        name: p.name,
        icon: p.icon,
        sign: sName,
        deg: "15.0",
        speed: "0.000",
        isStationary: true,
        statusBadge: "DURAĞAN (S)",
        statusText: "Durağan Konum (Stationary)",
        statusColor: "#ef4444"
    }];

    renderStResults(singleResult, 1, `Manuel İnceleme: ${p.icon} ${p.name} (S) ${sName} Burcunda`);
}

function renderStResults(results, stationaryCount, customTitle) {
    let heroTitle = customTitle || (stationaryCount > 0 ? `Doğumunuzda ${stationaryCount} Adet Durağan (S) Gezegen Tespit Edildi!` : "Haritanızda Durağan Gezegen Bulunmuyor (Akıcı Dinamik)");
    let heroBadge = stationaryCount > 0 ? "⚡ Yüksek Kadersel Odak" : "🌌 Dengeli Hareket";

    let heroHtml = `
        <div class="hc-st-hero-card">
            <div class="hc-st-hero-badge">${heroBadge}</div>
            <div class="hc-st-hero-title">${heroTitle}</div>
            <p class="hc-st-hero-sub">Durağan gezegenler enerjilerini tek bir dereceye sabitleyerek kişinin en keskin yeteneğini oluşturur.</p>
        </div>
    `;

    let listHtml = "";
    results.forEach(r => {
        listHtml += `
            <div class="hc-st-item ${r.isStationary ? 'hc-st-highlight' : ''}">
                <div class="hc-st-head">
                    <span class="hc-st-icon">${r.icon}</span>
                    <div class="hc-st-info">
                        <strong>${r.name}</strong> — ${r.sign} (${r.deg}°)
                        <div class="hc-st-speed">Günlük Hız: ${r.speed}°/gün (${r.statusText})</div>
                    </div>
                    <span class="hc-st-badge" style="background: ${r.statusColor}; color: #fff;">${r.statusBadge}</span>
                </div>
            </div>
        `;
    });

    const descHtml = `
        <p><strong>Durağan (Stationary - S) Gezegen Nedir?</strong> Gezegenler gökyüzünde ileri giderken geri harekete (Retro) geçmeden hemen önce ya da retrodan çıkıp ileri harekete geçmeden önce birkaç gün boyunca adeta dururlar. Bu duraklama anında doğan haritalarda o gezegenin enerjisi yoğunlaşmış bir lazer ışını gibi çalışır.</p>
        <p><strong>Etki Mekanizması:</strong> Haritanızdaki durağan gezegen, hayat hikayenizin en belirgin uzmanlık ve kadersel güç noktasını temsil eder. O gezegenin temsil ettiği temalarda ömür boyu derin bir yetkinlik kazanırsınız.</p>
    `;

    document.getElementById('hc-st-hero').innerHTML = heroHtml;
    document.getElementById('hc-st-list').innerHTML = listHtml;
    document.getElementById('hc-st-desc').innerHTML = descHtml;

    document.getElementById('hc-st-result').classList.add('visible');
    document.getElementById('hc-st-result').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

