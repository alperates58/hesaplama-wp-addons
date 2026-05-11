function hcFcfHesapla() {
    const operating = parseFloat(document.getElementById('hc-fcf-operating').value);
    const capex = parseFloat(document.getElementById('hc-fcf-capex').value);

    if (isNaN(operating) || isNaN(capex)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // FCF = Operating Cash Flow - Capital Expenditures
    const fcf = operating - capex;

    document.getElementById('hc-fcf-value').innerText = fcf.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-fcf-result').classList.add('visible');
}
