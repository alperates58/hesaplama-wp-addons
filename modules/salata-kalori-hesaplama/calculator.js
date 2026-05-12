function hcSalataKaloriHesapla() {
    const greens = parseFloat(document.getElementById('hc-sc-greens').value) || 0;
    const veg = parseFloat(document.getElementById('hc-sc-veg').value) || 0;
    const oilSpoons = parseFloat(document.getElementById('hc-sc-oil').value) || 0;
    const protein = parseFloat(document.getElementById('hc-sc-prot').value) || 0;

    const calGreens = (greens / 100) * 15;
    const calVeg = (veg / 100) * 18;
    const calOil = oilSpoons * 120; // 1 tbsp olive oil approx 120 kcal
    const calProt = (protein / 100) * 150; // Avg 150 kcal/100g for mixed protein

    const total = calGreens + calVeg + calOil + calProt;

    const resultDiv = document.getElementById('hc-salad-cal-result');
    document.getElementById('hc-sc-res-val').innerText = Math.round(total).toLocaleString('tr-TR') + ' kcal';
    
    resultDiv.classList.add('visible');
}
