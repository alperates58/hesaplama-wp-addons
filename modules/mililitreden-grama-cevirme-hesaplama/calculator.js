function hcMlToGram() {
    const ml = parseFloat(document.getElementById('hc-mtg-ml').value);
    const density = parseFloat(document.getElementById('hc-mtg-type').value);

    if (!ml || ml <= 0) {
        alert('Lütfen ml miktarını giriniz.');
        return;
    }

    const grams = ml * density;

    const resultDiv = document.getElementById('hc-ml-to-g-result');
    document.getElementById('hc-mtg-res-val').innerText = grams.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    
    resultDiv.classList.add('visible');
}
