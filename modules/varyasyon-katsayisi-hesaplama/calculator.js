function hcCoeffVarHesapla() {
    const mean = parseFloat(document.getElementById('hc-cv-mean').value) || 0;
    const std = parseFloat(document.getElementById('hc-cv-std').value) || 0;

    if (mean === 0) return;

    const cv = (std / mean) * 100;

    document.getElementById('hc-res-cv-val').innerText = '%' + cv.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-coeff-var-result').classList.add('visible');
}
