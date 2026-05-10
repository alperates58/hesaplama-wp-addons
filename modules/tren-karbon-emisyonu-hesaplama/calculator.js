function hcTrenKarbonEmisyonuHesapla() {
    const dist = parseFloat(document.getElementById('hc-tr-dist').value);
    const factor = parseFloat(document.getElementById('hc-tr-type').value);

    if (!dist) return;

    const co2 = dist * factor;

    document.getElementById('hc-tr-val').innerText = co2.toFixed(2) + ' kg CO₂e';
    document.getElementById('hc-tr-result').classList.add('visible');
}
