function hcStopajHesapla() {
    const type = document.getElementById('hc-st-type').value;
    const amount = parseFloat(document.getElementById('hc-st-amount').value);
    const rate = parseFloat(document.getElementById('hc-st-rate').value) / 100;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    let gross, tax, net;

    if (type === 'brüt') {
        gross = amount;
        tax = gross * rate;
        net = gross - tax;
    } else {
        net = amount;
        gross = net / (1 - rate);
        tax = gross - net;
    }

    document.getElementById('hc-st-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-st-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-st-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-st-result').classList.add('visible');
}
