function hcHouse8Hesapla() {
    const birthDate = document.getElementById('hc-h8-birth').value;
    const birthTime = document.getElementById('hc-h8-time').value;
    const coords = document.getElementById('hc-h8-city').value.split(',');

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
    const h8SignIndex = (ascSignIndex + 7) % 12;
    const signName = signs[h8SignIndex];

    const descriptions = {
        "Koç": "Krizler karşısında cesur, dönüştürücü ve hızlı aksiyon alan bir yapı.",
        "Boğa": "Ortak kaynaklarda güven arayan, kalıcı ve sağlam değerlere odaklılık.",
        "İkizler": "Zihinsel dönüşüm, değişken ortak kaynaklar ve meraklı bir gizem anlayışı.",
        "Yengeç": "Duygusal derinlik, aile mirası ve sezgisel bir dönüşüm süreci.",
        "Aslan": "Görkemli bir güç yönetimi, yaratıcı dönüşüm ve cömert ortak kaynaklar.",
        "Başak": "Detaycı, analizci ve pratik çözümlerle kriz yönetimi.",
        "Terazi": "Ortaklıklarda denge arayışı, estetik bir dönüşüm ve adil paylaşımlar.",
        "Akrep": "Yoğun, gizemli, tutkulu ve kökten değişim yaratan güçlü bir enerji.",
        "Yay": "Vizyoner bir dönüşüm, şanslı ortaklıklar ve felsefi bir gizem algısı.",
        "Oğlak": "Disiplinli, ciddi ve kurumsal bir kriz yönetimi ve miras anlayışı.",
        "Kova": "Sıra dışı dönüşümler, teknolojik kaynaklar ve toplumsal paylaşımlar.",
        "Balık": "Sezgisel, ruhsal ve merhamet odaklı bir dönüşüm ve teslimiyet."
    };

    document.getElementById('hc-res-h8-val').innerText = signName;
    document.getElementById('hc-res-h8-desc').innerText = `8. ev, ölüm ve yeniden doğuşu, dönüşümü, krizleri, ortaklaşa kazanılan paraları (eşin parası, miras, kredi) ve cinselliği temsil eder. Sizin 8. eviniz ${signName} burcunda: ${descriptions[signName]}`;
    document.getElementById('hc-8-ev-hesaplama-result').classList.add('visible');
}
