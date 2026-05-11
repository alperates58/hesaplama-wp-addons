function hcEnfGetiriHesapla() {
    const amount = parseFloat(document.getElementById('hc-ey-amount').value);
    const returnRate = parseFloat(document.getElementById('hc-ey-return').value) / 100;
    const inflRate = parseFloat(document.getElementById('hc-ey-inflation').value) / 100;

    if (isNaN(amount) || isNaN(returnRate) || isNaN(inflRate)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const nominalValue = amount * (1 + returnRate);
    const realValue = nominalValue / (1 + inflRate);
    const realProfit = realValue - amount;

    document.getElementById('hc-ey-res-nominal').innerText = nominalValue.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ey-res-real').innerText = realValue.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-ey-res-profit').innerText = realProfit.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    const profitElem = document.getElementById('hc-ey-res-profit');
    profitElem.style.color = realProfit >= 0 ? 'green' : 'red';

    document.getElementById('hc-ey-result').classList.add('visible');
}
