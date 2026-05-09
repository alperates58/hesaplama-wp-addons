function hcPwoHesapla() {
    const hp = parseFloat(document.getElementById('hc-pwo-hp').value);
    const kg = parseFloat(document.getElementById('hc-pwo-kg').value);

    if (isNaN(hp) || isNaN(kg) || kg === 0) {
        alert('Lütfen tüm değerleri girin.');
        return;
    }

    const ratio = hp / (kg / 1000);
    
    let desc = "";
    if (ratio < 80) desc = "Ekonomi Odaklı";
    else if (ratio < 120) desc = "Standart Aile Aracı";
    else if (ratio < 180) desc = "Sportif Performans";
    else if (ratio < 250) desc = "Yüksek Performans";
    else desc = "Süper Spor / Hiper Araç";

    document.getElementById('hc-pwo-val').innerText = Math.round(ratio) + " HP / Ton";
    document.getElementById('hc-pwo-desc').innerText = desc;
    document.getElementById('hc-pwo-result').classList.add('visible');
}
