function hcİdrarÇıkışıHesapla() {
    const vol = parseFloat(document.getElementById('hc-uo-vol').value);
    const weight = parseFloat(document.getElementById('hc-uo-weight').value);
    const time = parseFloat(document.getElementById('hc-uo-time').value);

    if (!vol || !weight || !time) return;

    // Rate = mL / kg / hour
    const rate = vol / weight / time;

    document.getElementById('hc-uo-val').innerText = rate.toFixed(2) + ' mL/kg/sa';
    
    let desc = "";
    if (rate < 0.5) desc = "⚠️ Oligüri Riski (Yetersiz Çıkış)";
    else if (rate < 1.0) desc = "Normal Alt Sınır";
    else desc = "Normal Perfüzyon";

    document.getElementById('hc-uo-desc').innerText = desc;
    document.getElementById('hc-uo-result').classList.add('visible');
}
