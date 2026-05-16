function hcJupiterKonumuHesapla() {
    const birthDate = document.getElementById('hc-jp-birth').value;
    const birthTime = document.getElementById('hc-jp-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Jupiter mean elements
    let L = (34.404 + 0.0830853 * n) % 360;
    let M = (19.388 + 0.0830853 * n) % 360;
    
    // Simplified correction
    let lambda = L + 5.55 * Math.sin(M * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const jupiterInterpretations = {
        "Koç": "Jüpiter Koç'ta: İnançlı, cesur ve girişimci bir büyüme enerjisi. Şansını kendi yaratan.",
        "Boğa": "Jüpiter Boğa'da: Maddi bolluk, huzur ve sabırla gelen büyüme. Pratik ve güvenilir.",
        "İkizler": "Jüpiter İkizler'de: Bilgi, iletişim ve öğrenme yoluyla genişleme. Zihinsel olarak çok yönlü.",
        "Yengeç": "Jüpiter Yengeç'te (Yücelimde): Duygusal zenginlik, şefkat ve koruma yoluyla gelen şans.",
        "Aslan": "Jüpiter Aslan'da: Yaratıcı, cömert ve görkemli bir büyüme enerjisi. Liderlik ve neşe odaklı.",
        "Başak": "Jüpiter Başak'ta: Hizmet, analiz ve titizlik yoluyla gelişim. Pratik fayda sağlayan şans.",
        "Terazi": "Jüpiter Terazi'de: Adalet, uyum ve ortaklıklar yoluyla büyüme. Sosyal dengesi güçlü.",
        "Akrep": "Jüpiter Akrep'te: Derin dönüşüm, güç ve gizemli alanlarda genişleme. Sarsılmaz inanç.",
        "Yay": "Jüpiter Yay'da (Kendi Evinde): Büyük şans, bilgelik, macera ve felsefi büyüme enerjisi.",
        "Oğlak": "Jüpiter Oğlak'ta: Disiplinli, stratejik ve kalıcı başarı yoluyla büyüme. Sorumluluk sahibi.",
        "Kova": "Jüpiter Kova'da: Yenilikçi, toplumsal ve insani idealler yoluyla gelişim. Özgürlükçü şans.",
        "Balık": "Jüpiter Balık'ta (Kendi Evinde): Ruhsal zenginlik, merhamet ve sezgisel büyüme. Sınırsız inanç."
    };

    document.getElementById('hc-res-jp-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-jp-desc').innerText = `Doğduğunuz anda Jüpiter ${signName} burcunun ${degree} derecesinde bulunuyordu. Jüpiter, astrolojide şansı, bolluğu, gelişimi, inançları ve bilgeliği temsil eder: ${jupiterInterpretations[signName]}`;
    document.getElementById('hc-jupiter-pos-result').classList.add('visible');
}
