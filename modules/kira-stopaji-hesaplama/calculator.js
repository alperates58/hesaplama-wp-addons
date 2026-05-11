function hcKiraStopajHesapla() {
    const type = document.getElementById('hc-ks-type').value;
    const amount = parseFloat(document.getElementById('hc-ks-amount').value);
    const rate = 0.20; // Standart Kira Stopajı

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir kira tutarı girin.');
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

    document.getElementById('hc-ks-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ks-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ks-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-ks-result').classList.add('visible');
}
