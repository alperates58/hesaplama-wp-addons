function hcAGOranıHesapla() {
    const total = parseFloat(document.getElementById('hc-ag-total').value);
    const alb = parseFloat(document.getElementById('hc-ag-alb').value);

    if (!total || !alb) return;

    // Globulin = Total - Albumin
    const glob = total - alb;
    if (glob <= 0) return;

    const ratio = alb / glob;

    document.getElementById('hc-ag-val').innerText = ratio.toFixed(2);
    
    let desc = "";
    if (ratio < 1.0) desc = "⚠️ Düşük Oran (Olası karaciğer veya böbrek sorunu)";
    else if (ratio > 2.5) desc = "⚠️ Yüksek Oran";
    else desc = "Normal Aralık (1.1 - 2.5)";

    document.getElementById('hc-ag-desc').innerText = desc;
    document.getElementById('hc-ag-result').classList.add('visible');
}
