function hcBasitFaizHesapla() {
    const p = parseFloat(document.getElementById('hc-si-principal').value) || 0;
    const r = parseFloat(document.getElementById('hc-si-rate').value) || 0;
    const tVal = parseFloat(document.getElementById('hc-si-time-val').value) || 0;
    const tUnit = document.getElementById('hc-si-time-unit').value;

    let interest = 0;

    if (tUnit === 'year') {
        interest = (p * r * tVal) / 100;
    } else if (tUnit === 'month') {
        interest = (p * r * tVal) / 1200;
    } else {
        interest = (p * r * tVal) / 36500;
    }

    const total = p + interest;

    document.getElementById('hc-si-res-interest').innerText = interest.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-si-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-simple-interest-result').classList.add('visible');
}
