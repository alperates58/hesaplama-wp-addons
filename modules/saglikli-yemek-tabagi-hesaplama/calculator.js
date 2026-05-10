function hcHealthyPlateHesapla() {
    const calories = parseFloat(document.getElementById('hc-plate-total').value);

    if (isNaN(calories) || calories <= 0) {
        alert('Lütfen hedef kaloriyi giriniz.');
        return;
    }

    // Harvard Sağlıklı Yemek Tabağı Modeli:
    // %50 Sebze ve Meyve, %25 Tam Tahıllar, %25 Protein
    const vegCal = calories * 0.5;
    const carbCal = calories * 0.25;
    const protCal = calories * 0.25;

    document.getElementById('hc-plate-list').innerHTML = `
        <ul style="text-align:left;">
            <li><strong>Sebze ve Meyve (%50):</strong> ${Math.round(vegCal)} kcal</li>
            <li><strong>Tam Tahıl / Karbonhidrat (%25):</strong> ${Math.round(carbCal)} kcal</li>
            <li><strong>Sağlıklı Protein (%25):</strong> ${Math.round(protCal)} kcal</li>
        </ul>
    `;
    
    document.getElementById('hc-plate-info').innerText = `Tabağınızın yarısını sebzelerle, kalan yarısını eşit oranda protein ve tahıllarla doldurmaya özen gösterin.`;
    document.getElementById('hc-healthy-plate-result').classList.add('visible');
}
