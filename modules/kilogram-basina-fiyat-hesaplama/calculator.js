function hcKilogramBaşınaFiyatHesapla() {
    const cost = parseFloat(document.getElementById('hc-unit-cost').value);
    const val = parseFloat(document.getElementById('hc-unit-val').value);
    const type = document.getElementById('hc-unit-type').value;

    if (!cost || !val) return;

    let kgPrice = 0;
    if (type === 'gr' || type === 'ml') {
        kgPrice = (cost / val) * 1000;
    } else {
        kgPrice = cost / val;
    }

    document.getElementById('hc-unit-res').innerText = kgPrice.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-unit-result').classList.add('visible');
}
