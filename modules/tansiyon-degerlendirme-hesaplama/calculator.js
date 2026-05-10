function hcTansiyonDeğerlendirmeHesapla() {
    const sys = parseFloat(document.getElementById('hc-bp-sys').value);
    const dia = parseFloat(document.getElementById('hc-bp-dia').value);

    if (!sys || !dia) return;

    let category = "";
    let color = "";

    if (sys < 120 && dia < 80) {
        category = "Normal";
        color = "#27ae60";
    } else if (sys < 130 && dia < 80) {
        category = "Yüksek (Normal Üstü)";
        color = "#f1c40f";
    } else if (sys < 140 || dia < 90) {
        category = "Evre 1 Hipertansiyon";
        color = "#e67e22";
    } else {
        category = "Evre 2 Hipertansiyon";
        color = "#c0392b";
    }

    if (sys >= 180 || dia >= 120) {
        category = "HİPERTANSİF KRİZ";
        color = "#ff0000";
    }

    document.getElementById('hc-bp-val').innerText = category;
    document.getElementById('hc-bp-val').style.color = color;
    document.getElementById('hc-bp-result').classList.add('visible');
}
