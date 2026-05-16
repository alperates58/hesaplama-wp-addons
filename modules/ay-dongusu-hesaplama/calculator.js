function hcAyDongusuHesapla() {
    const dateStr = document.getElementById('hc-mc-date').value;
    if (!dateStr) { alert('Lütfen tarih seçin.'); return; }

    let current = new Date(dateStr + 'T12:00:00');
    function getJD(d) { return (d.getTime() / 86400000) - (d.getTimezoneOffset() / 1440) + 2440587.5; }
    
    // Simplified New Moon reference (2000-01-06 18:14 UTC)
    const knownNewMoonJD = 2451550.26;
    const synodicMonth = 29.530588853;
    
    let jd = getJD(current);
    let daysSince = jd - knownNewMoonJD;
    let cyclePos = (daysSince % synodicMonth + synodicMonth) % synodicMonth;
    let percent = (cyclePos / synodicMonth) * 100;

    let phaseName = "";
    if (cyclePos < 1.84) phaseName = "Yeni Ay";
    else if (cyclePos < 5.53) phaseName = "Hilal";
    else if (cyclePos < 9.22) phaseName = "İlk Dördün";
    else if (cyclePos < 12.91) phaseName = "Büyüyen Ay";
    else if (cyclePos < 16.61) phaseName = "Dolunay";
    else if (cyclePos < 20.30) phaseName = "Küçülen Ay";
    else if (cyclePos < 23.99) phaseName = "Son Dördün";
    else if (cyclePos < 27.68) phaseName = "Balzamik Ay";
    else phaseName = "Yeni Ay Yaklaşıyor";

    let daysToFull = (14.76 - cyclePos + synodicMonth) % synodicMonth;
    let daysToNew = (synodicMonth - cyclePos) % synodicMonth;

    document.getElementById('hc-mc-bar').style.width = percent + "%";
    document.getElementById('hc-mc-stats').innerHTML = `
        <p><strong>Mevcut Durum:</strong> ${phaseName}</p>
        <p><strong>Döngü İlerlemesi:</strong> %${percent.toFixed(1)}</p>
        <p><strong>Dolunaya Kalan:</strong> ${daysToFull.toFixed(1)} gün</p>
        <p><strong>Yeni Aya Kalan:</strong> ${daysToNew.toFixed(1)} gün</p>
    `;

    document.getElementById('hc-ay-dongusu-result').classList.add('visible');
}
