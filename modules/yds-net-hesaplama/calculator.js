function hcYdsHesapla() {
    const correct = parseInt(document.getElementById('hc-yds-correct').value) || 0;

    if (correct > 80) {
        alert('Doğru sayısı 80\'den fazla olamaz.');
        return;
    }

    const score = correct * 1.25;
    
    let level = "";
    if (score >= 90) level = "Seviye: A";
    else if (score >= 80) level = "Seviye: B";
    else if (score >= 70) level = "Seviye: C";
    else if (score >= 60) level = "Seviye: D";
    else if (score >= 50) level = "Seviye: E";
    else level = "Seviye: Başarısız";

    document.getElementById('hc-yds-val').innerText = score.toLocaleString('tr-TR') + " Puan";
    document.getElementById('hc-yds-level').innerText = level;
    document.getElementById('hc-yds-result').classList.add('visible');
}
