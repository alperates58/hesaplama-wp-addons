function hcHouse4Hesapla() {
    const birthDate = document.getElementById('hc-h4-birth').value;
    const birthTime = document.getElementById('hc-h4-time').value;
    const coords = document.getElementById('hc-h4-city').value.split(',');

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
    const h4SignIndex = (ascSignIndex + 3) % 12;
    const signName = signs[h4SignIndex];

    const descriptions = {
        "Koç": "Hareketli, bazen gergin ama enerjik bir aile ortamı.",
        "Boğa": "Güvenli, huzurlu ve geleneklerine bağlı bir yuva yapısı.",
        "İkizler": "Bol iletişimin olduğu, meraklı ve sosyal bir aile hayatı.",
        "Yengeç": "Derin duygusal bağlar, köklere bağlılık ve korumacı bir yuva.",
        "Aslan": "Neşeli, gurur duyulan ve yaratıcı bir ev ortamı.",
        "Başak": "Düzenli, pratik ve hizmet odaklı bir aile yaşantısı.",
        "Terazi": "Uyumlu, estetik ve huzur arayan bir ev atmosferi.",
        "Akrep": "Tutkulu, gizemli ve dönüşüm yaratan derin aile bağları.",
        "Yay": "Özgürlükçü, neşeli ve vizyoner bir ev hayatı.",
        "Oğlak": "Disiplinli, saygın ve kuralları olan bir aile yapısı.",
        "Kova": "Sıra dışı, özgür ve arkadaşça bir yuva enerjisi.",
        "Balık": "Hayalperest, merhametli ve ruhsal bir ev atmosferi."
    };

    document.getElementById('hc-res-h4-val').innerText = signName;
    document.getElementById('hc-res-h4-desc').innerText = `4. ev, ailenizi, köklerinizi, babanızı (bazı ekollerde anne), evinizi ve içsel huzurunuzu temsil eder. Sizin 4. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-4-ev-hesaplama-result').classList.add('visible');
}
