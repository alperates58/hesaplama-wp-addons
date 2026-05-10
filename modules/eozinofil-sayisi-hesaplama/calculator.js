function hcEozinofilHesapla() {
    const wbc = parseFloat(document.getElementById('hc-eo-wbc').value);
    const perc = parseFloat(document.getElementById('hc-eo-perc').value);

    if (!wbc || isNaN(perc)) return;

    // Absolute = WBC * (Perc / 100)
    const abs = wbc * (perc / 100);

    document.getElementById('hc-eo-val').innerText = Math.round(abs) + ' hücre/µL';
    
    let desc = "";
    if (abs > 500) desc = "⚠️ Eozinofili (Yüksek Seviye)";
    else desc = "Normal Aralık (30 - 500)";

    document.getElementById('hc-eo-desc').innerText = desc;
    document.getElementById('hc-eo-result').classList.add('visible');
}
