function hcUCLHesapla() {
    const mu = parseFloat(document.getElementById('hc-uc-mean').value) || 0;
    const sigma = parseFloat(document.getElementById('hc-uc-std').value) || 0;
    const k = parseFloat(document.getElementById('hc-uc-sigma').value) || 3;

    const ucl = mu + (k * sigma);

    document.getElementById('hc-res-uc-val').innerText = ucl.toLocaleString('tr-TR', { maximumFractionDigits: 4 });
    document.getElementById('hc-ucl-calc-result').classList.add('visible');
}
