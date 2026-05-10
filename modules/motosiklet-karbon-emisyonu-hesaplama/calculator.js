function hcMotosikletKarbonEmisyonuHesapla() {
    const dist = parseFloat(document.getElementById('hc-mc-dist').value);
    const factor = parseFloat(document.getElementById('hc-mc-size').value);

    if (!dist) return;

    const yearlyCo2 = dist * 52 * factor;

    document.getElementById('hc-mc-val').innerText = Math.round(yearlyCo2).toLocaleString('tr-TR') + ' kg CO₂e';
    document.getElementById('hc-mc-result').classList.add('visible');
}
