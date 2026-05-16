function hcHouse1Hesapla() {
    const birthDate = document.getElementById('hc-h1-birth').value;
    const birthTime = document.getElementById('hc-h1-time').value;
    const coords = document.getElementById('hc-h1-city').value.split(',');

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const lat = parseFloat(coords[0]);
    const lon = parseFloat(coords[1]);

    const date = new Date(birthDate + 'T' + birthTime);
    
    // Simplified calculation of Ascendant
    // 1. Calculate Julian Date
    function getJD(d) {
        return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5;
    }
    const jd = getJD(date);
    
    // 2. Greenwich Sidereal Time
    const d = jd - 2451545.0;
    let gst = 280.46061837 + 360.98564736629 * d;
    gst = gst % 360;
    if (gst < 0) gst += 360;

    // 3. Local Sidereal Time
    let lst = gst + lon;
    lst = lst % 360;
    if (lst < 0) lst += 360;

    // 4. Obliquity of the Ecliptic
    const eps = 23.439 - 0.0000004 * d;

    // 5. Ascendant Formula
    const ascRad = Math.atan2(-Math.cos(lst * Math.PI / 180), 
                             (Math.sin(eps * Math.PI / 180) * Math.tan(lat * Math.PI / 180) + 
                              Math.cos(eps * Math.PI / 180) * Math.sin(lst * Math.PI / 180)));
    
    let ascDeg = ascRad * 180 / Math.PI;
    ascDeg = ascDeg % 360;
    if (ascDeg < 0) ascDeg += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(ascDeg / 30);
    const signName = signs[signIndex];
    const signDeg = (ascDeg % 30).toFixed(1);

    const descriptions = {
        "Koç": "Enerjik, öncü ve cesur bir başlangıç.",
        "Boğa": "Sabırlı, kararlı ve estetik odaklı bir duruş.",
        "İkizler": "Meraklı, konuşkan ve uyumlu bir dış görünüş.",
        "Yengeç": "Duyarlı, korumacı ve anaç bir enerji.",
        "Aslan": "Dikkat çekici, gururlu ve yaratıcı bir ifade.",
        "Başak": "Titiz, analizci ve mütevazı bir karakter.",
        "Terazi": "Zarif, diplomatik ve adalet arayan bir duruş.",
        "Akrep": "Gizemli, tutkulu ve derin bir etki.",
        "Yay": "İyimser, maceracı ve bilge bir yaklaşım.",
        "Oğlak": "Disiplinli, ciddi ve hırslı bir yapı.",
        "Kova": "Özgün, insancıl ve yenilikçi bir duruş.",
        "Balık": "Sezgisel, hayalperest ve merhametli bir enerji."
    };

    document.getElementById('hc-res-h1-val').innerText = `${signName} (${signDeg}°)`;
    document.getElementById('hc-res-h1-desc').innerText = `1. ev (Yükselen), dış dünyaya verdiğiniz ilk izlenimi, fiziksel görünümünüzü ve hayata yaklaşımınızı temsil eder. Yükselen burcunuz ${signName} olduğu için: ${descriptions[signName]}`;
    document.getElementById('hc-1-ev-hesaplama-result').classList.add('visible');
}
