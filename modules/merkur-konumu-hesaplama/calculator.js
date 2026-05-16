function hcMerkurKonumuHesapla() {
    const birthDate = document.getElementById('hc-mp-birth').value;
    const birthTime = document.getElementById('hc-mp-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Merkür için yaklaşık hesaplama (Simplified - Sun relative)
    let Ls = (280.460 + 0.9856474 * n) % 360; // Sun Longitude
    let gs = (357.528 + 0.9856003 * n) % 360;
    let sunLambda = Ls + 1.915 * Math.sin(gs * Math.PI / 180);

    // Mercury mean elements
    let Lm = (252.250 + 4.0923344 * n) % 360;
    let gm = (174.794 + 4.0923344 * n) % 360;
    let merLambda = Lm + 23.44 * Math.sin(gm * Math.PI / 180); // Geocentric approximation relative to earth is complex, simplified here

    // Merkür her zaman Güneş'ten en fazla 28 derece uzaklaşabilir.
    // Bu yüzden Güneş burcuna yakın bir değer olmalı.
    let diff = (merLambda - sunLambda + 180) % 360 - 180;
    if (diff > 28) diff = 28;
    if (diff < -28) diff = -28;
    
    let finalLambda = (sunLambda + diff) % 360;
    if (finalLambda < 0) finalLambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(finalLambda / 30);
    const degree = (finalLambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const mercuryInterpretations = {
        "Koç": "Merkür Koç'ta: Hızlı düşünme, doğrudan ve cesur iletişim. Sabırsız zihin.",
        "Boğa": "Merkür Boğa'da: Pratik, yavaş ve emin adımlarla düşünen. Somut fikirler odaklı.",
        "İkizler": "Merkür İkizler'de (Kendi Evinde): Çok hızlı, meraklı, konuşkan ve zeki. Bilgi avcısı.",
        "Yengeç": "Merkür Yengeç'te: Sezgisel, hafızası güçlü ve duygusal odaklı düşünme.",
        "Aslan": "Merkür Aslan'da: Yaratıcı ifade, özgüvenli konuşma ve dramatik zihin.",
        "Başak": "Merkür Başak'ta (Yücelimde/Kendi Evinde): Analitik, titiz, detaycı ve mantıklı.",
        "Terazi": "Merkür Terazi'de: Diplomatik, uyumlu ve adil iletişim. Kararsızlık olabilir.",
        "Akrep": "Merkür Akrep'te: Derinlemesine araştıran, keskin zekalı ve gizemli iletişim.",
        "Yay": "Merkür Yay'da: Vizyoner, geniş perspektifli ve dürüst konuşma. Detayları atlayabilir.",
        "Oğlak": "Merkür Oğlak'ta: Disiplinli, stratejik, ciddi ve mesafeli düşünme yapısı.",
        "Kova": "Merkür Kova'da: Yenilikçi, objektif ve toplumsal odaklı zihin. Farklı fikirler.",
        "Balık": "Merkür Balık'ta: Hayalperest, sezgisel, şiirsel ve dağınık zihin yapısı."
    };

    document.getElementById('hc-res-mp-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-mp-desc').innerText = `Doğduğunuz anda Merkür ${signName} burcunun ${degree} derecesinde bulunuyordu. Merkür, astrolojide zihninizi, iletişim tarzınızı, öğrenme biçiminizi ve mantığınızı temsil eder: ${mercuryInterpretations[signName]}`;
    document.getElementById('hc-merkur-pos-result').classList.add('visible');
}
