function hcOrmanKarbonDepolamaHesapla() {
    const area = parseFloat(document.getElementById('hc-fc-area').value);
    const rate = parseFloat(document.getElementById('hc-fc-type').value);

    if (!area) return;

    const totalCo2 = area * rate;

    document.getElementById('hc-fc-val').innerText = totalCo2.toLocaleString('tr-TR') + ' Ton CO₂ / yıl';
    document.getElementById('hc-fc-result').classList.add('visible');
}
