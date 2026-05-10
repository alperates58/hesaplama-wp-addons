function hcUçuşKarbonEmisyonuHesapla() {
    const dist = parseFloat(document.getElementById('hc-fl-dist').value);
    const factor = parseFloat(document.getElementById('hc-fl-class').value);

    if (!dist) return;

    const co2 = dist * factor;

    if (co2 >= 1000) {
        document.getElementById('hc-fl-val').innerText = (co2 / 1000).toFixed(2) + ' Ton CO₂e';
    } else {
        document.getElementById('hc-fl-val').innerText = Math.round(co2).toLocaleString('tr-TR') + ' kg CO₂e';
    }
    
    document.getElementById('hc-fl-result').classList.add('visible');
}
