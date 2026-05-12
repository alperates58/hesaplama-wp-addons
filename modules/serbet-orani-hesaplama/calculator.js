function hcSerbetHesapla() {
    const ratio = parseFloat(document.getElementById('hc-sr-type').value);
    const water = parseFloat(document.getElementById('hc-sr-water').value);

    if (!water || water <= 0) return;

    const sugar = water * ratio;

    const resultDiv = document.getElementById('hc-syrup-ratio-result');
    document.getElementById('hc-sr-res-val').innerText = sugar.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' Su Bardağı';
    
    resultDiv.classList.add('visible');
}
