function hcNpkHesapla() {
    const targetN = parseFloat(document.getElementById('hc-np-target').value);
    const nPerc = parseFloat(document.getElementById('hc-np-fertilizer').value);
    const area = parseFloat(document.getElementById('hc-np-area').value);

    if (!targetN || !nPerc || !area) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // kg/hektar -> kg/m2 (1 hektar = 10000 m2)
    const targetPerM2 = targetN / 10000;
    const totalNNeeded = targetPerM2 * area;

    // Gübre Miktarı = Saf Besin / (Yüzde / 100)
    const totalFertilizer = totalNNeeded / (nPerc / 100);

    const resVal = document.getElementById('hc-np-res-val');
    resVal.innerText = totalFertilizer.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-npk-calc-result').classList.add('visible');
}
