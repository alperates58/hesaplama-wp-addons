function hcAskEviHesapla() {
    const birthDate = document.getElementById('hc-ae-birth').value;
    const birthTime = document.getElementById('hc-ae-time').value;
    const coords = document.getElementById('hc-ae-city').value.split(',');

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

    const loveInterpretations = {
        "Koç": "Aşkta tutkulu, heyecan arayan ve ilk adımı atmaktan çekinmeyen bir yapınız var.",
        "Boğa": "Aşkta sadakat, huzur ve fiziksel konfor sizin için çok önemli. Sabırlı bir aşıksınız.",
        "İkizler": "Zihinsel uyum ve flörtöz sohbetler aşk hayatınızın temelini oluşturur.",
        "Yengeç": "Derin duygusal bağlar, güven ve şefkat dolu bir aşk anlayışına sahipsiniz.",
        "Aslan": "Aşkı bir sahne gibi yaşar, partnerinize cömertçe sevgi gösterir ve ilgi beklersiniz.",
        "Başak": "Aşkta seçici, pratik ve partnerine fayda sağlamayı seven bir tutumunuz var.",
        "Terazi": "Romantizm, estetik ve uyum arayışı aşk hayatınızın vazgeçilmezidir.",
        "Akrep": "Yoğun, gizemli ve tutkulu bir aşk yaşarsınız. Sadakat sizin için hayati önemdedir.",
        "Yay": "Maceracı, özgürlükçü ve neşeli bir partnerle mutlu olursunuz.",
        "Oğlak": "Ciddi, sorumluluk sahibi ve geleneksel değerlere önem veren bir aşk anlayışınız var.",
        "Kova": "Sıra dışı, arkadaşça ve entelektüel derinliği olan ilişkilere çekilirsiniz.",
        "Balık": "Hayalperest, romantik ve fedakar bir aşık profiliniz var. Ruhsal bağ ararsınız."
    };

    document.getElementById('hc-res-ae-val').innerText = signName;
    document.getElementById('hc-res-ae-desc').innerText = `Aşk eviniz (5. ev) ${signName} burcunda yer alıyor: ${loveInterpretations[signName]}`;
    document.getElementById('hc-ask-evi-result').classList.add('visible');
}
