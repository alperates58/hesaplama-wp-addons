function hcHavuzŞokKlorMiktarıHesapla() {
    const vol = parseFloat(document.getElementById('hc-pc-vol').value);
    const concentration = parseFloat(document.getElementById('hc-pc-type').value);

    if (!vol) return;

    // Hedef: 10 ppm (10 mg/L)
    // Gereken klor (saf) = 10 * vol * 1000 mg = 10 * vol g
    const pureChlorineNeeded = 10 * vol;
    const productNeeded = pureChlorineNeeded / concentration;

    if (productNeeded >= 1000) {
        document.getElementById('hc-pc-val').innerText = (productNeeded / 1000).toFixed(2) + ' kg/lt';
    } else {
        document.getElementById('hc-pc-val').innerText = Math.round(productNeeded) + ' gr/ml';
    }

    document.getElementById('hc-pc-result').classList.add('visible');
}
