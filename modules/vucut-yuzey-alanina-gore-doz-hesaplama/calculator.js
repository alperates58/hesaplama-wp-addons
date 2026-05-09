function hcBSADosageHesapla() {
    const h = parseFloat(document.getElementById('hc-bs-h').value) || 0;
    const w = parseFloat(document.getElementById('hc-bs-w').value) || 0;
    const adultDose = parseFloat(document.getElementById('hc-bs-adose').value) || 0;

    if (h <= 0 || w <= 0) return;

    // BSA (Mosteller Formula)
    const bsa = Math.sqrt((h * w) / 3600);
    
    // Dosage = (BSA / 1.73) * AdultDose
    const dose = (bsa / 1.73) * adultDose;

    document.getElementById('hc-res-bs-area').innerText = bsa.toFixed(2) + ' m²';
    document.getElementById('hc-res-bs-val').innerText = dose.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' mg';
    
    document.getElementById('hc-bsa-dosage-result').classList.add('visible');
}
