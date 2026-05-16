function hcHouse5Hesapla() {
    const birthDate = document.getElementById('hc-h5-birth').value;
    const birthTime = document.getElementById('hc-h5-time').value;
    const coords = document.getElementById('hc-h5-city').value.split(',');

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
    const h5SignIndex = (ascSignIndex + 4) % 12;
    const signName = signs[h5SignIndex];

    const descriptions = {
        "Koç": "Aşk hayatında heyecanlı, tutkulu ve rekabetçi bir tutum.",
        "Boğa": "Sanatsal yetenekler, kalıcı ilişkiler ve keyif odaklı bir yaratıcılık.",
        "İkizler": "Zihinsel hobiler, flörtöz bir yapı ve neşeli bir aşk anlayışı.",
        "Yengeç": "Çocuklara düşkünlük, duygusal hobiler ve romantik bir yapı.",
        "Aslan": "Görkemli bir yaratıcılık, sahne ışıkları ve cömert bir aşk dili.",
        "Başak": "Detaylı hobiler, analitik yaratıcılık ve seçici bir aşk hayatı.",
        "Terazi": "Estetik anlayışı yüksek, romantik ve zarif bir sosyal hayat.",
        "Akrep": "Derin tutkular, gizemli hobiler ve yoğun bir yaratıcı enerji.",
        "Yay": "Maceracı aşklar, keşif odaklı hobiler ve iyimser bir yaşam sevinci.",
        "Oğlak": "Disiplinli yaratıcılık, ciddi hobiler ve geleneksel bir aşk anlayışı.",
        "Kova": "Sıra dışı hobiler, özgür ruhlu aşklar ve kolektif yaratıcılık.",
        "Balık": "İlham dolu bir yaratıcılık, romantik hayaller ve fedakar bir aşk dili."
    };

    document.getElementById('hc-res-h5-val').innerText = signName;
    document.getElementById('hc-res-h5-desc').innerText = `5. ev, aşk hayatınızı, flörtleri, yaratıcılığınızı, hobilerinizi ve çocuklarla olan ilişkinizi temsil eder. Sizin 5. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-5-ev-hesaplama-result').classList.add('visible');
}
