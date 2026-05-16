function hcHouse7Hesapla() {
    const birthDate = document.getElementById('hc-h7-birth').value;
    const birthTime = document.getElementById('hc-h7-time').value;
    const coords = document.getElementById('hc-h7-city').value.split(',');

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
    const h7SignIndex = (ascSignIndex + 6) % 12;
    const signName = signs[h7SignIndex];

    const descriptions = {
        "Koç": "İlişkilerde dinamizm, dürüstlük ve bazen rekabetçi bir ortaklık yapısı.",
        "Boğa": "Güven odaklı, sadık ve maddi-manevi huzur arayan uzun süreli ilişkiler.",
        "İkizler": "Zihinsel uyum, bol iletişim ve sosyal etkileşimi yüksek ortaklıklar.",
        "Yengeç": "Duygusal derinlik, şefkat ve aile sıcaklığı aranan bir evlilik anlayışı.",
        "Aslan": "Görkemli, dikkat çekici ve gurur duyulan partnerlerle kurulan bağlar.",
        "Başak": "Pratik, hizmet odaklı ve düzen arayan, analizci bir ilişki yaklaşımı.",
        "Terazi": "Uyum, adalet ve estetik dengenin ön planda olduğu zarif ortaklıklar.",
        "Akrep": "Tutkulu, yoğun, gizemli ve dönüştürücü etkisi yüksek derin bağlar.",
        "Yay": "Maceracı, vizyoner, öğrenmeyi teşvik eden ve özgürlükçü birliktelikler.",
        "Oğlak": "Ciddi, disiplinli, statü odaklı ve sağlam temellere dayanan evlilikler.",
        "Kova": "Sıra dışı, arkadaşça, entelektüel ve özgürlükçü bir ortaklık anlayışı.",
        "Balık": "Sezgisel, romantik, hayalperest ve merhamet dolu bir ilişki dünyası."
    };

    document.getElementById('hc-res-h7-val').innerText = signName;
    document.getElementById('hc-res-h7-desc').innerText = `7. ev (Alçalan), evliliğinizi, ciddi ortaklıklarınızı, hayattaki 'öteki' ile kurduğunuz bağı ve partnerinizde aradığınız özellikleri temsil eder. Sizin 7. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-7-ev-hesaplama-result').classList.add('visible');
}
