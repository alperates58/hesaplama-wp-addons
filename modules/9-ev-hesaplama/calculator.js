function hcHouse9Hesapla() {
    const birthDate = document.getElementById('hc-h9-birth').value;
    const birthTime = document.getElementById('hc-h9-time').value;
    const coords = document.getElementById('hc-h9-city').value.split(',');

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
    const h9SignIndex = (ascSignIndex + 8) % 12;
    const signName = signs[h9SignIndex];

    const descriptions = {
        "Koç": "İnançlarda doğrudan, maceracı ve yeni fikirleri hızla benimseyen bir yapı.",
        "Boğa": "Geleneksel, sağlam ve pratik bir hayat felsefesi.",
        "İkizler": "Zihinsel merakı yüksek, çok yönlü ve sürekli öğrenmeye açık bir vizyon.",
        "Yengeç": "Duygusal bağları olan, korumacı ve geleneksel bir inanç sistemi.",
        "Aslan": "Yaratıcı, gururlu ve vizyoner bir hayat amacı.",
        "Başak": "Detaylı, analizci ve pratik fayda sağlayan bir felsefe.",
        "Terazi": "Uyumlu, adil ve estetik odaklı bir dünya görüşü.",
        "Akrep": "Derin, gizemli, araştırmacı ve dönüştürücü bir inanç yapısı.",
        "Yay": "Doğal evinde, iyimser, maceracı, felsefi ve geniş vizyonlu.",
        "Oğlak": "Disiplinli, ciddi ve kurumsal bir öğrenim ve inanç anlayışı.",
        "Kova": "Sıra dışı, insancıl, teknolojik ve özgürlükçü bir felsefe.",
        "Balık": "Sezgisel, hayalperest, ruhsal ve evrensel bir inanç dünyası."
    };

    document.getElementById('hc-res-h9-val').innerText = signName;
    document.getElementById('hc-res-h9-desc').innerText = `9. ev, yüksek öğrenimi, inançları, felsefeyi, uzak yolculukları, yabancı kültürleri ve hayata bakış açınızı temsil eder. Sizin 9. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-9-ev-hesaplama-result').classList.add('visible');
}
