function hcGıdaİsrafıHesapla() {
    const weekly = parseFloat(document.getElementById('hc-fw-weekly').value);
    const price = parseFloat(document.getElementById('hc-fw-price').value);

    if (!weekly) return;

    const yearlyKg = weekly * 52;
    const yearlyCost = yearlyKg * price;
    
    // Gıda israfı CO2 emisyonu: 1 kg gıda israfı ~2.5 kg CO2e
    const yearlyCo2 = yearlyKg * 2.5;

    document.getElementById('hc-fw-val').innerText = yearlyCost.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-fw-details').innerHTML = `
        Yıllık Atık: ${yearlyKg.toFixed(1)} kg<br>
        Karbon Ayak İzi: ${yearlyCo2.toFixed(1)} kg CO₂e
    `;
    document.getElementById('hc-fw-result').classList.add('visible');
}
