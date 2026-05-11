function hcOtvAracHesapla() {
    const price = parseFloat(document.getElementById('hc-otv-price').value);
    const engine = parseInt(document.getElementById('hc-otv-engine').value);

    if (isNaN(price) || price <= 0) {
        alert('Lütfen geçerli bir fiyat girin.');
        return;
    }

    let otvRate = 0;

    if (engine <= 1600) {
        if (price <= 300000) otvRate = 0.45;
        else if (price <= 350000) otvRate = 0.50;
        else if (price <= 400000) otvRate = 0.60;
        else if (price <= 450000) otvRate = 0.70;
        else otvRate = 0.80;
    } else if (engine <= 2000) {
        if (price <= 350000) otvRate = 1.30;
        else otvRate = 1.50;
    } else {
        otvRate = 2.20;
    }

    const otvAmount = price * otvRate;
    const kdvBase = price + otvAmount;
    const kdvAmount = kdvBase * 0.20;
    const total = kdvBase + kdvAmount;

    document.getElementById('hc-otv-res-rate').innerText = '%' + (otvRate * 100);
    document.getElementById('hc-otv-res-amount').innerText = otvAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-otv-res-kdv').innerText = kdvAmount.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-otv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-otv-result').classList.add('visible');
}
