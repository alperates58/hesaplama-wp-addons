function hcDogumHaritasiHesapla() {
    const dStr = document.getElementById('hc-chart-date').value;
    const tStr = document.getElementById('hc-chart-time').value;
    const loc = document.getElementById('hc-chart-city').value.split(',').map(Number);

    if (!dStr || !tStr) { alert('Lütfen tarih ve saat girin.'); return; }

    const date = new Date(dStr + 'T' + tStr);
    const jd = (date.getTime() / 86400000) + 2440587.5;
    const d = jd - 2451543.5;
    const rad = Math.PI / 180;

    function norm(x) { x %= 360; return x < 0 ? x + 360 : x; }

    // Sidereal Time for Ascendant
    const ut = date.getUTCHours() + date.getUTCMinutes()/60 + date.getUTCSeconds()/3600;
    const gmst = norm(280.46061837 + 360.98564736629 * d);
    const lst = norm(gmst + loc[1]);
    const obl = 23.439 - 0.0000004 * d;
    const asc = norm(Math.atan2(Math.cos(lst * rad), -Math.sin(lst * rad) * Math.cos(obl * rad) - Math.tan(loc[0] * rad) * Math.sin(obl * rad)) / rad + 90);

    const burclar = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const ascBurcIdx = Math.floor(asc / 30);

    // Planets Logic (Simplified)
    function getHeliocentric(planet, d) {
        if (!planet.a) return { x: 0, y: 0, z: 0 };
        let { N, i, w, a, e, M0, M1 } = planet;
        let M = norm(M0 + M1 * d);
        let E = M + (180 / Math.PI) * e * Math.sin(M * rad) * (1 + e * Math.cos(M * rad));
        for(let j=0; j<3; j++) E = E - (E - (180/Math.PI)*e*Math.sin(E*rad) - M) / (1 - e*Math.cos(E*rad));
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
        earth: { N: 0, i: 0, w: 102.9404 + 0.0000470935 * d, a: 1.00000011, e: 0.01671022 - 0.0000000012 * d, M0: 357.5291, M1: 0.98560028 },
        mercury: { N: 48.3313 + 0.0000324587 * d, i: 7.0047 + 0.00000005 * d, w: 77.4564 + 0.0000155447 * d, a: 0.387098, e: 0.205635, M0: 174.7947, M1: 4.0923344 },
        venus: { N: 76.6799 + 0.000024659 * d, i: 3.3946 + 0.0000000275 * d, w: 131.5721 + 0.000004085 * d, a: 0.72333, e: 0.00677, M0: 181.9797, M1: 1.6021302 },
        mars: { N: 49.5574 + 0.000021108 * d, i: 1.8497 - 0.0000000178 * d, w: 336.0408 + 0.00001228 * d, a: 1.523688, e: 0.093405, M0: 18.6021, M1: 0.5240207 },
        jupiter: { N: 100.4542 + 0.0000276854 * d, i: 1.3030 - 0.0000000155 * d, w: 273.8777 + 0.0000164505 * d, a: 5.202561, e: 0.048498, M0: 19.8950, M1: 0.0830853 },
        saturn: { N: 113.6634 + 0.000023981 * d, i: 2.4886 - 0.0000001081 * d, w: 339.3939 + 0.0000297661 * d, a: 9.55475, e: 0.055546 - 0.00000000949 * d, M0: 316.9670, M1: 0.033444228 }
    };

    const pE = getHeliocentric(planetsData.earth, d);
    const sunLon = norm(Math.atan2(-pE.y, -pE.x) / rad);
    const planets = [{ name: "Yükselen", lon: asc }, { name: "Güneş", lon: sunLon }];

    for (let p in planetsData) {
        if (p === 'earth') continue;
        const pP = getHeliocentric(planetsData[p], d);
        const lonG = norm(Math.atan2(pP.y - pE.y, pP.x - pE.x) / rad);
        planets.push({ name: p.charAt(0).toUpperCase() + p.slice(1).replace('mercury','Merkür').replace('venus','Venüs').replace('jupiter','Jüpiter').replace('saturn','Satürn'), lon: lonG });
    }

    // Whole Sign Houses
    const houses = [];
    for(let i=0; i<12; i++) {
        const idx = (ascBurcIdx + i) % 12;
        houses.push({ num: i + 1, burc: burclar[idx] });
    }

    let pList = "<ul>";
    planets.forEach(p => {
        const b = burclar[Math.floor(p.lon / 30)];
        const houseNum = ((Math.floor(p.lon / 30) - ascBurcIdx + 12) % 12) + 1;
        pList += `<li><strong>${p.name}:</strong> ${b} (${houseNum}. Ev)</li>`;
    });
    pList += "</ul>";

    let hList = "<ul>";
    houses.forEach(h => {
        hList += `<li><strong>${h.num}. Ev:</strong> ${h.burc}</li>`;
    });
    hList += "</ul>";

    document.getElementById('hc-planets-list').innerHTML = pList;
    document.getElementById('hc-houses-list').innerHTML = hList;

    const summary = `
        <h4>Harita Özeti</h4>
        <p>Yükselen burcunuz <strong>${burclar[ascBurcIdx]}</strong> olduğu için haritanızın birinci evi ${burclar[ascBurcIdx]} burcuyla başlar. 
        Güneşiniz <strong>${burclar[Math.floor(sunLon / 30)]}</strong> burcunda ve <strong>${((Math.floor(sunLon / 30) - ascBurcIdx + 12) % 12) + 1}. evde</strong> konumlanmıştır. 
        Bu harita, yaşam enerjinizin, karakterinizin ve kaderinizin gökyüzündeki izdüşümüdür.</p>
    `;

    document.getElementById('hc-chart-summary').innerHTML = summary;
    document.getElementById('hc-chart-result').classList.add('visible');
}
