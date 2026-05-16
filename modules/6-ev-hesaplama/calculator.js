function hcHouse6Hesapla() {
    const birthDate = document.getElementById('hc-h6-birth').value;
    const birthTime = document.getElementById('hc-h6-time').value;
    const coords = document.getElementById('hc-h6-city').value.split(',');

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
    const h6SignIndex = (ascSignIndex + 5) % 12;
    const signName = signs[h6SignIndex];

    const descriptions = {
        "Koç": "İş hayatında rekabetçi, enerjik ve liderlik özelliklerini kullanan bir yapı.",
        "Boğa": "Sabırlı, düzenli ve maddi getirisi olan rutinlere odaklı bir çalışma stili.",
        "İkizler": "Çok yönlü, iletişim odaklı ve zihinsel çeviklik gerektiren işler.",
        "Yengeç": "Başkalarına hizmet etmeyi seven, korumacı ve duygusal bağlılığı olan rutinler.",
        "Aslan": "Yaratıcı işler, sahnede olmayı gerektiren veya dikkat çeken bir hizmet anlayışı.",
        "Başak": "Titiz, analizci, mükemmeliyetçi ve fayda sağlamaya odaklı çalışma hayatı.",
        "Terazi": "Diplomatik, estetik ve ortaklaşa yürütülen uyumlu çalışma süreçleri.",
        "Akrep": "Stratejik, derin araştırmalar gerektiren ve dönüştürücü iş rutinleri.",
        "Yay": "Vizyoner, öğrenmeyi teşvik eden ve özgürlükçü bir iş ortamı ihtiyacı.",
        "Oğlak": "Disiplinli, hırslı, kurallara uyan ve statü getiren sorumluluklar.",
        "Kova": "Yenilikçi, teknolojik ve topluma fayda sağlayan sıra dışı işler.",
        "Balık": "Sezgisel, merhametli ve yardımlaşma odaklı bir hizmet anlayışı."
    };

    document.getElementById('hc-res-h6-val').innerText = signName;
    document.getElementById('hc-res-h6-desc').innerText = `6. ev, günlük rutinlerinizi, çalışma hayatınızı, sağlığınızı, hizmet etme biçiminizi ve evcil hayvanları temsil eder. Sizin 6. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-6-ev-hesaplama-result').classList.add('visible');
}
