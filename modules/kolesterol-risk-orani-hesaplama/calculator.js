function hcKolesterolRiskOranıHesapla() {
    const tc = parseFloat(document.getElementById('hc-cr-tc').value);
    const hdl = parseFloat(document.getElementById('hc-cr-hdl').value);

    if (!tc || !hdl) return;

    // Ratio = TC / HDL
    const ratio = tc / hdl;

    document.getElementById('hc-cr-val').innerText = ratio.toFixed(2);
    
    let desc = "";
    if (ratio < 3.5) desc = "Mükemmel";
    else if (ratio < 4.5) desc = "İyi / Ortalama";
    else if (ratio < 5.0) desc = "Sınırda Risk";
    else desc = "Yüksek Risk";

    document.getElementById('hc-cr-desc').innerText = desc;
    document.getElementById('hc-cr-result').classList.add('visible');
}
