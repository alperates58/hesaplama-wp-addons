function hcKdvTevkifatHesapla() {
    const amount = parseFloat(document.getElementById('hc-kdv-amount').value);
    const kdvRate = parseFloat(document.getElementById('hc-kdv-rate').value) / 100;
    const tevkifatRate = parseFloat(document.getElementById('hc-kdv-tevkifat-rate').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir tutar girin.');
        return;
    }

    const totalKdv = amount * kdvRate;
    const tevkifatAmount = totalKdv * tevkifatRate;
    const sellerKdv = totalKdv - tevkifatAmount;
    const grandTotal = amount + sellerKdv;

    document.getElementById('hc-kdv-res-total-kdv').innerText = totalKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-tevkifat').innerText = tevkifatAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-seller-kdv').innerText = sellerKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kdv-res-grand').innerText = grandTotal.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kdv-tevkifat-result').classList.add('visible');
}
