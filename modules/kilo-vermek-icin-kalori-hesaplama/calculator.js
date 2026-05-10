function hcWlcHesapla() {
    const bmr = parseFloat(document.getElementById('hc-wlc-bmr').value);
    const goalDeficit = parseFloat(document.getElementById('hc-wlc-goal').value);

    if (!bmr) return;

    // To lose 0.5kg/week, need 500kcal daily deficit
    // To lose 1kg/week, need 1000kcal daily deficit
    const target = bmr - goalDeficit;
    
    // Safety check: minimum 1200 for women, 1500 for men roughly
    const safeTarget = Math.max(target, 1200);

    document.getElementById('hc-wlc-res-val').innerText = Math.round(safeTarget).toLocaleString('tr-TR');
    document.getElementById('hc-wl-calories-result').classList.add('visible');
}
