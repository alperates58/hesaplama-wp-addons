function hcKarPayiVergiHesapla() {
    const gross = parseFloat(document.getElementById('hc-kp-gross').value) || 0;

    const tax = gross * 0.10;
    const net = gross - tax;

    document.getElementById('hc-kp-res-tax').innerText = tax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kp-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kp-res-total').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kar-payi-result').classList.add('visible');
}
