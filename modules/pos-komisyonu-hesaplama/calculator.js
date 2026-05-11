function hcPosKomisyonHesapla() {
    const amount = parseFloat(document.getElementById('hc-pos-amount').value);
    const rate = parseFloat(document.getElementById('hc-pos-rate').value) / 100;
    const fixed = parseFloat(document.getElementById('hc-pos-fixed').value) || 0;

    if (isNaN(amount) || amount <= 0 || isNaN(rate)) {
        alert('Lütfen satış tutarı ve komisyon oranını girin.');
        return;
    }

    const fee = (amount * rate) + fixed;
    const net = amount - fee;

    document.getElementById('hc-pos-res-fee').innerText = fee.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pos-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-pos-result').classList.add('visible');
}
