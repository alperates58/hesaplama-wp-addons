function hcHCGEvalHesapla() {
    const val = parseFloat(document.getElementById('hc-be-val').value);

    if (isNaN(val)) {
        alert('Lütfen hCG değerinizi girin.');
        return;
    }

    let week = "";
    let desc = "";

    if (val < 5) {
        week = "Hamilelik Yok";
        desc = "Değer 5'in altında olduğu için negatif kabul edilir.";
    } else if (val < 50) {
        week = "3 Hafta";
        desc = "Döllenmeden yaklaşık 1 hafta sonrası.";
    } else if (val < 426) {
        week = "4 Hafta";
        desc = "Adet gecikmesinin yaşandığı dönem.";
    } else if (val < 7340) {
        week = "5 Hafta";
        desc = "Ultrason ile kesenin görülebileceği aşama.";
    } else if (val < 56500) {
        week = "6 Hafta";
        desc = "Kalp atışlarının duyulmaya başlayabileceği dönem.";
    } else {
        week = "7-8+ Hafta";
        desc = "Hormon değerleri hızla artmaya devam etmektedir.";
    }

    document.getElementById('hc-be-week').innerText = week;
    document.getElementById('hc-be-desc').innerHTML = desc + "<br><br><b>Not:</b> Değerlerin tek seferlik ölçümü yerine 48 saat arayla artış hızı (ikiye katlama) daha önemlidir.";

    document.getElementById('hc-hcg-eval-result').classList.add('visible');
}
