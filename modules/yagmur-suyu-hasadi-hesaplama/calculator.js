function hcYağmurSuyuHasadıHesapla() {
    const area = parseFloat(document.getElementById('hc-rh-area').value);
    const rain = parseFloat(document.getElementById('hc-rh-rain').value);
    const efficiency = parseFloat(document.getElementById('hc-rh-eff').value);

    if (!area || !rain) return;

    // Hasat (Litre) = Alan (m2) * Yağış (mm) * Verim
    const liters = area * rain * efficiency;

    document.getElementById('hc-rh-val').innerText = Math.round(liters).toLocaleString('tr-TR') + ' Litre';
    document.getElementById('hc-rh-result').classList.add('visible');
}
