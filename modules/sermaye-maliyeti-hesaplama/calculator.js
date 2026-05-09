function hcCostCapHesapla() {
    const e = parseFloat(document.getElementById('hc-cc-equity').value) || 0;
    const d = parseFloat(document.getElementById('hc-cc-debt').value) || 0;
    const re = (parseFloat(document.getElementById('hc-cc-re').value) || 0) / 100;
    const rd = (parseFloat(document.getElementById('hc-cc-rd').value) || 0) / 100;
    const tax = (parseFloat(document.getElementById('hc-cc-tax').value) || 0) / 100;

    const v = e + d;
    if (v === 0) {
        alert('Toplam sermaye sıfır olamaz.');
        return;
    }

    // WACC = (E/V * Re) + (D/V * Rd * (1 - Tax))
    const wacc = ((e / v) * re) + ((d / v) * rd * (1 - tax));

    document.getElementById('hc-cc-res-val').innerText = '%' + (wacc * 100).toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    document.getElementById('hc-cost-cap-result').classList.add('visible');
}
