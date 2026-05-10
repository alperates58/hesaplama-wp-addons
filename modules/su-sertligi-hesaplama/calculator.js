function hcSuSertliğiHesapla() {
    const mgL = parseFloat(document.getElementById('hc-wh-val').value);

    if (isNaN(mgL)) return;

    // 10 mg/L CaCO3 = 1 French Degree (fH)
    // 17.8 mg/L CaCO3 = 1 German Degree (dH)
    // 14.3 mg/L CaCO3 = 1 English Degree (eH)
    
    const french = mgL / 10;
    const german = mgL / 17.8;
    const english = mgL / 14.3;

    let classif = "";
    if (mgL < 75) classif = "Yumuşak";
    else if (mgL < 150) classif = "Orta Sert";
    else if (mgL < 300) classif = "Sert";
    else classif = "Çok Sert";

    document.getElementById('hc-wh-stats').innerHTML = `
        🇫🇷 <strong>Fransız (°fH):</strong> ${french.toFixed(1)}<br>
        🇩🇪 <strong>Alman (°dH):</strong> ${german.toFixed(1)}<br>
        🇬🇧 <strong>İngiliz (°eH):</strong> ${english.toFixed(1)}<br>
        💧 <strong>Sınıflandırma:</strong> ${classif}
    `;
    document.getElementById('hc-wh-result').classList.add('visible');
}
