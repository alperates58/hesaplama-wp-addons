function hcLPGKarbonEmisyonuHesapla() {
    const amount = parseFloat(document.getElementById('hc-lpg-amount').value);

    if (!amount) return;

    // LPG Emisyon Faktörü: ~1.51 kg CO2e / Litre
    const co2 = amount * 1.511;

    document.getElementById('hc-lpg-val').innerText = co2.toFixed(2) + ' kg CO₂e';
    document.getElementById('hc-lpg-result').classList.add('visible');
}
