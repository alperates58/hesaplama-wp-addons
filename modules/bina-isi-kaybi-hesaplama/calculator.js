function hcIsiKaybiHesapla() {
    const area = parseFloat(document.getElementById('hc-hl-area').value);
    const u = parseFloat(document.getElementById('hc-hl-u').value);
    const tint = parseFloat(document.getElementById('hc-hl-tint').value);
    const text = parseFloat(document.getElementById('hc-hl-text').value);

    if (isNaN(area) || isNaN(u) || isNaN(tint) || isNaN(text)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const deltaT = Math.abs(tint - text);
    const heatLossW = u * area * deltaT;
    const heatLossKcal = heatLossW * 0.86;

    document.getElementById('hc-res-hl-watt').innerText = heatLossW.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' Watt';
    document.getElementById('hc-res-hl-kcal').innerText = heatLossKcal.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' kcal/saat';

    document.getElementById('hc-hl-result').classList.add('visible');
}
