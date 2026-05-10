function hcYakıtKarbonEmisyonuHesapla() {
    const factor = parseFloat(document.getElementById('hc-fc-type').value);
    const amount = parseFloat(document.getElementById('hc-fc-amount').value);

    if (!amount) return;

    const co2 = amount * factor;

    document.getElementById('hc-fc-val').innerText = co2.toFixed(2) + ' kg CO₂e';
    document.getElementById('hc-fc-result').classList.add('visible');
}
