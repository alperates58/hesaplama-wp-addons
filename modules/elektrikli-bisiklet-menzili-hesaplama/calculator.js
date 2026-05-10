function hcElektrikliBisikletMenziliHesapla() {
    const wh = parseFloat(document.getElementById('hc-ebike-battery').value);
    const consumpBase = parseFloat(document.getElementById('hc-ebike-mode').value);
    const weightFactor = parseFloat(document.getElementById('hc-ebike-weight').value);

    if (!wh) return;

    // Menzil = (Wh / (Base Consumption * Weight Factor)) * Efficiency Factor (0.9)
    const effectiveConsump = consumpBase * weightFactor;
    const range = (wh / effectiveConsump) * 0.9;

    document.getElementById('hc-ebike-val').innerText = Math.round(range) + ' km';
    
    let info = `Tahmini tüketim: ${effectiveConsump.toFixed(1)} Wh/km. <br>`;
    info += "*Hava sıcaklığı, lastik basıncı ve eğim menzili doğrudan etkiler.";
    
    document.getElementById('hc-ebike-info').innerHTML = info;
    document.getElementById('hc-ebike-result').classList.add('visible');
}
