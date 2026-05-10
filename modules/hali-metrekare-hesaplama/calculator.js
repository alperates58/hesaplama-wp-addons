function hcHalıMetrekareHesapla() {
    const w = parseFloat(document.getElementById('hc-rm-w').value);
    const l = parseFloat(document.getElementById('hc-rm-l').value);
    const price = parseFloat(document.getElementById('hc-rm-price').value) || 0;

    if (!w || !l) return;

    const sqm = (w * l) / 10000;
    const totalCost = sqm * price;

    document.getElementById('hc-rm-val').innerText = sqm.toFixed(2) + ' m²';
    if (totalCost > 0) {
        document.getElementById('hc-rm-cost').innerText = `Tahmini Yıkama Bedeli: ${totalCost.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' })}`;
    }
    document.getElementById('hc-rm-result').classList.add('visible');
}
