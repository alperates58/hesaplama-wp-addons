function hcPOSHesapla() {
    const price = parseFloat(document.getElementById('hc-pos-price').value) || 0;
    const rate = parseFloat(document.getElementById('hc-pos-rate').value) || 0;

    if (price <= 0) {
        alert('Lütfen işlem tutarını giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const net = price - commission;

    document.getElementById('hc-pos-res-kom').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pos-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-pos-result').classList.add('visible');
}
