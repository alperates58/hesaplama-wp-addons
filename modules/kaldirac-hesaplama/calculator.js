function hcLeverHesapla() {
    const f = parseFloat(document.getElementById('hc-lv-f').value);
    const w = parseFloat(document.getElementById('hc-lv-w').value);
    const l1 = parseFloat(document.getElementById('hc-lv-l1').value);
    const l2 = parseFloat(document.getElementById('hc-lv-l2').value);

    if (isNaN(f) || isNaN(w) || isNaN(l1) || isNaN(l2) || f <= 0 || l1 <= 0 || l2 <= 0) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    // Mechanical Advantage MA = Load / Effort = Effort Arm / Load Arm
    const ma = l1 / l2;
    const actualMa = w / f;

    document.getElementById('hc-lv-res-ma').innerText = ma.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    let desc = "";
    if (Math.abs(f * l1 - w * l2) < 0.01) {
        desc = "Dengede.";
    } else if (f * l1 > w * l2) {
        desc = "Kuvvet tarafı ağır basıyor.";
    } else {
        desc = "Yük tarafı ağır basıyor.";
    }

    document.getElementById('hc-lv-res-desc').innerText = desc;
    document.getElementById('hc-lv-result').classList.add('visible');
}
