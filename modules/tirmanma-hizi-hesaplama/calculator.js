function hcROCHesapla() {
    const powerHp = parseFloat(document.getElementById('hc-roc-power').value) || 0;
    const weightKg = parseFloat(document.getElementById('hc-roc-weight').value) || 1;

    // Simplified formula: ROC (fpm) = (Excess HP * 33000) / Weight (lbs)
    const weightLbs = weightKg * 2.20462;
    const roc = (powerHp * 33000) / weightLbs;

    document.getElementById('hc-res-roc-val').innerText = Math.round(roc).toLocaleString('tr-TR') + ' fpm';
    document.getElementById('hc-roc-calc-result').classList.add('visible');
}
