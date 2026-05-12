function hcSalamuraTuzHesapla() {
    const water = parseFloat(document.getElementById('hc-bc-water').value);
    const ratio = parseFloat(document.getElementById('hc-bc-type').value);

    if (!water || water <= 0) return;

    const salt = water * 1000 * ratio;

    const resultDiv = document.getElementById('hc-brine-calc-result');
    document.getElementById('hc-bc-res-val').innerText = Math.round(salt).toLocaleString('tr-TR') + ' g';
    
    resultDiv.classList.add('visible');
}
