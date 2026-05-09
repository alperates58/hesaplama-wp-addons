function hcCecHesapla() {
    const gkm = parseFloat(document.getElementById('hc-cec-val-input').value);

    if (isNaN(gkm)) {
        alert('Lütfen emisyon değerini girin.');
        return;
    }

    let cls = "";
    let color = "";
    let desc = "";

    if (gkm <= 100) { cls = "A"; color = "#008000"; desc = "Mükemmel - Çevre Dostu"; }
    else if (gkm <= 120) { cls = "B"; color = "#32CD32"; desc = "Çok İyi"; }
    else if (gkm <= 140) { cls = "C"; color = "#ADFF2F"; desc = "İyi"; }
    else if (gkm <= 160) { cls = "D"; color = "#FFFF00"; desc = "Orta"; }
    else if (gkm <= 190) { cls = "E"; color = "#FFD700"; desc = "Zayıf"; }
    else if (gkm <= 225) { cls = "F"; color = "#FF8C00"; desc = "Kötü"; }
    else { cls = "G"; color = "#FF0000"; desc = "Çok Kötü - Yüksek Kirlilik"; }

    const valEl = document.getElementById('hc-cec-class-val');
    valEl.innerText = cls;
    valEl.style.color = color;
    
    document.getElementById('hc-cec-desc').innerText = desc;
    document.getElementById('hc-cec-result').classList.add('visible');
}
