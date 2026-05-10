function hcYearlyWeightHesapla() {
    const surplus = parseFloat(document.getElementById('hc-yw-surplus').value);

    if (isNaN(surplus)) return;

    // 7700 kcal = 1kg
    const yearlyKcal = surplus * 365;
    const yearlyKg = yearlyKcal / 7700;

    const resVal = document.getElementById('hc-yw-res-val');
    resVal.innerText = (yearlyKg > 0 ? '+' : '') + yearlyKg.toFixed(1).toLocaleString('tr-TR');
    resVal.style.color = yearlyKg > 0 ? '#e74c3c' : '#27ae60';

    document.getElementById('hc-yearly-weight-result').classList.add('visible');
}
