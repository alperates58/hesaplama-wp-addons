function hcPlutonKonumuHesapla() {
    const birthDate = document.getElementById('hc-pp-birth').value;
    const birthTime = document.getElementById('hc-pp-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Pluto mean elements
    let L = (238.928 + 0.0039755 * n) % 360;
    let M = (14.882 + 0.0039755 * n) % 360;
    
    // Simplified correction
    let lambda = L + 0.17 * Math.sin(M * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const plutoInterpretations = {
        "Koç": "Plüton Koç'ta: Bireysel güç ve yenilenme enerjisi. Köklü ve cesur değişimler.",
        "Boğa": "Plüton Boğa'da: Maddi sistemlerde ve kaynak kullanımında derin dönüşüm.",
        "İkizler": "Plüton İkizler'de: İletişim ve bilgi sistemlerinde köklü değişim ve güç mücadelesi.",
        "Yengeç": "Plüton Yengeç'te: Aile, kökler ve aidiyet kavramlarında derin psikolojik dönüşüm.",
        "Aslan": "Plüton Aslan'da: Yaratıcı güç, otorite ve bireysel ifadede büyük değişimler.",
        "Başak": "Plüton Başak'ta: İş hayatı, sağlık ve hizmet alanlarında sistemik dönüşüm.",
        "Terazi": "Plüton Terazi'de: İlişkilerde, adalette ve ortaklıklarda güç dengelerinin değişimi.",
        "Akrep": "Plüton Akrep'te (Kendi Evinde): En güçlü konumunda. Derin dönüşüm, krizler ve küllerinden doğma.",
        "Yay": "Plüton Yay'da: İnançlar, felsefeler ve evrensel gerçeklerde büyük uyanış ve değişim.",
        "Oğlak": "Plüton Oğlak'ta: Statükoda, devlet yapılarında ve kurumlarda köklü yıkım ve yeniden inşa.",
        "Kova": "Plüton Kova'da: Toplumsal devrim, teknoloji ve kolektif güç kullanımında büyük değişimler.",
        "Balık": "Plüton Balık'ta: Ruhsal alanlarda, sanatta ve kolektif bilinçdışında derin çözülme ve dönüşüm."
    };

    document.getElementById('hc-res-pp-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-pp-desc').innerText = `Doğduğunuz anda Plüton ${signName} burcunun ${degree} derecesinde bulunuyordu. Plüton, astrolojide dönüşümü, gücü, krizleri, rejenerasyonu ve kolektif büyük değişimleri temsil eder: ${plutoInterpretations[signName]}`;
    document.getElementById('hc-pluton-pos-result').classList.add('visible');
}
