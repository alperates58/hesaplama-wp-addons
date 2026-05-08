function hcNetKarbonhidratHesapla() {
    const total = parseFloat(document.getElementById('hc-nc-total').value) || 0;
    const fiber = parseFloat(document.getElementById('hc-nc-fiber').value) || 0;
    const sugarAlcohol = parseFloat(document.getElementById('hc-nc-sugar-alcohol').value) || 0;

    if (!total && !fiber) {
        alert('Lütfen değerleri girin.');
        return;
    }

    const netCarb = total - fiber - sugarAlcohol;
    const finalNet = netCarb < 0 ? 0 : netCarb;

    document.getElementById('hc-nc-value').innerText = finalNet.toLocaleString('tr-TR') + ' g';
    document.getElementById('hc-net-carb-result').classList.add('visible');
}
