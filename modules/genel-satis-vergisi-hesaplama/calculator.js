function hcGenelSatisVergisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-gsv-amount').value);
    const rate = parseFloat(document.getElementById('hc-gsv-rate').value) / 100;
    const mode = document.getElementById('hc-gsv-mode').value;

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    let net, tax, total;

    if (mode === 'hariç') {
        net = amount;
        tax = net * rate;
        total = net + tax;
    } else {
        total = amount;
        net = total / (1 + rate);
        tax = total - net;
    }

    document.getElementById('hc-gsv-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gsv-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-gsv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gsv-result').classList.add('visible');
}
