function hcFaizVergiHesapla() {
    const gross = parseFloat(document.getElementById('hc-fv-gross').value) || 0;
    const rate = parseFloat(document.getElementById('hc-fv-rate').value) / 100;

    const tax = gross * rate;
    const net = gross - tax;

    document.getElementById('hc-fv-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fv-res-total').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-faiz-result').classList.add('visible');
}
