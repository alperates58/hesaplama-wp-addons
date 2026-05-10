function hcDakikaBaşınaMaliyetHesapla() {
    const price = parseFloat(document.getElementById('hc-mc-price').value);
    const hr = parseFloat(document.getElementById('hc-mc-hr').value) || 0;
    const min = parseFloat(document.getElementById('hc-mc-min').value) || 0;

    const totalMin = (hr * 60) + min;
    if (!price || totalMin === 0) return;

    const costPerMin = price / totalMin;

    document.getElementById('hc-mc-val').innerText = costPerMin.toLocaleString('tr-TR', { style: 'currency', currency: 'TRY' });
    document.getElementById('hc-mc-result').classList.add('visible');
}
