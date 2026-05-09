function hcMccHesapla() {
    const fuelCo2PerLitre = 2.31; // Petrol
    const cons = parseFloat(document.getElementById('hc-mcc-cons').value);
    const km = parseFloat(document.getElementById('hc-mcc-km').value);

    if (isNaN(cons) || isNaN(km)) {
        alert('Lütfen alanları doldurun.');
        return;
    }

    const totalLitres = (km / 100) * cons;
    const totalCo2Kg = totalLitres * fuelCo2PerLitre;
    
    const treeCount = Math.ceil(totalCo2Kg / 20);

    document.getElementById('hc-mcc-val').innerText = totalCo2Kg.toFixed(1) + " kg CO2 / Yıl";
    document.getElementById('hc-mcc-tree').innerText = "Bu salınımı nötrlemek için yılda yaklaşık " + treeCount + " ağaç dikilmelidir.";

    document.getElementById('hc-mcc-result').classList.add('visible');
}
