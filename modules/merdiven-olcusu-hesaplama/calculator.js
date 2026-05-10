function hcStairCalcHesapla() {
    const totalH = parseFloat(document.getElementById('hc-st-height').value);
    const targetR = parseFloat(document.getElementById('hc-st-riser').value);

    if (!totalH || !targetR) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    const count = Math.round(totalH / targetR);
    const actualR = totalH / count;
    
    // Blondel Formula: 2 * Riser + Tread = 63
    const tread = 63 - (2 * actualR);

    document.getElementById('hc-st-res-count').innerText = count;
    document.getElementById('hc-st-res-riser').innerText = actualR.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-st-res-tread').innerText = Math.round(tread);

    document.getElementById('hc-stair-result').classList.add('visible');
}
