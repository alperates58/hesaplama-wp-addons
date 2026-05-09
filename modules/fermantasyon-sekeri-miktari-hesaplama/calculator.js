function hcFermSugarHesapla() {
    const vol = parseFloat(document.getElementById('hc-fs-vol').value) || 0;
    const carb = parseFloat(document.getElementById('hc-fs-carb').value) || 2.4;

    if (vol <= 0) return;

    // Basitleştirilmiş formül: Liter başına ~7g şeker 2.4 hacim sağlar (sıvı temp 20C varsayılarak)
    // Gram Sugar = (Target CO2 - Base CO2) * 4 * Vol
    // Ortalama pratik değer: Liter başı 6-8 gr
    const sugarPerLiter = (carb - 0.8) * 4; 
    const total = vol * sugarPerLiter;

    document.getElementById('hc-res-fs-total').innerText = Math.round(total) + ' gr';
    document.getElementById('hc-ferm-sugar-result').classList.add('visible');
}
