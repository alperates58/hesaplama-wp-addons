function hcSogutmaSuresiHesapla() {
    const t0 = parseFloat(document.getElementById('hc-ct-temp-start').value);
    const tTarget = parseFloat(document.getElementById('hc-ct-temp-target').value);
    const methodK = parseFloat(document.getElementById('hc-ct-method').value);

    let tEnv = 4; // Default Refrigerator
    if (methodK === 0.04) tEnv = -18;
    if (methodK === 0.15) tEnv = 0;

    if (isNaN(t0) || isNaN(tTarget) || t0 <= tTarget) {
        alert('Hedef sıcaklık başlangıç sıcaklığından düşük olmalıdır.');
        return;
    }

    // Newton's Law of Cooling solved for t:
    // T(t) = Tenv + (T0 - Tenv) * e^(-kt)
    const t = -Math.log((tTarget - tEnv) / (t0 - tEnv)) / methodK;

    const resultDiv = document.getElementById('hc-cooling-time-result');
    document.getElementById('hc-ct-val').innerText = Math.round(t) + ' Dakika';
    
    resultDiv.classList.add('visible');
}
