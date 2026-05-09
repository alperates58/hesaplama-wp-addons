function hcAfterTaxDebtHesapla() {
    const rate = (parseFloat(document.getElementById('hc-atd-rate').value) || 0) / 100;
    const tax = (parseFloat(document.getElementById('hc-atd-tax').value) || 0) / 100;

    const afterTaxCost = rate * (1 - tax);

    document.getElementById('hc-atd-res-val').innerText = '%' + (afterTaxCost * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-aftertax-debt-result').classList.add('visible');
}
