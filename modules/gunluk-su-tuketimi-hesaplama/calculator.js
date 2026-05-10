function hcWaterCalcHesapla() {
    const weight = parseFloat(document.getElementById('hc-wc-weight').value);
    const activity = parseFloat(document.getElementById('hc-wc-activity').value) || 0;

    if (!weight) return;

    // Basic requirement: 0.033 L per kg
    // Activity: approx 350ml per 30 min activity
    const baseWater = weight * 0.033;
    const activityWater = (activity / 30) * 0.35;
    const total = baseWater + activityWater;

    document.getElementById('hc-wc-res-val').innerText = total.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-water-calc-result').classList.add('visible');
}
