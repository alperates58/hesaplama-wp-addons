function hcKriptoParaKarbonAyakİziHesapla() {
    const factor = parseFloat(document.getElementById('hc-cc-type').value);
    const count = parseFloat(document.getElementById('hc-cc-count').value);

    if (!count) return;

    const totalCo2 = factor * count;

    if (totalCo2 >= 1000) {
        document.getElementById('hc-cc-val').innerText = (totalCo2 / 1000).toFixed(2) + ' Ton CO₂e';
    } else {
        document.getElementById('hc-cc-val').innerText = totalCo2.toFixed(1) + ' kg CO₂e';
    }
    
    document.getElementById('hc-cc-result').classList.add('visible');
}
