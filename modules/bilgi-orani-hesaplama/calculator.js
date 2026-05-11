function hcBilgiOraniHesapla() {
    const portfolio = parseFloat(document.getElementById('hc-ir-portfolio').value);
    const benchmark = parseFloat(document.getElementById('hc-ir-benchmark').value);
    const tracking = parseFloat(document.getElementById('hc-ir-tracking').value);

    if (isNaN(portfolio) || isNaN(benchmark) || isNaN(tracking) || tracking <= 0) {
        alert('Lütfen geçerli değerler girin. Takip hatası 0\'dan büyük olmalıdır.');
        return;
    }

    // IR = (Portfolio Return - Benchmark Return) / Tracking Error
    const ir = (portfolio - benchmark) / tracking;

    document.getElementById('hc-ir-value').innerText = ir.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-ir-result').classList.add('visible');
}
