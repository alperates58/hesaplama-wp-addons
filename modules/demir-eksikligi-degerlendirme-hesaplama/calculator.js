function hcDemirEksikliğiHesapla() {
    const w = parseFloat(document.getElementById('hc-id-w').value);
    const hb = parseFloat(document.getElementById('hc-id-hb').value);
    const target = parseFloat(document.getElementById('hc-id-target').value);

    if (!w || !hb || !target) return;

    // Ganzoni Formula: Deficit (mg) = Weight * (Target Hb - Actual Hb) * 2.4 + 500
    const deficit = w * (target - hb) * 2.4 + 500;

    document.getElementById('hc-id-val').innerText = Math.round(deficit) + ' mg';
    document.getElementById('hc-id-result').classList.add('visible');
}
