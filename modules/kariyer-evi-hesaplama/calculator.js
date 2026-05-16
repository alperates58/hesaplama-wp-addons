function hcKariyerEviHesapla() {
    const birthDate = document.getElementById('hc-ke-birth').value;
    const birthTime = document.getElementById('hc-ke-time').value;
    const coords = document.getElementById('hc-ke-city').value.split(',');

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
    const h10SignIndex = (ascSignIndex + 9) % 12;
    const signName = signs[h10SignIndex];

    const careerInterpretations = {
        "Koç": "Kendi işinizin patronu olmak veya rekabetçi alanlarda liderlik yapmak size uygundur. Girişimci ruhunuz kariyerinizde sizi öne çıkarır.",
        "Boğa": "Finans, sanat, gayrimenkul veya güven ve istikrar gerektiren alanlarda başarılı olursunuz. Maddi başarı önceliğinizdir.",
        "İkizler": "İletişim, medya, ticaret veya eğitim sektörleri kariyeriniz için idealdir. Çok yönlü ve dinamik işler sizi besler.",
        "Yengeç": "Hizmet sektörü, gayrimenkul, gıda veya koruma-bakım gerektiren işlerde kariyer yapabilirsiniz. Duygusal zekanız iş hayatında avantajdır.",
        "Aslan": "Yöneticilik, sahne sanatları, eğlence veya yaratıcılık gerektiren üst düzey pozisyonlar için doğuştan yeteneklisiniz.",
        "Başak": "Analiz, sağlık, teknik işler veya organizasyon gerektiren her alanda mükemmellik sergilersiniz. Titiz çalışmanız takdir edilir.",
        "Terazi": "Diplomasi, hukuk, moda, halkla ilişkiler veya ortaklık gerektiren işlerde parlayabilirsiniz. Estetik ve denge kariyerinizde önemlidir.",
        "Akrep": "Strateji, araştırma, psikoloji, kriz yönetimi veya finansal analiz gibi derinlik gerektiren alanlarda güç kazanırsınız.",
        "Yay": "Akademik kariyer, yurt dışı bağlantılı işler, turizm veya yayıncılık gibi geniş ufuklu alanlarda başarı elde edersiniz.",
        "Oğlak": "Kurumsal hayat, siyaset, mühendislik veya uzun vadeli planlama gerektiren saygın pozisyonlar sizin için yaratılmıştır.",
        "Kova": "Teknoloji, inovasyon, havacılık veya toplumsal fayda sağlayan modern alanlarda fark yaratırsınız. Yenilikçi bir lidersiniz.",
        "Balık": "Yaratıcı sanatlar, şifa, psikoloji veya ruhsal alanlarda derin izler bırakabilirsiniz. Hayal gücünüz kariyerinizde en büyük sermayenizdir."
    };

    document.getElementById('hc-res-ke-val').innerText = signName;
    document.getElementById('hc-res-ke-desc').innerText = `Kariyer eviniz (10. ev) ${signName} burcunda yer alıyor: ${careerInterpretations[signName]}`;
    document.getElementById('hc-kariyer-evi-result').classList.add('visible');
}
