function hcEwasteHesapla() {
    const phones = parseFloat(document.getElementById('hc-ew-phones').value) || 0;
    const laptops = parseFloat(document.getElementById('hc-ew-laptops').value) || 0;
    const tvs = parseFloat(document.getElementById('hc-ew-tvs').value) || 0;

    // 2026 Verileri (Ağırlık / Ömür):
    // Telefon: 0.2kg / 3 yıl
    // Laptop: 2.0kg / 5 yıl
    // TV: 15.0kg / 8 yıl
    
    const yearlyWeight = (phones * 0.2 / 3) + (laptops * 2.0 / 5) + (tvs * 15.0 / 8);

    document.getElementById('hc-res-ew-kg').innerText = yearlyWeight.toLocaleString('tr-TR', {maximumFractionDigits: 2}) + ' kg';
    
    document.getElementById('hc-ewaste-result').classList.add('visible');
}
