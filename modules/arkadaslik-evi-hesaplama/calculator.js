function hcArkadaslikEviHesapla() {
    const birthDate = document.getElementById('hc-ark-birth').value;
    const birthTime = document.getElementById('hc-ark-time').value;
    const coords = document.getElementById('hc-ark-city').value.split(',');

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
    const h11SignIndex = (ascSignIndex + 10) % 12;
    const signName = signs[h11SignIndex];

    const friendshipInterpretations = {
        "Koç": "Sosyal çevrenizde liderlik yapmayı seven, dinamik ve enerjik arkadaşlıklara sahipsiniz.",
        "Boğa": "Sadık ve güvenilir bir arkadaş çevreniz var. Uzun süreli ve sağlam dostluklar kurarsınız.",
        "İkizler": "Çok geniş ve çeşitli bir sosyal çevreniz var. Entelektüel sohbetler arkadaşlıklarınızın temelidir.",
        "Yengeç": "Arkadaşlarınızı aileniz gibi görürsünüz. Duygusal bağlar ve korumacı bir dostluk anlayışınız var.",
        "Aslan": "Sosyal ortamlarda parlamayı sever, cömert ve neşeli arkadaşlıklar kurarsınız. İlgi odağı olmaktan keyif alırsınız.",
        "Başak": "Arkadaşlarınıza yardım etmeyi seven, seçici ve dürüst bir dostsunuz. Pratik destekleriniz değer görür.",
        "Terazi": "Sosyal hayatınızda uyum ve denge ararsınız. Nazik, estetik algısı yüksek ve diplomatik bir çevreniz var.",
        "Akrep": "Az ama öz, derin ve sarsılmaz dostluklar kurarsınız. Arkadaşlıkta sadakat ve mahremiyet sizin için esastır.",
        "Yay": "Maceracı, iyimser ve vizyoner arkadaşlara sahipsiniz. Farklı kültürlerden dostluklar sizi zenginleştirir.",
        "Oğlak": "Saygın, hırslı ve ciddi bir sosyal çevreniz olabilir. Dostluklarınızda güven ve statü ön plandadır.",
        "Kova": "Sıra dışı, yenilikçi ve hümanist grupların içinde yer alırsınız. Arkadaşlıkta bağımsızlık ve idealler önemlidir.",
        "Balık": "Merhametli, hayalperest ve ruhsal bağları olan dostluklar kurarsınız. Arkadaşlarınıza karşı fedakarsınız."
    };

    document.getElementById('hc-res-ark-val').innerText = signName;
    document.getElementById('hc-res-ark-desc').innerText = `Arkadaşlık eviniz (11. ev) ${signName} burcunda yer alıyor: ${friendshipInterpretations[signName]}`;
    document.getElementById('hc-arkadaslik-evi-result').classList.add('visible');
}
