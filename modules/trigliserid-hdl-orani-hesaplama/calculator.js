function hcTrigliseridHDLOranıHesapla() {
    const tg = parseFloat(document.getElementById('hc-th-tg').value);
    const hdl = parseFloat(document.getElementById('hc-th-hdl').value);

    if (!tg || !hdl) return;

    // Ratio = TG / HDL
    const ratio = tg / hdl;

    document.getElementById('hc-th-val').innerText = ratio.toFixed(2);
    
    let desc = "";
    if (ratio < 2.0) desc = "İdeal (Düşük İnsülin Direnci)";
    else if (ratio < 4.0) desc = "Orta Risk";
    else desc = "Yüksek Risk (Olası İnsülin Direnci)";

    document.getElementById('hc-th-desc').innerText = desc;
    document.getElementById('hc-th-result').classList.add('visible');
}
