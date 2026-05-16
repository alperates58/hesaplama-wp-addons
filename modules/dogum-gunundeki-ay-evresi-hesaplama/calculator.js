function hcBirthMoonPhaseHesapla() {
    const dateStr = document.getElementById('hc-bm-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    const date = new Date(dateStr + 'T12:00:00');
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    const n = getJD(date) - 2451545.0;

    // Sun Longitude
    let Ls = (280.460 + 0.9856474 * n) % 360;
    let gs = (357.528 + 0.9856003 * n) % 360;
    let sunL = (Ls + 1.915 * Math.sin(gs * Math.PI / 180) + 360) % 360;

    // Moon Longitude
    let Lm = (218.316 + 13.176396 * n) % 360;
    let Mm = (134.963 + 13.064993 * n) % 360;
    let moonL = (Lm + 6.289 * Math.sin(Mm * Math.PI / 180) + 360) % 360;

    let elongation = (moonL - sunL + 360) % 360;
    
    let phaseName = "";
    let phaseDesc = "";

    if (elongation < 45) {
        phaseName = "Yeni Ay (New Moon)";
        phaseDesc = "Yeni Ay evresinde doğanlar, taze bir enerjiye, yüksek motivasyona ve hayata karşı hevesli bir tutuma sahiptir. İçgüdüsel davranırlar ve yeni başlangıçlar yapma konusunda çok cesurdurlar.";
    } else if (elongation < 90) {
        phaseName = "Hilal (Waxing Crescent)";
        phaseDesc = "Hilal evresinde doğanlar, azimli, kararlı ve hedeflerine ulaşmak için çaba gösteren kişilerdir. Geçmişten kopma ve kendi kimliklerini inşa etme arzusu güçlüdür.";
    } else if (elongation < 135) {
        phaseName = "İlk Dördün (First Quarter)";
        phaseDesc = "İlk Dördün evresinde doğanlar, kriz yönetimi konusunda yetenekli, eylem odaklı ve mücadeleci bir yapıya sahiptir. Engelleri aşmak onlar için bir yaşam biçimidir.";
    } else if (elongation < 180) {
        phaseName = "Büyüyen Ay (Waxing Gibbous)";
        phaseDesc = "Büyüyen Ay evresinde doğanlar, mükemmeliyetçi, detaycı ve sürekli kendini geliştirmeye odaklı kişilerdir. Bilgi toplama ve analiz etme yetenekleri yüksektir.";
    } else if (elongation < 225) {
        phaseName = "Dolunay (Full Moon)";
        phaseDesc = "Dolunay evresinde doğanlar, objektif, farkındalığı yüksek ve ilişkiler odaklıdır. İç dünyaları ile dış dünya arasında bir denge kurmaya çalışırlar, hayatları boyunca önemli netleşmeler yaşarlar.";
    } else if (elongation < 270) {
        phaseName = "Küçülen Ay (Waning Gibbous / Disseminating)";
        phaseDesc = "Küçülen Ay evresinde doğanlar, bildiklerini paylaşmayı seven, öğretici ve toplumsal fayda odaklı kişilerdir. Deneyimlerinden süzdükleri bilgileri başkalarına aktarmak onlar için önemlidir.";
    } else if (elongation < 315) {
        phaseName = "Son Dördün (Last Quarter)";
        phaseDesc = "Son Dördün evresinde doğanlar, içe dönük, sorgulayıcı ve eski kalıpları yıkıp yenilerini inşa etme eğiliminde olan kişilerdir. Bir dönemin kapanışını ve dönüşümü temsil ederler.";
    } else {
        phaseName = "Balzamik Ay (Balsamic Moon / Waning Crescent)";
        phaseDesc = "Balzamik Ay evresinde doğanlar, çok eski bir ruha sahip, sezgisel, vizyoner ve mistik eğilimleri olan kişilerdir. Geleceği sezme yetenekleri güçlüdür ve bir döngünün son bilgeliğini taşırlar.";
    }

    document.getElementById('hc-bm-phase-name').innerText = phaseName;
    document.getElementById('hc-bm-desc').innerText = phaseDesc;
    document.getElementById('hc-birth-moon-result').classList.add('visible');
}
