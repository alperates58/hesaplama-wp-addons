function hcNötrofilLenfositOranıHesapla() {
    const neu = parseFloat(document.getElementById('hc-nl-neu').value);
    const lym = parseFloat(document.getElementById('hc-ly-lym') ? document.getElementById('hc-ly-lym').value : document.getElementById('hc-nl-lym').value);

    if (!neu || !lym) return;

    // Ratio = Neu / Lym
    const ratio = neu / lym;

    document.getElementById('hc-nl-val').innerText = ratio.toFixed(2);
    
    let desc = "";
    if (ratio < 1.0) desc = "Düşük (Olası Viral Enfeksiyon)";
    else if (ratio < 3.0) desc = "Normal Aralık";
    else desc = "⚠️ Yüksek (Sistemik Enflamasyon / Bakteriyel Enfeksiyon)";

    document.getElementById('hc-nl-desc').innerText = desc;
    document.getElementById('hc-nl-result').classList.add('visible');
}
