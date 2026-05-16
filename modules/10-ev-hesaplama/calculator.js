function hcHouse10Hesapla() {
    const birthDate = document.getElementById('hc-h10-birth').value;
    const birthTime = document.getElementById('hc-h10-time').value;
    const coords = document.getElementById('hc-h10-city').value.split(',');

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
    const h10SignIndex = (ascSignIndex + 9) % 12;
    const signName = signs[h10SignIndex];

    const descriptions = {
        "Koç": "Kariyerde öncü, cesur ve rekabetçi bir duruş. Kendi yolunu açan bir profil.",
        "Boğa": "Güvenilir, sağlam ve maddi getirisi yüksek, prestijli bir kariyer yolu.",
        "İkizler": "İletişim, medya ve çok yönlülük gerektiren dinamik bir iş hayatı.",
        "Yengeç": "Besleyici, korumacı ve toplumsal fayda sağlayan, duyarlı bir kariyer.",
        "Aslan": "Liderlik, sahne önü, yaratıcılık ve dikkat çeken bir toplumsal başarı.",
        "Başak": "Uzmanlık, titizlik ve hizmet odaklı bir başarı anlayışı.",
        "Terazi": "Diplomasi, sanat ve ortaklıklar yoluyla elde edilen toplumsal statü.",
        "Akrep": "Stratejik, güçlü, dönüşüm yaratan ve derin etkisi olan bir kariyer.",
        "Yay": "Vizyoner, akademik veya uluslararası alanda başarı getiren bir yol.",
        "Oğlak": "Disiplinli, hırslı, kurumsal ve zirveyi hedefleyen bir kariyer inşası.",
        "Kova": "Sıra dışı, teknolojik ve toplumsal devrim yaratan yenilikçi başarılar.",
        "Balık": "İlham dolu, sezgisel ve merhamet odaklı bir toplumsal misyon."
    };

    document.getElementById('hc-res-h10-val').innerText = signName;
    document.getElementById('hc-res-h10-desc').innerText = `10. ev (MC - Tepe Noktası), kariyerinizi, toplumsal statünüzü, başarılarınızı, otorite figürleriyle ilişkilerinizi ve hayattaki en yüksek amacınızı temsil eder. Sizin 10. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-10-ev-hesaplama-result').classList.add('visible');
}
