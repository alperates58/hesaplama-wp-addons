function hcCaiHesapla() {
    const fuelCo2PerLitre = parseFloat(document.getElementById('hc-cai-fuel').value);
    const cons = parseFloat(document.getElementById('hc-cai-cons').value);
    const km = parseFloat(document.getElementById('hc-cai-km').value);

    if (isNaN(cons) || isNaN(km)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const totalLitres = (km / 100) * cons;
    const totalCo2Kg = (totalLitres * fuelCo2PerLitre) / 1000; // in grams to kg conversion if value was in g
    // Wait, my values are 2310 g/L. So /1000 gives kg/L.
    
    const co2Ton = totalCo2Kg / 1000;
    const treeCount = Math.ceil(totalCo2Kg / 20);

    document.getElementById('hc-cai-val').innerText = co2Ton.toFixed(2) + " Ton CO2 / Yıl";
    document.getElementById('hc-cai-tree').innerText = "Bu salınımı nötrlemek için yılda yaklaşık " + treeCount + " ağaç dikilmelidir.";

    document.getElementById('hc-cai-result').classList.add('visible');
}
