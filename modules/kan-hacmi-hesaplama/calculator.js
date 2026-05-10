function hcKanHacmiHesapla() {
    const gender = document.getElementById('hc-bv-gender').value;
    const h = parseFloat(document.getElementById('hc-bv-height').value) / 100; // metreye çevir
    const w = parseFloat(document.getElementById('hc-bv-weight').value);

    if (!h || !w) return;

    let bv = 0;
    if (gender === 'male') {
        bv = (0.3669 * Math.pow(h, 3)) + (0.03219 * w) + 0.6041;
    } else {
        bv = (0.3561 * Math.pow(h, 3)) + (0.03308 * w) + 0.1833;
    }

    document.getElementById('hc-bv-val').innerText = bv.toFixed(2) + ' Litre';
    document.getElementById('hc-bv-result').classList.add('visible');
}
