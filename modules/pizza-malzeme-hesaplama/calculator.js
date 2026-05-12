function hcPizzaMalzemeHesapla() {
    const count = parseInt(document.getElementById('hc-pi-count').value);
    const d = parseFloat(document.getElementById('hc-pi-diameter').value);

    if (!count || !d) return;

    // Standard 30cm (Area ~700 cm2) base
    const baseArea = Math.PI * Math.pow(15, 2);
    const currentArea = Math.PI * Math.pow(d / 2, 2);
    const areaFactor = currentArea / baseArea;

    // Base amounts for 30cm
    const sauce = 100 * areaFactor * count;
    const cheese = 125 * areaFactor * count;
    const toppings = 60 * areaFactor * count;

    const resList = document.getElementById('hc-pi-res-list');
    resList.innerHTML = `
        <div class="hc-result-item"><span>Domates Sosu:</span> <strong>${Math.round(sauce)} g</strong></div>
        <div class="hc-result-item"><span>Mozzarella/Peynir:</span> <strong>${Math.round(cheese)} g</strong></div>
        <div class="hc-result-item"><span>Şarküteri/Sebze:</span> <strong>${Math.round(toppings)} g</strong></div>
    `;

    document.getElementById('hc-pizza-ingredients-result').classList.add('visible');
}
