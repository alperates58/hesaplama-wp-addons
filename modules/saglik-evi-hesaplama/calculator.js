function hcSaglikEviHesapla() {
    const birthDate = document.getElementById('hc-se-birth').value;
    const birthTime = document.getElementById('hc-se-time').value;
    const coords = document.getElementById('hc-se-city').value.split(',');

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
    const h6SignIndex = (ascSignIndex + 5) % 12;
    const signName = signs[h6SignIndex];

    const healthInterpretations = {
        "Koç": "Baş bölgesi, gözler ve adrenal sistem hassas olabilir. Düzenli egzersiz stresinizi yönetmenize yardımcı olur.",
        "Boğa": "Boğaz, boyun ve tiroid bezlerine dikkat etmelisiniz. Beslenme alışkanlıklarınız sağlığınız üzerinde doğrudan etkilidir.",
        "İkizler": "Akciğerler, kollar ve sinir sistemi hassasiyeti olabilir. Zihinsel dinlenme ve doğru nefes teknikleri önemlidir.",
        "Yengeç": "Mide, göğüs bölgesi ve sindirim sistemi hassastır. Duygusal dengeniz sağlığınızı korumanın anahtarıdır.",
        "Aslan": "Kalp, sırt ve omurga sağlığınıza önem vermelisiniz. Düzenli hareket ve neşeli bir yaşam tarzı sizi zinde tutar.",
        "Başak": "Bağırsaklar ve sindirim sistemi üzerinde titizlikle durmalısınız. Sağlıklı beslenme ve rutin kontroller size göredir.",
        "Terazi": "Böbrekler, bel bölgesi ve vücut dengesi hassas olabilir. Su tüketimi ve stresten uzak durmak önemlidir.",
        "Akrep": "Üreme sistemi ve boşaltım sistemi hassasiyeti olabilir. Detoks ve derin içsel temizlik sağlığınıza iyi gelir.",
        "Yay": "Kalçalar, uyluklar ve karaciğer sağlığına dikkat etmelisiniz. Doğa yürüyüşleri ve hareketlilik size şifa verir.",
        "Oğlak": "Dizler, kemikler, dişler ve cilt sağlığı önceliğiniz olmalı. Kalsiyum alımı ve düzenli disiplin sağlığınızı korur.",
        "Kova": "Bilekler, dolaşım sistemi ve varis sorunlarına dikkat. Yenilikçi sağlık yöntemleri ve sosyal aktivite size iyi gelir.",
        "Balık": "Ayaklar, lenf sistemi ve bağışıklık sistemi hassas olabilir. Su terapileri ve meditasyon ruhsal ve bedensel şifa sağlar."
    };

    document.getElementById('hc-res-se-val').innerText = signName;
    document.getElementById('hc-res-se-desc').innerText = `Sağlık eviniz (6. ev) ${signName} burcunda yer alıyor: ${healthInterpretations[signName]}`;
    document.getElementById('hc-saglik-evi-result').classList.add('visible');
}
