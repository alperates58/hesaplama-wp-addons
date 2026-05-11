function hcOtvHesapla() {
    const netPrice = parseFloat(document.getElementById('hc-otv-net').value);
    const cc = parseInt(document.getElementById('hc-otv-cc').value);

    if (isNaN(netPrice) || netPrice <= 0) {
        alert('Lütfen geçerli bir ham fiyat girin.');
        return;
    }

    let otvRate = 0;

    if (cc <= 1600) {
        if (netPrice <= 184000) otvRate = 0.45;
        else if (netPrice <= 220000) otvRate = 0.50;
        else if (netPrice <= 250000) otvRate = 0.60;
        else if (netPrice <= 280000) otvRate = 0.70;
        else otvRate = 0.80;
    } else if (cc <= 2000) {
        if (netPrice <= 170000) otvRate = 1.30;
        else otvRate = 1.50;
    } else {
        otvRate = 2.20;
    }

    const otvAmount = netPrice * otvRate;
    const priceWithOtv = netPrice + otvAmount;
    const kdvAmount = priceWithOtv * 0.20;
    const totalPrice = priceWithOtv + kdvAmount;

    document.getElementById('hc-otv-res-rate').innerText = '%' + (otvRate * 100);
    document.getElementById('hc-otv-res-otv').innerText = otvAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-otv-res-kdv').innerText = kdvAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-otv-res-total').innerText = totalPrice.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-otv-result').classList.add('visible');
}
