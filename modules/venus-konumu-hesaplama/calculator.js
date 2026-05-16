function hcVenusKonumuHesapla() {
    const birthDate = document.getElementById('hc-vp-birth').value;
    const birthTime = document.getElementById('hc-vp-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Venüs için yaklaşık hesaplama (Simplified - Sun relative)
    let Ls = (280.460 + 0.9856474 * n) % 360; // Sun Longitude
    let gs = (357.528 + 0.9856003 * n) % 360;
    let sunLambda = Ls + 1.915 * Math.sin(gs * Math.PI / 180);

    // Venus mean elements
    let Lv = (181.979 + 1.6021302 * n) % 360;
    let gv = (50.408 + 1.6021302 * n) % 360;
    let venLambda = Lv + 0.77 * Math.sin(gv * Math.PI / 180);

    // Venüs her zaman Güneş'ten en fazla 47-48 derece uzaklaşabilir.
    let diff = (venLambda - sunLambda + 180) % 360 - 180;
    if (diff > 48) diff = 48;
    if (diff < -48) diff = -48;
    
    let finalLambda = (sunLambda + diff) % 360;
    if (finalLambda < 0) finalLambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(finalLambda / 30);
    const degree = (finalLambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const venusInterpretations = {
        "Koç": "Venüs Koç'ta: Aşkta tutkulu, doğrudan ve sabırsız. İlişkilerde heyecan arayan.",
        "Boğa": "Venüs Boğa'da (Kendi Evinde): Sadık, huzur ve fiziksel konfor arayan. Değerlerine bağlı.",
        "İkizler": "Venüs İkizler'de: Zihinsel uyum, flörtöz ve sosyal. İlişkilerde iletişim odaklı.",
        "Yengeç": "Venüs Yengeç'te: Duygusal olarak korumacı, şefkatli ve aileye bağlı aşk anlayışı.",
        "Aslan": "Venüs Aslan'da: Cömert, gururlu ve ilgi görmeyi seven. Aşkı bir sahne gibi yaşayan.",
        "Başak": "Venüs Başak'ta: Pratik, hizmet odaklı ve seçici. Sevgisini faydalı işlerle gösteren.",
        "Terazi": "Venüs Terazi'de (Kendi Evinde): Romantik, diplomatik ve uyum arayan. Estetik algısı yüksek.",
        "Akrep": "Venüs Akrep'te: Yoğun, tutkulu, gizemli ve sarsılmaz bağlılık arayan.",
        "Yay": "Venüs Yay'da: Özgürlükçü, maceracı ve neşeli. İlişkilerde geniş ufuklar arayan.",
        "Oğlak": "Venüs Oğlak'ta: Ciddi, sorumluluk sahibi ve güven odaklı. Geleneksel değerlere önem veren.",
        "Kova": "Venüs Kova'da: Bağımsız, arkadaşça ve sıra dışı. Entelektüel uyumu aşkın önüne koyan.",
        "Balık": "Venüs Balık'ta (Yücelimde): Fedakar, romantik ve ruhsal bağ arayan. Sınırsız sevgi kapasitesi."
    };

    document.getElementById('hc-res-vp-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-vp-desc').innerText = `Doğduğunuz anda Venüs ${signName} burcunun ${degree} derecesinde bulunuyordu. Venüs, astrolojide aşkı, estetiği, değer verdiğiniz şeyleri ve ilişkilerdeki tarzınızı temsil eder: ${venusInterpretations[signName]}`;
    document.getElementById('hc-venus-pos-result').classList.add('visible');
}
