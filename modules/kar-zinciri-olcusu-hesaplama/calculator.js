function hcSzHesapla() {
    const w = parseFloat(document.getElementById('hc-sz-w').value);
    const r = parseFloat(document.getElementById('hc-sz-r').value);
    const j = parseFloat(document.getElementById('hc-sz-j').value);

    if (isNaN(w) || isNaN(r) || isNaN(j)) {
        alert('Lütfen tüm ölçüleri girin.');
        return;
    }

    // Heuristic Grouping (Simplified)
    // 175/70R13 -> 40
    // 195/65R15 -> 80
    // 205/55R16 -> 90
    // 225/45R17 -> 90
    
    // Total Diameter in mm
    const dia = (w * r / 100 * 2) + (j * 25.4);
    
    let group = "Belirlenemedi";
    if (dia < 570) group = "No: 40 - 50";
    else if (dia < 600) group = "No: 60 - 70";
    else if (dia < 630) group = "No: 80";
    else if (dia < 650) group = "No: 90";
    else if (dia < 670) group = "No: 100";
    else if (dia < 700) group = "No: 110";
    else group = "No: 120+";

    document.getElementById('hc-sz-val').innerText = group;
    document.getElementById('hc-sz-result').classList.add('visible');
}
