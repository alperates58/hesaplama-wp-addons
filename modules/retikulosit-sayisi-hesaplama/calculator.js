function hcRetikülositHesapla() {
    const perc = parseFloat(document.getElementById('hc-rs-perc').value);
    const hct = parseFloat(document.getElementById('hc-rs-hct').value);
    const normal = parseFloat(document.getElementById('hc-rs-normal').value);

    if (!perc || !hct || !normal) return;

    // Corrected Retic = Retic % * (Actual Hct / Normal Hct)
    const corrected = perc * (hct / normal);

    document.getElementById('hc-rs-val').innerText = corrected.toFixed(2) + ' %';
    
    let desc = "";
    if (corrected < 2.0) desc = "⚠️ Hipoproliferatif (Yetersiz üretim)";
    else desc = "Normal / Hiperproliferatif Yanıt";

    document.getElementById('hc-rs-desc').innerText = desc;
    document.getElementById('hc-rs-result').classList.add('visible');
}
