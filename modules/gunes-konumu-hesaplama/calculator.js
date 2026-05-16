function hcGunesKonumuHesapla() {
    const birthDate = document.getElementById('hc-gp-birth').value;
    const birthTime = document.getElementById('hc-gp-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;
    
    // Güneş boylamı yaklaşık hesaplama (Low precision)
    let L = (280.460 + 0.9856474 * n) % 360;
    let g = (357.528 + 0.9856003 * n) % 360;
    if (L < 0) L += 360;
    if (g < 0) g += 360;
    
    let lambda = L + 1.915 * Math.sin(g * Math.PI / 180) + 0.020 * Math.sin(2 * g * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const sunInterpretations = {
        "Koç": "Güneş Koç burcunda: Cesur, enerjik ve inisiyatif alan bir kimlik. Öncü ve rekabetçi.",
        "Boğa": "Güneş Boğa burcunda: Sabırlı, güvenilir ve huzur arayan bir kimlik. Maddi ve manevi değerlere önem veren.",
        "İkizler": "Güneş İkizler burcunda: Meraklı, iletişimci ve çok yönlü bir kimlik. Zihinsel aktivite odaklı.",
        "Yengeç": "Güneş Yengeç burcunda: Duygusal, korumacı ve aile odaklı bir kimlik. Aidiyet duygusu güçlü.",
        "Aslan": "Güneş Aslan burcunda: Cömert, yaratıcı ve sahne ışıklarını seven bir kimlik. Özgüveni yüksek.",
        "Başak": "Güneş Başak burcunda: Analitik, titiz ve hizmet odaklı bir kimlik. Mükemmeliyetçi.",
        "Terazi": "Güneş Terazi burcunda: Uyumlu, diplomatik ve adalet arayan bir kimlik. İlişkilere değer veren.",
        "Akrep": "Güneş Akrep burcunda: Tutkulu, derin ve dönüştürücü bir kimlik. Güçlü sezgileri olan.",
        "Yay": "Güneş Yay burcunda: Maceracı, iyimser ve bilge bir kimlik. Özgürlüğüne düşkün ve keşfetmeyi seven.",
        "Oğlak": "Güneş Oğlak burcunda: Disiplinli, sorumluluk sahibi ve hırslı bir kimlik. Statü ve başarı odaklı.",
        "Kova": "Güneş Kova burcunda: Yenilikçi, bağımsız ve hümanist bir kimlik. Toplumsal idealleri olan.",
        "Balık": "Güneş Balık burcunda: Merhametli, hayalperest ve sezgisel bir kimlik. Ruhsal ve sanatsal yönü güçlü."
    };

    document.getElementById('hc-res-gp-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-gp-desc').innerText = `Doğduğunuz anda Güneş ${signName} burcunun ${degree} derecesinde bulunuyordu. Güneş, astrolojide temel kişiliğinizi, iradenizi ve öz benliğinizi temsil eder: ${sunInterpretations[signName]}`;
    document.getElementById('hc-gunes-pos-result').classList.add('visible');
}
