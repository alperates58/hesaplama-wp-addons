function hcLenfositHesapla() {
    const wbc = parseFloat(document.getElementById('hc-ly-wbc').value);
    const perc = parseFloat(document.getElementById('hc-ly-perc').value);

    if (!wbc || isNaN(perc)) return;

    const abs = wbc * (perc / 100);

    document.getElementById('hc-ly-val').innerText = Math.round(abs) + ' hücre/µL';
    
    let desc = "";
    if (abs < 1000) desc = "⚠️ Lenfositopeni (Düşük)";
    else if (abs > 4000) desc = "⚠️ Lenfositoz (Yüksek)";
    else desc = "Normal Aralık (1000 - 4000)";

    document.getElementById('hc-ly-desc').innerText = desc;
    document.getElementById('hc-ly-result').classList.add('visible');
}
