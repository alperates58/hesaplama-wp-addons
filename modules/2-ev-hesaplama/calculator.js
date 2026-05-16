function hcHouse2Hesapla() {
    const birthDate = document.getElementById('hc-h2-birth').value;
    const birthTime = document.getElementById('hc-h2-time').value;
    const coords = document.getElementById('hc-h2-city').value.split(',');

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
    
    // Whole Sign System: 2nd house is the next sign
    const h2SignIndex = (ascSignIndex + 1) % 12;
    const signName = signs[h2SignIndex];

    const descriptions = {
        "Koç": "Maddi konularda hızlı, cesur ve atılgan bir tutum.",
        "Boğa": "Güven odaklı, sağlam ve biriktirmeyi seven bir yaklaşım.",
        "İkizler": "Zeka yoluyla kazanç, değişken ve çok yönlü finansal kaynaklar.",
        "Yengeç": "Maddi güvenlik ihtiyacı yüksek, aileden gelen kaynaklar.",
        "Aslan": "Gösterişli, cömert ve yaratıcı yeteneklerle kazanç sağlama.",
        "Başak": "Hesaplı, titiz ve çalışkanlık yoluyla elde edilen gelirler.",
        "Terazi": "Ortaklıklar, sanat ve diplomasi yoluyla gelen kazançlar.",
        "Akrep": "Stratejik, gizli veya dönüşüm gerektiren finansal güç.",
        "Yay": "Şanslı, vizyoner ve genişlemeye açık maddi fırsatlar.",
        "Oğlak": "Disiplinli, sabırlı ve statü odaklı bir servet inşası.",
        "Kova": "Sıra dışı, teknolojik veya sosyal gruplar yoluyla kazanç.",
        "Balık": "Sezgisel, hayal gücü odaklı veya yardımseverlikle gelen bereket."
    };

    document.getElementById('hc-res-h2-val').innerText = signName;
    document.getElementById('hc-res-h2-desc').innerText = `2. ev, kişisel kaynaklarınızı, maddi değerlerinizi, yeteneklerinizi ve öz değer duygunuzu temsil eder. Sizin 2. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-2-ev-hesaplama-result').classList.add('visible');
}
