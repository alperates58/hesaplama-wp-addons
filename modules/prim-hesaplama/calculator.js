function hcPrimHesapla() {
    const base = parseFloat(document.getElementById('hc-pr-base').value) || 0;
    const type = document.getElementById('hc-pr-type').value;
    const val = parseFloat(document.getElementById('hc-pr-val').value) || 0;

    let total = 0;
    if (type === 'percent') {
        total = (base * val) / 100;
    } else {
        total = val;
    }

    document.getElementById('hc-pr-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-prim-result').classList.add('visible');
}
