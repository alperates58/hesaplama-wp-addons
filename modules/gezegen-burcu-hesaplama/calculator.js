function hcGezegenBurcuHesapla() {
    const birthDate = document.getElementById('hc-ps-birth').value;
    const birthTime = document.getElementById('hc-ps-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];

    function getPlanetSign(lambda) {
        let norm = lambda % 360;
        if (norm < 0) norm += 360;
        return signs[Math.floor(norm / 30)];
    }

    // Sun
    let Ls = (280.460 + 0.9856474 * n) % 360;
    let gs = (357.528 + 0.9856003 * n) % 360;
    let sunL = Ls + 1.915 * Math.sin(gs * Math.PI / 180);

    // Moon
    let Lm = (218.316 + 13.176396 * n) % 360;
    let Mm = (134.963 + 13.064993 * n) % 360;
    let moonL = Lm + 6.289 * Math.sin(Mm * Math.PI / 180);

    // Simplified planet L (Mean longitude + major correction)
    let merL = (sunL + ( ( (252.250 + 4.0923344 * n) - sunL + 180) % 360 - 180 ) ) % 360; // Approx relative
    let venL = (sunL + ( ( (181.979 + 1.6021302 * n) - sunL + 180) % 360 - 180 ) ) % 360;
    let marsL = (355.453 + 0.5240248 * n + 10.70 * Math.sin((19.387 + 0.5240208 * n) * Math.PI / 180)) % 360;
    let jupL = (34.404 + 0.0830853 * n + 5.55 * Math.sin((19.388 + 0.0830853 * n) * Math.PI / 180)) % 360;
    let satL = (49.944 + 0.0334597 * n + 6.39 * Math.sin((316.967 + 0.0334442 * n) * Math.PI / 180)) % 360;
    let uraL = (313.232 + 0.0117258 * n + 0.52 * Math.sin((142.956 + 0.0117258 * n) * Math.PI / 180)) % 360;
    let nepL = (304.880 + 0.0059735 * n + 0.23 * Math.sin((260.247 + 0.0059735 * n) * Math.PI / 180)) % 360;
    let pluL = (238.928 + 0.0039755 * n + 0.17 * Math.sin((14.882 + 0.0039755 * n) * Math.PI / 180)) % 360;

    const results = [
        { name: "Güneş", sign: getPlanetSign(sunL), color: "#f1c40f" },
        { name: "Ay", sign: getPlanetSign(moonL), color: "#bdc3c7" },
        { name: "Merkür", sign: getPlanetSign(merL), color: "#e67e22" },
        { name: "Venüs", sign: getPlanetSign(venL), color: "#fd79a8" },
        { name: "Mars", sign: getPlanetSign(marsL), color: "#c0392b" },
        { name: "Jüpiter", sign: getPlanetSign(jupL), color: "#9b59b6" },
        { name: "Satürn", sign: getPlanetSign(satL), color: "#7f8c8d" },
        { name: "Uranüs", sign: getPlanetSign(uraL), color: "#3498db" },
        { name: "Neptün", sign: getPlanetSign(nepL), color: "#0984e3" },
        { name: "Plüton", sign: getPlanetSign(pluL), color: "#2d3436" }
    ];

    let html = "";
    results.forEach(p => {
        html += `<div class="hc-ps-item">
            <span class="hc-ps-name">${p.name}</span>
            <span class="hc-ps-sign" style="color:${p.color}">${p.sign}</span>
        </div>`;
    });

    document.getElementById('hc-ps-grid').innerHTML = html;
    document.getElementById('hc-planet-signs-result').classList.add('visible');
}
