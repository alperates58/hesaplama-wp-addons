function hcEspressoRatioHesapla() {
    const type = document.getElementById('hc-er-type').value;
    const coffee = parseFloat(document.getElementById('hc-er-coffee').value) || 0;

    let ratio = 2;
    if (type === 'ristretto') ratio = 1.5;
    else if (type === 'lungo') ratio = 3;

    const yield = coffee * ratio;

    document.getElementById('hc-res-er-yield').innerText = yield.toFixed(1) + ' gr';
    document.getElementById('hc-espresso-ratio-result').classList.add('visible');
}
