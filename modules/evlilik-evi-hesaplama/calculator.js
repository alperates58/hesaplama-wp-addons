function hcEvlilikEviHesapla() {
    const birthDate = document.getElementById('hc-ee-birth').value;
    const birthTime = document.getElementById('hc-ee-time').value;
    const coords = document.getElementById('hc-ee-city').value.split(',');

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
    const h7SignIndex = (ascSignIndex + 6) % 12;
    const signName = signs[h7SignIndex];

    const marriageInterpretations = {
        "Koç": "İlişkilerde dinamizm ve heyecan ararsınız. Partnerinizin enerjik ve inisiyatif alan biri olmasını istersiniz.",
        "Boğa": "Evlilikte sadakat, güven ve maddi istikrar sizin için önceliklidir. Huzurlu bir yuva ararsınız.",
        "İkizler": "Zihinsel paylaşım ve iletişim evliliğinizin temelidir. Partnerinizin meraklı ve sosyal olması sizi çeker.",
        "Yengeç": "Duygusal derinlik, şefkat ve aile bağları evlilik anlayışınızın merkezindedir. Koruyucu bir eş ararsınız.",
        "Aslan": "Partnerinizle gurur duymak istersiniz. Görkemli, yaratıcı ve cömert bir eş size uygundur.",
        "Başak": "Pratik, düzenli ve destekleyici bir partner ararsınız. Hizmet ve sadakat ilişkide önemlidir.",
        "Terazi": "Uyum, denge ve adalet evliliğinizin anahtarıdır. Estetik algısı yüksek ve nazik bir eş istersiniz.",
        "Akrep": "Tutkulu, derin ve dönüştürücü bir ilişki ararsınız. Sadakat ve gizem partnerinizde aradığınız özelliklerdir.",
        "Yay": "Özgürlüğünüze saygı duyan, maceracı ve bilge bir eşle mutlu olursunuz. Birlikte keşfetmek sizi besler.",
        "Oğlak": "Ciddi, saygın ve güvenilir bir eş ararsınız. Evlilikte gelenekler ve toplumsal statü rol oynayabilir.",
        "Kova": "Sıra dışı, bağımsız ve arkadaşça bir partner ararsınız. Entelektüel uyum aşkın önündedir.",
        "Balık": "Ruhsal bir bağ, merhamet ve romantizm ararsınız. Hayalperest ve sezgisel bir eş sizi anlar."
    };

    document.getElementById('hc-res-ee-val').innerText = signName;
    document.getElementById('hc-res-ee-desc').innerText = `Evlilik eviniz (7. ev) ${signName} burcunda yer alıyor: ${marriageInterpretations[signName]}`;
    document.getElementById('hc-evlilik-evi-result').classList.add('visible');
}
