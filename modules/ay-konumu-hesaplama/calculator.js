function hcAyKonumuHesapla() {
    const birthDate = document.getElementById('hc-ap-birth').value;
    const birthTime = document.getElementById('hc-ap-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const d = jd - 2451545.0;
    
    // Ay boylamı yaklaşık hesaplama (Simplified)
    let L = (218.316 + 13.176396 * d) % 360;
    let M = (134.963 + 13.064993 * d) % 360;
    let F = (93.272 + 13.229350 * d) % 360;
    
    if (L < 0) L += 360;
    if (M < 0) M += 360;
    if (F < 0) F += 360;
    
    let lambda = L + 6.289 * Math.sin(M * Math.PI / 180); // Major correction
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const moonInterpretations = {
        "Koç": "Ay Koç'ta: Duygusal olarak tepkisel, sabırsız ve bağımsız. Duygularını doğrudan ifade eden.",
        "Boğa": "Ay Boğa'da (Yücelimde): Duygusal olarak dengeli, huzur arayan ve sadık. Güven ihtiyacı yüksek.",
        "İkizler": "Ay İkizler'de: Duygusal ihtiyaçlarını konuşarak ve öğrenerek karşılayan. Değişken ruh hali.",
        "Yengeç": "Ay Yengeç'te (Kendi Evinde): Çok hassas, korumacı ve anaç. Güçlü sezgiler ve aidiyet ihtiyacı.",
        "Aslan": "Ay Aslan'da: Duygusal olarak onaylanma ve hayranlık bekleyen. Cömert ve dramatik ifade.",
        "Başak": "Ay Başak'ta: Duygularını analiz eden, hizmet ederek sevgi gösteren. Düzen ve fayda arayışı.",
        "Terazi": "Ay Terazi'de: İlişkilerde huzur ve uyum arayan. Yalnız kalmaktan hoşlanmayan, nazik.",
        "Akrep": "Ay Akrep'te: Duygusal olarak çok derin, tutkulu ve ketum. Güçlü bir iç dünyaya sahip.",
        "Yay": "Ay Yay'da: Duygusal özgürlük ve macera arayan. İyimser, neşeli ve felsefi yaklaşım.",
        "Oğlak": "Ay Oğlak'ta: Duygularını kontrol altında tutan, ciddi ve mesafeli. Güvenlik ve statü odaklı.",
        "Kova": "Ay Kova'da: Duygusal olarak bağımsız, idealist ve sosyal. Farklı ve özgün yaklaşımlar.",
        "Balık": "Ay Balık'ta: Çok merhametli, hayalperest ve sezgisel. Sınırsız empati yeteneği olan."
    };

    document.getElementById('hc-res-ap-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-ap-desc').innerText = `Doğduğunuz anda Ay ${signName} burcunun ${degree} derecesinde bulunuyordu. Ay, astrolojide duygularınızı, iç dünyanızı, annelik modelinizi ve bilinçaltı tepkilerinizi temsil eder: ${moonInterpretations[signName]}`;
    document.getElementById('hc-ay-pos-result').classList.add('visible');
}
