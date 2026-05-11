function hcCapmHesapla() {
    const riskFree = parseFloat(document.getElementById('hc-cp-riskfree').value);
    const beta = parseFloat(document.getElementById('hc-cp-beta').value);
    const marketReturn = parseFloat(document.getElementById('hc-cp-market').value);

    if (isNaN(riskFree) || isNaN(beta) || isNaN(marketReturn)) {
        alert('Lütfen tüm alanları geçerli değerlerle doldurun.');
        return;
    }

    const marketPremium = marketReturn - riskFree;
    const expectedReturn = riskFree + (beta * marketPremium);

    document.getElementById('hc-cp-res-premium').innerText = '%' + marketPremium.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    document.getElementById('hc-cp-res-total').innerText = '%' + expectedReturn.toLocaleString('tr-TR', { minimumFractionDigits: 2 });

    document.getElementById('hc-cp-result').classList.add('visible');
}
