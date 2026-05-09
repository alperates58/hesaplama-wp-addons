function hcAmazonHesapla() {
    const price = parseFloat(document.getElementById('hc-amz-price').value) || 0;
    const rate = parseFloat(document.getElementById('hc-amz-rate').value) || 0;
    const fba = parseFloat(document.getElementById('hc-amz-fba').value) || 0;

    if (price <= 0) {
        alert('Lütfen satış fiyatını giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const net = price - commission - fba;

    document.getElementById('hc-amz-res-kom').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-amz-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-amazon-result').classList.add('visible');
}
