function hcUranusKonumuHesapla() {
    const birthDate = document.getElementById('hc-up-birth').value;
    const birthTime = document.getElementById('hc-up-time').value;

    if (!birthDate || !birthTime) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const date = new Date(birthDate + 'T' + birthTime);
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const jd = getJD(date);
    const n = jd - 2451545.0;

    // Uranus mean elements
    let L = (313.232 + 0.0117258 * n) % 360;
    let M = (142.956 + 0.0117258 * n) % 360;
    
    // Simplified correction
    let lambda = L + 0.52 * Math.sin(M * Math.PI / 180);
    lambda = lambda % 360;
    if (lambda < 0) lambda += 360;

    const signs = ["Koç", "Boğa", "İkizler", "Yengeç", "Aslan", "Başak", "Terazi", "Akrep", "Yay", "Oğlak", "Kova", "Balık"];
    const signIndex = Math.floor(lambda / 30);
    const degree = (lambda % 30).toFixed(2);
    const signName = signs[signIndex];

    const uranusInterpretations = {
        "Koç": "Uranüs Koç'ta: İsyankar, yenilikçi ve öncü bir özgürlük arayışı. Aniden harekete geçen değişim enerjisi.",
        "Boğa": "Uranüs Boğa'da: Maddi değerlerde ve doğada köklü değişimler. Güvenlik anlayışının sarsılması.",
        "İkizler": "Uranüs İkizler'de: İletişimde ve zihinsel alanlarda devrim niteliğinde yenilikler. Hızlı bilgi akışı.",
        "Yengeç": "Uranüs Yengeç'te: Aile ve vatan kavramlarında sıra dışı yaklaşımlar. Duygusal bağımsızlık arayışı.",
        "Aslan": "Uranüs Aslan'da: Yaratıcılıkta ve bireysel ifadede özgünlük. Otoriteye karşı duran liderlik tarzı.",
        "Başak": "Uranüs Başak'ta: İş hayatında ve sağlıkta teknolojik yenilikler. Rutini bozan analitik zeka.",
        "Terazi": "Uranüs Terazi'de: İlişkilerde ve adalette yeni modeller. Sosyal dengelerin sıra dışı biçimde kurulması.",
        "Akrep": "Uranüs Akrep'te (Yücelimde): Derin dönüşüm, kriz yönetimi ve gizli güçlerin aniden ortaya çıkışı.",
        "Yay": "Uranüs Yay'da: İnançlarda ve yüksek öğrenimde devrim. Özgürlükçü ve vizyoner keşifler.",
        "Oğlak": "Uranüs Oğlak'ta: Statükoda ve kurumsal yapılarda yenilikler. Gelenekselin modernleşmesi.",
        "Kova": "Uranüs Kova'da (Kendi Evinde): Toplumsal devrim, teknoloji ve hümanizmde zirve. Geleceğe odaklı enerji.",
        "Balık": "Uranüs Balık'ta: Ruhsal alanlarda ve sanatta sınırları aşan yenilikler. Sezgisel bir uyanış."
    };

    document.getElementById('hc-res-up-val').innerText = `${degree}° ${signName}`;
    document.getElementById('hc-res-up-desc').innerText = `Doğduğunuz anda Uranüs ${signName} burcunun ${degree} derecesinde bulunuyordu. Uranüs, astrolojide değişimi, yeniliği, özgürlüğü, aniliği ve kolektif bilinci temsil eder: ${uranusInterpretations[signName]}`;
    document.getElementById('hc-uranus-pos-result').classList.add('visible');
}
