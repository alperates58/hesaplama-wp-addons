function hcAgeGradeHesapla() {
    const dist = parseInt(document.getElementById('hc-ag-dist').value);
    const min = parseInt(document.getElementById('hc-ag-min').value || 0);
    const sec = parseInt(document.getElementById('hc-ag-sec').value || 0);
    const age = parseInt(document.getElementById('hc-ag-age').value);

    if (!dist || (!min && !sec) || !age) {
        alert('Lütfen tüm bilgileri giriniz.');
        return;
    }

    const userTotalSec = (min * 60) + sec;
    
    // World Record approximations (in seconds) for age 25-30
    const wrSeconds = {
        5000: 755, // 12:35
        10000: 1571, // 26:11
        21097: 3450, // 57:30
        42195: 7239 // 2:00:39
    };

    // Age adjustment factor (simplified WAVA/WMA approach)
    // Score increases for older runners
    let ageFactor = 1.0;
    if (age > 30) {
        ageFactor = 1.0 + (age - 30) * 0.008; // Simplified linear adjustment
    }

    const adjustedWr = wrSeconds[dist] * ageFactor;
    const score = (adjustedWr / userTotalSec) * 100;

    const resVal = document.getElementById('hc-ag-res-val');
    resVal.innerText = score.toFixed(1).toLocaleString('tr-TR');

    const resDesc = document.getElementById('hc-ag-res-desc');
    if (score >= 90) resDesc.innerText = "Dünya Klasmanı: Profesyonel seviyedesiniz.";
    else if (score >= 80) resDesc.innerText = "Ulusal Klasman: Çok üst düzey performans.";
    else if (score >= 70) resDesc.innerText = "Bölgesel Klasman: Oldukça iyi bir koşucu.";
    else if (score >= 60) resDesc.innerText = "Yerel Klasman: Ortalama üstü performans.";
    else resDesc.innerText = "Fitness Seviyesi: Sağlıklı bir hobi koşucusu.";

    document.getElementById('hc-age-grade-result').classList.add('visible');
}
