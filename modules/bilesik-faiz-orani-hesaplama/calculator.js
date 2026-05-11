function hcBilesikFaizOraniHesapla() {
    const pv = parseFloat(document.getElementById('hc-bfor-pv').value);
    const fv = parseFloat(document.getElementById('hc-bfor-fv').value);
    const time = parseFloat(document.getElementById('hc-bfor-time').value);
    const n = parseInt(document.getElementById('hc-bfor-period').value);

    if (isNaN(pv) || isNaN(fv) || isNaN(time) || pv <= 0 || fv <= pv) {
        alert('Lütfen geçerli değerler girin. Hedeflenen tutar başlangıç tutarından büyük olmalıdır.');
        return;
    }

    // FV = PV * (1 + r/n)^(n*t)
    // (FV/PV)^(1/(n*t)) = 1 + r/n
    // r = n * [(FV/PV)^(1/(n*t)) - 1]
    const rate = n * (Math.pow(fv / pv, 1 / (n * time)) - 1);
    const yearlyRate = rate * 100;

    document.getElementById('hc-bfor-value').innerText = '%' + yearlyRate.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 4 });
    document.getElementById('hc-bfor-result').classList.add('visible');
}
