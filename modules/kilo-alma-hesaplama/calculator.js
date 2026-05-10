function hcWeightGainHesapla() {
    const bmr = parseFloat(document.getElementById('hc-wg-bmr').value);
    const speed = parseFloat(document.getElementById('hc-wg-speed').value);

    if (!bmr) return;

    // 1kg weight gain requires approx 7700 kcal surplus
    const weeklySurplus = speed * 7700;
    const dailySurplus = weeklySurplus / 7;
    const targetCalories = bmr + dailySurplus;

    document.getElementById('hc-wg-res-val').innerText = Math.round(targetCalories).toLocaleString('tr-TR');
    document.getElementById('hc-weight-gain-result').classList.add('visible');
}
