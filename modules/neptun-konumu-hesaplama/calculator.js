function hcNeptunKonumuHesapla() {
    const birthDate = document.getElementById('hc-np-birth').value;
    const birthTime = document.getElementById('hc-np-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Neptune mean elements
    let L = (304.880 + 0.0059735 * n) % 360;
    let M = (260.247 + 0.0059735 * n) % 360;
    
    // Simplified correction
    let lambda = L + 0.23 * Math.sin(M * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const neptuneInterpretations = {
        "Koç": "Neptün Koç'ta: İdealist bir mücadele ve ruhsal öncülük. Yeni bir inanç sisteminin başlangıcı.",
        "Boğa": "Neptün Boğa'da: Maddi dünyada ruhsal huzur arayışı. Sanat ve doğada ilahi güzelliği bulma.",
        "İkizler": "Neptün İkizler'de: Şiirsel iletişim, zihinsel hayal gücü ve kolektif düşüncelerdeki akışkanlık.",
        "Yengeç": "Neptün Yengeç'te (Yücelimde): Derin duygusal empati, ailevi ve köklere dair ruhsal bağlar.",
        "Aslan": "Neptün Aslan'da: Yaratıcı ilham, görkemli hayaller ve sanatsal ifadede ruhsal derinlik.",
        "Başak": "Neptün Başak'ta: Hizmette ruhsallık, günlük hayatta idealizm ve sağlığa sezgisel yaklaşım.",
        "Terazi": "Neptün Terazi'de: İlişkilerde idealizm, ruhsal ortaklıklar ve sanatsal uyum arayışı.",
        "Akrep": "Neptün Akrep'te: Gizemli alanlarda ruhsal keşifler, derin sezgiler ve dönüştürücü hayaller.",
        "Yay": "Neptün Yay'da: Felsefi ve dini idealizm, evrensel gerçeklik arayışı ve geniş vizyonlar.",
        "Oğlak": "Neptün Oğlak'ta: Yapıları ve kurumları ruhsallaştırma, somut idealler ve disiplinli hayaller.",
        "Kova": "Neptün Kova'da: Toplumsal ideallerde ruhsal uyanış, teknoloji ve insanlık için evrensel hayaller.",
        "Balık": "Neptün Balık'ta (Kendi Evinde): Sınırsız merhamet, ruhsal teslimiyet, ilahi ilham ve hayal gücü."
    };

    document.getElementById('hc-res-np-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-np-desc').innerText = `Doğduğunuz anda Neptün ${signName} burcunun ${degree} derecesinde bulunuyordu. Neptün, astrolojide hayalleri, ruhsallığı, ilhamı, sezgileri ve kolektif bilinçdışını temsil eder: ${neptuneInterpretations[signName]}`;
    document.getElementById('hc-neptun-pos-result').classList.add('visible');
}
