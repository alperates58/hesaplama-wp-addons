function hcOilAbsorptionHesapla() {
    const pct = parseFloat(document.getElementById('hc-oa-type').value);
    const weight = parseFloat(document.getElementById('hc-oa-weight').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen gıda miktarını giriniz.');
        return;
    }

    const absorbedOil = weight * (pct / 100);
    const extraCalories = absorbedOil * 9; // 1g yağ = 9 kcal

    document.getElementById('hc-oa-val').innerText = absorbedOil.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g Yağ';
    document.getElementById('hc-oa-info').innerText = `Kızartma işlemi bu gıdaya yaklaşık ${Math.round(extraCalories)} kcal eklemiştir.`;
    
    document.getElementById('hc-oil-absorption-result').classList.add('visible');
}
