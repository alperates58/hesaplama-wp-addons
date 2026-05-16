function hcParaEviHesapla() {
    const birthDate = document.getElementById('hc-pe-birth').value;
    const birthTime = document.getElementById('hc-pe-time').value;
    const coords = document.getElementById('hc-pe-city').value.split(',');

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
    const h2SignIndex = (ascSignIndex + 1) % 12;
    const signName = signs[h2SignIndex];

    const moneyInterpretations = {
        "Koç": "Kendi çabanızla para kazanma konusunda hırslısınız. Hızlı kazanıp hızlı harcama eğiliminde olabilirsiniz.",
        "Boğa": "Maddi konularda doğal bir yeteneğiniz var. Biriktirmeyi sever ve somut değerlere önem verirsiniz.",
        "İkizler": "Zekanız ve iletişim yeteneklerinizle kazanç sağlarsınız. Birden fazla gelir kaynağınız olabilir.",
        "Yengeç": "Maddi güvenlik sizin için duygusal güvenliktir. Ev ve aile ile ilgili alanlardan kazanç sağlayabilirsiniz.",
        "Aslan": "Yaratıcı projelerden ve liderlik vasıflarınızdan para kazanırsınız. Lüks harcamalara meyillisiniz.",
        "Başak": "Titiz ve analiz gerektiren işlerden kazanç sağlarsınız. Bütçenizi yönetmede çok başarılısınız.",
        "Terazi": "Ortaklıklar, sanat ve diplomasi yoluyla kazanç elde edebilirsiniz. Dengeli bir harcama alışkanlığınız var.",
        "Akrep": "Başkalarının kaynaklarını yönetme veya stratejik yatırımlardan büyük kazançlar elde edebilirsiniz.",
        "Yay": "Yurt dışı bağlantılı işler veya eğitim yoluyla kazanç sağlarsınız. Şanslı bir finansal yapınız var.",
        "Oğlak": "Disiplinli ve sabırlı bir çalışmayla kalıcı bir servet inşa edebilirsiniz. Maddi konularda ciddiyet hakimdir.",
        "Kova": "Teknoloji, sosyal projeler veya yenilikçi fikirlerle sıra dışı yollardan para kazanabilirsiniz.",
        "Balık": "Sezgisel ve yaratıcı alanlardan kazanç sağlarsınız. Maddi konularda hayalperestlikten kaçınmalısınız."
    };

    document.getElementById('hc-res-pe-val').innerText = signName;
    document.getElementById('hc-res-pe-desc').innerText = `Para eviniz (2. ev) ${signName} burcunda yer alıyor: ${moneyInterpretations[signName]}`;
    document.getElementById('hc-para-evi-result').classList.add('visible');
}
