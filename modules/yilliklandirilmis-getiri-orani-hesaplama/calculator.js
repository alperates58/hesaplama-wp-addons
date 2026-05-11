function hcYillikGetiriHesapla() {
    const totalReturn = parseFloat(document.getElementById('hc-yg-total').value) / 100;
    const days = parseFloat(document.getElementById('hc-yg-days').value);

    if (isNaN(totalReturn) || isNaN(days) || days <= 0) {
        alert('Lütfen geçerli getiri ve gün değerlerini girin.');
        return;
    }

    const annualized = (Math.pow(1 + totalReturn, 365 / days) - 1) * 100;

    document.getElementById('hc-yg-res-total').innerText = '%' + annualized.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-yg-result').classList.add('visible');
}
