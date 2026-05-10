function hcOtobüsKarbonEmisyonuHesapla() {
    const dist = parseFloat(document.getElementById('hc-bt-dist').value);
    const factor = parseFloat(document.getElementById('hc-bt-type').value);

    if (!dist) return;

    const co2 = dist * factor;

    document.getElementById('hc-bt-val').innerText = co2.toFixed(2) + ' kg CO₂e';
    document.getElementById('hc-bt-result').classList.add('visible');
}
