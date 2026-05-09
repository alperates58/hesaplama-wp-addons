function hcBitkiPopulasyonuHesapla() {
    const area = parseFloat(document.getElementById('hc-pp-area').value);
    const rowSpace = parseFloat(document.getElementById('hc-pp-row-space').value);
    const plantSpace = parseFloat(document.getElementById('hc-pp-plant-space').value);

    if (isNaN(area) || isNaN(rowSpace) || isNaN(plantSpace) || area <= 0 || rowSpace <= 0 || plantSpace <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    // Mesafe cm -> m çevrimi
    const rowSpaceM = rowSpace / 100;
    const plantSpaceM = plantSpace / 100;

    const totalPlants = area / (rowSpaceM * plantSpaceM);
    
    document.getElementById('hc-pp-val').innerText = Math.round(totalPlants).toLocaleString('tr-TR') + ' adet';
    document.getElementById('hc-pp-note').innerText = `1 m² alanda ortalama ${(1 / (rowSpaceM * plantSpaceM)).toLocaleString('tr-TR', { maximumFractionDigits: 2 })} adet bitki bulunmaktadır.`;
    document.getElementById('hc-pp-result').classList.add('visible');
}
