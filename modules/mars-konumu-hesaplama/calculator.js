function hcMarsKonumuHesapla() {
    const birthDate = document.getElementById('hc-map-birth').value;
    const birthTime = document.getElementById('hc-map-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Mars mean elements
    let L = (355.453 + 0.5240248 * n) % 360;
    let M = (19.387 + 0.5240208 * n) % 360;
    
    // Geocentric correction is complex, using simplified heliocentric to geocentric offset
    let lambda = L + 10.70 * Math.sin(M * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const marsInterpretations = {
        "Koç": "Mars Koç'ta (Kendi Evinde): Çok enerjik, cesur ve doğrudan eyleme geçen. Liderlik vasfı yüksek.",
        "Boğa": "Mars Boğa'da: Sabırlı, dayanıklı ve somut sonuçlar için mücadele eden. İnatçı bir enerji.",
        "İkizler": "Mars İkizler'de: Zihinsel olarak aktif, tartışmacı ve çok yönlü enerji. İletişim yoluyla mücadele.",
        "Yengeç": "Mars Yengeç'te: Duygusal olarak tepkisel, korumacı ve dolaylı eylem tarzı. Yuvası için savaşan.",
        "Aslan": "Mars Aslan'da: Yaratıcı, cömert ve dikkat çekmeyi seven mücadele tarzı. Gururlu ve kararlı.",
        "Başak": "Mars Başak'ta: Detaycı, titiz ve planlı çalışma enerjisi. Hizmet ve mükemmellik odaklı.",
        "Terazi": "Mars Terazi'de: Diplomatik, adil ve uyum arayan mücadele tarzı. Kararsızlık eylemi geciktirebilir.",
        "Akrep": "Mars Akrep'te (Kendi Evinde): Çok güçlü, stratejik, ketum ve dayanıklı enerji. Derin bir mücadele gücü.",
        "Yay": "Mars Yay'da: Maceracı, özgürlükçü ve vizyoner enerji. İnandığı değerler için savaşan.",
        "Oğlak": "Mars Oğlak'ta (Yücelimde): Disiplinli, hırslı, sabırlı ve kalıcı başarı odaklı eylem tarzı.",
        "Kova": "Mars Kova'da: Yenilikçi, bağımsız ve toplumsal idealler için mücadele eden özgün enerji.",
        "Balık": "Mars Balık'ta: Sezgisel, merhametli ve akışta kalan enerji. Hayalleri için dolaylı yoldan çabalayan."
    };

    document.getElementById('hc-res-map-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-map-desc').innerText = `Doğduğunuz anda Mars ${signName} burcunun ${degree} derecesinde bulunuyordu. Mars, astrolojide enerjinizi, mücadele gücünüzü, arzularınızı ve nasıl eyleme geçtiğinizi temsil eder: ${marsInterpretations[signName]}`;
    document.getElementById('hc-mars-pos-result').classList.add('visible');
}
