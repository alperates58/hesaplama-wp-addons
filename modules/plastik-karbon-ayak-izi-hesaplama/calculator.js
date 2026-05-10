function hcPlastikKarbonAyakİziHesapla() {
    const weight = parseFloat(document.getElementById('hc-pc-weight').value);

    if (!weight) return;

    // Plastik emisyon faktörü (üretim + atık): ~6 kg CO2e / kg plastik
    const co2 = weight * 6;

    document.getElementById('hc-pc-val').innerText = Math.round(co2).toLocaleString('tr-TR') + ' kg CO₂e';
    document.getElementById('hc-pc-result').classList.add('visible');
}
