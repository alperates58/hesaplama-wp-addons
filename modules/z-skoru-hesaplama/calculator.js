function hcZScoreHesapla() {
    const x = parseFloat(document.getElementById('hc-zs-val').value) || 0;
    const mu = parseFloat(document.getElementById('hc-zs-mean').value) || 0;
    const sigma = parseFloat(document.getElementById('hc-zs-std').value) || 0;

    if (sigma === 0) return;

    const z = (x - mu) / sigma;

    document.getElementById('hc-res-zs-val').innerText = z.toFixed(3);
    document.getElementById('hc-z-score-result').classList.add('visible');
}
