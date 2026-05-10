function hcHalfRecipeHesapla() {
    const val = parseFloat(document.getElementById('hc-hr-val').value);

    if (isNaN(val) || val <= 0) {
        alert('Lütfen orijinal miktarı giriniz.');
        return;
    }

    const half = val / 2;

    document.getElementById('hc-hr-res').innerText = half.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-half-recipe-result').classList.add('visible');
}
