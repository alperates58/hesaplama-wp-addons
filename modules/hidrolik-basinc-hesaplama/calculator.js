function hcHydPressHesapla() {
    const f = parseFloat(document.getElementById('hc-hp-f').value);
    const aCm2 = parseFloat(document.getElementById('hc-hp-a').value);

    if (isNaN(f) || isNaN(aCm2) || aCm2 <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Convert cm2 to m2
    const aM2 = aCm2 / 10000;

    // P = F / A (Pascal)
    const pPa = f / aM2;
    const pBar = pPa / 100000;

    document.getElementById('hc-hp-res-val').innerText = pBar.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Bar';
    document.getElementById('hc-hp-res-pa').innerText = Math.round(pPa).toLocaleString('tr-TR') + ' Pascal (Pa)';
    
    document.getElementById('hc-hp-result').classList.add('visible');
}
