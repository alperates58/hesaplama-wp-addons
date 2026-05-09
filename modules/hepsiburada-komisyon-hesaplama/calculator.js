function hcHepsiburadaHesapla() {
    const price = parseFloat(document.getElementById('hc-hb-price').value) || 0;
    const rate = parseFloat(document.getElementById('hc-hb-rate').value) || 0;
    const shipping = parseFloat(document.getElementById('hc-hb-shipping').value) || 0;

    if (price <= 0) {
        alert('Lütfen satış fiyatını giriniz.');
        return;
    }

    const commission = (price * rate) / 100;
    const fixedFee = 2.00; // Estimated 2026 fixed fee
    
    const totalExp = commission + fixedFee + shipping;
    const net = price - totalExp;

    document.getElementById('hc-hb-res-kom').innerText = commission.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-hb-res-fee').innerText = fixedFee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-hb-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-hepsiburada-result').classList.add('visible');
}
