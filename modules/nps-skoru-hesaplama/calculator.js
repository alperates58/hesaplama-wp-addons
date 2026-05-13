function hcNpsHesapla() {
    const p = parseInt(document.getElementById('hc-nps-p').value) || 0;
    const pass = parseInt(document.getElementById('hc-nps-pass').value) || 0;
    const d = parseInt(document.getElementById('hc-nps-d').value) || 0;
    const resultDiv = document.getElementById('hc-nps-skoru-hesaplama-result');

    const total = p + pass + d;
    if (total === 0) {
        alert('Lütfen en az bir kategori için sayı giriniz.');
        return;
    }

    const nps = ((p / total) - (d / total)) * 100;
    
    document.getElementById('hc-nps-res-val').innerText = Math.round(nps).toString();

    // Position indicator (-100 to 100 scale)
    const position = ((nps + 100) / 200) * 100;
    document.getElementById('hc-nps-indicator').style.left = position + "%";

    let interpretation = "";
    if (nps >= 70) interpretation = "Mükemmel! Müşteri sadakati çok yüksek.";
    else if (nps >= 30) interpretation = "İyi. Çoğu müşteri memnun.";
    else if (nps >= 0) interpretation = "Geliştirilmeli. Memnuniyet düşük.";
    else interpretation = "Kritik! Kötüleyenlerin oranı çok yüksek.";

    document.getElementById('hc-nps-interpretation').innerText = interpretation;

    resultDiv.classList.add('visible');
}
