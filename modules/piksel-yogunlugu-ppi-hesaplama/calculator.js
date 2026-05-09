function hcPpiCalcHesapla() {
    const w = parseFloat(document.getElementById('hc-ppi-w').value) || 0;
    const h = parseFloat(document.getElementById('hc-ppi-h').value) || 0;
    const diag = parseFloat(document.getElementById('hc-ppi-diag').value) || 0;

    if (diag === 0) return;

    const diagonalPixels = Math.sqrt(Math.pow(w, 2) + Math.pow(h, 2));
    const ppi = diagonalPixels / diag;

    document.getElementById('hc-res-ppi').innerText = Math.round(ppi) + ' PPI';
    
    let desc = "";
    if (ppi > 400) desc = "Retina Seviyesi / Çok Keskin";
    else if (ppi > 300) desc = "Yüksek Kalite / Keskin";
    else if (ppi > 150) desc = "Standart Kalite";
    else desc = "Düşük Yoğunluk / Pikselleşme Olabilir";

    document.getElementById('hc-res-ppi-desc').innerText = desc;
    document.getElementById('hc-ppi-calc-result').classList.add('visible');
}
