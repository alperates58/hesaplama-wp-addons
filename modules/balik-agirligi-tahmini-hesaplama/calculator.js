function hcFishWeightHesapla() {
    const length = parseFloat(document.getElementById('hc-fw-len').value);
    const girth = parseFloat(document.getElementById('hc-fw-girth').value);

    if (!length || !girth) {
        alert('Lütfen boy ve çevre ölçülerini giriniz.');
        return;
    }

    // General formula: Weight = (Girth^2 * Length) / 800 (for imperial, converted for metric)
    // Metric (cm to grams): Weight(g) = (Girth^2 * Length) / 28.5 (approximate constant)
    const weightGrams = (Math.pow(girth, 2) * length) / 28.5;

    const resVal = document.getElementById('hc-fw-res-val');
    resVal.innerText = Math.round(weightGrams).toLocaleString('tr-TR');

    document.getElementById('hc-fish-weight-result').classList.add('visible');
}
