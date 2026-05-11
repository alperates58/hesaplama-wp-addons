function hcTemettuVerimiHesapla() {
    const price = parseFloat(document.getElementById('hc-tv-price').value);
    const dividend = parseFloat(document.getElementById('hc-tv-dividend').value);

    if (isNaN(price) || isNaN(dividend) || price <= 0) {
        alert('Lütfen geçerli hisse fiyatı ve temettü tutarı girin.');
        return;
    }

    const yieldRate = (dividend / price) * 100;

    document.getElementById('hc-tv-res-total').innerText = '%' + yieldRate.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-tv-result').classList.add('visible');
}
