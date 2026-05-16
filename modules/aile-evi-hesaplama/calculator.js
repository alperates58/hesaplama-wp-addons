function hcAileEviHesapla() {
    const birthDate = document.getElementById('hc-ale-birth').value;
    const birthTime = document.getElementById('hc-ale-time').value;
    const coords = document.getElementById('hc-ale-city').value.split(',');

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
    const h4SignIndex = (ascSignIndex + 3) % 12;
    const signName = signs[h4SignIndex];

    const familyInterpretations = {
        "Koç": "Aile içinde dinamik, bazen rekabetçi ama korumacı bir yapı. Ev hayatında hareketlilik ve bağımsızlık istersiniz.",
        "Boğa": "Huzurlu, güvenli ve konforlu bir ev hayatı ararsınız. Aile köklerine ve maddi birikime değer verirsiniz.",
        "İkizler": "Evde bol sohbet, kitaplar ve hareketlilik hakimdir. Aile içi iletişim sizin için çok önemlidir.",
        "Yengeç": "Kendi evinde, derin duygusal bağlar ve aidiyet hissi. Aile geleneklerine çok bağlısınız.",
        "Aslan": "Eviniz sizin kalenizdir. Aile içinde otorite sahibi olmak ve cömertçe ağırlamak istersiniz.",
        "Başak": "Düzenli, pratik ve verimli bir ev hayatı. Aile içinde yardımlaşma ve titizlik ön plandadır.",
        "Terazi": "Evinizde estetik ve uyum ararsınız. Aile içi huzuru korumak için diplomasiyi kullanırsınız.",
        "Akrep": "Aile içinde derin, bazen gizemli ve dönüştürücü bağlar. Mahremiyetiniz ev hayatında çok önemlidir.",
        "Yay": "Geniş, özgürlükçü ve felsefi bir ev ortamı. Aile ile birlikte seyahat etmek veya öğrenmek sizi mutlu eder.",
        "Oğlak": "Geleneksel, disiplinli ve saygın bir aile yapısı. Köklerinize ve sorumluluklarınıza çok önem verirsiniz.",
        "Kova": "Sıra dışı, modern ve arkadaşça bir ev ortamı. Aile içinde herkesin bireyselliğine saygı duyulmasını istersiniz.",
        "Balık": "Ruhsal, merhametli ve hayalperest bir yuva. Eviniz sizin için bir sığınak ve huzur limanıdır."
    };

    document.getElementById('hc-res-ale-val').innerText = signName;
    document.getElementById('hc-res-ale-desc').innerText = `Aile eviniz (4. ev) ${signName} burcunda yer alıyor: ${familyInterpretations[signName]}`;
    document.getElementById('hc-aile-evi-result').classList.add('visible');
}
