function hcNakliyeKarbonEmisyonuHesapla() {
    const tons = parseFloat(document.getElementById('hc-fr-weight').value);
    const dist = parseFloat(document.getElementById('hc-fr-dist').value);
    const factor = parseFloat(document.getElementById('hc-fr-type').value);

    if (!tons || !dist) return;

    // Emisyon = Ton * km * Faktör
    const co2 = tons * dist * factor;

    document.getElementById('hc-fr-val').innerText = Math.round(co2).toLocaleString('tr-TR') + ' kg CO₂e';
    document.getElementById('hc-fr-result').classList.add('visible');
}
