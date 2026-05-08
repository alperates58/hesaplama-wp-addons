function hcKDVHesapla() {
    const amount = parseFloat(document.getElementById('hc-kd-amount').value) || 0;
    const rate = parseFloat(document.getElementById('hc-kd-rate').value) / 100;
    const type = document.getElementById('hc-kd-type').value;

    let net = 0;
    let tax = 0;
    let total = 0;

    if (type === 'excl') {
        net = amount;
        tax = amount * rate;
        total = amount + tax;
    } else {
        total = amount;
        net = amount / (1 + rate);
        tax = total - net;
    }

    document.getElementById('hc-kd-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kd-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kd-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kdv-result').classList.add('visible');
}
