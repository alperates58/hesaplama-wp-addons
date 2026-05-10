function hcNormaliteHesapla() {
    const molar = parseFloat(document.getElementById('hc-no-molar').value);
    const valency = parseFloat(document.getElementById('hc-no-valency').value);

    if (!molar || !valency) return;

    // N = M * n
    const normality = molar * valency;

    document.getElementById('hc-no-val').innerText = normality.toFixed(4) + ' N';
    document.getElementById('hc-no-result').classList.add('visible');
}
