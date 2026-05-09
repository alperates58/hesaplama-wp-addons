function hcStopajHesapla() {
    const gross = parseFloat(document.getElementById('hc-st-amount').value) || 0;
    const rate = parseFloat(document.getElementById('hc-st-rate').value) / 100;

    const tax = gross * rate;
    const net = gross - tax;

    document.getElementById('hc-st-res-gross').innerText = gross.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-st-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-st-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-stopaj-result').classList.add('visible');
}
