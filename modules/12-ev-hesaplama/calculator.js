function hcHouse12Hesapla() {
    const birthDate = document.getElementById('hc-h12-birth').value;
    const birthTime = document.getElementById('hc-h12-time').value;
    const coords = document.getElementById('hc-h12-city').value.split(',');

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
    const h12SignIndex = (ascSignIndex + 11) % 12;
    const signName = signs[h12SignIndex];

    const descriptions = {
        "Koç": "Bilinçaltında bastırılmış öfke veya cesaret, gizli bir rekabetçilik.",
        "Boğa": "Maddi güvenlikle ilgili bilinçaltı korkuları veya gizli bir huzur arayışı.",
        "İkizler": "Zihinsel huzursuzluk, gizli kalan iletişimler ve bilinçaltında bol fikir.",
        "Yengeç": "Derin duygusal hassasiyet, ailevi sırlar ve bilinçaltında korumacı bir yapı.",
        "Aslan": "Gizli bir onaylanma ihtiyacı, yaratıcı potansiyelin içselleşmesi ve gurur.",
        "Başak": "Detaycı bir bilinçaltı, gizli endişeler ve mükemmeliyetçilikle baş etme.",
        "Terazi": "İlişkilerde gizli kalan uyum arayışı, bilinçaltında adalet sorgulama.",
        "Akrep": "Yoğun içsel dönüşüm, sırlar, derin sezgiler ve bilinçaltında tutku.",
        "Yay": "Ruhsal keşifler, gizli bir özgürlük tutkusu ve felsefi bir iç dünya.",
        "Oğlak": "Bilinçaltında sorumluluk duygusu, gizli hırslar ve içsel disiplin.",
        "Kova": "Sıra dışı rüyalar, gizli toplumsal idealler ve bilinçaltında bağımsızlık.",
        "Balık": "Doğal evinde, derin merhamet, ruhsal teslimiyet ve sınırsız hayal gücü."
    };

    document.getElementById('hc-res-h12-val').innerText = signName;
    document.getElementById('hc-res-h12-desc').innerText = `12. ev, bilinçaltınızı, gizli düşmanları, sırlarımızı, izolasyonu, ruhsal çalışmaları ve rüyalarımızı temsil eder. Sizin 12. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-12-ev-hesaplama-result').classList.add('visible');
}
