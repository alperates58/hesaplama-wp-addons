function hcSalamuraHesapla() {
    const water = parseFloat(document.getElementById('hc-br-water').value);
    const ratio = parseFloat(document.getElementById('hc-br-intensity').value);

    if (!water || water <= 0) {
        alert('Lütfen su miktarını giriniz.');
        return;
    }

    const saltGrams = water * 1000 * ratio;

    const resultDiv = document.getElementById('hc-brine-ratio-result');
    document.getElementById('hc-br-res-val').innerText = saltGrams.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' g';
    
    resultDiv.classList.add('visible');
}
