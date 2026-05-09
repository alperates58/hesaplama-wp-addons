function hcShopierHesapla() {
    const price = parseFloat(document.getElementById('hc-sh-price').value) || 0;
    const type = document.getElementById('hc-sh-type').value;
    let rate = 0;

    if (type === 'custom') {
        rate = parseFloat(document.getElementById('hc-sh-rate').value) || 0;
    } else {
        rate = parseFloat(type);
    }

    if (price <= 0) {
        alert('Lütfen satış fiyatını giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const fixedFee = 0.49;
    const net = price - commission - fixedFee;

    document.getElementById('hc-sh-res-kom').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sh-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-shopier-result').classList.add('visible');
}
