function hcReturnRateHesapla() {
    const sales = parseFloat(document.getElementById('hc-ir-sales').value);
    const returns = parseFloat(document.getElementById('hc-ir-returns').value);

    if (!sales || isNaN(returns)) {
        alert('Lütfen geçerli adetler giriniz.');
        return;
    }

    const rate = (returns / sales) * 100;

    document.getElementById('hc-ir-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
    document.getElementById('hc-return-rate-result').classList.add('visible');
}
