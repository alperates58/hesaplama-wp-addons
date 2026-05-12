function hcHidrasyonHesapla() {
    const flour = parseFloat(document.getElementById('hc-fw-flour').value);
    const ratio = parseFloat(document.getElementById('hc-fw-ratio').value);

    if (!flour || !ratio) return;

    const water = (flour * ratio) / 100;
    const total = flour + water;

    document.getElementById('hc-fw-res-val').innerText = Math.round(water).toLocaleString('tr-TR') + ' ml/g';
    document.getElementById('hc-fw-total-val').innerText = Math.round(total).toLocaleString('tr-TR') + ' g';

    document.getElementById('hc-flour-water-result').classList.add('visible');
}
