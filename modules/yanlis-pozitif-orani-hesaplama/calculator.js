function hcFalsePositiveHesapla() {
    const spec = parseFloat(document.getElementById('hc-fpr-spec').value) || 0;

    const fpr = 100 - spec;

    document.getElementById('hc-res-fpr-val').innerText = '%' + fpr.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-false-positive-result').classList.add('visible');
}
