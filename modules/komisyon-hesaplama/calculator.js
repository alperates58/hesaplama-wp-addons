function hcKomisyonHesapla() {
    const price = parseFloat(document.getElementById('hc-kom-price').value) || 0;
    const rate = parseFloat(document.getElementById('hc-kom-rate').value) || 0;

    if (price <= 0) {
        alert('Lütfen geçerli bir fiyat giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const net = price - commission;

    document.getElementById('hc-kom-res-amount').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kom-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-komisyon-result').classList.add('visible');
}
