function hcCekKirdirmaHesapla() {
    const amount = parseFloat(document.getElementById('hc-ck-amount').value) || 0;
    const days = parseInt(document.getElementById('hc-ck-days').value) || 0;
    const rate = parseFloat(document.getElementById('hc-ck-rate').value) || 0;
    const commRate = parseFloat(document.getElementById('hc-ck-comm').value) || 0;

    const discount = (amount * rate * days) / 36000;
    const commission = (amount * commRate) / 100;
    const net = amount - discount - commission;

    document.getElementById('hc-ck-res-discount').innerText = discount.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ck-res-comm').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ck-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-cek-kirdirma-result').classList.add('visible');
}
