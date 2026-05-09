function hcEtsyHesapla() {
    const price = parseFloat(document.getElementById('hc-ets-price').value) || 0;
    const currency = document.getElementById('hc-ets-currency').value;
    const usdRate = parseFloat(document.getElementById('hc-ets-rate').value) || 1;
    const shipping = parseFloat(document.getElementById('hc-ets-shipping').value) || 0;

    if (price <= 0) {
        alert('Lütfen satış fiyatını giriniz.');
        return;
    }

    let priceInTry = price;
    if (currency === 'USD') priceInTry = price * usdRate;
    if (currency === 'EUR') priceInTry = price * (usdRate * 1.08); // Approx EUR/USD

    // Etsy Fees (approx for TR sellers)
    const transactionFee = priceInTry * 0.065;
    const paymentProcessingFee = (priceInTry * 0.065) + 3; // 6.5% + 3 TL
    const listingFee = 0.20 * usdRate; // $0.20

    const totalFees = transactionFee + paymentProcessingFee + listingFee;
    const net = priceInTry - totalFees - shipping;

    document.getElementById('hc-ets-res-trans').innerText = transactionFee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ets-res-pay').innerText = paymentProcessingFee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ets-res-list').innerText = listingFee.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ets-res-net').innerText = net.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-etsy-result').classList.add('visible');
}
