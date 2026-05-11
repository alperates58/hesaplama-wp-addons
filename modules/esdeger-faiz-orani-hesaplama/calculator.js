function hcEsdegerFaizOraniHesapla() {
    const rate1 = parseFloat(document.getElementById('hc-efo-rate1').value);
    const period1 = parseFloat(document.getElementById('hc-efo-period1').value);
    const period2 = parseFloat(document.getElementById('hc-efo-period2').value);

    if (isNaN(rate1) || isNaN(period1) || isNaN(period2)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // i2 = (1 + i1)^(t2/t1) - 1
    // Burada i oranlar period başına orandır. Genelde yıllık verilir.
    // Varsayım: rate1 yıllık orandır.
    const i1 = (rate1 / 100) * (period1 / 365);
    const i2 = Math.pow(1 + i1, period2 / period1) - 1;
    const equivalentRateYearly = (i2 * (365 / period2)) * 100;

    document.getElementById('hc-efo-value').innerText = '%' + equivalentRateYearly.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-efo-result').classList.add('visible');
}
