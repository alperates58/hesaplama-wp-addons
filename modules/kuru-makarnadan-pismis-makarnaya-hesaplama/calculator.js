function hcMakarnaPisir() {
    const grams = parseFloat(document.getElementById('hc-dcp-grams').value);

    if (!grams || grams <= 0) {
        alert('Lütfen kuru makarna miktarını giriniz.');
        return;
    }

    const cookedGrams = grams * 2.35;

    const resultDiv = document.getElementById('hc-dry-to-cooked-pasta-result');
    document.getElementById('hc-dcp-res-val').innerText = Math.round(cookedGrams).toLocaleString('tr-TR') + ' g';
    
    resultDiv.classList.add('visible');
}
