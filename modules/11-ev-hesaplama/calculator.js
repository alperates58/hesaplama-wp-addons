function hcHouse11Hesapla() {
    const birthDate = document.getElementById('hc-h11-birth').value;
    const birthTime = document.getElementById('hc-h11-time').value;
    const coords = document.getElementById('hc-h11-city').value.split(',');

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const lat = parseFloat(coords[0]);
    const lon = parseFloat(coords[1]);
    const date = new Date(birthDate + 'T' + birthTime);
    
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const d = jd - 2451545.0;
    let gst = (280.46061837 + 360.98564736629 * d) % 360;
    let lst = (gst + lon) % 360;
    if (lst < 0) lst += 360;
    const eps = 23.439 - 0.0000004 * d;

    const ascRad = Math.atan2(-Math.cos(lst * Math.PI / 180), (Math.sin(eps * Math.PI / 180) * Math.tan(lat * Math.PI / 180) + Math.cos(eps * Math.PI / 180) * Math.sin(lst * Math.PI / 180)));
    let ascDeg = (ascRad * 180 / Math.PI) % 360;
    if (ascDeg < 0) ascDeg += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const ascSignIndex = Math.floor(ascDeg / 30);
    const h11SignIndex = (ascSignIndex + 10) % 12;
    const signName = signs[h11SignIndex];

    const descriptions = {
        "Koç": "Sosyal çevrelerde aktif, öncü ve bazen sabırsız bir tutum.",
        "Boğa": "Sadık arkadaşlar, güvenli sosyal çevreler ve kalıcı hayaller.",
        "İkizler": "Geniş bir sosyal ağ, çok sayıda arkadaş ve zihinsel projeler.",
        "Yengeç": "Aile gibi hissedilen arkadaşlıklar ve duygusal güven aranan gruplar.",
        "Aslan": "Popülerlik, dikkat çeken sosyal gruplar ve görkemli hayaller.",
        "Başak": "Faydalı arkadaşlıklar, düzenli grup çalışmaları ve pratik idealler.",
        "Terazi": "Uyumlu sosyal çevreler, estetik odaklı gruplar ve adalet arayan hayaller.",
        "Akrep": "Derin ve stratejik arkadaşlıklar, gizemli gruplar ve dönüştürücü idealler.",
        "Yay": "Vizyoner arkadaşlar, uluslararası çevreler ve geniş kapsamlı umutlar.",
        "Oğlak": "Disiplinli sosyal çevreler, statü sahibi arkadaşlar ve ciddi gelecek planları.",
        "Kova": "Sıra dışı gruplar, teknolojik topluluklar ve özgürlükçü idealler.",
        "Balık": "Sezgisel arkadaşlıklar, sanatsal gruplar ve ruhsal hayaller."
    };

    document.getElementById('hc-res-h11-val').innerText = signName;
    document.getElementById('hc-res-h11-desc').innerText = `11. ev, sosyal çevrenizi, arkadaşlıklarınızı, grup çalışmalarını, toplumsal ideallerinizi ve hayallerinizi temsil eder. Sizin 11. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-11-ev-hesaplama-result').classList.add('visible');
}
