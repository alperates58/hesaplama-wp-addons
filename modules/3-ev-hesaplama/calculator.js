function hcHouse3Hesapla() {
    const birthDate = document.getElementById('hc-h3-birth').value;
    const birthTime = document.getElementById('hc-h3-time').value;
    const coords = document.getElementById('hc-h3-city').value.split(',');

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
    const h3SignIndex = (ascSignIndex + 2) % 12;
    const signName = signs[h3SignIndex];

    const descriptions = {
        "Koç": "İletişimde doğrudan, enerjik ve sabırsız bir üslup.",
        "Boğa": "Düşünceli, yavaş ve pratik odaklı bir iletişim dili.",
        "İkizler": "Çok yönlü, meraklı ve hızlı bir bilgi alışverişi.",
        "Yengeç": "Duygusal, sezgisel ve korumacı bir ifade tarzı.",
        "Aslan": "Yaratıcı, gururlu ve etkileyici bir konuşma stili.",
        "Başak": "Detaycı, mantıklı ve eleştirel bir zihinsel yapı.",
        "Terazi": "Diplomatik, nazik ve uyum arayan bir iletişim biçimi.",
        "Akrep": "Derin, sorgulayıcı ve stratejik bir ifade gücü.",
        "Yay": "İyimser, açık sözlü ve felsefi bir düşünce yapısı.",
        "Oğlak": "Ciddi, disiplinli ve sonuç odaklı bir iletişim tarzı.",
        "Kova": "Sıra dışı, yenilikçi ve objektif bir zihinsel yaklaşım.",
        "Balık": "Hayalperest, şiirsel ve sezgisel bir ifade biçimi."
    };

    document.getElementById('hc-res-h3-val').innerText = signName;
    document.getElementById('hc-res-h3-desc').innerText = `3. ev, kardeşlerinizi, yakın çevrenizi, kısa yolculukları, temel eğitimi ve iletişim tarzınızı temsil eder. Sizin 3. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-3-ev-hesaplama-result').classList.add('visible');
}
