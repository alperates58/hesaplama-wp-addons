function hcMlToGHesapla() {
    const density = parseFloat(document.getElementById('hc-mlg-type').value);
    const ml = parseFloat(document.getElementById('hc-mlg-val').value);

    if (isNaN(ml) || ml <= 0) {
        alert('Lütfen miktar giriniz.');
        return;
    }

    const grams = ml * density;

    document.getElementById('hc-mlg-res').innerText = grams.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    document.getElementById('hc-ml-to-g-result').classList.add('visible');
}
