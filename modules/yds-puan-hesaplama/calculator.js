function hcYdsPHesapla() {
    const correct = parseInt(document.getElementById('hc-yds-p-correct').value) || 0;
    if (correct > 80) { alert('Soru sayısı 80\'den fazla olamaz.'); return; }
    
    const score = correct * 1.25;
    document.getElementById('hc-yds-p-val').innerText = score.toFixed(2);
    
    let level = "";
    if (score >= 90) level = "A Seviyesi";
    else if (score >= 80) level = "B Seviyesi";
    else if (score >= 70) level = "C Seviyesi";
    else if (score >= 60) level = "D Seviyesi";
    else if (score >= 50) level = "E Seviyesi";
    else level = "Başarısız (Seviye Belirlenemedi)";

    const levelEl = document.getElementById('hc-yds-p-level');
    levelEl.innerText = level;
    levelEl.style.color = score >= 50 ? "green" : "red";

    document.getElementById('hc-yds-p-result').classList.add('visible');
}
